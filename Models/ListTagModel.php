<?php


namespace Models;


use Core\Db;
use mysql_xdevapi\Exception;

class ListTagModel extends Db
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
    protected function SelectAll(){
        $result =  $this->db->DbQuery("SELECT * FROM `tags` ORDER BY tags.tagsTitle");
        $result = Db::arrayEnumeration($result);
        if ($result === false){
            throw new \Exception("Произошла ошибка при выборке тегов");
        }else return $result;
    }

    protected function Delete($id){
        $result = $this->db->DbQuery("DELETE FROM `tags` WHERE id = '$id'");
        if ($result === false){
            throw new \Exception("Произошла ошибка при выборке категорий");
        }
    }
}