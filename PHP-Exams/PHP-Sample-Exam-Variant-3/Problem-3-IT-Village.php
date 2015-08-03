<?php
$board = explode ('|', $_GET['board']);
$start = explode(' ', $_GET['beginning']);
$startRow = $start[0] -1;
$startCol = $start[1] -1;
$moves = explode(' ', $_GET['moves']);
$money = 50;
//var_dump($board);
//var_dump($startRow);
//var_dump($startCol);
//var_dump($moves);
$boardCells = [];
foreach ($board as $line) {
    $splitLine = preg_split('/\s+/', $line, -1, PREG_SPLIT_NO_EMPTY);
    $boardCells[] = $splitLine;
}
//var_dump($boardCells);

//set the valid board cell in moving order from initial position
$orderedBoardCells = array($boardCells[0][0], $boardCells[0][1], $boardCells[0][2], $boardCells[0][3], $boardCells[1][3],
    $boardCells[2][3], $boardCells[3][3], $boardCells[3][2], $boardCells[3][1], $boardCells[3][0], $boardCells[2][0], $boardCells[1][0]);
//var_dump($orderedBoardCells);

//count inns in board
$frequencies = array_count_values($orderedBoardCells);
$numOfInns = $frequencies['I'];

//set start $orderedBoardCells index
if ($startRow<=$startCol) {
    $index = $startRow + $startCol;
} else {
    $index = 12 - ($startRow + $startCol);
}
//var_dump($index);

//make moves
$boughtInns = 0;
for ($i = 0; $i <count($moves); $i++) {
    $index += $moves[$i];
    if($index > count($orderedBoardCells) - 1){
        $index = $index % count($orderedBoardCells);
    }
    $money += $boughtInns * 20;
    //var_dump($money);
    if($money <= 0){
        echo "<p>You lost! You ran out of money!<p>";
        return;
    }
    if($boughtInns >= $numOfInns){
        echo "<p>You won! You own the village now! You have $money coins!<p>";
        return;
    }
    //var_dump($index);
    $currCell = $orderedBoardCells[$index];
    switch($currCell){
        case 'P': $money -= 5; break;
        case 'I':
            if($money >= 100){
                $money -= 100;
                $boughtInns++;
            } else {
                $money -= 10;
            }
            break;
        case 'F': $money += 20; break;
        case 'S': $i += 2; break;
        case 'V': $money *= 10; break;
        case 'N': echo "<p>You won! Nakov's force was with you!<p>"; return;
    }
}
echo "<p>You lost! No more moves! You have $money coins!<p>";



