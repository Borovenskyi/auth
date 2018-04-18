<?php

namespace Controllers;


use Core\Controller;

class Main extends Controller
{
    public function action_index()
    {
        $this->view->render('main');
    }
}