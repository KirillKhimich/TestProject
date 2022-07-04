<?php


namespace Controllers;


use Models\MaterialModel;

class MaterialController extends MaterialModel implements RulesForControllers
{


    public function ActionView()
    {   $material = new MaterialModel();
        $material = $material ->SelectAll();
        include __DIR__ . "/../Views/list-materials.php";
    }
}