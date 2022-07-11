<?php


namespace Controllers;



use Models\CreateTagModel;

class CreateTagController extends CreateTagModel implements RulesForControllers
{

     public function ActionView()
    {
        $allTags = new CreateTagModel();
        try {
            $allTags = $allTags->SelectAll();
        }catch (\Exception $e){
            die($e->getMessage());
        }
        include __DIR__ . "/../Views/create-tag.php";
    }
    public function CreateTag($name)
    {
        $name = htmlspecialchars($name);
        $result = new CreateTagModel();
        try {
            $result->Insert($name);
        }catch (\Exception $e){
            die($e->getMessage());
        }
    }
    public function UpdateTag($id,$name){
         $name = htmlspecialchars($name);
         $result = new CreateTagModel();
         try {
             $result->Update($id,$name);
         }catch (\Exception $e){
             die($e->getMessage());
         }
    }
}