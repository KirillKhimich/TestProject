<?php


namespace Controllers;


use Models\CreateMaterialModel;

class CreateMaterialController extends CreateMaterialModel implements RulesForControllers
{

    function ActionView()
    {
        $viewAllCategories = $this->GetAllCategories();
        $viewAllTags = $this->GetAllTags();
        include __DIR__ . "/../Views/create-material.php";
    }
    public function GetAllTags(){
        $result = new CreateMaterialModel();
        try {
            $result = $result->ViewAllTags();
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
}