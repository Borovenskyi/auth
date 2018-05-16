<?php

namespace Controllers;


use Core\Controller;

class Registration extends Controller
{
    public function action_index()
    {
        $this->view->render('registration');
    }
    public function action_run()
    {
        $this->model = new \Models\Registration;
        $this->model->run();
    }
}