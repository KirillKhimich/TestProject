<?php


namespace Models;

use Core\Db;
class CreateMaterialModel extends Db
{
    private $db;
    public function __construct()
    {
        $this -> db = new Db();

    }
    protected function ViewAllTags(){
        $result =  $this->db->DbQuery("SELECT * FROM `tags`");
        $result = Db::arrayEnumeration($result);
        if (!$result){
            throw new \Exception("Произошла ошибка при выборке Тегов");
        }else return $result;
    }
    protected function ViewAllCategories()
    {
        $result = $this->db->DbQuery("SELECT * FROM categories ORDER BY categories.categoryTitle");
        $result = Db::arrayEnumeration($result);
        if (!$result){
            throw new \Exception("Произошла ошибка при выборке Категорий");
        }else return $result;
    }
}