<?php


namespace Controllers;
use \Models\CategoryModel;

class CreateCategoryController extends CategoryModel implements RulesForControllers
{
    public function CreateCategory($name)
    {
        $name = htmlspecialchars($name);
        $result = new CategoryModel();
        $result->Insert($name);
    }
    function ActionView()
    {
        include __DIR__ . "/../Views/create-category.php";
    }
}