<?php
$input = $_GET['numbersString'];
$pattern = '/([A-Z][A-Za-z]*)[^0-9A-Za-z+]*([+]?[0-9]+[0-9\(\)\/\.\-\s]*[0-9]+)/';
preg_match_all($pattern, $input, $pairsArr, PREG_SET_ORDER);
if(!empty($pairsArr[0])){
    echo '<ol>';
    foreach ( $pairsArr as $pair) {
        $name = trim($pair[1]);
        $phone = trim($pair[2]);
        $phone = preg_replace('/[\(\)\/\.\-\s]/', '', $phone);
        echo '<li><b>'.$name.':</b> '.$phone.'</li>';
    }
    echo '</ol>';
} else{
    echo '<p>No matches!</p>';
}
