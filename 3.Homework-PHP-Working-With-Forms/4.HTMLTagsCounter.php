<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Tags counter</title>
</head>
<body>
<form method="get">
    <label for="tags">Enter HTML tags:</label>
    <input type="text" name="tag" />
    <input type="submit" name="submit" value="Submit" />
</form>
</body>
</html>


<?php
$HTMLtags = array("a", "abbr", "address", "area", "article", "aside", "audio", "b", "base", "bdi", "bdo", "blockquote", "body", "br", "button", "canvas", "caption",
    "cite", "code", "col", "colgroup", "command", "datalist", "dd", "del", "details", "dfn", "div", "dl", "dt", "em", "embed", "fieldset", "figcaption", "figure",
    "footer", "form", "h1", "h2", "h3", "h4", "h5", "h6", "head", "header", "hgroup", "hr", "html", "i", "iframe", "img", "input", "ins", "kbd", "keygen", "label",
    "legend", "li", "link", "map", "mark", "menu", "meta", "meter", "nav", "noscript", "object", "ol", "optgroup", "option", "output", "p", "param", "pre", "progress",
    "q", "rp", "rt", "ruby", "s", "samp", "script", "section", "select", "small", "source", "span", "strong", "style", "sub", "summary", "sup", "table", "tbody", "td",
    "textarea", "tfoot", "th", "thead", "time", "title", "tr", "track", "u", "ul", "var", "video", "wbr");

if (isset($_GET['submit'])) {
    session_start();
    if (!isset($_SESSION['counter'])) {
        $_SESSION['counter'] = 0;
    }
    if (array_search($_GET['tag'], $HTMLtags)) {
        echo 'Valid HTML tag! <br />';
        $_SESSION['counter']++;
    } else {
        echo 'Invalid HTML tag! <br />';
    }
    echo 'Score: ' . $_SESSION['counter'];
}
