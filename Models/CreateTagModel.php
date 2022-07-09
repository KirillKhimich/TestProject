<?php


namespace Models;


use Core\Db;

class CreateTagModel extends Db
{

    private $db;

    public function __construct()
    {
        $this -> db = new Db();

    }
    protected function Insert($name){
        $result = $this->db->DbQuery("INSERT INTO `tags`(`id`,`tagsTitle`) VALUES (NULL,'$name')");
        if ($result == false){
            throw new \Exception("Произошла ошибка при записи тегов в базу данных");
        }
    }

}