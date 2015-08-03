<?php
session_start();

$name=$_POST['name'];
$about=$_POST['about'];
$userid=$_POST['userid'];
require_once('ivanconn.php');
if ($_POST['myCheckbox']=='') {redirect('index.php?item=playlists');exit;}


foreach($_POST['myCheckbox'] as $key=>$value) {if ($selector=='') { $ids .="$value"; $selector='1'; }else{$ids .=",$value";}}

$sql= "INSERT INTO `Playlists`
(ID, NAME, ABOUT, USERID, CONTENT)
VALUES
(NULL, '$name', '$about', '$userid', '$ids')";

if (!mysql_query($sql,$link))
{
    die('Error: ' . mysql_error());
}

redirect('index.php?item=playlists');

?>