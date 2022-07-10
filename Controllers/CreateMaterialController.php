<?php


namespace Controllers;


use Models\CreateMaterialModel;

class CreateMaterialController extends CreateMaterialModel implements RulesForControllers
{

    function ActionView()
    {
        $viewAllCategories = $this->GetAllCategories();
        $viewAllTags = $this->ViewAllTypes();
        include __DIR__ . "/../Views/create-material.php";
    }
    public function GetAllTypes(){
        $result = new CreateMaterialModel();
        try {
            $result = $result->ViewAllTypes();
            return $result;
        }catch (\Exception $e){
            echo $e;
        }
    }

    public function GetAllCategories(){
        $result = new CreateMaterialModel();
        try {
            $result = $result->ViewAllCategories();
            return $result;
        }catch (\Exception $e){
            echo $e;
        }
    }
    public function CreateMaterial($Type,$Category,$Name,$Author = "",$Description =""){
        $Type = htmlspecialchars($Type);
        $Category = htmlspecialchars($Category);
        $Name = htmlspecialchars($Name);
        $Author = htmlspecialchars($Author);
        $Description = htmlspecialchars($Description);
        $result = new CreateMaterialModel();
        try {
            $result->Insert($Type,$Category,$Name,$Author,$Description);
        }catch (\Exception $e){
            echo $e;
        }
    }
}