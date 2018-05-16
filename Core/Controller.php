<?php

namespace Core;


class Controller
{
    public $controller;
    public $model;

    public function __construct()
    {
        $this->view = new View();
    }
    public function action_index()
    {
    }
    public function action_run()
    {
    }
}
