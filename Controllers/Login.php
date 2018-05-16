<?php


namespace Controllers;


use Core\Controller;

class Login extends Controller
{
    public function action_index()
    {
        $this->view->render('login');
    }
    public function action_run()
    {
        $this->model = new \Models\Login;
        $this->model->run();
    }
}