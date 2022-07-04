<?php


namespace Models;


use Core\Db;

class TagModel extends Db
{
    private $db;
    public function __construct()
    {
        $this -> db = new Db();

    }
    protected function SelectAll(){
        $result =  $this->db->DbQuery("SELECT * FROM `tags`");

        $result = Db::arrayEnumeration($result);

        return $result;
    }
    protected function Insert($name){
        $this->db->DbQuery("INSERT INTO `tags`(`id`,`tagsTitle`) VALUES (NULL,'$name')");
    }
}