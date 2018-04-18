<?php


namespace Controllers;


use Core\Controller;
use Core\Session;

class Inn extends Controller
{
    public function action_index()
    {
        //Session::init();
        $logged = Session::get('loggedIn');
        if (empty($logged)) {
            Session::destroy();
            echo "<p>Страницца только для авторизированных пользователей.</p>";
            echo "<a href='../main'><input type='button' value='Главная страница'></a>";
        } else {
            $this->view->render('inn');
        }
    }

    public function action_logout()
    {
        Session::destroy();
        header('location: ../login');
    }
}