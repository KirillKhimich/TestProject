<?php


namespace Classes;


class Db
{
        private $db;
        public function __construct(){
            $this->db =  new \mysqli("localhost","root","","test_project_db");
            if ($this->db->connect_error) {
                die("Нет соеденения с базой данных ");
            }
            $this->db ->set_charset('utf8');
    }
    public function SelectAll(){
            $this->db->query();
    }
}