<?php
function buildReplaceWord ($length){
    return str_repeat('*', $length);
}
?>


<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Text Filter</title>
    <link href="style.css" rel="stylesheet" />
</head>
<body>
<form method="post">
    <label for="text">Text: </label>
    <textarea name="text" id="text"></textarea></br>
    <label for="ban">Banlist: </label>
    <input type="text" name="ban" id="ban"/></br>
    <input type="submit" value="Submit" />
</form></br>

<?php
if(isset($_POST['text']) && !empty($_POST['text']) && isset($_POST['ban']) && !empty($_POST['ban'])) {
    $text = $_POST['text'];
    $banList = $_POST['ban'];
    $banListArr = preg_split('/[,\s+]+/', $banList, 0, PREG_SPLIT_NO_EMPTY); //This flag tells preg_split to return only non-empty pieces.
    mb_internal_encoding("utf-8");
    foreach ($banListArr as $banWord) {
        $length = mb_strlen($banWord);
        $text = str_replace($banWord, buildReplaceWord($length), $text);
    }
    echo "<p>$text</p>";
}
?>

</body>
</html>