<?php
$text = $_GET['text'];
$lineLength = $_GET['lineLength'];

// Fill the characters in the matrix
$textLength = strlen($text);
$cols = $lineLength;
$rows = ceil($textLength/$cols);
$matrix = [];
$currentChar = 0;
for($i = 0; $i < $rows; $i++) {
    $matrix[] = [];
    for($j = 0; $j < $cols; $j++){
        if($currentChar < $textLength) {
            $matrix[$i][$j] = $text[$currentChar];
        } else {
            $matrix[$i][$j] = " ";
        }
        $currentChar++;
    }
}
//echo json_encode($matrix);


// Fall down
$lastRow = count($matrix) - 1;
for ($p = $lastRow; $p > 0; $p--) {
    for ($col = 0; $col < $lineLength; $col++) {
        for ($row = $lastRow; $row > 0; $row--) {
            if ($matrix[$row][$col] == " ") {
                $matrix[$row][$col] = $matrix[$row - 1][$col];
                $matrix[$row - 1][$col] = " ";
            }
        }
    }
}
//echo json_encode($matrix);

//print results
echo "<table>";
for($i = 0; $i < count($matrix); $i++) {
    echo "<tr>";
    for($j = 0; $j < count($matrix[$i]); $j++){
        echo "<td>" . htmlspecialchars($matrix[$i][$j]) . "</td>";
    }
    echo "</tr>";
}
echo "</table>";