<?php
//http://www.w3schools.com/php/php_form_url_email.asp
//http://www.w3schools.com/php/func_filter_var.asp
//http://www.w3schools.com/php/php_ref_filter.asp

$inputString = $_GET["text"];

//$pattern = '/(\w+),\s*(\w+)/';
//$pattern = '/([A-Z])([a-z]+)/';
//$pattern = '/(<a)\s[^>]+(>)[^<]+(<\/a>)/';
$pattern = '/<a\s([^>]+)>([^<]+)<\/a>/';
//$replaceStr = array(
//    0 => '[URL',
//    1 => ']',
//    2 => '[/URL]'
//);
$replaceStr = '[URL $1]$2[/URL]';
$options = array("options" => array("regexp" => $pattern));
$isMatch = filter_var($inputString, FILTER_VALIDATE_REGEXP, $options);
//preg_match_all($pattern, $inputString, $inputArray);
//preg_match($pattern, $inputString, $inputArray);
//$inputString = preg_replace($pattern, 'Da', $inputString);
$inputString = preg_replace($pattern, $replaceStr, $inputString);
$pattern2 = '/<li\s*([^>]*)>([^<]*)<\/li>/';
$replaceStr2 = '[LI$1]$2[/LI]';
$inputString = preg_replace($pattern2, $replaceStr2, $inputString);

var_dump($inputString);
var_dump($isMatch);
var_dump($inputArray);

foreach ($inputArray[0] as $inputWord)
{
    echo "<div>".$inputWord."</div>"."\n";
}