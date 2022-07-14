<?php


namespace Classes;


class UpdateClass
{
    public function UpdateCategory($selectUpdateCategory,$inputUpdateCategory){

        if (is_string($selectUpdateCategory) && is_string($inputUpdateCategory)){
            $alterCategory = new \Controllers\CreateCategoryController();
            $alterCategory->UpdateCategory($selectUpdateCategory, $inputUpdateCategory);
        }else throw new \Exception("Не удается обновить категорию");
    }

    public function UpdateTag($selectUpdateTag,$inputUpdateTag){

        if (is_string($selectUpdateTag) && is_string($inputUpdateTag)) {
            $alterCategory = new \Controllers\CreateTagController();
            $alterCategory->UpdateTag($selectUpdateTag, $inputUpdateTag);
        } else throw new \Exception("Не удается обновить тег");
    }

    public function UpdateMaterial($updateMaterialId,$updateTypeId,$updateCategoryId,$inputUpdateMaterialName,$inputUpdateMaterialAuthor,$textareaUpdateMaterialDescription){
        if (is_string($updateMaterialId) && is_string($updateTypeId) && is_string($updateCategoryId) && is_string($inputUpdateMaterialName)) {
            if (!empty($inputUpdateMaterialAuthor)){
                if (!is_string($inputUpdateMaterialAuthor)){
                    $inputUpdateMaterialAuthor = "";
                }
            }
            if (!empty($textareaUpdateMaterialDescription)){
                if (!is_string($textareaUpdateMaterialDescription)){
                    $textareaUpdateMaterialDescription = "";
                }
            }
            $createMaterial = new \Controllers\CreateMaterialController();
            $createMaterial->UpdateMaterial($updateMaterialId, $updateTypeId, $updateCategoryId, $inputUpdateMaterialName, $inputUpdateMaterialAuthor, $textareaUpdateMaterialDescription);
        } else throw new \Exception("Не удается обновить материал");
    }
    public function UpdateMaterialLink($updateLinksTitle,$updateLinksLink,$linkId){
        if (is_string($updateLinksLink) && is_string($linkId)) {
            if (!empty($updateLinksTitle)) {
                if (!is_string($updateLinksTitle)){
                    $addLinksTitle = "";
                }
            }
            if (is_url($updateLinksLink) !== NULL) {
                $updateLink = new \Controllers\ViewMaterialController();
                $updateLink->UpdateMaterialLink($updateLinksTitle, $updateLinksLink, $linkId);
            }
        }else throw new \Exception("Не удается обновить ссылку");
    }
}