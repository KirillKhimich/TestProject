<?php


namespace Core;


 class Db
{
    private $db;
    private static $instance;
    private function __construct(){

            $this->db =  new \mysqli("localhost","root","","test_project_db");
            $this->db ->set_charset('utf8');
            if ($this->db ->connect_error) {
                throw new \Exception("Нет соеденения с базой данных");
            }else return $this->db;
    }

    public static function getInstance() {
         if (self::$instance === null) {
             try {
                 self::$instance = new self;
             }catch (\Exception $e){
                 die($e->getMessage());
             }
         }

         return self::$instance;
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

    private function __clone(){

    }

    private function __wakeup(){

    }


 }