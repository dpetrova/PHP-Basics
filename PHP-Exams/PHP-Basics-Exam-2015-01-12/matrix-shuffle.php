<?php
$size = $_GET['size'];
$text = $_GET['text'];

//define empty matrix
$matrix = [];
for ($i = 0; $i <$size; $i++) {
    $matrix[$i] = [];
    for ($j = 0; $j <$size; $j++) {
        $matrix[$i][$j] = '';
    }
}

//initial position and direction
$row = 0;
$col = 0;
$direction = "right";
for ($i = 0; $i <($size * $size); $i++) {
    //set spiral movements
    if ($direction == "right" && ($col > ($size - 1) || $matrix[$row][$col] != "")){
        $direction = "down";
        $col--;
        $row++;
    }
    if ($direction == "down" && ($row > ($size - 1) || $matrix[$row][$col] != "")){
        $direction = "left";
        $row--;
        $col--;
    }
    if ($direction == "left" && ($col < 0 || $matrix[$row][$col] != "")){
        $direction = "up";
        $col++;
        $row--;
    }
    if ($direction == "up" && ($row < 0 || $matrix[$row][$col] != "")){
        $direction = "right";
        $row++;
        $col++;
    }
    //fill matrix with letters
    $index = $i % strlen($text);
    $matrix[$row][$col] = $text[$index];
    if ($direction == "right"){
        $col++;
    }
    if ($direction == "down"){
        $row++;
    }
    if ($direction == "left"){
        $col--;
    }
    if ($direction == "up"){
        $row--;
    }
}

//extract all letters like a chessboard
$white = '';
$black = '';
for ($i = 0; $i <count($matrix); $i++) {
    for ($j = 0; $j <count($matrix[$i]); $j++) {
       if(($i % 2 == 0 && $j % 2 == 0) || ($i % 2 != 0 && $j % 2 != 0)){
           $white .=  $matrix[$i][$j];
       } else {
           $black .= $matrix[$i][$j];
       }
    }
}
$wholeStr = $white . $black;

//check if found string is a palindrome
$lowerCaseStr = strtolower($wholeStr); //set string to lower case
$lowerCaseStr = preg_replace('/[^a-z]+/', '', $lowerCaseStr); //replace all non letter characters
$reverseStr = strrev($lowerCaseStr); //reverse string
if($lowerCaseStr === $reverseStr){
    $background = '#4FE000';
} else {
    $background = '#E0000F';
}
echo "<div style='background-color:$background'>$wholeStr</div>";






