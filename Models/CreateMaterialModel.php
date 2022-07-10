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
    protected function ViewAllTypes(){
        $result =  $this->db->DbQuery("SELECT * FROM `types`");
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
    protected function Insert($Type,$Category,$Name,$Author = "",$Description =""){
        $result = $this->db->DbQuery("INSERT INTO `materials`(id, title, author, description, typeId, categoryId) VALUES (NULL,'$Name','$Author','$Description','$Type','$Category')");
        if (!$result){
            throw new \Exception("Произошла ошибка при добавлении материала");
        }
    }
}