<?php

//simulate throw dice, as we see , when 
//number of throw grows, some non - unique pairs are double than unique pair
//for example pair 1,1 2,2 3,3 4,4 5,5 6,6 are unique pair
//but 1,2 is not , since 1,2 and 2,1 are some in real situation.

//so in real situation, a unique pair probablity is 1/36, but a non unique
//pair is 1/18
$temp = array();
$i = 1;

for ($j = 1; $j < 7; $j++ ) {
	for($k = 1; $k < 7; $k++) {
		$str = $j.",".$k;
		$str1 = $k.",".$j;
		if (!array_key_exists($str1, $temp)) {
		    $temp[$str] = 1;
		}
	}
}

echo "Total distinct pairs are " . count($temp) . "\n";

while ($i < 360000) {
	$dice1 = rand(1, 6);
	$dice2 = rand(1, 6);

	$str = $dice1 . "," . $dice2;
    $str1 = $dice2 . "," . $dice1;	
	if (!array_key_exists($str1, $temp)) {
		$temp[$str] += 1;
	} else {
		$temp[$str1] += 1;
	}
	$i += 1;
}

foreach ($temp as $key => $value) {
	echo $key . " => " .$value . "\n";
}


