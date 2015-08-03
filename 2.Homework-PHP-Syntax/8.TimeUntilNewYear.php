<?php
//getdate() връща асоциативен масив, съдържащ информация за датата за дадения timestamp или текущото локално време,
//ако не е подаден timestamp, , със следните елементи:
//Array
//(
//    [seconds] => 50  -> Цифрово представяне на секунди
//    [minutes] => 41 -> Цифрово представяне на минути
//    [hours] => 23 -> Цифрово представяне на часове
//    [mday] => 12 -> Цифрово представяне на деня от месеца
//    [wday] => 0 -> Цифрово представяне на деня от седмицата
//    [mon] => 4 -> Цифрово представяне на месец
//    [year] => 2015 -> Пълно цифрово представяне на година, 4 цифри
//    [yday] => 101 -> Цифрово представяне на деня от годината
//    [weekday] => Sunday -> Пълно текстово представяне на деня от седмицата
//    [month] => April -> Пълно текстово представяне на месец, например January или March
//    [0] => 1428874910 -> Секунди от Unix епохата, подобно на стойностите връщани от time() и използвани от date().
//)

//int mktime ([ int $hour [, int $minute [, int $second [, int $month [, int $day [, int $year [, int $is_dst ]]]]]]] )
//Връща Unix времеви отпечатък (timestamp), който отговаря на подадените аргументи. Този timestamp е голямо цяло число (long integer),
//съдържащ броя секунди между Unix Епохата (1 януари 1970 00:00:00 GMT) и указаното време.

$today = getdate();
//print_r($today);
$newYear = mktime(0, 0, 0, 1, 1, $today['year'] + 1);
$secondsToNewYear = $newYear - $today[0];
if(date("I", $today[0]) > 0) { //"I" Дали датата е по лятно часово време (daylights savings time)	1 ако е по лятно време, 0 - по зимно.
    $secondsToNewYear -= 3600;
}
$minutesToNewYear = (int)($secondsToNewYear / 60);
$hoursToNewYear = (int)($minutesToNewYear / 60);

echo 'Hours until new year : ' . $hoursToNewYear . "\n";
echo 'Minutes until new year : ' . $minutesToNewYear . "\n";
echo 'Seconds until new year : ' . $secondsToNewYear . "\n";

$dayLeft = (int)($secondsToNewYear / (3600 * 24));
$hoursLeft = (int)(($secondsToNewYear % (3600 * 24)) / 3600);
$minutesLeft = (int)(($secondsToNewYear % 3600) / 60);
$secondsLeft = (int)(($secondsToNewYear % 3600) % 60);

echo "$dayLeft : $hoursLeft : $minutesLeft : $secondsLeft";