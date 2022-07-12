<?php
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);
//Композер
require_once __DIR__ . '/vendor/autoload.php';
//Пути для Роутера
$viewMaterialId = $_GET['viewMaterialId'];
$viewTagId = $_GET['viewTagId'];
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
//Вызов методов для добавления тегов,категорий,материалов:

//Теги
    if (!empty($_POST['createTag'])){
        $createTag = new \Controllers\CreateTagController();
        $createTag->CreateTag($_POST['createTag']);
}

//Категории
    if (!empty($_POST['createCategory'])){
        $createCategory = new \Controllers\CreateCategoryController();
        $createCategory->CreateCategory($_POST['createCategory']);
}
//Материалы
    if (!empty($_POST['selectTypeId']) && !empty($_POST['selectCategoryId']) && !empty($_POST['inputMaterialName'])){
        $selectTypeId = $_POST['selectTypeId'];
        $selectCategoryId = $_POST['selectCategoryId'];
        $inputMaterialName = $_POST['inputMaterialName'];
        if (!empty($_POST['inputMaterialAuthor'])){
            $inputMaterialAuthor = $_POST['inputMaterialAuthor'];
        }else $inputMaterialAuthor = "";
        if (!empty($_POST['textareaMaterialDescription'])){
            $textareaMaterialDescription = $_POST['textareaMaterialDescription'];
        }else $textareaMaterialDescription = "";
        $createMaterial = new \Controllers\CreateMaterialController();
        $createMaterial->CreateMaterial($selectTypeId,$selectCategoryId,$inputMaterialName,$inputMaterialAuthor,$textareaMaterialDescription);
    }
//Теги в материал
    if (!empty($_POST['selectAddTag'])){
        $selectAddTag = $_POST['selectAddTag'];
        $checkGETId = $_POST['checkGETId'];
        $addTag = new \Controllers\ViewMaterialController();
        $addTag->addMaterialTag($selectAddTag,$checkGETId);
    }
//Ссылки в материал
    if (!empty($_POST['addLinksLink'])){
        $addLinksLink = $_POST['addLinksLink'];
        $addLinksTitle = $_POST['addLinksTitle'];
        $checkGETId = $_POST['checkGETId'];
        if (is_url($addLinksLink) !== NULL){
            $addLink = new \Controllers\ViewMaterialController();
            $addLink->addMaterialLink($checkGETId,$addLinksTitle,$addLinksLink);
        }
    }
//Вызов методов для обновления тегов,категорий,материалов:

//Категории
    if (!empty($_POST['selectUpdateCategory']) && !empty($_POST['inputUpdateCategory'])){
        $selectUpdateCategory = $_POST['selectUpdateCategory'];
        $inputUpdateCategory = $_POST['inputUpdateCategory'];
        $alterCategory = new \Controllers\CreateCategoryController();
        $alterCategory->UpdateCategory($selectUpdateCategory,$inputUpdateCategory);
    }
//Теги
    if (!empty($_POST['selectUpdateTag']) && !empty($_POST['inputUpdateTag'])){
        $selectUpdateTag = $_POST['selectUpdateTag'];
        $inputUpdateTag = $_POST['inputUpdateTag'];
        $alterCategory = new \Controllers\CreateTagController();
        $alterCategory->UpdateTag($selectUpdateTag,$inputUpdateTag);
    }
//Материалы
if (!empty($_POST['updateMaterialId']) && !empty($_POST['updateTypeId']) && !empty($_POST['updateCategoryId']) && !empty($_POST['inputUpdateMaterialName'])){
    $updateMaterialId = $_POST['updateMaterialId'];
    $updateTypeId = $_POST['updateTypeId'];
    $updateCategoryId = $_POST['updateCategoryId'];
    $inputUpdateMaterialName = $_POST['inputUpdateMaterialName'];
    if (!empty($_POST['inputUpdateMaterialAuthor'])){
        $inputMaterialAuthor = $_POST['inputUpdateMaterialAuthor'];
    }else $inputMaterialAuthor = "";
    if (!empty($_POST['textareaUpdateMaterialDescription'])){
        $textareaMaterialDescription = $_POST['textareaUpdateMaterialDescription'];
    }else $textareaMaterialDescription = "";
    $createMaterial = new \Controllers\CreateMaterialController();
    $createMaterial->UpdateMaterial($updateMaterialId,$updateTypeId,$updateCategoryId,$inputUpdateMaterialName,$inputMaterialAuthor,$textareaMaterialDescription);
}
if (!empty($_POST['updateLinksLink'])){
    $updateLinksTitle = $_POST['updateLinksTitle'];
    $updateLinksLink = $_POST['updateLinksLink'];
    $linkId = $_POST['linkId'];
    if (is_url($updateLinksLink) !== NULL){
        $updateLink = new \Controllers\ViewMaterialController();
        $updateLink->UpdateMaterialLink($updateLinksTitle,$updateLinksLink,$linkId);
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

