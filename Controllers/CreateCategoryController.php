<?php


namespace Controllers;
use \Models\CreateCategoryModel;

class CreateCategoryController extends CreateCategoryModel implements RulesForControllers
{

    function ActionView()
    {
        $allCategories = new CreateCategoryModel();
        try {
            $allCategories = $allCategories->SelectAll();
        }catch (\Exception $e){
            die($e->getMessage());
        }
        include __DIR__ . "/../Views/create-category.php";
    }
    public function AddCategory($name)
    {
            $name = htmlspecialchars($name);
            $result = new CreateCategoryModel();
            try {
                $result->Insert($name);
            }catch (\Exception $e){
                die($e->getMessage());
            }
    }
    public function UpdateCategory($id,$name)
    {
            $name = htmlspecialchars($name);
            $result = new CreateCategoryModel();
            try {
                $result->Update($id,$name);
            }catch (\Exception $e){
                die($e->getMessage());
            }

    }
}