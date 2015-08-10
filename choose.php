<?php
// n choose k is , (n / k) * ( (n-1) choose (k-1))
function choose($n, $k)
{
  $total = 1;
  while(true) {
    if ($k == 0 ) return $total * 1;
    if ($k < 0) return 0;
    if ($n == $k) return $total * 1;
    if ($k == 1) return $total * $n;

    $temp = floor( $n / 2);
    
    if ($k > $temp) $k = $n - $k;

    $total = $total * ($n / $k);
    $n = $n - 1;
    $k = $k - 1;
  }
}

//echo choose(300, 150) . "\n";
//口袋中有10个球,分别标有号码1到10,现从中任选3只,1.求最小号码为5的概率
//从10个球里选出3个,总共有120种取法；
//最小号码为5的概率,即5被选出,然后从6、7、8、9、10里边选出两个,有10种选法；所以所求概率为10/120
function ball_rate()
{
    
    $box = new ArrayObject( range(1, 10));
    $total = $counter = 5009999;
    $p = 0;
    while($counter > 0) {
        
        $balls = $box->getArrayCopy();
        $ball = chooseMinballs($balls);
        if ($ball == 5 ) {
           ++$p; 
        }
        
        --$counter;
    }
    echo $total . "\n";
    echo $p / $total;
}

function chooseMinballs($balls)
{
    $temp = array();
    shuffle($balls);
    $temp[] = array_pop($balls);
    shuffle($balls);
    $temp[] = array_pop($balls);
    shuffle($balls);
    $temp[] = array_pop($balls);
    return min($temp);
}

//main//

ball_rate();

