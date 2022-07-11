<?php


namespace Models;


use Core\Db;

class CreateTagModel extends Db
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
        $result = $this->db->DbQuery("INSERT INTO `tags`(`id`,`tagsTitle`) VALUES (NULL,'$name')");
        if ($result === false){
            throw new \Exception("Произошла ошибка при записи тегов в базу данных");
        }
    }
    protected function Update($id,$name){
        $result = $this->db->DbQuery("UPDATE tags SET tagsTitle = '$name' WHERE id = '$id'");
        if ($result === false){
            throw new \Exception("Произошла ошибка при обновлении тегов в базе данных");
        }
    }
    protected function SelectAll()
    {
        $result = $this->db->DbQuery("SELECT * FROM tags ORDER BY tags.tagsTitle");
        $result = Db::arrayEnumeration($result);
        if ($result === false){
            throw new \Exception("Произошла ошибка при выборке тегов");
        }else return $result;
    }

}