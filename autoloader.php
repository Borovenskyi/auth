<?php
spl_autoload_register(function ($class) {
    $file = $class . '.php';
    if (file_exists($file)) require_once $file; else {
        \Core\Route::Error404();
    }
});
include_once 'Config\Database.php';
include_once 'Config\Path.php';
include_once 'Core\ErrorHandeler.php';