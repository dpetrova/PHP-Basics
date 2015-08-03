<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Annual Expenses</title>
    <link href="style.css" rel="stylesheet" />
</head>
<body>
<form method="post">
    Enter number of years: <input type="text" name="years" />
    <input type="submit" value="Show costs" />
</form></br>

<?php
if(isset($_POST['years']) && !empty($_POST['years'])):
$numberOfYears = $_POST['years'];
$currYear = date('Y');
?>

<table>
    <thead>
    <tr>
        <th>Year</th>
        <?php
        for ($i = 1; $i <= 12; $i++):
            $dateObj   = DateTime::createFromFormat('!m', $i);
            $month = $dateObj->format('F');
        ?>
           <th><?= $month ?></th>
        <?php
        endfor;
        ?>
        <th>Total:</th>
    </tr>
    </thead>
    <?php
    for ($j = 0; $j < $numberOfYears; $j++):
        $year = $currYear - $j;
    ?>
    <tr><td><?= $year ?></td>
        <?php
        $total = 0;
            for ($k = 1; $k <= 12; $k++):
                $randNum = rand(0,999);
                $total += $randNum;
            ?>
            <td><?= $randNum ?></td>
            <?php
            endfor;
            ?>
    <td><?= $total ?></td></tr>
    <?php
    endfor;
    ?>
</table>
</body>
</html>

<?php
endif;
?>
