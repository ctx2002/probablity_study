<?php

// a line ,randomly cut into 3 segments, to calculate what is probablity
// the 3 segments can form a triangle. 
$len = 650;
$total = 10000000;
$sub = 0;
$temp = $total;
while($temp > 0) {
    
    
    $p1 = rand(1, $len);
    $p2 = rand(1, $len);

    $seg1 = null;
    $seg2 = null;
    $seg3 = null;

    if ($p1 > $p2) {
        $t = $p1;
        $p1 = $p2;
        $p2 = $t;
    }

    $seg1 = $p1;
    $seg2 = $p2-$p1;
    $seg3 = $len-$p2;
    
    //var_dump($p1, $p2);
    $s1 = false;
    $s2 = false;
    $s3 = false;
    if ($seg3 > 0 && $seg3 < ($seg1+$seg2)) {
        $s1 = true;
    }
    
    if ($seg1 > 0 && $seg1 < ($seg2 + $seg3)) {
        $s2 = true;
    }
    
    if ($seg2 > 0 && $seg2 < ($seg1 + $seg3)) {
        $s3 = true;
    }
    
    if ($s1 && $s2 && $s3) {
        $sub += 1;    
    }
    
    $temp -= 1;
}

echo ($sub / $total) . "\n";


