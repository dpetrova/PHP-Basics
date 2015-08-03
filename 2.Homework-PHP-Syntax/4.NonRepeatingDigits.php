<?php
function nonRepeatingDigits($number)
{
    //$isFound = false;
    $result = array();
    for ($i = 102; $i <= $number; $i++) {
        if ($i > 999) {
            break;
        }
        $numAsString = (string)$i;
        $firstDigit = $numAsString[0];
        $secondDigit = $numAsString[1];
        $thirdDigit = $numAsString[2];
        if ($firstDigit != $secondDigit && $secondDigit != $thirdDigit && $firstDigit != $thirdDigit) {
            //$isFound = true;
            $result[]=$i; //array_push($result, $i);
        }
    }
    echo ($result ? implode(', ', $result) : "no") . "\n";

//    if (!$isFound) {
//        echo 'no';
//    } else {
//        echo implode(', ', $result); //Join array elements with a glue string.
//    }
}

nonRepeatingDigits(1234);
nonRepeatingDigits(15);
nonRepeatingDigits(247);
