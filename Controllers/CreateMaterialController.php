<?php


namespace Controllers;


use Models\MaterialModel;

class CreateMaterialController extends MaterialModel implements RulesForControllers
{

    function ActionView()
    {
        include __DIR__ . "/../Views/create-material.php";
    }
}