<?php


namespace Controllers;


use Models\ListCategoryModel;

class ListCategoryController extends ListCategoryModel implements rulesForControllers
{

    public function ActionView(){
        $category = new ListCategoryModel();
        try {
            $category = $category ->SelectAll();
        }catch (\Exception $e){
            die($e->getMessage());
        }
        include_once __DIR__ . "/../Views/list-category.php";
    }
    public function deleteCategory($id){
        $id = htmlspecialchars($id);
        $result = new ListCategoryModel();
        try {
            $result->Delete($id);
        }catch (\Exception $e){
            die($e->getMessage());
        }
    }

}