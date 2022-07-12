<?php


namespace Controllers;


use Models\ListMaterialModel;

class ListMaterialController extends ListMaterialModel implements RulesForControllers
{


    public function ActionView(){
        $material = new ListMaterialModel();
        try {
            $material = $material ->SelectAll();
        }catch (\Exception $e){
            die($e->getMessage());
        }
        include __DIR__ . "/../Views/list-materials.php";
    }
    public function deleteMaterial($id){
        $id = htmlspecialchars($id);
        $result = new ListMaterialModel();
        try {
            $result->Delete($id);
        }catch (\Exception $e){
            die($e->getMessage());
        }
    }
    public function searchMaterial($searchString){
        $result = new ListMaterialModel();
        try {
            $result = $result->Search($searchString);
        }catch (\Exception $e){
            die($e ->getMessage());
        }
    }
}