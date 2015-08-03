<?php
function buildSidebar ($list, $title){
    $listArr = preg_split('/[,;]/', $list, -1, PREG_SPLIT_NO_EMPTY); //This flag tells preg_split to return only non-empty pieces.
    $sidebar = "<aside><header><h3>$title</h3></header><ul>";
    foreach ($listArr as $item) {
        $sidebar .= "<li><a href=\"#\">$item</a></li>";
    }
    $sidebar .= "</ul></aside></br>";
    return $sidebar;
}
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Sidebar Builder</title>
    <link href="style.css" rel="stylesheet" />
</head>
<body>
<form method="post">
    <label for="categories">Categories: </label>
    <input type="text" name="categories" id="categories" /></br>
    <label for="tags">Tags: </label>
    <input type="text" name="tags" id="tags"/></br>
    <label for="months">Months: </label>
    <input type="text" name="months" id="months" /></br>
    <input type="submit" value="Generate" />
</form></br>

<?php
if(isset($_POST['categories']) && !empty($_POST['categories'])) {
    $categories = $_POST['categories'];
    echo buildSidebar($categories, 'Categories');
}
if(isset($_POST['tags']) && !empty($_POST['tags'])) {
    $tags = $_POST['tags'];
    echo buildSidebar($tags, 'Tags');
}
if(isset($_POST['months']) && !empty($_POST['months'])) {
    $months = $_POST['months'];
    echo buildSidebar($months, 'Months');
}
?>

</body>
</html>
