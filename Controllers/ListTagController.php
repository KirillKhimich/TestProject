<?php


namespace Controllers;

use League\Flysystem\Exception;
use \Models\ListTagModel;
class ListTagController extends ListTagModel implements RulesForControllers
{


    function ActionView()
    {
        $tag = new ListTagModel();
        try {
            $tag = $tag ->SelectAll();
        }catch (\Exception $e){
            die($e->getMessage());
        }
        include __DIR__ . "/../Views/list-tag.php";
    }
    function deleteTag($id){
        $id = htmlspecialchars($id);
        $result = new ListTagModel();
        try {
            $result = $result ->SelectAll();
        }catch (\Exception $e){
            die($e->getMessage());
        }
    }
}