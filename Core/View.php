<?php

namespace Core;


class View
{
    public function render ($name)
    {
        require_once 'Views\Template\Header.php';
        require_once 'Views\\'.$name.'.php';
        require_once 'Views\Template\Footer.php';
    }
}