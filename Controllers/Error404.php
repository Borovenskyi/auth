<?php

namespace Controllers;


use Core\Controller;

class Error404 extends Controller
{
    public function action_index()
    {
        $this->view->render('error404');
    }
}