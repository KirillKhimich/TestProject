<?php


namespace Models;




class MaterialModel extends \Core\Db
{
    private $db;
    public function __construct()
    {
        $this -> db = new \Core\Db();

    }

    public function SelectAll()
    {
        $result =  $this->db->DbQuery("SELECT materials.id,materials.title,materials.author,materials.description,categories.categoryTitle,types.typeTitle FROM materials LEFT JOIN categories ON materials.categoryId=categories.id LEFT JOIN types ON materials.typeId = types.id");

        $array = \Core\Db::arrayEnumeration($result);

        return $array;
    }
}