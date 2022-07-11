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

//Вызов метода для отображения нужного материала
if (!empty($_GET['viewMaterialId'])){
    $getMaterial= new \Controllers\ViewMaterialController();
    $getMaterial->GetView($_GET['viewMaterialId']);
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
        $selectTypeId = explode('/',$_POST['selectTypeId']);
        $selectCategoryId = explode('/',$_POST['selectCategoryId']);
        $inputMaterialName = $_POST['inputMaterialName'];
        if (!empty($_POST['inputMaterialAuthor'])){
            $inputMaterialAuthor = $_POST['inputMaterialAuthor'];
        }else $inputMaterialAuthor = "";
        if (!empty($_POST['textareaMaterialDescription'])){
            $textareaMaterialDescription = $_POST['textareaMaterialDescription'];
        }else $textareaMaterialDescription = "";
        $createMaterial = new \Controllers\CreateMaterialController();
        $createMaterial->CreateMaterial($selectTypeId[1],$selectCategoryId[1],$inputMaterialName,$inputMaterialAuthor,$textareaMaterialDescription);
    }
//Теги в материалы
    if (!empty($_POST['selectAddTag'])){
        $selectAddTag = $_POST['selectAddTag'];
        $addTag = new \Controllers\ViewMaterialController();
        $addTag->addMaterialTag($selectAddTag[1],$selectAddTag[0]);
    }
    if (!empty($_POST['addLinksLink'])){
        $addLinksLink = $_POST['addLinksLink'];
        $addLinksTitle = $_POST['addLinksTitle'];
        $checkGETId = $_POST['checkGETId'];
        if (is_url($addLinksLink) !== NULL){
            $addLink = new \Controllers\ViewMaterialController();
            $addLink->link($checkGETId,$addLinksTitle,$addLinksLink);
        }
    }
//Виды
include_once "Views/header.php";
$router = new \Core\Router($routes);
include_once "Views/footer.php";

