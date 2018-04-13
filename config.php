<?php
$dbhost='mysql:host:localhost;dbname:edu';
$dbuser='root';
$dbpswd='321678';
try {
    $bd = new PDO($dbhost,$dbuser,$dbpswd);
    $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    echo "Невозможно установить соединение с базой данных!";
}