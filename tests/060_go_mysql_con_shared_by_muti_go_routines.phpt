--TEST--
Go PDO connection shared by mutilple go routines (deemed to be FAIL)

--SKIPIF-- 
<?php  
	echo "skip"; 
	return;
	
	if( !class_exists ("PDO") ){
		echo "skip\n";
	}else{
		$user='root';     
		$pass='Baipeng2016';   
		$dsn="mysql:host=10.116.71.188;dbname=test";
		
		$db = new PDO($dsn, $user, $pass);
		$rs = $db->query("select * from test;");
		if(empty($rs)) 
			echo "skip\n";
		
	}
?>
--FILE--
<?php
use \Go\Chan;
use \Go\Scheduler;

function subtc($seq){
    echo "SUB-TC: #$seq\n";
}

subtc(1);
$ch = new Chan(["capacity"=>1000]);

$user='root';     
$pass='Baipeng2016';   
$dsn="mysql:host=10.116.71.188;dbname=test";

$db = new PDO($dsn, $user, $pass);
$succ1 =  false;
go(function() use($db, &$succ1){
	for($i=0; $i<1000; $i++){
		$db->query("update test set str='$i' where id=1;");
		$r = $db->query("select * from test where id=1;");
		
		$rs = array();
		foreach($r as $row){
			$rs[] = $row;
		}
		
		if ( !assert($rs[0]['id'] == 1 and $rs[0]['str'] == $i) ) {
			break;
		};
	}
	if($i==1000)
		$succ1 = true;
});

//$db = new PDO($dsn, $user, $pass);
$succ2 =  false;
go(function() use($db, &$succ2){
	for($i=0; $i<1000; $i++){
		$db->query("update test set str='$i' where id=2;");
		$r = $db->query("select * from test where id=2;");
		
		$rs = array();
		foreach($r as $row){
			$rs[] = $row;
		}
		
		if ( !assert($rs[0]['id'] == 2 and $rs[0]['str'] == $i) ) {
			break;
		};
	}
	if($i==1000)
		$succ2 = true;
});

Scheduler::join();

if($succ1 && $succ2) 
	echo "success\n";

?>
--EXPECT--
SUB-TC: #1
success
