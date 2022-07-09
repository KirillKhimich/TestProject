<?php


namespace Controllers;


use Models\ViewMaterialModel;

class ViewMaterialController extends ViewMaterialModel implements RulesForControllers
{
    private static $viewMaterialId;
    public function ActionView()
    {
        $viewAllTags = $this->GetAllTags();
        $viewAllLinks = $this->GetAllLinks(self::$viewMaterialId);
        $viewMaterialTags = $this->GetMaterialTags(self::$viewMaterialId);
        $viewMaterial = $this->GetView(self::$viewMaterialId);
        include __DIR__ . "/../Views/view-material.php";
    }

    public function GetView($id)
    {
         self::$viewMaterialId = $id;
         $result = new ViewMaterialModel();
         $result = $result->ViewMaterial($id);
         return $result;

    }
    public function GetMaterialTags($id)
    {
        self::$viewMaterialId = $id;
        $result = new ViewMaterialModel();
        $result = $result->ViewMaterialTags($id);
        return $result;

    }
    public function GetAllTags(){
        $result = new ViewMaterialModel();
        $result = $result->ViewAllTags();
        return $result;
    }
    public function GetAllLinks($id){
        self::$viewMaterialId = $id;
        $result = new ViewMaterialModel();
        $result = $result->ViewAllLinks($id);
        return $result;
    }
    public function DeleteLinksMaterial($id){
        $id = htmlspecialchars($id);
        $result = new ViewMaterialModel();
        $result->DeleteMaterialLinks($id);
    }
    public function DeleteTagsMaterial($id){
        $id = htmlspecialchars($id);
        $result = new ViewMaterialModel();
        $result->DeleteMaterialTags($id);
    }
}