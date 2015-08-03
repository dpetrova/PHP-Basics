<?php

$begin = strtotime("first Sunday of this month");
$end = strtotime("last day of this month");
$day = $begin;

while ( $day <= $end) {
    echo date("jS F, Y", $day)."\n";
    $day = strtotime("+1 week", $day);
}


//$year = date("Y"); //A full numeric representation of current year, 4 digits
//$month = date("F"); //A full textual representation of current month, such as January or March
//$totalDays = date("t"); // get Number of days in the current month
//
//for ($i = 1; $i <= $totalDays; $i++) {
//    $currDate = strtotime("$i $month $year"); //Parse about any English textual datetime description into a Unix timestamp
//    if(date("D", $currDate) == "Sun"){ //"D" A textual representation of a day, three letters (Mon through Sun)
//        echo date("jS F, Y", $currDate) . "\n";
//    }
//}

// j -> Day of the month without leading zeros (1 to 31)
// S -> English ordinal suffix for the day of the month, 2 characters (st, nd, rd or th)

