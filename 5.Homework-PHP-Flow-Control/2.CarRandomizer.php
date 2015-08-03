<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Car Randomizer</title>
    <link href="style.css" rel="stylesheet" />
</head>
<body>
<form method="post">
    Enter cars: <input type="text" name="cars" />
    <input type="submit" value="Show result" />
</form></br>

<?php
if(isset($_POST['cars']) && !empty($_POST['cars'])):
    $cars = $_POST['cars'];
    //$carsArr = explode(' ,', $cars);
    //$carsArr = preg_split('/[ ,;]+/', $cars);
    $carsArr = preg_split('/[ ,;]/', $cars, -1, PREG_SPLIT_NO_EMPTY); //This flag tells preg_split to return only non-empty pieces.
?>

<table>
    <thead>
    <tr><th>Car</th><th>Color</th><th>Count</th></tr>
    </thead>
<?php
$colors = ['black', 'white', 'red', 'green', 'yellow', 'blue'];
foreach ($carsArr as $car):
    $randNum = rand(1,5);
    $randColor = array_rand($colors);
?>
        <tr><td><?= $car ?></td><td><?= $colors[$randColor] ?></td><td><?= $randNum ?></td></tr>

<?php
endforeach;
?>
</table>
</body>
</html>

<?php
endif;
?>
