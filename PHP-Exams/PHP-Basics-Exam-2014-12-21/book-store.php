<?php
$input = $_GET['text'];
$minPrice = $_GET['min-price'];
$maxPrice = $_GET['max-price'];
$sort = $_GET['sort'];
$order = $_GET['order'];
$inputArr = preg_split("/\r\n/", $input, -1, PREG_SPLIT_NO_EMPTY);
//var_dump($inputArr);

//create associative array of books
$results = [];
foreach ($inputArr as $book) {
    $bookArr = preg_split('/\s*\/\s*/', $book, -1, PREG_SPLIT_NO_EMPTY);
    //var_dump($bookArr);
    $author = trim($bookArr[0]);
    $name = trim($bookArr[1]);
    $genre = trim($bookArr[2]);
    $price = trim($bookArr[3]);
    $date = trim($bookArr[4]);
  //$date = date_create(trim($bookArr[4]), timezone_open("Europe/Sofia"));
    $info = trim($bookArr[5]);

    if($price >= $minPrice && $price <= $maxPrice){
        $results[] = [
            'author' => $author,
            'name' => $name,
            'genre' => $genre,
            'price' => $price,
            'publish-date' => $date,
            'info' => $info
        ];
    }
}
//var_dump($results);

//sort results
uasort($results, function($a, $b) {
    global $sort;
    global $order;
    if ($a[$sort] == $b[$sort]) {
        return $a['publish-date'] < $b['publish-date'] ? -1 : 1;
    }
    return ($a[$sort] < $b[$sort]) ^ ($order == 'ascending') ? 1 : -1;
});
//var_dump($results);

//print results
$print = "";
foreach ($results as $bookPrint) {
    $print .= "<div>";
    $print .= "<p>" . htmlspecialchars($bookPrint['name']) . "</p>";
    $print .= "<ul>";
    $print .= "<li>" . htmlspecialchars($bookPrint['author']) . "</li>";
    $print .= "<li>" . htmlspecialchars($bookPrint['genre']) . "</li>";
    $print .= "<li>" . $bookPrint['price'] . "</li>";
    $print .= "<li>" . htmlspecialchars($bookPrint['publish-date']) . "</li>";
    $print .= "<li>" . htmlspecialchars($bookPrint['info']) . "</li>";
    $print .= "</ul>";
    $print .= "</div>";
}
echo $print;


//на този вариант не му работи изпритването на хтмл-а и сортирането по publish-date

//$input = $_GET['text'];
//$minPrice = floatval($_GET['min-price']);
//$maxPrice = floatval($_GET['max-price']);
//$sort = $_GET['sort'];
//$order = $_GET['order'];
//preg_match_all('/(.+?)\/(.+?)\/(.+?)\/(.+?)\/(.+?)\/(.+)/', $input, $matches, PREG_SET_ORDER);
////var_dump($matches);
//
////sort matches by sort and order
//usort($matches, function ($a, $b) {
//    global $sort, $order;
//    if($sort == 'genre') {
//        if(strcmp($a[3], $b[3]) != 0) {
//            if($order == 'ascending')
//                return strcmp($a[3], $b[3]);
//            else if($order == 'descending')
//                return strcmp($b[3], $a[3]);
//        }
//        else
//            return date_create($a[5], timezone_open("Europe/Sofia")) > date_create($b[5], timezone_open("Europe/Sofia"));
//    }
//    else if($sort == 'author') {
//        if(strcmp($a[1], $b[1]) != 0) {
//            if($order == 'ascending')
//                return strcmp($a[1], $b[1]);
//            else if($order == 'descending')
//                return strcmp($b[1], $a[1]);
//        }
//        else
//            return date_create($a[5], timezone_open("Europe/Sofia")) > date_create($b[5], timezone_open("Europe/Sofia"));
//    }
//    else if($sort == 'publish date') {
//            if($order == 'ascending')
//                return date_create($a[5], timezone_open("Europe/Sofia")) > date_create($b[5], timezone_open("Europe/Sofia"));
//            else if($order == 'descending')
//                return date_create($b[5], timezone_open("Europe/Sofia")) < date_create($a[5], timezone_open("Europe/Sofia"));
//        }
//});
////var_dump($matches);
//
////print results
//foreach ($matches as $book) {
//    $bookName = $book[2];
//    $bookAuthor = $book[1];
//    $bookGenre = $book[3];
//    $bookPrice = $book[4];
//    $bookPublishDate = $book[5];
//    $bookInfo = $book[6];
//    $result = '';
//    if($bookPrice >= $minPrice && $bookPrice <= $maxPrice){
//        $result .= "<div><p>". htmlspecialchars($bookName). "</p><ul>";
//        $result .= "<li>" .htmlspecialchars($bookAuthor). "</li>";
//        $result .= "<li>" . htmlspecialchars($bookGenre) ."</li>";
//        $result .= "<li>" . htmlspecialchars($bookPrice) ."</li>";
//        $result .= "<li>" .htmlspecialchars($bookPublishDate) . "</li>";
//        $result .= "<li>" .htmlspecialchars($bookInfo) ."</li></ul></div>";
//    }
//    echo $result;
//}





