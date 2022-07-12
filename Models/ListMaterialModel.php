<?php


namespace Models;


use Core\Db;

class ListMaterialModel extends Db
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
        $result =  $this->db->DbQuery("SELECT materials.id,materials.title,materials.author,categories.categoryTitle,types.typeTitle FROM materials LEFT JOIN categories ON materials.categoryId=categories.id LEFT JOIN types ON materials.typeId = types.id");
        $result = Db::arrayEnumeration($result);
        if ($result === false){
            throw new \Exception("Произошла ошибка при выборке материалов");
        }else return $result;
    }
    protected function Search($checkString)
    {
        $result =  $this->db->DbQuery("SELECT materials.id,materials.title,materials.author,categories.categoryTitle,types.typeTitle FROM materials LEFT JOIN categories ON materials.categoryId=categories.id LEFT JOIN types ON materials.typeId = types.id WHERE materials.title LIKE '%$checkString%'");
        $result = Db::arrayEnumeration($result);
        if ($result === false){
            throw new \Exception("Произошла ошибка при поиске материалов");
        }else return $result;
    }
    protected function Delete($id){
        $result = $this->db->DbQuery("DELETE FROM materials WHERE id = '$id'");
        if ($result === false){
            throw new \Exception("Произошла ошибка при удалении материала");
        }else return $result;
    }
}