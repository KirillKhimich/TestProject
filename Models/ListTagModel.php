<?php


namespace Models;


use Core\Db;
use mysql_xdevapi\Exception;

class ListTagModel extends Db
{
    private $db;
    public function __construct()
    {
        $this -> db = new Db();

    }
    protected function SelectAll(){
        $result =  $this->db->DbQuery("SELECT * FROM `tags` ORDER BY tags.tagsTitle");

        $result = Db::arrayEnumeration($result);

        return $result;
    }

    protected function Delete($id){
        $result = $this->db->DbQuery("DELETE FROM `tags` WHERE id = '$id'");

    }
}