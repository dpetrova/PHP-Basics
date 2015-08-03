<?php
$matrix = json_decode($_GET['jsonTable']);
//var_dump($input);

list($minRow, $minCol, $maxRow, $maxCol) = findLargestRectangularArea($matrix); //това не е точно функция, а езикова конструкция. list() се използва, за да се присвоят стойности на променливи чрез една операция.

printTable($matrix, $minRow, $minCol, $maxRow, $maxCol);

function findLargestRectangularArea($matrix) {
    $maxArea = 0;
    $result = false;
    for ($minRow = 0; $minRow < count($matrix); $minRow++) {
        for ($maxRow = $minRow; $maxRow < count($matrix); $maxRow++) {
            for ($minCol = 0; $minCol < count($matrix[$minRow]); $minCol++) {
                for ($maxCol = $minCol; $maxCol < count($matrix[$minRow]); $maxCol++) {
                    if (isRectangle($matrix, $minRow, $minCol, $maxRow, $maxCol)) {
                        $area = ($maxRow - $minRow + 1) * ($maxCol - $minCol + 1);
                        if ($area > $maxArea) {
                            $maxArea = $area;
                            $result = [$minRow, $minCol, $maxRow, $maxCol];
                        }
                    }
                }
            }
        }
    }
    return $result;
}

//check if border is rectangle
function isRectangle($matrix, $minRow, $minCol, $maxRow, $maxCol) {
    $value = $matrix[$minRow][$minCol];
    for ($col = $minCol; $col <= $maxCol; $col++) {
        if ($matrix[$minRow][$col] != $value) {
            return false;
        }
        if ($matrix[$maxRow][$col] != $value) {
            return false;
        }
    }
    for ($row = $minRow+1; $row < $maxRow; $row++) {
        if ($matrix[$row][$minCol] != $value) {
            return false;
        }
        if ($matrix[$row][$maxCol] != $value) {
            return false;
        }
    }
    return true;
}


function printTable($matrix, $minRow, $minCol, $maxRow, $maxCol) {
    echo "<table border='1' cellpadding='5'>";
    for ($row = 0; $row < count($matrix); $row++) {
        echo "<tr>";
        for ($col = 0; $col < count($matrix[$row]); $col++) {
            $topBorder = ($row == $minRow) && ($col >= $minCol && $col <= $maxCol);
            $rightBorder = ($col == $maxCol) && ($row >= $minRow && $row <= $maxRow);
            $downBorder = ($row == $maxRow) && ($col >= $minCol && $col <= $maxCol);
            $leftBorder = ($col == $minCol) && ($row >= $minRow && $row <= $maxRow);
            if ($topBorder || $rightBorder || $downBorder || $leftBorder) {
                echo "<td style='background:#CCC'>";
            } else {
                echo "<td>";
            }
            echo htmlspecialchars($matrix[$row][$col]);
            echo "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}