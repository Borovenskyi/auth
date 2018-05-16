<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title><?= strtoupper($name) ?></title>
    <link rel="stylesheet" href="/Public/style.css">
</head>
<body>
<div id="header">
    <br>
    <a href="<?= URL ?>main">Главная страница</a>
    <?php if(\Core\Session::get('loggedIn') == true) { ?>
        <a href="<?= URL ?>inn/logout">Выход</a>
    <?php } else { ?>
        <a href="<?= URL ?>registration">Регистрация</a>
        <a href="<?= URL ?>login">Вход</a>
    <?php } ?>
    <a href="<?= URL ?>inn">Целевая страница</a>
</div>
<hr>
<div id="content">