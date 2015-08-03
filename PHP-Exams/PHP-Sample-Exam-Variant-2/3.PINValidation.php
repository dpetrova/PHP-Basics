<?php
$name = $_GET['name'];
$gender = $_GET['gender'];
$pin = $_GET['pin'];
//var_dump($name);
//var_dump($gender);
//var_dump($pin);
$isValidData = validateDate($pin) && vaidateCheckSum($pin) && validateGender($pin) && validateName($name);

//print results
if ($isValidData) {
    $output = [
        "name" => $name,
        "gender" => $gender,
        "pin" => $pin
    ];
    echo json_encode($output);
} else {
    echo "<h2>Incorrect data</h2>";
}


//check valid date
function validateDate($pin){
    $year = substr($pin,0,2);
    $month = substr($pin,2,2);
    $day = substr($pin,4,2);

    if ($month > 40) {
        $month -= 40;
        $year = "20".$year;
    } elseif ($month > 20) {
        $year = "18".$year;
        $month -= 20;
    } else {
        $year = "19".$year;
    }

    $dateStr = $day."-".$month."-".$year;
    $date = date_create($dateStr, timezone_open("Europe/Sofia"));
    if (!$date) {
        return false;
    }
    return true;
}

function validateGender($pin){
    global $gender;
    $genderValue = (($gender == "male") ? 0 : 1);
    $genderInPin = substr($pin,8,1);
    if ($genderInPin % 2 != $genderValue) {
        return false;
    }
    return true;
}

function vaidateCheckSum($pin){
    $sumChk = substr($pin,9,1);
    $weights = [2,4,8,5,10,9,7,3,6];
    $sum = 0;
    for ($i = 0; $i < 9; $i++) {
        $sum += substr($pin,$i,1) * $weights[$i];
    }
    $sum = $sum % 11 % 10;
    if($sum != $sumChk) {
        return false;
    }
    return true;
}

function validateName($name){
    global $name;
    $namePattern = "/[A-Z][a-z]+\s[A-Z][a-z]+/";
    preg_match($namePattern, $name, $match);
    if(empty($match)){
        return false;
    }
    return true;
}