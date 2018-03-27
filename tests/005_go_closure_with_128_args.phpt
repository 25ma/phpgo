--TEST--
Go closure with 128 args

--FILE--
<?php
use \go\Scheduler;

function subtc($seq){
    echo "SUB-TC: #$seq\n";
}

go(function(
	$a00,$a10,$a20,$a30,$a40,$a50,$a60,$a70,$a80,$a90,$aa0,$ab0,$ac0,$ad0,$ae0,$af0,
	$a01,$a11,$a21,$a31,$a41,$a51,$a61,$a71,$a81,$a91,$aa1,$ab1,$ac1,$ad1,$ae1,$af1,
	$a02,$a12,$a22,$a32,$a42,$a52,$a62,$a72,$a82,$a92,$aa2,$ab2,$ac2,$ad2,$ae2,$af2,
	$a03,$a13,$a23,$a33,$a43,$a53,$a63,$a73,$a83,$a93,$aa3,$ab3,$ac3,$ad3,$ae3,$af3,
	$a04,$a14,$a24,$a34,$a44,$a54,$a64,$a74,$a84,$a94,$aa4,$ab4,$ac4,$ad4,$ae4,$af4,
	$a05,$a15,$a25,$a35,$a45,$a55,$a65,$a75,$a85,$a95,$aa5,$ab5,$ac5,$ad5,$ae5,$af5,
	$a06,$a16,$a26,$a36,$a46,$a56,$a66,$a76,$a86,$a96,$aa6,$ab6,$ac6,$ad6,$ae6,$af6,
	$a07,$a17,$a27,$a37,$a47,$a57,$a67,$a77,$a87,$a97,$aa7,$ab7,$ac7,$ad7,$ae7,$af7

	){
		
		subtc(1);		
		var_dump( func_get_args() );	
				
	},  
	1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,
	1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,
	1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,
	1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,
	1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,
	1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,
	1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,
	1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16

);

Scheduler::RunJoinAll();

?>
--EXPECT--
SUB-TC: #1
array(128) {
  [0]=>
  int(1)
  [1]=>
  int(2)
  [2]=>
  int(3)
  [3]=>
  int(4)
  [4]=>
  int(5)
  [5]=>
  int(6)
  [6]=>
  int(7)
  [7]=>
  int(8)
  [8]=>
  int(9)
  [9]=>
  int(10)
  [10]=>
  int(11)
  [11]=>
  int(12)
  [12]=>
  int(13)
  [13]=>
  int(14)
  [14]=>
  int(15)
  [15]=>
  int(16)
  [16]=>
  int(1)
  [17]=>
  int(2)
  [18]=>
  int(3)
  [19]=>
  int(4)
  [20]=>
  int(5)
  [21]=>
  int(6)
  [22]=>
  int(7)
  [23]=>
  int(8)
  [24]=>
  int(9)
  [25]=>
  int(10)
  [26]=>
  int(11)
  [27]=>
  int(12)
  [28]=>
  int(13)
  [29]=>
  int(14)
  [30]=>
  int(15)
  [31]=>
  int(16)
  [32]=>
  int(1)
  [33]=>
  int(2)
  [34]=>
  int(3)
  [35]=>
  int(4)
  [36]=>
  int(5)
  [37]=>
  int(6)
  [38]=>
  int(7)
  [39]=>
  int(8)
  [40]=>
  int(9)
  [41]=>
  int(10)
  [42]=>
  int(11)
  [43]=>
  int(12)
  [44]=>
  int(13)
  [45]=>
  int(14)
  [46]=>
  int(15)
  [47]=>
  int(16)
  [48]=>
  int(1)
  [49]=>
  int(2)
  [50]=>
  int(3)
  [51]=>
  int(4)
  [52]=>
  int(5)
  [53]=>
  int(6)
  [54]=>
  int(7)
  [55]=>
  int(8)
  [56]=>
  int(9)
  [57]=>
  int(10)
  [58]=>
  int(11)
  [59]=>
  int(12)
  [60]=>
  int(13)
  [61]=>
  int(14)
  [62]=>
  int(15)
  [63]=>
  int(16)
  [64]=>
  int(1)
  [65]=>
  int(2)
  [66]=>
  int(3)
  [67]=>
  int(4)
  [68]=>
  int(5)
  [69]=>
  int(6)
  [70]=>
  int(7)
  [71]=>
  int(8)
  [72]=>
  int(9)
  [73]=>
  int(10)
  [74]=>
  int(11)
  [75]=>
  int(12)
  [76]=>
  int(13)
  [77]=>
  int(14)
  [78]=>
  int(15)
  [79]=>
  int(16)
  [80]=>
  int(1)
  [81]=>
  int(2)
  [82]=>
  int(3)
  [83]=>
  int(4)
  [84]=>
  int(5)
  [85]=>
  int(6)
  [86]=>
  int(7)
  [87]=>
  int(8)
  [88]=>
  int(9)
  [89]=>
  int(10)
  [90]=>
  int(11)
  [91]=>
  int(12)
  [92]=>
  int(13)
  [93]=>
  int(14)
  [94]=>
  int(15)
  [95]=>
  int(16)
  [96]=>
  int(1)
  [97]=>
  int(2)
  [98]=>
  int(3)
  [99]=>
  int(4)
  [100]=>
  int(5)
  [101]=>
  int(6)
  [102]=>
  int(7)
  [103]=>
  int(8)
  [104]=>
  int(9)
  [105]=>
  int(10)
  [106]=>
  int(11)
  [107]=>
  int(12)
  [108]=>
  int(13)
  [109]=>
  int(14)
  [110]=>
  int(15)
  [111]=>
  int(16)
  [112]=>
  int(1)
  [113]=>
  int(2)
  [114]=>
  int(3)
  [115]=>
  int(4)
  [116]=>
  int(5)
  [117]=>
  int(6)
  [118]=>
  int(7)
  [119]=>
  int(8)
  [120]=>
  int(9)
  [121]=>
  int(10)
  [122]=>
  int(11)
  [123]=>
  int(12)
  [124]=>
  int(13)
  [125]=>
  int(14)
  [126]=>
  int(15)
  [127]=>
  int(16)
}