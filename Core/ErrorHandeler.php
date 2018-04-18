<?php
function myErrorHandeler($errno, $errmsg)
{

    switch ($errno) {

        case E_USER_ERROR:
            echo "<b>Ошибка:</b>$errmsg<br />\n";
            echo "<a href='../login'><input type='button' value='Назад'></a>";
            break;

        case E_USER_WARNING:
            echo "<b>Предупреждение:</b>$errmsg<br />\n";
            echo "<a href='../login'><input type='button' value='Назад'></a>";
            break;

        case E_USER_NOTICE:
            echo "<b>Предупреждение:</b>$errmsg<br />\n";
            echo "<a href='../registration'><input type='button' value='Назад'></a>";
            break;
    }
}

set_error_handler("myErrorHandeler");
