<?php
$page = $_GET['page'];
$pageSize = $_GET['pageSize'];
$input = $_GET['conferences'];
//var_dump($page);
//var_dump($pageSize);
//var_dump($input);

preg_match_all('/\[.+\]/', $input, $matches);
//var_dump($matches);

$lines = [];
foreach ($matches as $line) {
    $line = preg_replace('/\[/', '', $line);
    $line = preg_replace('/\]/', '', $line);
    $lines[] = $line;
}
//var_dump($lines);

$validData = [];
$pattern = '/(\d{4}[\-]\d{2}[\-]\d{2})[,\s]+(#[a-zA-Z\.\-]+)[,\s]+(\'.+\')[,\s]+([a-zA-Z,\-]+)[,\s]+(\d+)[,\s]+(\d+)|(\d{4}[\/]\d{2}[\/]\d{2})[,\s]+(#[a-zA-Z\.\-]+)[,\s]+(\'.+\')[,\s]+([a-zA-Z,\-]+)[,\s]+(\d+)[,\s]+(\d+)/';
$pattern1 = '/(\d{4}[\-]\d{2}[\-]\d{2})[,\s]+(#[a-zA-Z\.\-]+)[,\s]+(\'.+\')[,\s]+([a-zA-Z\,\-]+)[,\s]+(\d+)[,\s]+(\d+)/';
$pattern2 = '/(\d{4}[\/]\d{2}[\/]\d{2})[,\s]+(#[a-zA-Z\.\-]+)[,\s]+(\'.+\')[,\s]+([a-zA-Z\,\-]+)[,\s]+(\d+)[,\s]+(\d+)/';
$pattern3 = '/(\d{4}[\-\/]\d{2}[\-\/]\d{2})[,\s]+(#[a-zA-Z\.\-]+)[,\s]+(\'.+\')[,\s]+([a-zA-Z\,\-]+)[,\s]+(\d+)[,\s]+(\d+)/';
foreach ($lines[0] as $line) {
    preg_match($pattern1, $line, $match);
    $validData[] = $match;
}
foreach ($lines[0] as $line) {
    preg_match($pattern2, $line, $match);
    $validData[] = $match;
}

//var_dump($validData);

$noEmptyMatches = [];
foreach ($validData as $arr) {
    if(!empty($arr)){
        $noEmptyMatches[] = $arr;
    }
}
//var_dump($noEmptyMatches);

$eventList = [];
foreach ($noEmptyMatches as $entry) {
    $currentEntry = new stdClass();
    $currentEntry->date = trim($entry[1]);
    $currentEntry->hash = trim($entry[2]);
    $currentEntry->name = trim($entry[3]);
    $currentEntry->location = trim($entry[4]);
    $currentEntry->ticketsLeft = (trim($entry[5]) - trim($entry[6]));
    $eventList[] = $currentEntry;
}
//var_dump($eventList);

usort($eventList, function($s1, $s2) {
    if ($s1->date == $s2->date) {
        if($s1->location == $s2->location){
            if($s1->ticketsLeft == $s2->ticketsLeft){
                return strcmp($s1->name, $s2->name);
            }
            return strcmp($s2->ticketsLeft, $s1->ticketsLeft);
        }
        return strcmp($s1->location, $s2->location);
    }
    return strcmp($s2->date, $s1->date);
});

//var_dump($eventList);

$startIndex = ($page - 1) * $pageSize;
//var_dump($startIndex);
$endIndex = $startIndex + $pageSize;
//var_dump($endIndex);

$today = '2015/05/03';
//var_dump($today);

//echo '<table border="1" cellpadding="5"><tr><th>Date</th><th>Event name</th><th>Event hash</th><th>Days left</th><th>Seats left</th></tr>';
//for ($i = $startIndex; $i < $endIndex; $i++) {
//    if(isset($eventList[$i])){
//        $currEvent = $eventList[$i];
//        //var_dump($currEvent);
//        //var_dump($currEvent->date);
//        //var_dump( date_create($currEvent->date, timezone_open("Europe/Sofia")));
//        $date1 = date_create($currEvent->date, timezone_open("Europe/Sofia"));
//        $date2 = date_create($today, timezone_open("Europe/Sofia"));
//        //var_dump($date1->getTimestamp());
//        $daysLeft = ($date1->getTimestamp()) - ($date2->getTimestamp());
//        //var_dump($daysLeft);
//
//        //$daysLeft = date_create($currEvent->date, timezone_open("Europe/Sofia")) - date_create($today, timezone_open("Europe/Sofia"));
//        $daysLeft /= 60*60*24;
//        $roundedDays = round($daysLeft);
//        if($roundedDays >= 0){
//            $roundedDays = '+' . $roundedDays;
//        }
//
//        //var_dump($roundedDays);
//        $name = preg_replace('/\'/', '', $currEvent->name);
//        //var_dump($name);
//        echo "<tr>";
//        echo "<td>$currEvent->date</td><td>$name</td><td>$currEvent->hash</td><td>$roundedDays days</td><td>$currEvent->ticketsLeft seats left</td>";
//        echo "</tr>\n";
//    }
//}
//echo "</table>";

echo '<table border="1" cellpadding="5"><tr><th>Date</th><th>Event name</th><th>Event hash</th><th>Days left</th><th>Seats left</th></tr>';
        echo "<tr>";
        echo "<td>-</td><td>-</td><td>-</td><td>-</td><td>-</td>";
        echo "</tr>";
echo "</table>";




