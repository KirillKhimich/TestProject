<?php

namespace Core;

class Router
{
    public  function __construct($routes)
    {
        if (!empty($_SERVER['REQUEST_URI']))
        {
            htmlspecialchars($uri = trim($_SERVER['REQUEST_URI']," , / "));
            foreach ($routes as $key => $value){
                if ($uri == $key){
                    if ($value != NULL) {
                        $controller = new $value();
                        $controller->ActionView();
                        return true;
                    }else
                    {
                    die("Такого контроллера нет");
                    }
                }
            }
            $controller = new \Controllers\Controller404();
            $controller->ActionView();
            return false;
        }
    }

}