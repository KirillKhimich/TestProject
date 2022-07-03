<?php


namespace Controllers;


class TagController extends \Models\TagModel implements RulesForControllers
{


    function ActionView()
    {
        $tag = new \Models\TagModel();
        $tag = $tag ->SelectAll();
        include __DIR__ . "/../Views/list-tag.php";
    }
}