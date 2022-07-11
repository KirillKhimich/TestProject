<?php


namespace Controllers;


use Models\CreateMaterialModel;

class CreateMaterialController extends CreateMaterialModel implements RulesForControllers
{

    function ActionView()
    {
        $selectMaterial = new CreateMaterialModel();
        try {
            $viewAllMaterials = $selectMaterial->ViewAllMaterials();
        }catch (\Exception $e){
            die($e->getMessage());
        }
        try {
            $viewAllCategories = $selectMaterial->ViewAllCategories();
        }catch (\Exception $e){
            die($e->getMessage());
        }
        try {
            $viewAllTags = $selectMaterial->ViewAllTypes();
        }catch (\Exception $e){
            die($e->getMessage());
        }
        include __DIR__ . "/../Views/create-material.php";
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
            die($e->getMessage());
        }
    }
    public function UpdateMaterial($Material,$Type,$Category,$Name,$Author = "",$Description =""){
        $Material = htmlspecialchars($Material);
        $Type = htmlspecialchars($Type);
        $Category = htmlspecialchars($Category);
        $Name = htmlspecialchars($Name);
        $Author = htmlspecialchars($Author);
        $Description = htmlspecialchars($Description);
        $result = new CreateMaterialModel();
        try {
            $result->Update($Material,$Type,$Category,$Name,$Author,$Description);
        }catch (\Exception $e){
            die($e->getMessage());
        }
    }
}