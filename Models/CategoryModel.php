<?php


namespace Models;


use Core\Db;

class CategoryModel extends Db
{

    private $db;
    public function __construct()
    {
        $this -> db = new \Core\Db();

    }

    public function SelectAll()
    {
        $result =  $this->db->DbQuery("SELECT * FROM `categories`");

        $array = \Core\Db::arrayEnumeration($result);

        return $array;
    }
}