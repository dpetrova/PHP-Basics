<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Sentence Extractor</title>
    <link href="style.css" rel="stylesheet" />
</head>
<body>
<form method="post">
    <label for="text">Text: </label>
    <textarea name="text" id="text"></textarea></br>
    <label for="word">Word: </label>
    <input type="text" name="word" id="word"/></br>
    <input type="submit" value="Submit" />
</form></br>

<?php
if(isset($_POST['text']) && !empty($_POST['text']) && isset($_POST['word']) && !empty($_POST['word'])) {
    $text = $_POST['text'];
    $word = $_POST['word'];
    $sentencesArr = preg_split('/\s*(?<=[.?!])\s*/', $text, -1, PREG_SPLIT_NO_EMPTY); //uses positive lookbehind
    foreach ($sentencesArr as $sentence) {
        if (preg_match('/\b'.$word.'\b.*[.!?]/', $sentence)) { //it will match $word only if it is whole word and after it can be 0 or more any symbols and at the end must be either .!?
            echo "<p>$sentence</p>";
        }
    }
}
?>

</body>
</html>