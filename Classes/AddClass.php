<?php


namespace Classes;


class AddClass
{
    public function AddTag($createTag){
        if (is_string($createTag)) {
            $addTag = new \Controllers\CreateTagController();
            $addTag->AddTag($createTag);
        }else throw new \Exception("Не удается создать тег");
    }

    public function AddCategory($createCategory){
        if (is_string($createCategory)) {
            $addCategory = new \Controllers\CreateCategoryController();
            $addCategory->AddCategory($createCategory);
        }else throw new \Exception("Не удается создать категорию");
    }

    public function AddMaterial($selectTypeId, $selectCategoryId, $inputMaterialName, $inputMaterialAuthor, $textareaMaterialDescription){
        if (is_string($selectTypeId) && is_string($selectCategoryId) && is_string($inputMaterialName)){

            if (!empty($inputMaterialAuthor)) {
                if (!is_string($inputMaterialAuthor)){
                    $inputMaterialAuthor = "";
                }
            }
            if (!empty($textareaMaterialDescription)) {
                if (!is_string($textareaMaterialDescription)){
                    $inputMaterialAuthor = "";
                }
            }
            $addMaterial = new \Controllers\CreateMaterialController();
            $addMaterial->AddMaterial($selectTypeId, $selectCategoryId, $inputMaterialName, $inputMaterialAuthor, $textareaMaterialDescription);
        }else throw new \Exception("Не удается создать материал");
    }

    public function AddMaterialTag($selectAddTag,$checkGETId){
        if (is_string($selectAddTag) && is_string($checkGETId)) {
            $addTag = new \Controllers\ViewMaterialController();
            $addTag->addMaterialTag($selectAddTag, $checkGETId);
        }else throw new \Exception("Не удается добавить тег в материал");
    }

    public function AddMaterialLink($checkGETId,$addLinksTitle,$addLinksLink){
        if (is_string($addLinksLink) && is_string($checkGETId)) {
            if (!empty($addLinksTitle)) {
                if (!is_string($addLinksTitle)){
                    $addLinksTitle = "";
                }
            }
            if (is_url($addLinksLink)){
                $addLink = new \Controllers\ViewMaterialController();
                $addLink->addMaterialLink($checkGETId, $addLinksTitle, $addLinksLink);
            }
        }else throw new \Exception("Не удается добавить ссылку в материал");
    }
}