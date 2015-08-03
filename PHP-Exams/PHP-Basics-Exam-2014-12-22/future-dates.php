<?php
$numbersString = $_GET['numbersString'];
$dateString = $_GET['dateString'];

//match only numbers that are not surround by letters
preg_match_all('/[^a-zA-Z\d]+?([\d]+)[^a-zA-Z\d]+?/', $numbersString, $numbersArr);

//match only dates in format yyyy-mm-ddd
preg_match_all('/[\d]{4}\-[\d]{2}\-[\d]{2}/', $dateString, $datesArr);

//sum numbers in array
$sum = 0;
foreach ($numbersArr[1] as $number) {
    $sum += $number;
}
//reverse digits in sum
$sum = strrev($sum);

if(!empty($datesArr[0])) {
//increase dates with reversed sum
    $increasedDates = [];
    foreach ($datesArr[0] as $line) {
        $date = date_create($line, timezone_open("Europe/Sofia"));
        date_add($date, date_interval_create_from_date_string("$sum days"));
        $increasedDates[] = date_format($date, "Y-m-d");
    }
//var_dump($increasedDates);

//print results
    echo "<ul>";
    foreach ($increasedDates as $futureDate) {
        echo "<li>$futureDate</li>";
    }
    echo "</ul>";
} else {
    echo "<p>No dates</p>";
}




