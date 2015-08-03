<?php
$input = json_decode($_GET['jsonTable']);
//var_dump($input);
$numberOfColumns = $input[0];

//match required milliseconds
$millisecondsArr = [];
for ($i = 1; $i <count($input[1]); $i++) {
    preg_match('/time=(\d+)/', $input[1][$i], $matches);
    $milisec = $matches[1];
    $millisecondsArr[] = $milisec;
}
//var_dump($millisecondsArr);

//reveal the secret message
$message = '';
foreach ($millisecondsArr as $item) {
    $symbol = chr($item);
    $message .= $symbol;
}
//var_dump($message);

//split into words
$words = preg_split('/\*/', $message, -1, PREG_SPLIT_NO_EMPTY);
//var_dump($words);

//print results as table
printTable($words, $numberOfColumns);

function printTable($words, $colSize) {
    echo "<table border='1' cellpadding='5'>";
    foreach($words as $key=>$value) {
        printWord($value, $colSize);
    }
    echo "</table>";
}

function printWord($word, $colSize) {
    $rows = ceil(strlen($word)/$colSize);
    $currentChar = 0;
    for($i = 0; $i < $rows; $i++) {
        echo "<tr>";
        for($j = 0; $j < $colSize; $j++){
            if($currentChar < strlen($word) && $word[$currentChar] != ' ') {
                echo "<td style='background:#CAF'>" . htmlspecialchars($word[$currentChar]);
            }else {
                echo "<td>";
            }
            echo "</td>";
            $currentChar++;
        }
        echo "</tr>";
    }
}


