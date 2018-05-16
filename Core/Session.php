<?php


namespace Core;


class Session
{

    public static function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public static function get($key)
    {
        if (isset($_SESSION[$key]))
            return $_SESSION[$key];
    }

    public static function destroy()
    {
        $_SESSION = [];
        unset($_COOKIE[session_name()]);
        session_destroy();
    }
}