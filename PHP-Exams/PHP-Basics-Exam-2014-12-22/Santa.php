<?php
$name =$_GET['childName'];
$name = preg_replace('/\s+/', '-', $name);
$present = $_GET['wantedPresent'];
$riddles = $_GET['riddles'];
$riddlesArr = preg_split('/;/', $riddles, -1, PREG_SPLIT_NO_EMPTY);
$numberOfRiddles = count($riddlesArr);
$riddleNumber = strlen($name) % $numberOfRiddles;
if($riddleNumber == 0) {
    $riddleIndex = $numberOfRiddles - 1;
} else {
    $riddleIndex = $riddleNumber - 1;
}
$pickedRiddle = $riddlesArr[$riddleIndex];
$template = '$giftOf' . htmlspecialchars($name) . " = $[wasChildGood] ? '" . htmlspecialchars($present) . "' : '" . htmlspecialchars($pickedRiddle) . "';";
echo $template;
