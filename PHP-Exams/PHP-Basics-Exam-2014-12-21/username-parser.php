<?php
//proceed data
$inputList = $_GET['list'];
$minLength = $_GET['length'];
$inputListArr = preg_split('/\n/', $inputList, 0, PREG_SPLIT_NO_EMPTY);
$usersArr = [];
foreach ($inputListArr as $line) {
    $line = trim($line);
    if ($line != "") {
        $usersArr[] = $line;
    }
}
$showUsername = isset($_GET['show']);

//print data
echo '<ul>';
foreach ($usersArr as $user) {
    if( !empty($user) && strlen($user) >= $minLength){
        echo "<li>" . htmlspecialchars($user) . "</li>";
    } else {
        if($showUsername){
            echo '<li style="color: red;">' . htmlspecialchars($user) . "</li>";
        }
    }
}
echo '</ul>';


