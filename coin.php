<?php
function coin()
{
    return rand(1, 2);
}

function coin_side()
{
    return array(1 => "H", 2 => "T");
}

function coin_h()
{
    return "H";
}

function coin_t()
{
    return "T";
}

function throw_coins($coin_f_collection, $number = 1, $pre = "")
{
    $number -= 1;
    $temp = $coin_f_collection;
    foreach ($coin_f_collection as $coin_function) {    
        if ($number > 0) {
            $pre .= $coin_function();
            throw_coins($temp, $number, $pre);
            $pre = substr($pre, 0, -1);
        } else {
            echo $pre . $coin_function() . "\n";    
        }    
    }
}

function throw_coins_no_recusive($coin_f_collection, $number = 1, $pre = "")
{
    $stack = array();

    $temp = count ( $coin_f_collection);
    $number -= 1;
    
    $j = 0;
    while(true) {
        
        
        a:
        //while(true) {
        for ($i = $j; $i < $temp; $i++) {

            $coin_function = $coin_f_collection[$i];

            if ($number > 0) {

                $pre .= $coin_function();
                array_push($stack, array('n' => $number, 'r' => substr($pre, 0, -1), 'index'=>$i+1));
                $number -= 1;
                $j = 0;
                goto a;
            } else {
                echo $pre . $coin_function() . "\n";
            }
        }
        //}
        
        //if ($number == 0) {
            $item = array_pop($stack);
            
            if (!$item) return;
            $number = $item['n'];
            $j = $item['index'];
            //echo $i;
            $pre = $item['r'];
            
        //}
    }    
}

function coin_a()
{
    return "a";
}

function coin_b()
{
    return "b";
}

function coin_c()
{
    return "c";
}

//main 
/*
$coin_f_collection = array("coin_h", "coin_t");
throw_coins($coin_f_collection, 1);
echo "\n";
throw_coins($coin_f_collection, 2);
echo "\n";

throw_coins($coin_f_collection, 3);
echo "\n";

$coin_f_collection = array("coin_a", "coin_b", "coin_c");
throw_coins($coin_f_collection, 1);
echo "\n";

$coin_f_collection = array("coin_a", "coin_b", "coin_c");
throw_coins($coin_f_collection,2);
echo "\n";

$coin_f_collection = array("coin_a", "coin_b", "coin_c");
throw_coins($coin_f_collection,3);
echo "\n";
*/

$coin_f_collection = array("coin_h", "coin_t");
throw_coins_no_recusive($coin_f_collection, 1 );
echo "\n";

$coin_f_collection = array("coin_h", "coin_t");
throw_coins_no_recusive($coin_f_collection, 5 );
echo "\n";

$coin_f_collection = array("coin_a", "coin_b", "coin_c");
throw_coins_no_recusive($coin_f_collection, 3 );
echo "\n";
