<?php
$input = $_GET['text'];
$artist = $_GET['artist'];
$property = $_GET['property'];
$order = $_GET['order'];

//get the required information
$songs = preg_split('/\n/', $input, -1, PREG_SPLIT_NO_EMPTY);
//var_dump($songs);

//fill an object with data
$songList = [];
foreach ($songs as $song) {
    $line = preg_split('/\s*\|\s*/', $song, -1, PREG_SPLIT_NO_EMPTY);
    //var_dump($line);
    $currentSong = new stdClass();
    $currentSong -> name = trim($line[0]);
    $currentSong -> genre = trim($line[1]);
    $artistsArr = preg_split('/, /', trim($line[2]), -1, PREG_SPLIT_NO_EMPTY);
    sort($artistsArr);
    $currentSong -> artists = $artistsArr;
    $currentSong -> downloads = intval(trim($line[3]));
    $currentSong -> rating = floatval(trim($line[4]));

    //filters the songs according to the artist selected
    if (in_array($artist, $artistsArr)) {
        $songList[] = $currentSong;
    }
}
//var_dump($songList);

//sort first by given property and secondary sorting by name
usort($songList, function($s1, $s2) use ($order, $property) {
    if ($s1->$property == $s2->$property) {
        return strcmp($s1->name, $s2->name);
    }
    return ($order == "ascending" ^ $s1->$property < $s2->$property) ? 1 : -1;
});

//print results as table
echo "<table>\n<tr><th>Name</th><th>Genre</th><th>Artists</th><th>Downloads</th><th>Rating</th></tr>\n";
foreach ($songList as $song) {
    echo "<tr>";
    $artists = htmlspecialchars(implode(", ", $song->artists));
    $song->name = htmlspecialchars($song->name);
    $song->genre = htmlspecialchars($song->genre);
    echo "<td>$song->name</td><td>$song->genre</td><td>$artists</td><td>$song->downloads</td><td>$song->rating</td>";
    echo "</tr>\n";
}
echo "</table>";