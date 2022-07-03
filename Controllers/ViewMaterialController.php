<?php


namespace Controllers;


class ViewMaterialController implements RulesForControllers
{

    function ActionView()
    {
        include __DIR__ . "/../Views/view-material.php";
    }
}