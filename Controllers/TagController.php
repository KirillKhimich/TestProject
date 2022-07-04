<?php


namespace Controllers;

use \Models\TagModel;
class TagController extends TagModel implements RulesForControllers
{


    function ActionView()
    {
        $tag = new TagModel();
        $tag = $tag ->SelectAll();
        include __DIR__ . "/../Views/list-tag.php";
    }
}