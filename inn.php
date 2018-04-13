<?php
session_start();
if (empty($_SESSION['login'])) {
    echo "Данная страница только для авторизироавных пользовательей!<br />\n";
    echo "<a href='index.html'><input type='button' value='Назад'></a>";
} else {
    if (isset($_POST['exit'])) {
        $_SESSION = [];
        unset($_COOKIE[session_name()]);
        session_destroy();
        header("Location:index.html");
        exit();
    }
    include_once "inn.html";
}
exit();
