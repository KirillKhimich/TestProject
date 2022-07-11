<?php


namespace Models;


use Core\Db;

class ListCategoryModel extends Db
{

    private $db;
    public function __construct()
    {
        try {
            $this -> db = new Db();
        }catch (\Exception $e){
            die($e->getMessage());
        }
    }
    protected function SelectAll()
    {
        $result = $this->db->DbQuery("SELECT * FROM categories ORDER BY categories.categoryTitle");
        $result = Db::arrayEnumeration($result);
        if ($result === false){
            throw new \Exception("Произошла ошибка при выборке категорий");
        }else return $result;
    }
    protected function Delete($id){
        $result = $this->db->DbQuery("DELETE FROM categories WHERE id = '$id'");
        if ($result === false){
            throw new \Exception("Произошла ошибка при удалении категорий");
        }else return $result;
    }
}