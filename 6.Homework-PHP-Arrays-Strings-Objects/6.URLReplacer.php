<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>URL Replacer</title>
    <link href="style.css" rel="stylesheet" />
</head>
<body>
<form method="post">
    <label for="text">Text: </label>
    <textarea name="text" id="text"></textarea></br>
    <input type="submit" value="Submit" />
</form></br>

<?php
if(isset($_POST['text']) && !empty($_POST['text'])) {
    $text = $_POST['text'];
    $text = preg_replace('/<a\s([^>]+)>([^<]+)<\/a>/', '[URL $1]$2[/URL]', $text);
    echo htmlentities($text);
}
?>

</body>
</html>