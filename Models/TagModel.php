<?php


namespace Models;




class TagModel extends \Core\Db
{
    private $db;
    public function __construct()
    {
        $this -> db = new \Core\Db();

    }
    public function SelectAll(){
        $result =  $this->db->DbQuery("SELECT * FROM `tags`");

        $array = \Core\Db::arrayEnumeration($result);

        return $array;
    }
}