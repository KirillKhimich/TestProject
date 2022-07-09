<?php
//Композер
require_once __DIR__ . '/vendor/autoload.php';

//Пути для Роутера
$viewMaterialId = $_GET['viewMaterialId'];
$routes = [
    "create-tag"=> "Controllers\CreateTagController",
    "create-category" => "Controllers\CreateCategoryController",
    "create-material" => "Controllers\CreateMaterialController",
    "list-category" => "Controllers\ListCategoryController",
    "list-materials" => "Controllers\ListMaterialController",
    "list-tag" => "Controllers\ListTagController",
    "view-material?viewMaterialId=$viewMaterialId" => "Controllers\ViewMaterialController",
];

//Удаление элементов
if (!empty($_POST['deleteId'])){
    $deleteType = explode("/",$_POST['deleteId']);
    if($deleteType[0] == "tag"){
        $delete = new Controllers\ListTagController();
        $delete->deleteTag($deleteType[1]);
    }elseif ($deleteType[0] == "category"){
        $delete = new Controllers\ListCategoryController();
        $delete->deleteCategory($deleteType[1]);
    }elseif ($deleteType[0] == "material"){
        $delete = new Controllers\ListMaterialController();
        $delete->deleteMaterial($deleteType[1]);
    }elseif ($deleteType[0] == "viewMaterialLinks"){
        $delete = new Controllers\ViewMaterialController();
        $delete->DeleteLinksMaterial($deleteType[1]);
    }elseif ($deleteType[0] == "viewMaterialTags"){
        $delete = new Controllers\ViewMaterialController();
        $delete->DeleteTagsMaterial($deleteType[1]);
    }
}
//Вызов метода для отображения нужного материала
if (!empty($_GET['viewMaterialId'])){
    $getMaterial= new \Controllers\ViewMaterialController();
    $getMaterial->GetView($_GET['viewMaterialId']);
}

//Вызов методов для добавления тегов и категорий
    if (!empty($_POST['createTag'])){
        $createTag = new \Controllers\CreateTagController();
        $createTag->CreateTag($_POST['createTag']);
}
    if (!empty($_POST['createCategory'])){
        $createCategory = new \Controllers\CreateCategoryController();
        $createCategory->CreateCategory($_POST['createCategory']);
}


//Виды
include_once "Views/header.php";
$router = new \Core\Router($routes);
include_once "Views/footer.php";

