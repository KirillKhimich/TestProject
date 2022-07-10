<?php


namespace Controllers;


use Models\ViewMaterialModel;

class ViewMaterialController extends ViewMaterialModel implements RulesForControllers
{
    private $viewMaterialId;
    public function ActionView()
    {
        $this->viewMaterialId = $_GET['viewMaterialId'];
        $viewAllTags = $this->GetAllTags();
        $viewAllLinks = $this->GetAllLinks();
        $viewMaterialTags = $this->GetMaterialTags();
        $viewMaterial = $this->GetView();
        include __DIR__ . "/../Views/view-material.php";
    }
    public function GetView()
    {
         $result = new ViewMaterialModel();
         $result = $result->ViewMaterial($this->viewMaterialId);
         return $result;

    }
    public function GetMaterialTags()
    {
        $result = new ViewMaterialModel();
        $result = $result->ViewMaterialTags($this->viewMaterialId);
        return $result;

    }
    public function GetAllTags(){
        $result = new ViewMaterialModel();
        $result = $result->ViewAllTags();
        return $result;
    }
    public function GetAllLinks(){
        $result = new ViewMaterialModel();
        $result = $result->ViewAllLinks($this->viewMaterialId);
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
    public function addMaterialTag($tagId,$materialId){
        $tagId = htmlspecialchars($tagId);
        $materialId = htmlspecialchars($materialId);
        $result = new ViewMaterialModel();
        try {
            $result->InsertMaterialTag($tagId,$materialId);
        }catch (\Exception $e){
            echo $e->getMessage();
        }

    }
    public function link($materialId,$linkTitle,$linkLink){
        $materialId = htmlspecialchars($materialId);
        $linkTitle = htmlspecialchars($linkTitle);
        $linkLink = htmlspecialchars($linkLink);
        $result = new ViewMaterialModel();
        try {
            if (!empty($linkTitle)){
                $result->InsertMaterialLink($materialId,$linkTitle,$linkLink);
            }else{
                $result->InsertMaterialLink($materialId,$linkLink,$linkLink);
            }
        }catch (\Exception $e){
            echo $e->getMessage();
        }

}
}