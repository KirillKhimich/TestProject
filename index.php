<?php
//Композер
require_once __DIR__ . '/vendor/autoload.php';
//Пути для Роутера
if (is_string($_GET['viewMaterialId']))$viewMaterialId = $_GET['viewMaterialId'];
if (is_string($_GET['viewTagId']))$viewTagId = $_GET['viewTagId'];
$routes = [
    "" =>"Controllers\ListMaterialController",
    "create-tag"=> "Controllers\CreateTagController",
    "create-category" => "Controllers\CreateCategoryController",
    "create-material" => "Controllers\CreateMaterialController",
    "list-category" => "Controllers\ListCategoryController",
    "list-materials" => "Controllers\ListMaterialController",
    "list-tag" => "Controllers\ListTagController",
    "view-material?viewMaterialId=$viewMaterialId" => "Controllers\ViewMaterialController",
    "tag-material?viewTagId=$viewTagId" =>"Controllers\TagMaterialController",
];

//Функция для проверки строки на URL
function is_url($url) {
    return preg_match('|^http(s)?://[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(/.*)?$|i', $url);
}
//Удаление элементов
if (!empty($_POST['deleteId'])){
    try {
        $delete = new \Classes\DeleteClass($_POST['deleteId']);
    }catch (\Exception $e){
        echo $e->getMessage();
    }
}
//Вызов методов для добавления тегов,категорий,материалов:
$addElement = new \Classes\AddClass();
//Теги
    if (!empty($_POST['createTag'])){
        try {
            $addElement->AddTag($_POST['createTag']);
        }catch (\Exception $e){
            echo $e->getMessage();
        }
    }

//Категории
    if (!empty($_POST['createCategory'])){
        try {
            $addElement->AddCategory($_POST['createCategory']);
        }catch (\Exception $e){
            echo $e->getMessage();
        }
}
//Материалы
    if (!empty($_POST['selectTypeId']) && !empty($_POST['selectCategoryId']) && !empty($_POST['inputMaterialName'])){
        try {
            $addElement->AddMaterial($_POST['selectTypeId'],$_POST['selectCategoryId'],$_POST['inputMaterialName'],$_POST['inputMaterialAuthor'],$_POST['textareaMaterialDescription']);
        }catch (\Exception $e){
            echo $e->getMessage();
        }
    }
//Теги в материал
    if (!empty($_POST['selectAddTag']) && !empty($_POST['checkGETId'])){
        try {
            $addElement->AddMaterialTag($_POST['selectAddTag'],$_POST['checkGETId']);
        }catch (\Exception $e){
            echo $e->getMessage();
        }
    }
//Ссылки в материал
    if (!empty($_POST['addLinksLink'])){
        try {
            $addElement->AddMaterialLink($_POST['checkGETId'],$_POST['addLinksTitle'],$_POST['addLinksLink']);
        }catch (\Exception $e){
            echo $e->getMessage();
        }
    }
//Вызов методов для обновления тегов,категорий,материалов:
$updateElement = new \Classes\UpdateClass();
//Категории
    if (!empty($_POST['selectUpdateCategory']) && !empty($_POST['inputUpdateCategory'])){
        try {
            $updateElement->UpdateCategory($_POST['selectUpdateCategory'],$_POST['inputUpdateCategory']);
        }catch (\Exception $e){
            echo $e->getMessage();
        }
    }
//Теги
    if (!empty($_POST['selectUpdateTag']) && !empty($_POST['inputUpdateTag'])){
        try {
            $updateElement->UpdateTag($_POST['selectUpdateTag'],$_POST['inputUpdateTag']);
        }catch (\Exception $e){
            echo $e->getMessage();
        }
    }
//Материалы
if (!empty($_POST['updateMaterialId']) && !empty($_POST['updateTypeId']) && !empty($_POST['updateCategoryId']) && !empty($_POST['inputUpdateMaterialName'])){
    try {
        $updateElement->UpdateMaterial($_POST['updateMaterialId'],$_POST['updateTypeId'],$_POST['updateCategoryId'],$_POST['inputUpdateMaterialName'],$_POST['inputUpdateMaterialAuthor'],$_POST['textareaUpdateMaterialDescription']);
    }catch (\Exception $e){
        echo $e->getMessage();
    }
}
//Ссылки
if (!empty($_POST['updateLinksLink']) && !empty($_POST['linkId'])){
    try {
        $updateElement->UpdateMaterialLink($_POST['updateLinksTitle'],$_POST['updateLinksLink'],$_POST['linkId']);
    }catch (\Exception $e){
        echo $e->getMessage();
    }
}

//Виды
include_once "Views/header.php";
try {
    $router = new \Core\Router($routes);
}catch (\Exception $e){
    die($e ->getMessage());
}
include_once "Views/footer.php";

