<?php


namespace Controllers;

use League\Flysystem\Exception;
use \Models\ListTagModel;
class ListTagController extends ListTagModel implements RulesForControllers
{


    function ActionView()
    {
        $tag = new ListTagModel();
        $tag = $tag ->SelectAll();
        include __DIR__ . "/../Views/list-tag.php";
    }
    function deleteTag($id){
        $id = htmlspecialchars($id);
        $result = new ListTagModel();
        $result->Delete($id);
    }
}