<?php
$input = $_GET['luggage'];
$inputTypeLuggage = $_GET['typeLuggage'];
// var_dump($inputTypeLuggage);
$inputRoom = $_GET['room'];
$minWeight = (int)$_GET['minWeight'];
$maxWeight = (int)$_GET['maxWeight'];
$luggagePieces = preg_split('/C\|_\|/', $input, -1, PREG_SPLIT_NO_EMPTY);
//var_dump($luggagePieces);

$filteredData = [];
foreach ($luggagePieces as $line) {
    $items = preg_split('/;/', $line, -1, PREG_SPLIT_NO_EMPTY);
//    var_dump($items);
    $luggageType = trim($items[0]);
    $room = trim($items[1]);
    $name = trim($items[2]);
    $weightStr = trim($items[3]);
    $weightInt = intval($weightStr);
  //$weightInt = round(substr($weightStr, 0, strlen($weightStr) - 3), 0, PHP_ROUND_HALF_UP);

    //filter data and put them in associative array
    if ($room == $inputRoom && array_search($luggageType, $inputTypeLuggage) !== false) { // strict?
        if (!array_key_exists($luggageType, $filteredData)) {
            $filteredData[$luggageType] = [
                'room' => $room,
                'name' => array(),
                'weight' => 0
            ];
        }
        $filteredData[$luggageType]['name'][] = $name;
        $filteredData[$luggageType]['weight'] += $weightInt;
    }

    //another type of filter data and put them in associative array and sort
//    if (in_array($luggageType, $inputTypeLuggage)) {
//        if ($room == $inputRoom) {
//            if (!isset($filteredData[$luggageType])) {
//                $filteredData[$luggageType] = [];
//                $filteredData[$luggageType][$room] = [];
//                $filteredData[$luggageType][$room][$name] = $weightInt;
//            } else {
//                if (!isset($filteredData[$luggageType][$room])) {
//                    $filteredData[$luggageType][$room] = [];
//                    $filteredData[$luggageType][$room][$name] = $weightInt;
//                } else {
//                    if (!isset($filteredData[$luggageType][$room][$name])) {
//                        $filteredData[$luggageType][$room][$name] = $weightInt;
//                    } else {
//                        $filteredData[$luggageType][$room][$name] += $weightInt;
//                    }
//                }
//            }
//        }
//    }
}

//sort for the previous type of associative array
//ksort($filteredData);
//foreach ($filteredData as $key => $value) {
//    ksort($filteredData[$key]);
//    foreach ($filteredData[$key] as $secondKey => $secondValue) {
//        ksort($filteredData[$key][$secondKey]);
//    }
//}
//var_dump($filteredData);

//sort data by keys
ksort($filteredData);
foreach ($filteredData as $key => $value) {
    asort($filteredData[$key]['name']);
}
//var_dump($filteredData);

//print filtered sorted data
echo "<ul>";
foreach ($filteredData as $key => $value) {
    if ($value['weight'] >= $minWeight && $value['weight'] <= $maxWeight) {
        echo "<li><p>" . htmlspecialchars($key) . "</p>";
        echo "<ul><li><p>" . htmlspecialchars($value['room']) . "</p>";
        echo "<ul><li><p>" . htmlspecialchars(implode(", ", $value['name'])) . " - " . htmlspecialchars($value['weight']) . "kg</p></li></ul></li></ul></li>";
    }
}
echo "</ul>";




