<?php
$inputMain = (array)json_decode($_GET['mainWord']);
$words = json_decode($_GET['words']);
//var_dump($inputMain);
//var_dump($words);
preg_match('/\d+/', key($inputMain), $matches);
$row = $matches[0];
$mainWord = $inputMain[key($inputMain)];

$maxLength = 0;
$maxWord = '';
$position = 0;
foreach ($words as $word) {
    for ($i = 0; $i <strlen($mainWord); $i++) {
        if(strlen($word) <= strlen($mainWord) && $word[$row - 1] == $mainWord[$i]){
            $wordLength = strlen($word);
            if($wordLength > $maxLength){
                $maxLength = $wordLength;
                $maxWord = $word;
                $position = $i;
            }
        }
    }
}
//var_dump($maxLength);
//var_dump($maxWord);
//var_dump($position);

//create board consists only horizontal word and empty rows
$board = [];
$emptyRow = array_fill(0, strlen($mainWord), '');
for ($i = 0; $i < strlen($mainWord); $i++) {
    if ($i == $row - 1) {
        $board[] = str_split($mainWord);
    } else {
        $board[] = $emptyRow;
    }
}
//fill vertical crossword
for ($i = 0; $i <count($board); $i++) {
    if($i >= strlen($maxWord)){
        break;
    }
    $board[$i][$position] = $maxWord[$i];
}
//var_dump($board);


//print table
echo "<table>";
foreach ($board as $line) {
    echo "<tr>";
    for ($i = 0; $i <count($line); $i++) {
        echo "<td>$line[$i]</td>";
    }
    echo "</tr>";
}
echo "</table>";

//make associative array with rest words
$restWords = array_diff($words,  array($maxWord)); // remove array item by value
$restWordObj = [];
foreach ($restWords as $word) {
    $sumASCIIcodes = 0;
    for ($i = 0; $i <strlen($word); $i++) {
        $sumASCIIcodes += ord($word[$i]);
    }
    $restWordObj[$word] = $sumASCIIcodes;
}
ksort($restWordObj);
echo json_encode($restWordObj);

