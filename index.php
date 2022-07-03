<?php
require_once __DIR__ . '/vendor/autoload.php';
$id = $_GET['id'];
$routes = [
    "creat-tag"=> "Controllers\CreateTagController",
    "create-category" => "Controllers\CreateCategoryController",
    "create-material" => "Controllers\CreateMaterialController",
    "list-category" => "Controllers\CategoryController",
    "list-materials" => "Controllers\MaterialController",
    "list-tag" => "Controllers\TagController",
    "view-material?id=$id" => "Controllers\ViewMaterialController",
];

include_once "Views/header.php";
    if (!empty($_POST['CreateTag'])){
        $createTag = new \Controllers\CreateTagController();
        $createTag->CreateTag($_POST['CreateTag']);
}
    if (!empty($_POST['CreateCategory'])){
        $createCategory = new \Controllers\CreateCategoryController();
        $createCategory->CreateCategory($_POST['CreateCategory']);
    }
$router = new \Core\Router($routes);

include_once "Views/footer.php";

