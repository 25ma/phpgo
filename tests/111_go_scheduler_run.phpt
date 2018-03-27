--TEST--
Go scheduler run

--SKIPIF--


--FILE--
<?php
use \go\Mutex;
use \go\Scheduler;
use \go\Runtime;

function subtc($seq){
    echo "SUB-TC: #$seq\n";
}

subtc(1);

go(function(){
	echo "return from go 1\n";
});

go(function(){
	echo "go 2\n";
	usleep(100*1000);
	echo "return from go 2\n";
	
});

go(function(){
	echo "go 3\n";
	usleep(100*1000);
	echo "return from go 3\n";
});

go(function(){
	echo "go 4\n";
	usleep(200*1000);
	echo "return from go 4\n";
});

$pass = 0;
while(true){
	$pass++;
	$run = Scheduler::RunOnce();
	if($run>0)
		echo "^run $run tasks\n";
	
	if(Runtime::NumGoroutine() ===0 )
		break;
}

subtc(2);

go(function(){
	echo "go 1\n";
});
go(function(){
	usleep(100*1000);
	echo "go 2\n";
});

Scheduler::RunJoinAll(1);
echo "after RunJoinAll(1)\n";
Scheduler::RunJoinAll(0);

subtc(3);

go(function(){
	echo "go 1\n";
});
go(function(){
	usleep(100*1000);
	echo "go 2\n";
});
go(function(){
	usleep(200*1000);
	echo "go 3\n";
	exit;
});


Scheduler::RunForever();

?>
--EXPECT--
SUB-TC: #1
return from go 1
go 2
^run 2 tasks
go 3
^run 1 tasks
go 4
^run 1 tasks
return from go 2
^run 1 tasks
return from go 3
^run 1 tasks
return from go 4
^run 1 tasks
SUB-TC: #2
go 1
after RunJoinAll(1)
go 2
SUB-TC: #3
go 1
go 2
go 3

