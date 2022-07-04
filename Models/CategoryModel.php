<?php


namespace Models;


use Core\Db;

class CategoryModel extends Db
{

    private $db;
    public function __construct()
    {
        $this -> db = new Db();

    }

    protected function SelectAll()
    {
        $result = $this->db->DbQuery("SELECT * FROM `categories`");

        $result = Db::arrayEnumeration($result);

        return $result;
    }
    protected function Insert($name){
        $this->db->DbQuery("INSERT INTO `categories`(`id`,`categoryTitle`) VALUES (NULL,'$name')");
    }
}