<?php


namespace Controllers;

use Models\TagMaterialModel;
class TagMaterialController extends TagMaterialModel implements RulesForControllers
{
    private $tagMaterialId;
    public function ActionView()
    {
        $this->tagMaterialId = $_GET['viewTagId'];
        $viewTagMaterial = new TagMaterialModel();
        try {
            $viewTagMaterials = $viewTagMaterial ->SelectAll($this->tagMaterialId);
        }catch (\Exception $e){
            die($e->getMessage());
        }
        try {
            $viewTagName = $viewTagMaterial ->getTagTitle($this->tagMaterialId);
        }catch (\Exception $e){
            die($e->getMessage());
        }
        include __DIR__ . "/../Views/tag-material.php";
    }
}