<?php


namespace Controllers;


use Models\ViewMaterialModel;

class ViewMaterialController extends ViewMaterialModel implements RulesForControllers
{
    private $viewMaterialId;

    public function ActionView()
    {
        $this->viewMaterialId = $_GET['viewMaterialId'];
        $viewMaterialObj = new ViewMaterialModel();
        try {
            $viewAllLinks = $viewMaterialObj->ViewAllLinks($this->viewMaterialId);
        }catch (\Exception $e){
            die($e->getMessage());
        }

        try {
            $viewAllTags = $viewMaterialObj->ViewAllTags();
        }catch (\Exception $e){
            die($e->getMessage());
        }

        try {
            $viewMaterialTags = $viewMaterialObj->ViewMaterialTags($this->viewMaterialId);
        }catch (\Exception $e){
            die($e->getMessage());
        }

        try {
            $viewMaterial = $viewMaterialObj->ViewMaterial($this->viewMaterialId);
        }catch (\Exception $e){
            die($e->getMessage());
        }

        include __DIR__ . "/../Views/view-material.php";
    }

    public function DeleteLinksMaterial($id){
        $id = htmlspecialchars($id);
        $result = new ViewMaterialModel();
        try {
            $result->DeleteMaterialLinks($id);
        }catch (\Exception $e){
            echo $e->getMessage();
        }
    }
    public function DeleteTagsMaterial($id){
        $id = htmlspecialchars($id);
        $result = new ViewMaterialModel();
        try {
            $result->DeleteMaterialTags($id);
        }catch (\Exception $e){
            echo $e->getMessage();
        }
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
    public function addMaterialLink($materialId,$linkTitle,$linkLink){
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
    public function UpdateMaterialLink($linkTitle,$linkLink,$linkId){
        $linkTitle = htmlspecialchars($linkTitle);
        $linkLink = htmlspecialchars($linkLink);
        $linkId = htmlspecialchars($linkId);
        $result = new ViewMaterialModel();
        try {
            if (!empty($linkTitle)){
                $result->UpdateMaterialLink($linkTitle,$linkLink,$linkId);
            }else{
                $result->UpdateMaterialLink($linkLink,$linkLink,$linkId);
            }
        }catch (\Exception $e){
            echo $e->getMessage();
        }

    }
}