<?php


namespace Controllers;


class Controller404 implements RulesForControllers
{

    public function __construct()
    {
    }

    function ActionView()
    {
        include __DIR__ . "/../Views/404.php";
    }
}