<?php


namespace Models;


use Core\Db;

class ListCategoryModel extends Db
{

    private $db;
    public function __construct()
    {
        $this -> db = new Db();

    }

    protected function SelectAll()
    {
        $result = $this->db->DbQuery("SELECT * FROM categories ORDER BY categories.categoryTitle");
        $result = Db::arrayEnumeration($result);
        return $result;
    }
    protected function Insert($name){
        $this->db->DbQuery("INSERT INTO categories(id,categoryTitle) VALUES (NULL,'$name')");
    }
    protected function Delete($id){
        $this->db->DbQuery("DELETE FROM categories WHERE id = '$id'");
    }
}