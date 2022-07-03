<?php

namespace Classes;

class Router
{
    public  function __construct($routes)
    {
        if (!empty($_SERVER['REQUEST_URI']))
        {
            htmlspecialchars($uri = trim($_SERVER['REQUEST_URI']," , / "));
            foreach ($routes as $key => $value){

                if ($uri === $value){
                    include __DIR__ . "/../views/$value" . ".php";
                    return true;
                }
            }
            include __DIR__ . "/../views/404.php";
            return false;
        }
    }
}