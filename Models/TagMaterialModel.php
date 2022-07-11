<?php


namespace Models;

use Core\Db;
class TagMaterialModel extends Db
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
    protected function SelectAll($id)
    {
        $result = $this->db->DbQuery("SELECT materials.id,materials.title,materials.author,categories.categoryTitle,types.typeTitle,tags.tagsTitle FROM materials LEFT JOIN categories ON materials.categoryId=categories.id LEFT JOIN types ON materials.typeId = types.id RIGHT JOIN cloudtags ON materials.id = cloudtags.materialId LEFT JOIN tags ON cloudtags.tagId = tags.id WHERE tags.id = '$id'");
        $result = Db::arrayEnumeration($result);
        if ($result === false){
            throw new \Exception("Произошла ошибка при выборке материалов использующих данный тег");
        }else return $result;
    }
    protected function getTagTitle($id){
        $result = $this->db->DbQuery("SELECT tagsTitle FROM tags WHERE id = '$id'");
        $result = Db::arrayEnumeration($result);
        if ($result === false){
            throw new \Exception("Произошла ошибка при выборке имени тега");
        }else return $result;
    }
}