<?php
require_once __DIR__ . '/vendor/autoload.php';

$routes = [
    "view-material" => "",
    "create-tag"=> "",
    "create-category" => "",
    "create-material" => "",
    "list-category" => "Controllers\CategoryController",
    "list-materials" => "Controllers\MaterialController",
    "list-tag" => "Controllers\TagController"
];
include_once "Views/header.php";

$router = new \Core\Router($routes);

include_once "Views/footer.php";

