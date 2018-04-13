<?php
class TextProc
{
    public $log, $pass;
    function __construct($log, $pass)
    {
        $this->log = stripcslashes($log);
        $this->log = htmlspecialchars($log);
        $this->log = trim($log);
        $this->pass = stripcslashes($pass);
        $this->pass = htmlspecialchars($pass);
        $this->pass = trim($pass);
    }
}
