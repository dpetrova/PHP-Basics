<?php
$input1 = $_GET['arrows'];
$input2 = $_GET['arrows1'];
$input3 = $_GET['arrows2'];
$input4 = $_GET['arrows3'];
$input = array($input1, $input2, $input3, $input4);
//var_dump($input);
$largeArrowPattern = '/>{3}-{5}>{2}/';
$mediumArrowPattern = '/>{2}-{5}>{1}/';
$smallArrowPattern = '/>{1}-{5}>{1}/';
$largeArrowCounter = 0;
$mediumArrowCounter = 0;
$smallArrowCounter = 0;
foreach ($input as $line) {
    preg_match_all($largeArrowPattern, $line, $mathesLarges);
    //var_dump($mathesLarges);
    $largeArrowCounter += count($mathesLarges[0]);
    $line = preg_replace($largeArrowPattern, '', $line);
    //var_dump($line);
    preg_match_all($mediumArrowPattern, $line, $mathesMedium);
    $mediumArrowCounter += count($mathesMedium[0]);
    $line = preg_replace($mediumArrowPattern, '', $line);
    //var_dump($line);
    preg_match_all($smallArrowPattern, $line, $mathesSmall);
    $smallArrowCounter += count($mathesSmall[0]);
}
//var_dump($largeArrowCounter);
//var_dump($mediumArrowCounter);
//var_dump($smallArrowCounter);

$number = $smallArrowCounter . $mediumArrowCounter . $largeArrowCounter;
//var_dump($number);
$binaryNumber = decbin($number);
//var_dump($binaryNumber);
$reversedNumber = strrev($binaryNumber);
//var_dump($reversedNumber);
$concatNumber = $binaryNumber . $reversedNumber;
//var_dump($concatNumber);
$decimalNumber = bindec($concatNumber);
//var_dump($decimalNumber);
echo $decimalNumber;


