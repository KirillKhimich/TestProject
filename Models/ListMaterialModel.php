<?php


namespace Models;


use Core\Db;

class ListMaterialModel extends Db
{
    private $db;
    public function __construct()
    {
        $this -> db = new Db();
    }

    protected function SelectAll()
    {
        $result =  $this->db->DbQuery("SELECT materials.id,materials.title,materials.author,categories.categoryTitle,types.typeTitle FROM materials LEFT JOIN categories ON materials.categoryId=categories.id LEFT JOIN types ON materials.typeId = types.id");
        $result = Db::arrayEnumeration($result);
        return $result;
    }
    protected function Delete($id){
        $this->db->DbQuery("DELETE FROM materials WHERE id = '$id'");
    }
}