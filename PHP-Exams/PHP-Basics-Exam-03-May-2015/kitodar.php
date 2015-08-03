<?php
$data = $_GET['data'];
//var_dump($data);
$dataArr = preg_split('/, /', $data, -1, PREG_SPLIT_NO_EMPTY);
//var_dump($dataArr);
$mines = [];
foreach ($dataArr as $line) {
    $line = strtolower($line);
    $lineArr = preg_split('/\s+/', $line, -1, PREG_SPLIT_NO_EMPTY);
    $mines[] = $lineArr;
}
//var_dump($mines);
$gold = 0;
$silver = 0;
$diamonds = 0;
foreach ($mines as $mine) {
    //var_dump($mine[0]);
    if($mine[0] == 'mine'){
        //var_dump($mine[2]);
        switch($mine[2]){
            case 'gold': $gold += $mine[3]; break;
            case 'silver': $silver += $mine[3]; break;
            case 'diamonds': $diamonds += $mine[3]; break;
        }
    }
}
//var_dump($gold);
//var_dump($silver);
//var_dump($diamonds);
echo "<p>*Gold: $gold</p>";
echo "<p>*Silver: $silver</p>";
echo "<p>*Diamonds: $diamonds</p>";





