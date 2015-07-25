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
    foreach ($coin_f_collection as $coin_function) {    
        if ($number > 0) {
            $pre .= $coin_function();
            throw_coins($coin_f_collection, $number, $pre);
            $pre = substr($pre, 0, -1);
        } else {
            echo $pre . $coin_function() . "\n";    
        }    
    }
}

function throw_coins_no_recusive($coin_f_collection, $number = 1, $pre = "")
{
    $stack = array();
    while(true) {
        $number -= 1;
        foreach ($coin_f_collection as $coin_function) {
            if ($number > 0) {
                $pre .= $coin_function();
                array_push($stack, array('n' => $number, 'p' => $pre, 'r' => substr($pre, 0, -1)));
                break;
            } else {
                echo $pre . $coin_function() . "\n";
                array_pop();
            }
        }
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
/*
throw_coins($coin_f_collection, 4);
echo "\n";

throw_coins($coin_f_collection, 10);
echo "\n";
 * 
 */