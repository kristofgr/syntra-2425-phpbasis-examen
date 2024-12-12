<?php
require('../db.inc.php');

$items = getGeoCaches((int)@$_GET['level_id']);
$count = count($items);

if ($count == 0) {
    http_response_code(404);
}

$res = [
    "info" => [
        "count" => $count
    ],
    "data" => $items
];


header('Content-Type: application/json; charset=utf-8');
print json_encode($res);
