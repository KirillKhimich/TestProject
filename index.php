<?php
$routes = [
    "view-material",
    "create-tag",
    "create-category",
    "create-material",
    "list-category",
    "list-materials",
    "list-tag"
];

require_once __DIR__ . '/vendor/autoload.php';

include_once "views/header.php";

$db = new \Classes\Db();

$router = new \Classes\Router($routes);

include_once "views/footer.php";

