<?php
date_default_timezone_set("Europe/Sofia");
$text = $_GET['text'];
$postsArr = preg_split("/\r?\n/", $text, -1, PREG_SPLIT_NO_EMPTY);
//var_dump($postsArr);

//remove any unnecessary whitespace
$allLines = trimAllLines($postsArr);

$posts = [];
foreach ($allLines as $line) {
    $data = trimAllLines(preg_split('/;/', $line, -1, PREG_SPLIT_NO_EMPTY));
    //var_dump($data);
    $dateAsTime = strtotime($data[1]);
    $posts[$dateAsTime] = buildPost($data);
}
//var_dump($posts);

//sorted posts by date (from most recent to oldest)
krsort($posts);
//var_dump($posts);

//print results
foreach ($posts as $post) {
    echo "<article>";
    echo "<header><span>" . htmlspecialchars($post->author). "</span><time>$post->date</time></header>";
    echo "<main><p>". htmlspecialchars($post->post). "</p></main>";
    echo '<footer><div class="likes">' . $post->likes . ' people like this</div>';
    // the div below is optional
    if (isset($post->comments)) {
        echo '<div class="comments">';
        foreach ($post->comments as $comment) {
            echo "<p>" . htmlspecialchars($comment). "</p>";
        }
        echo '</div>';
    }
    echo "</footer>";
    echo "</article>";
}


//function to trim lines
function trimAllLines($array) {
    $trimmedLines = [];
    foreach($array as $line) {
        if (trim($line)) {
            $trimmedLines[] = trim($line);
        }
    }
    return $trimmedLines;
}

function buildPost($array){
    $postInfo = new stdClass();
    $postInfo -> author = $array[0];
    $postInfo -> date = date("j F Y",  strtotime($array[1]));
    $postInfo -> post = $array[2];
    $postInfo -> likes = $array[3];
    if (isset($array[4])) {
        $postInfo -> comments = explode("/", $array[4]);
    }
    return $postInfo;
}