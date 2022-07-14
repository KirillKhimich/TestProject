<?php


namespace Models;

use Core\Db;
class CreateMaterialModel extends Db
{
    private $db;
    public function __construct()
    {
        try {
            $this -> db = Db::getInstance();
        }catch (\Exception $e){
            die($e->getMessage());
        }

    }
    protected function ViewAllTypes(){
        $result =  $this->db->DbQuery("SELECT * FROM `types`");
        $result = Db::arrayEnumeration($result);
        if ($result === false){
            throw new \Exception("Произошла ошибка при выборке тегов");
        }else return $result;
    }
    protected function ViewAllCategories()
    {
        $result = $this->db->DbQuery("SELECT * FROM categories ORDER BY categories.categoryTitle");
        $result = Db::arrayEnumeration($result);
        if ($result === false){
            throw new \Exception("Произошла ошибка при выборке категорий");
        }else return $result;
    }
    protected function ViewAllMaterials()
    {
        $result =  $this->db->DbQuery("SELECT materials.id,materials.title FROM materials ");
        $result = Db::arrayEnumeration($result);
        if ($result === false){
            throw new \Exception("Произошла ошибка при выборке материалов");
        }else return $result;
    }

    protected function Insert($Type,$Category,$Name,$Author = "",$Description =""){
        $result = $this->db->DbQuery("INSERT INTO materials(id, title, author, description, typeId, categoryId) VALUES (NULL,'$Name','$Author','$Description','$Type','$Category')");
        if ($result === false){
            throw new \Exception("Произошла ошибка при добавлении материала");
        }
    }

    protected function Update($material,$Type,$Category,$Name,$Author = "",$Description =""){
        $result = $this->db->DbQuery("UPDATE materials SET title='$Name',author='$Author',description='$Description',typeId='$Type',categoryId='$Category' WHERE id = '$material' ");
        if ($result === false){
            throw new \Exception("Произошла ошибка при обновлении материала");
        }
    }

}