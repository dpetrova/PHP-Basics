<?php
$input = $_GET['board'];
//var_dump($input);
$lines = preg_split('/\//', $input);
//var_dump($lines);

//valid the chessboard
$isValid = isValidChessboard($lines);
if (!$isValid) {
    echo "<h1>Invalid chess board</h1>";
    return;
}

//fill data in array
$board = [];
foreach ($lines as $line) {
    $data = preg_split('/\-/', $line);
    $board[] = $data;
}
//var_dump($board);

//print results
echo "<table>";
foreach ($board as $row) {
    echo "<tr>";
    foreach ($row as $cell) {
        echo "<td>$cell</td>";
    }
    echo "</tr>";
}
echo "</table>";

//get results in format "[Piece full name]":[Count] as a JSON string
$results = [];
for ($i = 0; $i <count(($board)); $i++) {
    for ($j = 0; $j <count($board[$i]); $j++) {
        $symbol = getPiece($board[$i][$j]);
        if(isset($results[$symbol])){
            $results[$symbol]++;
        } else {
            $results[$symbol] = 1;
        }
    }
}
//remove info for empty cells
unset($results['empty']);

//sort by keys(figure)
ksort($results);

//print as JSON
echo json_encode($results);



function getPiece($symbol) {
    switch ($symbol) {
        case "R": return "Rook";
        case "H": return "Horseman";
        case "B": return "Bishop";
        case "K": return "King";
        case "Q": return "Queen";
        case "P": return "Pawn";
        default: return "empty";
    }
}


function isValidChessboard($lines) {
    // check if rows == 8
    if (count($lines) != 8) {
        return false;
    }
    foreach ($lines as $line) {
        // check if each row has length 15 ( all "-" + pieces)
        if (strlen($line) != 15) {
            return false;
        }
        // check if all letters are valid pieces (excluding "-" on odd positions)
        for ($i = 0; $i < strlen($line); $i += 2) {
            if (!isPieceOrEmpty($line[$i])) {
                return false;
            }
        }
    }
    return true;
}


function isPieceOrEmpty($letter) {
    return $letter == "R" || $letter == "B" || $letter == "H" ||
    $letter == "Q" || $letter == "K" || $letter == "P" || $letter == " ";
}