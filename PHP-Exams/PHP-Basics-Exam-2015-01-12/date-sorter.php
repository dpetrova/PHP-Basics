<?php
$input = $_GET['list'];
$inputArr = preg_split('/\n/', $input, -1, PREG_SPLIT_NO_EMPTY);
$currDate = date_create($_GET['currDate'], timezone_open("Europe/Sofia"));

/** @var DateTime[] $dates */ //това е сложено над метод и с него казваме, че методът ще връща масив от дати
$validDates = [];
foreach ($inputArr as $item) {
    $itemDate = date_create($item, timezone_open("Europe/Sofia"));
    if($itemDate){
        $validDates[] = $itemDate;
    }
}
sort($validDates);
echo '<ul>';
foreach ($validDates as $date) {
    if($date < $currDate){
        echo '<li><em>'.date_format($date, 'd/m/Y').'</em></li>';
    } else {
        echo '<li>'.date_format($date, 'd/m/Y').'</li>';
    }
}
echo '</ul>';



