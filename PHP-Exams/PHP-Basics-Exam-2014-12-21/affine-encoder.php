<?php
//decode JSON input string
$input = json_decode($_GET['jsonTable']);
//var_dump($input);
$matrix = $input[0];

//formulae of the affine cipher is E(x) = (k*x + s) % m
$x; //position of the letter (starting from 0) in the alphabet
$m = 26; //size of latin alphabet
$k = $input[1][0]; //first keys of the cipher
$s = $input[1][1]; //second keys of the cipher

//proceed affine cipher
$outputMatrix = [];
foreach ($matrix as $line) {
    $currLine = strtoupper($line);
    $cipherLine = '';
    for ($i = 0; $i <strlen($currLine); $i++) {
        if (ord($currLine[$i]) >= ord('A') && ord($currLine[$i]) <= ord('Z')) {
            $x = ord($currLine[$i]) - ord('A');
            $newPosition = ord('A') + ($k * $x + $s) % $m;
            $newChar = chr($newPosition);
            $cipherLine .= $newChar;
        } else {
            $cipherLine .= $currLine[$i]; //special characters are not ciphered
        }
    }
    $outputMatrix[] = $cipherLine;
}
//var_dump($outputMatrix);

//find max row length
$maxRowLength = 0;
foreach ($outputMatrix as $line) {
    $maxRowLength = max(strlen($line), $maxRowLength);
}
//var_dump($maxRowLength);

//print outputMatrix
echo "<table border='1' cellpadding='5'>";
foreach ($outputMatrix as $line) {
    if($maxRowLength > 0){
        echo "<tr>";
        for ($i = 0; $i <$maxRowLength; $i++) {
            if ($i < strlen($line)) {
                echo "<td style='background:#CCC'>" . htmlspecialchars($line[$i]) . "</td>";
            } else {
                echo "<td></td>";
            }
        }
        echo "</tr>";
    } else {
        echo "<tr><td></td></tr>";
    }
}
echo "</table>";

