<?php

namespace Classes;

class Router
{
    private  $routes = [
        "view-material" => "view-material",
        "create-tag" => "create-tag",
        "create-category" => "create-category",
        "create-material" => "create-material",
        "list-category" => "list-category",
        "list-materials" => "list-materials",
        "list-tag" => "list-tag"


    ];
    public  function __construct()
    {
        if (!empty($_SERVER['REQUEST_URI']))
        {
            htmlspecialchars($uri = trim($_SERVER['REQUEST_URI']," , / "));
            foreach ($this -> routes as $key => $value){

                if ($uri == $key){
                    include __DIR__ . "/../views/$value" . ".php";
                    return true;
                }
            }
            include __DIR__ . "/../views/404.php";
            return false;
        }
    }
}