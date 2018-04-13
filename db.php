<?php
try {
    $bd = new PDO('mysql:host:localhost;dbname:edu','root','321678');
    $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    echo "Невозможно установить соединение с базой данных!";
}