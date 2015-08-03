<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>String Modifier</title>
</head>
<body>
<form method="post">
    <input type="text" name="str" />
    <input type="radio" name="check" value="palindrome" id="palindrome"/><label for="palindrome">Check Palindrome</label>
    <input type="radio" name="check" value="reverse" id="reverse"/><label for="reverse">Reverse String</label>
    <input type="radio" name="check" value="split" id="split"/><label for="split">Split</label>
    <input type="radio" name="check" value="hash" id="hash"/><label for="hash">Hash String</label>
    <input type="radio" name="check" value="shuffle" id="shuffle"/><label for="shuffle">Shuffle String</label>
    <input type="submit" value="Submit" />
</form></br>

<?php
if(isset($_POST['str']) && isset($_POST['check']) && !empty($_POST['str'])):
$string = $_POST['str'];
$function = $_POST['check'];
$reverseStr = strrev($string);
preg_match_all('/[A-Za-zА-Яа-я]/', $string, $lettersOnly);
$hashString = crypt($string);
$charArr = str_split($string);

switch($function){
    case 'palindrome':
        echo $string;
        if($reverseStr === $string){
            echo ' is a palindrome!';
        } else{
            echo ' is not a palindrome!';
        }
        break;
    case 'reverse':
        echo $reverseStr;
        break;
    case 'split':
        echo implode(' ', $lettersOnly[0]);
        break;
    case 'hash':
        echo $hashString;
        break;
    case 'shuffle':
        shuffle($charArr);
        echo implode('', $charArr);
        break;
}
?>

</body>
</html>

<?php
endif;
?>