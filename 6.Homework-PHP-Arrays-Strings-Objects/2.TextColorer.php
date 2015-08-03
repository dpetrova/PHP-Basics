<?php
header("Content-Type: text/html; charset=utf-8");
mb_internal_encoding("utf-8");
function uniord($char)
{
    $h = ord($char{0});
    if ($h <= 0x7F) {
        return $h;
    } else if ($h < 0xC2) {
        return false;
    } else if ($h <= 0xDF) {
        return ($h & 0x1F) << 6 | (ord($char{1}) & 0x3F);
    } else if ($h <= 0xEF) {
        return ($h & 0x0F) << 12 | (ord($char{1}) & 0x3F) << 6
        | (ord($char{2}) & 0x3F);
    } else if ($h <= 0xF4) {
        return ($h & 0x0F) << 18 | (ord($char{1}) & 0x3F) << 12
        | (ord($char{2}) & 0x3F) << 6
        | (ord($char{3}) & 0x3F);
    } else {
        return false;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Text Colorer</title>
</head>
<link href="style.css" rel="stylesheet" />
<body>
<form method="post">
    <textarea name="str"></textarea><br/>
    <input type="submit" value="Color text"/>
</form><br/>

<?php
if (isset($_POST["str"]) && !empty($_POST["str"]) ) {
    $str = $_POST["str"];
        for ($i = 0; $i < mb_strlen($str); $i++) {
            $character = mb_substr($str, $i, 1);
            if(uniord($character) % 2 == 0){
                $color = 'red';
            } else {
                $color = 'blue';
            }
            echo "<span style='color:  $color'> $character </span>";
        }
}
?>
</body>
</html>