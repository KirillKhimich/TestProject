<?php


namespace Controllers;


use Models\MaterialModel;

class ViewMaterialController extends MaterialModel implements RulesForControllers
{
    private static $viewMaterialId;

    public function ActionView()
    {
        $viewAllTags = $this->GetAllTags();
        $viewAllLinks = $this->ViewAllLinks(self::$viewMaterialId);
        $viewMaterialTags = $this->GetMaterialTags(self::$viewMaterialId);
        $viewMaterial = $this->GetView(self::$viewMaterialId);
        include __DIR__ . "/../Views/view-material.php";
    }

    public function GetView($id)
    {
         self::$viewMaterialId = $id;
         $result = new MaterialModel();
         $result = $result->ViewMaterial($id);
         return $result;

    }
    public function GetMaterialTags($id)
    {
        self::$viewMaterialId = $id;
        $result = new MaterialModel();
        $result = $result->ViewMaterialTags($id);
        return $result;

    }
    public function GetAllTags(){
        $result = new MaterialModel();
        $result = $result->ViewAllTags();
        return $result;
    }
    public function GetAllLinks($id){
        self::$viewMaterialId = $id;
        $result = new MaterialModel();
        $result = $result->ViewMaterialTags($id);
        return $result;
    }
}