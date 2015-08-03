<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Sum of Digits</title>
    <link href="style.css" rel="stylesheet" />
</head>
<body>
<form method="post">
    Input String: <input type="text" name="str" />
    <input type="submit" value="Submit" />
</form></br>

<?php
if(isset($_POST['str']) && !empty($_POST['str'])):
$inputStr = $_POST['str'];
//$carsArr = explode(' ,', $cars);
//$carsArr = preg_split('/[ ,;]+/', $cars);
$arr = preg_split('/[ ,;]/', $inputStr, 0, PREG_SPLIT_NO_EMPTY); //This flag tells preg_split to return only non-empty pieces.
?>

<table>
    <?php
    foreach ($arr as $item):
        echo '<tr><td>'. $item . '</td>';
        if(ctype_digit($item)){
//            $sumOfDigits = 0;
//            while ($item > 0){
//                $digit = $item % 10;
//                $sumOfDigits += $digit;
//                $item /= 10;
//            }
            $digits = str_split($item);
            $sumOfDigits = array_sum($digits);
        echo '<td>' . $sumOfDigits . '</td>';
        } else {
            echo '</td><td>I cannot sum that</td></tr>';
        }
    endforeach;
    ?>
</table>
</body>
</html>

<?php
endif;
?>
