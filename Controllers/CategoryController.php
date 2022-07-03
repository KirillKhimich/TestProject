<?php


namespace Controllers;


use Models\CategoryModel;

class CategoryController extends CategoryModel implements rulesForControllers
{

    public function ActionView(){
        $category = new CategoryModel();
        $category = $category ->SelectAll();
        include_once __DIR__ . "/../Views/list-category.php";
    }
}