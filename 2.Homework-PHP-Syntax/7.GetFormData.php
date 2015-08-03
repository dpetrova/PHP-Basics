<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Form data</title>
    <style>
        form {
            width: 200px;
            margin: 0 auto;
            border: 1px solid black;
        }
        input, span {
            display: block;
            margin: 5px;
        }
        input[type=radio]{
            display: inline-block;
        }
    </style>
</head>
<body>
    <form action="7.GetFormData.php" method="get">
        <input type="text" name="name" placeholder="Name...">
        <input type="text" name="age" placeholder="Age...">
        <span><input type="radio" name="gender" value="male" id="radioBt"/><label for="radioBt">Male</label></span>
        <span><input type="radio" name="gender" value="female" id="radioBt"/><label for="radioBt">Female</label></span>
        <input type="submit" value="Submit" />
        <?php
        // Basic validation - ensure all fields have been filled
        if (isset($_GET["name"]) && isset($_GET["age"]) && isset($_GET["gender"])) {
            echo "My name is " . htmlentities($_GET["name"]) . ". I am " . htmlentities($_GET["age"]) . " years old. I am " . $_GET["gender"] . ".";
        }
        ?>
    </form>
</body>
</html>

