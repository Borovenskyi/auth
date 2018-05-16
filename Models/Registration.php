<?php


namespace Models;


use Core\Model;

class Registration extends Model
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
            trigger_error('Поля логин или пароль не заполненны.', E_USER_NOTICE);
        } else {
            try {
                $ins = $this->db->prepare("INSERT INTO edu.users(id, login, password) VALUES (NULL,?,?)");
                $ins->execute(array($login, $password));
                echo "Новый пользователь зарегестрирован<br />\n";
                echo "Теперь Вы можете продолжить используя новые данные<br />\n";
                echo "<a href='../main'><input type='button' value='Главная страница'></a>";
            } catch (\PDOException $PDOException) {
                echo "Не удалось добавить новую запись.{$PDOException->getMessage()}";
            }
        }
    }
}