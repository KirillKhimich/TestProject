<?php

namespace Classes;


class DeleteClass
{
    public function __construct($deleteId)
    {
        if (is_string($deleteId)) {
            $deleteType = explode("/", $deleteId);
            if ($deleteType[0] == "tag") {
                $delete = new \Controllers\ListTagController();
                $delete->deleteTag($deleteType[1]);
            } elseif ($deleteType[0] == "category") {
                $delete = new \Controllers\ListCategoryController();
                $delete->deleteCategory($deleteType[1]);
            } elseif ($deleteType[0] == "material") {
                $delete = new \Controllers\ListMaterialController();
                $delete->deleteMaterial($deleteType[1]);
            } elseif ($deleteType[0] == "viewMaterialLinks") {
                $delete = new \Controllers\ViewMaterialController();
                $delete->DeleteLinksMaterial($deleteType[1]);
            } elseif ($deleteType[0] == "viewMaterialTags") {
                $delete = new \Controllers\ViewMaterialController();
                $delete->DeleteTagsMaterial($deleteType[1]);
            }
        } else throw new \Exception("Не удается удалить элемент");
    }
}