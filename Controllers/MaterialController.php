<?php


namespace Controllers;


use Models\MaterialModel;

class MaterialController extends \Models\MaterialModel implements RulesForControllers
{


    function ActionView()
    {   $material = new MaterialModel();
        $material = $material ->SelectAll();
        include __DIR__ . "/../Views/list-materials.php";
    }
}