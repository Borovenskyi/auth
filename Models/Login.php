<?php


namespace Models;


use Core\Model;
use Core\Session;

class Login extends Model
{
    public function run()
    {
        $login = $_POST['login'];
        $password = $_POST['password'];
        if ($login == '') {
            unset($login);
        }
        if ($password == '') {
            unset($password);
        }
        if (empty($login) or empty($password)) {
            trigger_error('Поля логин или пароль не заполненны.', E_USER_WARNING);
        } else {
            $sql = $this->db->prepare("SELECT * FROM edu.users WHERE login=?");
            $sql->execute(array("$login"));
            $result = $sql->fetch(\PDO::FETCH_ASSOC);
            if (!empty($result)) {
               // Session::init();
                Session::set('loggedIn', true);
                Session::set('login', $result['login']);
                header('Location: ../inn');
            } else {
                trigger_error('Неправильный логин или пароль', E_USER_ERROR);
            }
        }
    }
}