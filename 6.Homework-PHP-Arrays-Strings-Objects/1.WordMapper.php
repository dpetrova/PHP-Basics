<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Word Mapping</title>
    <link href="style.css" rel="stylesheet" />
</head>
<body>
<form method="post">
    <textarea name="str"></textarea>
    <input type="submit" value="Count words" />
</form></br>

<?php
if(isset($_POST['str']) && !empty($_POST['str'])):
$str = $_POST['str'];
$str = strtolower($str);
$strArr = preg_split('/\W+/', $str, 0, PREG_SPLIT_NO_EMPTY);
$counter = array_count_values($strArr);
arsort($counter);
?>
<table>
    <thead>
    <tr><th>Word</th><th>Count</th></tr>
    </thead>
<?php foreach ($counter as $word => $count) : ?>
    <tr>
        <td><?=$word?></td>
        <td><?=$count?></td>
    </tr>
<?php endforeach; ?>
</table>
<?php endif; ?>

</body>
</html>
