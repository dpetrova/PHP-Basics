<?php
$keyString = $_GET['keys'];
$text = $_GET['text'];

//find startKey and EndKey
preg_match_all('/^([a-zA-Z_]+)[0-9]+(.*)[0-9]+([a-zA-Z_]+)$/', $keyString, $matchesKeys); //^ means match at the beginning of the string or line; $ means match at the end of the string or at the end of the line
//var_dump($matchesKeys);
if(empty($matchesKeys[1]) || empty($matchesKeys[3])){
    echo "<p>A key is missing</p>";
} else {
    $startKey = $matchesKeys[1][0];
    $endKey = $matchesKeys[3][0];
    //find matches between startKey and EndKey
    $pattern = "/$startKey(.*?)$endKey/";
    preg_match_all($pattern, $text, $matches);

    //extract only numbers
    $onlyNumbers = [];
    //foreach ($matches[1] as $line) {
    //    $line = preg_replace('/[^\d.]/', '', $line);
    //    $onlyNumbers[] = $line;
    //}
    foreach ($matches[1] as $line) {
        if(is_numeric($line)){
            $onlyNumbers[] = $line;
        }
    }

    //print results
    $sum = 0;
    foreach ($onlyNumbers as $number) {
        $sum += $number;
    }
    if($sum == 0){
        $sum = 'nothing';
    }
    echo "<p>The total value is: <em>$sum</em></p>";
}




