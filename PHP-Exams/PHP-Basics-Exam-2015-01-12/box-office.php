<?php
$input = $_GET['list'];
$minSeats = $_GET['minSeats'];
$maxSeats = $_GET['maxSeats'];
$genre = $_GET['filter'];
$order = $_GET['order'];

preg_match_all('/(.+)\s*\(([a-z]+)\)\s*-\s*([A-Za-z\s+,]+)\/\s*([0-9]+)/', $input, $matches, PREG_SET_ORDER);

//sort the array
if($order == 'ascending') {
    usort($matches, 'sortAscending');
} else {
    usort($matches, 'sortDescending');
}

function sortAscending($first, $second) {
    $compare = strcmp($first[1], $second[1]);
    if($compare == 0) {
        if($first[4] > $second[4]) {
            return 1;
        } else {
            return -1;
        }
    }
    return $compare;
}

function sortDescending($first, $second) {
    $compare = strcmp($first[1], $second[1]);
    if($compare == 0) {
        if($first[4] > $second[4]) {
            return 1;
        } else {
            return -1;
        }
    }
    $compare *= -1;
    return $compare;
}

//printing results
foreach ($matches as $screen) {
    $movie = trim($screen[1]);
    $movieGender = $screen[2];
    $star = trim($screen[3]);
    $starArr = preg_split('/,/', $star);
    $seats = trim($screen[4]);
    if($movieGender === $genre || $genre === 'all'){
        if($seats >= $minSeats && $seats <= $maxSeats){
            echo '<div class="screening">';
            echo '<h2>'. $movie .'</h2>';
            echo '<ul>';
            foreach ($starArr as $filmStar) {
                echo '<li class="star">'. trim($filmStar) .'</li>';
            }
            echo '</ul>';
            echo '<span class="seatsFilled">' . $seats .' seats filled</span>';
            echo '</div>';
        }
    }
}

