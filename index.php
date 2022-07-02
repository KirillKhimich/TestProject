<?php
require_once __DIR__ . '/vendor/autoload.php';
include_once "views/header.php";
$routes = new \Classes\Router();
$db = new \Classes\Db();

include_once "views/footer.php";

