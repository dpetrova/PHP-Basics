<?php
$arr = array('hello', 15, 1.234, array(1,2,3), (object)[2,34]);

foreach ($arr as $value) {
    echo (is_numeric($value) ? var_dump($value) : gettype($value)), "\n";
}

//foreach ($arr as $value) {
//    if(is_numeric($value))
//    {
//        echo var_dump($value), "\n";
//    } else {
//        echo gettype($value), "\n";
//    }
//}
