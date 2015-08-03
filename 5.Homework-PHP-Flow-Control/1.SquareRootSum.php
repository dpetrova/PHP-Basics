<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Square Root Sum</title>
    <link href="style.css" rel="stylesheet" />
</head>
<body>
    <table>
        <thead>
        <tr><th>Number</th><th>Square Root</th></tr>
        </thead>
        <?php
        $sum = 0;
        for ($i = 0; $i <=100; $i+=2) :
            $sqrt = sqrt($i);
            $sqrtRounded = round($sqrt, 2);
            $sum += $sqrtRounded;
        ?>
            <tr><td><?= $i ?></td><td><?= $sqrtRounded ?></td></tr>
        <?php endfor; ?>
        <tfoot>
        <tr><th>Total:</th><th><?= $sum ?></th></tr>
        </tfoot>
    </table>
</body>
</html>