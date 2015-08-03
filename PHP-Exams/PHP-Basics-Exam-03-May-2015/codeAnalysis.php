<?php
$input = $_GET['code'];
//var_dump($input);
$patternVariable = '/\$\w+/';
$patternForLoop = '/for\s*\(.+\)/';
$patternWhileLoop = '/while\s*\(.+\)/';
$patternForeachLoop = '/foreach\s*\(.+\)/';
$patternIfConditional = '/if\s*\(.+\)/';
$patternElseIfConditional = '/else if\s*\(.+\)/';

$matches = [];
preg_match_all($patternVariable, $input, $matchesVariables);
$matches[] = $matchesVariables;
//var_dump($matchesVariables);
preg_match_all($patternForLoop, $input, $matchesFor);
$matches[] = $matchesFor;
//var_dump($matchesFor);
preg_match_all($patternWhileLoop, $input, $matchesWhile);
$matches[] = $matchesWhile;
//var_dump($matchesWhile);
preg_match_all($patternForeachLoop, $input, $matchesForeach);
$matches[] = $matchesForeach;
//var_dump($matchesForeach);
preg_match_all($patternIfConditional, $input, $matchesIf);
$matches[] = $matchesIf;
//var_dump($matchesIf);
preg_match_all($patternElseIfConditional, $input, $matchesElseIf);
$matches[] = $matchesElseIf;
//var_dump($matchesElseIf);
//var_dump($matches);

$result = [];
$result['variables'] = array();
foreach ($matchesVariables[0] as $arr) {
    if (!array_key_exists($arr, $result['variables'])) {
        $result['variables'][$arr] = 0;
    }
    $result['variables'][$arr] += 1;
}
//var_dump($result);

$result['loops'] = array();
$result['loops']['while'] = array();
foreach ($matchesWhile[0] as $arr) {
    $result['loops']['while'][] = $arr;
}
//var_dump($result);

$result['loops']['for'] = array();
foreach ($matchesFor[0] as $arr) {
    $result['loops']['for'][] = $arr;
}
//var_dump($result);

$result['loops']['foreach'] = array();
foreach ($matchesForeach[0] as $arr) {
    $result['loops']['foreach'][] = $arr;
}
//var_dump($result);

$result['conditionals'] = array();
foreach ($matchesIf[0] as $arr) {
    $result['conditionals'][] = $arr;
}
//var_dump($result);

foreach ($matchesElseIf[0] as $arr) {
    $result['conditionals'][] = $arr;
}
//var_dump($result);
echo json_encode($result);