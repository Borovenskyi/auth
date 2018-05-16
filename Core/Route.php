<?php

namespace Core;


class Route
{
    static public $routes = null;

    static function start()
    {
        if (self::$routes == null) {
            self::$routes = explode('/', $_SERVER['REQUEST_URI']);
        }
        $controller_name = 'main';
        $action_name = 'index';

        if (!empty(self::$routes[1])) {
            $controller_name = self::$routes[1];
        }

        if (!empty(self::$routes[2])) {
            $action_name = self::$routes[2];
        }

        $controller_class = '\\Controllers\\' . $controller_name;
        $action_name = 'action_' . $action_name;

        $controller = new $controller_class;

        if (method_exists($controller, $action_name)) {
            $controller->$action_name();
        }
    }

    public static function Error404()
    {
        $protocol = 'http';
        if ($_SERVER['SERVER_PORT'] == 443) $protocol = 'https';
        $host = $protocol . '://' . $_SERVER['HTTP_HOST'];
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        header('Location:' . $host . '/error404');
    }
}