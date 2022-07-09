<?php


namespace Controllers;


use Models\ListMaterialModel;

class ListMaterialController extends ListMaterialModel implements RulesForControllers
{


    public function ActionView()
    {   $material = new ListMaterialModel();
        $material = $material ->SelectAll();
        include __DIR__ . "/../Views/list-materials.php";
    }
    public function deleteMaterial($id){
        $id = htmlspecialchars($id);
        $result = new ListMaterialModel();
        $result->Delete($id);
    }
}