<?php
$name = "Gosho";
$phone = "0882-321-423";
$age = "24";
$address = "Hadji Dimitar";

function displayTable($name, $phone, $age, $address)
{
    echo "<table><tbody>";
    echo "<tr><td>" ."Name" . "</td><td>" . $name . "</td></tr>";
    echo "<tr><td>" ."Phone number" . "</td><td>" . $phone . "</td></tr>";
    echo "<tr><td>" ."Age" . "</td><td>" . $age . "</td></tr>";
    echo "<tr><td>" ."Address" . "</td><td>" . $address . "</td></tr>";
    echo "</tbody></table>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Information Table</title>
    <style type="text/css">
        table {
            border-collapse: collapse;
        }
        table tr td {
            border: 1px solid black;
            padding: 5px;
        }
        td:first-child {
            background-color: orange;
            font-weight: bold;
            width: 110px;
        }
        td:last-child {
            text-align: right;
            width: 100px;
        }
    </style>
</head>
<body>
<?php displayTable($name, $phone, $age, $address) ?>
</body>
</html>