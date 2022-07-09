<?php


namespace Controllers;



use Models\CreateTagModel;

class CreateTagController extends CreateTagModel implements RulesForControllers
{

     public function ActionView()
    {
        include __DIR__ . "/../Views/create-tag.php";
    }
    public function CreateTag($name)
    {
        $name = htmlspecialchars($name);
        $result = new CreateTagModel();
        try {
            $result->Insert($name);
        }catch (\Exception $e){
            echo "<h4>" .  $e->getMessage() ."</h4>";
        }
    }
}