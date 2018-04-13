<?php
session_start();
require_once "config.php";
require_once "TextProc.php";
function myErrorHandeler($errno, $errmsg)
{

    switch ($errno) {

        case E_USER_WARNING:
            echo "<b>Пользовательское предупреждение:</b>[$errno] $errmsg<br />\n";
            echo "<a href='index.html'><input type='button' value='Назад'></a>";
            break;

        case E_USER_NOTICE:
            echo "<b>Пользовательское предупреждение:</b>[$errno] $errmsg<br />\n";
            echo "<a href='reg.html'><input type='button' value='Назад'></a>";
            break;
    }
}

set_error_handler("myErrorHandeler");

if (isset($_POST['reg'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];
    if ($login == '') {
        unset($login);
    }
    if ($password == '') {
        unset($password);
    }
    if (empty($login) or empty($password)) {
        trigger_error('Поля логин или пароль не заполненны', E_USER_NOTICE);
    } else {
        $proc = new TextProc('$login', '$password');
        try {
            $ins = $bd->prepare("INSERT INTO edu.users(id, login, password) VALUES (NULL,?,?)");
            $ins->execute(array("$login", "$password"));
            echo "Новый пользователь зарегестрирован<br />\n";
            echo "Теперь Вы можете продолжить используя новые данные<br />\n";
            echo "<a href='index.html'><input type='button' value='Продолжить'></a>";
        } catch (PDOException $e) {
            echo "Не удалось добавить новую запись.{$e->getMessage()}";
            echo "<a href='reg.html'><input type='button' value='Назад'></a>";
        }
    }

}
if (isset($_POST['auth'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];
    if ($login == '') {
        unset($login);
    }
    if ($password == '') {
        unset($password);
    }
    if (empty($login) or empty($password)) {
        trigger_error('Поля логин или пароль не заполненны', E_USER_WARNING);
    } else {
        $proc = new TextProc('$login', '$password');
        try {
            $sql = $bd->prepare("SELECT * FROM edu.users WHERE login=?");
            $sql->execute(array("$login"));
            $result = $sql->fetch(PDO::FETCH_ASSOC);
            $_SESSION['login']=$result['login'];
            header('location:inn.php');
        } catch (PDOException $e) {
            echo "Неправильный логин или пароль {$e->getMessage()}";
            echo "<a href='index.html'><input type='button' value='Назад'></a>";
        }
    }
}
exit();