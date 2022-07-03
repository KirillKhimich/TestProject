<?php


namespace Core;


 class Db
{
    private $db;

     protected function __construct(){

            $this->db =  new \mysqli("localhost","root","","test_project_db");
            mysqli_dump_debug_info($this->db);
            if ($this->db ->connect_error) {

                die("Нет соеденения с базой данных ");
            }

             $this->db ->set_charset('utf8');

            return $this->db;

    }

    protected function DbQuery($query){
       return $this->db->query("$query");
    }

    protected static function arrayEnumeration($array){
        $i = 0;
        foreach ($array as $key => $item){
            $result[$i] = ($item);
            $i++;

        }
        return $result;
    }
 }