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

echo choose(300, 150) . "\n";

