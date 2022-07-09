<?php


namespace Controllers;


use Models\ListCategoryModel;

class ListCategoryController extends ListCategoryModel implements rulesForControllers
{

    public function ActionView(){
        $category = new ListCategoryModel();
        $category = $category ->SelectAll();
        include_once __DIR__ . "/../Views/list-category.php";
    }
    public function deleteCategory($id){
        $id = htmlspecialchars($id);
        $result = new ListCategoryModel();
        $result->Delete($id);
    }
}