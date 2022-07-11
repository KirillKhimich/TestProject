<?php


namespace Models;


use Core\Db;

class CreateCategoryModel extends Db
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
    protected function Insert($name){
        $result = $this->db->DbQuery("INSERT INTO categories(id,categoryTitle) VALUES (NULL,'$name')");
        if ($result === false){
            throw new \Exception("Произошла ошибка при записи категорий в базу данных");
        }
    }
    protected function Update($id,$name){
        $result = $this->db->DbQuery("UPDATE categories SET categoryTitle = '$name' WHERE id = '$id'");
        if ($result === false){
            throw new \Exception("Произошла ошибка при изменении категорий в базе данных");
        }
    }
    protected function SelectAll()
    {
        $result = $this->db->DbQuery("SELECT * FROM categories");
        $result = Db::arrayEnumeration($result);
        if ($result === false){
            throw new \Exception("Произошла ошибка при выборке категорий");
        }else return $result;
    }
}