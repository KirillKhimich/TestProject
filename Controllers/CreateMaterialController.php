<?php


namespace Controllers;


class CreateMaterialController implements RulesForControllers
{

    function ActionView()
    {
        include __DIR__ . "/../Views/create-material.php";
    }
}