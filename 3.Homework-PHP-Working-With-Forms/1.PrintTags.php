<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Enter Tags</title>
</head>
<body>
    <form method="get">
        <label for="tags">Enter tags:</label>
        <input type="text" name="tags" />
        <input type="submit" value="Submit" />
    </form>
</body>
</html>

<?php
if(isset($_GET['tags'])){
    $tagsArr = explode(", ", $_GET['tags']);
    foreach ($tagsArr as $key => $value) {
        echo $key . " : " . htmlentities($value) . "<br />";
    }
}
