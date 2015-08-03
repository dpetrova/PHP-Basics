<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Most Frequent Tag</title>
</head>
<body>
<form method="get">
    <label for="tags">Enter tags:</label>
    <input type="text" name="tags" />
    <input type="submit" value="Submit">
</form>
</body>
</html>

<?php
if(isset($_GET['tags'])){
    $tagsArr = explode(", ", $_GET['tags']); //split string into array using certain delimiter
    $frequencies = array_count_values($tagsArr); //returns an array using the values of array as keys and their frequency in array as values
    $maxFreq = max($frequencies); //returns the highest value in the array
    $mostFreqTag = array_search($maxFreq, $frequencies); //searches the array for a given value and returns the corresponding key if successful
    arsort($frequencies);//sort an array in reverse order and maintain index association
    foreach ($frequencies as $key => $value){
        echo "$key : $value times <br />";
    }
    echo "Most Frequent Tag is: $mostFreqTag";
}