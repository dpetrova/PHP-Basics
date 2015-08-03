<?

$sHost = "localhost";
$sUser = "ivnikolo_123";
$sPass = "780330";
$sDb = "ivnikolo_bd";

if (!$link = mysql_connect($sHost,$sUser,$sPass)) {
    echo 'Could not connect to mysql';
    exit;
}
mysql_query('SET NAMES utf8');
if (!mysql_select_db($sDb, $link)) {
    echo 'Could not select database';
    exit;
}
//redirection function
function redirect($url) {
    if (!headers_sent()) {
        header('Location: http://' . $_SERVER['HTTP_HOST'] .
            dirname($_SERVER['PHP_SELF']) . '/' . $url);
    } else {
        die ('Could not redirect');
    }}
//end of redirection function

function listsongs($thelink) {
    $number=1;
    $sql    = "SELECT `ID`, `NAME`, `FILENAME`, `RATING`, `VOTED` FROM Songs";

    $result = mysql_query($sql, $thelink);
    if (!$result) {
        echo "DB Error, could not query the database\n";
        echo 'MySQL Error: ' . mysql_error();
        exit;}

    echo '<form role="form" method="post" action="makeplist.php">';
    while ($row = mysql_fetch_assoc($result) )
    {
        echo'<input type="checkbox" name="myCheckbox[]" value="'; echo $row[ID]; echo'"> Select </label> '; echo $number; echo " - "; echo $row[NAME]; echo " - realname: "; echo "<a href='songs/"; echo $row[FILENAME]; echo "'>iztegli</a><br/>";
        $number++;
    }
    echo '<input type="text" class="form-control" placeholder="Name" name="name">';
    echo '<input type="text" class="form-control" placeholder="About" name="about">';
    echo'<input type="hidden" name="userid" value="1">';
    echo "<button type='submit' class='btn btn-default' style='font-family: 'Source Sans Pro', sans-serif; font-weight: 100;'>Праи плейглисти</button>";
    echo '</form>';
}

function playlist($thelink) {
    $number=1;
    $sql    = "SELECT `ID`, `NAME`, `ABOUT`, `RATING`, `VOTED` FROM Playlists";


    $result = mysql_query($sql, $thelink);
    if (!$result) {
        echo "DB Error, could not query the database\n";
        echo 'MySQL Error: ' . mysql_error();
        exit;}


    while ($row = mysql_fetch_assoc($result) )
    {
        echo $number; echo " - "; echo $row[NAME]; echo " - относно: "; echo $row[ABOUT]; echo" - <a href='?item=playlist&id="; echo $row[ID]; echo"'>подробности</a><br/>";
        $number++;
    }
}

function myplaylist($id, $thelink) {
    $number=1;
    $sql    = "SELECT `ID`, `NAME`, `ABOUT`, `RATING`, `VOTED` FROM Playlists WHERE `USERID`='$id'";


    $result = mysql_query($sql, $thelink);
    if (!$result) {
        echo "DB Error, could not query the database\n";
        echo 'MySQL Error: ' . mysql_error();
        exit;}


    while ($row = mysql_fetch_assoc($result) )
    {
        echo $number; echo " - "; echo $row[NAME]; echo " - относно: "; echo $row[ABOUT]; echo" - <a href='?item=playlist&id="; echo $row[ID]; echo"'>подробности</a><br/>";
        $number++;
    }
}


function plist($id, $thelink) {

    $sql    = "SELECT `ID`, `NAME`, `CONTENT`, `ABOUT`, `RATING`, `VOTED` FROM Playlists WHERE `ID`='$id'";

    $result = mysql_query($sql, $thelink);
    if (!$result) {
        echo "DB Error, could not query the database\n";
        echo 'MySQL Error: ' . mysql_error();
        exit;}


    while ($row = mysql_fetch_assoc($result) )
    { $content=$row[CONTENT]; $contents=explode(",", $content);  $cns = implode(',', $contents);
        echo "<br/><br/>"; echo $row[NAME]; echo " - относно: "; echo $row[ABOUT]; echo"<br/><br/>";
        $number=1;
        $msql    = 'SELECT *
          FROM `Songs`
         WHERE `ID` IN (' . implode(',', array_map('intval', $contents)) . ')';

        $mresult = mysql_query($msql, $thelink);
        if (!$mresult) {
            echo "DB Error, could not query the database\n";
            echo 'MySQL Error: ' . mysql_error();
            exit;}


        while ($mrow = mysql_fetch_assoc($mresult) )
        {
            echo $number; echo " - "; echo $mrow[NAME]; echo " - realname: "; echo "<a href='songs/"; echo $mrow[FILENAME]; echo "'>iztegli</a><br/>";
            $number++;
        }

    }

    $sql    = "SELECT `HEAD`, `CONTENT`, `USERNAME` FROM Comments WHERE `PLAYLISTID`='$id'";

    $result = mysql_query($sql, $thelink);
    if (!$result) {
        echo "DB Error, could not query the database\n";
        echo 'MySQL Error: ' . mysql_error();
        exit;}


    while ($row = mysql_fetch_assoc($result) ) {
        echo '<div class="col-md-12" style="color:#F90; text-transform: uppercase; font-weight: 700; font-size: 22px;">';
        echo $row[USERNAME];
        echo '</div>';

        echo "<strong>"; echo $row[HEAD]; echo "</strong><br/>";
        echo $row[CONTENT];


    }
    echo '<form role="form" method="post" action="makecomment.php">';
    echo '<input type="text" class="form-control" placeholder="Head" name="head">';
    echo '<input type="text" class="form-control" placeholder="About" name="about">';
    echo'<input type="hidden" name="userid" value="Ivan">';
    echo'<input type="hidden" name="playid" value="$id">';

    echo '</form>';
}
