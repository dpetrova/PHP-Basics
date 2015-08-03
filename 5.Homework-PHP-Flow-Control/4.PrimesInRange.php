<?php
function isPrime($num) {
if($num < 2) //negatives, 0, and 1 are not prime
return false;
if($num == 2) //2 is the only even number that is prime
return true;
if($num % 2 == 0) { //if the number is divisible by two, then it's not prime and it's no longer needed to check other even numbers
return false;
}
for($j = 3; $j <= ceil(sqrt($num)); $j = $j + 2) { //Checks the odd numbers
if($num % $j == 0)
return false;
}
return true;
}
?>


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Primes in Range</title>
    <link href="style.css" rel="stylesheet" />
</head>
<body>
<form method="post">
    Starting Index: <input type="text" name="start" />
    End: <input type="text" name="end" />
    <input type="submit" value="Submit" />
</form></br>

<?php
if(isset($_POST['start']) && isset($_POST['end']) && !empty($_POST['start']) && !empty($_POST['end'])):
$start = $_POST['start'];
$end = $_POST['end'];
for ($i = $start; $i <= $end; $i++) {
    $nums[] = isPrime($i) ? "<strong>$i</strong>" : $i;
}
echo implode(", ", $nums);
?>

</body>
</html>

<?php
endif;
?>
