<?php

namespace Core;


class Router
{
    public function __construct($routes)
    {
        if (!empty($_SERVER['REQUEST_URI'])) {
            $uri = htmlspecialchars(trim($_SERVER['REQUEST_URI'], '/'));
            foreach ($routes as $key => $value) {
                if ($key == $uri) {
                        $value = new $value;
                        $value->ActionView();
                        return true;
                }
            }
            include __DIR__ . "/../Views/404.php";
            return false;

        }

    }

}
