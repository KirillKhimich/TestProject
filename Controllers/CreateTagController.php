<?php


namespace Controllers;





class CreateTagController extends \Models\TagModel implements RulesForControllers
{

    public function CreateTag($name)
    {
        $name = htmlspecialchars($name);
        $result = new \Models\TagModel();
        $result->Insert($name);
    }
     public function ActionView()
    {
        include __DIR__ . "/../Views/create-tag.php";
    }
}