<?php


namespace Controllers;


class CreateCategoryController extends \Models\CategoryModel implements RulesForControllers
{
    public function CreateCategory($name)
    {
        $name = htmlspecialchars($name);
        $result = new \Models\CategoryModel();
        $result->Insert($name);
    }
    function ActionView()
    {
        include __DIR__ . "/../Views/create-category.php";
    }
}