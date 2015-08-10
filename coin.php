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

function throw_coin_untill_H()
{
    $counter = 1;
    while (true) {
        $index = coin();
        $c = coin_side();
        $side = $c[$index];
        echo $side;
        $counter += 1;
        if ($counter % 16 == 0) {
            echo "\n";
        }
        
        if ($side == "H") {
            break;
        }
    }
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
    $i = 0;
    $con = array();
    while(true) {
        
        while ($i < $temp) {
            $coin_function = $coin_f_collection[$i];
            
            if ($number > 0) {
                $pre .= $coin_function();
                
                //index points to next item
                array_push($stack, array('n' => $number, 'r' => substr($pre, 0, -1), 'index'=>$i+1));
                $number -= 1;    
                $i = 0;
            } else {
                $h = $pre . $coin_function();
                $con[] = $h;
                echo $h . "\n";
                $i += 1;    
            }
        }
        
        $item = array_pop($stack);

        if (!$item) {return $con; }
        $number = $item['n'];
        $i = $item['index']; //important, 
        $pre = $item['r'];
    }
    //echo "end\n";
    return $con;
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

function dice_1()
{
    return 1;
}

function dice_2()
{
    return 2;
}

function dice_3()
{
    return 3;
}

function dice_4()
{
    return 4;
}

function dice_5()
{
    return 5;
}

function dice_6()
{
    return 6;
}

//一小时内， 某十字路口通过的车辆数
function vehicle_at_cross_road($time)
{
    
}

//抛三枚硬币，至少出现一个正面的集合
function throw3_at_least_one_h()
{
    $h = function()
    {
        return "H";
    };

    $t =function()
    {
        return "T";
    };
    $coin_f_collection = array($h, $t);
    $result = throw_coins_no_recusive($coin_f_collection, 3 );
    echo "----\n";
    foreach ($result as $value) {
        if (strpos($value, "H") !== FALSE) {
            echo $value ."\n";
        }
    }
}

//抛三枚硬币，最多出现一个正面的集合
function throw3_at_most_one_h()
{
    $h = function()
    {
        return "H";
    };

    $t =function()
    {
        return "T";
    };
    $coin_f_collection = array($h, $t);
    $result = throw_coins_no_recusive($coin_f_collection, 3 );
    echo "----at  most\n";
    foreach ($result as $value) {
        if (preg_match("%^[^H]+$|^[H][^H]+$|^[^H]+H[^H]*$%s", $value, $m)) {
            echo $value . "\n";
        }
    }
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

/*$coin_f_collection = array("coin_h", "coin_t");
throw_coins_no_recusive($coin_f_collection, 1 );
echo "\n";
*/
$coin_f_collection = array("coin_h", "coin_t");
throw_coins_no_recusive($coin_f_collection, 5 );
echo "\n";

$coin_f_collection = array("coin_a", "coin_b", "coin_c");
throw_coins_no_recusive($coin_f_collection, 3 );
echo "\n";

$coin_f_collection = array("dice_1", "dice_2", "dice_3","dice_4","dice_5","dice_6");
throw_coins_no_recusive($coin_f_collection, 2 );
echo "\n";

//throw_coin_untill_H();

throw3_at_least_one_h();

throw3_at_most_one_h();