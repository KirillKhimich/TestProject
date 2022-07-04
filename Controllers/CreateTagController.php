<?php


namespace Controllers;



use \Models\TagModel;

class CreateTagController extends TagModel implements RulesForControllers
{

    public function CreateTag($name)
    {
        $name = htmlspecialchars($name);
        $result = new TagModel();
        $result->Insert($name);
    }
     public function ActionView()
    {
        include __DIR__ . "/../Views/create-tag.php";
    }
}