<?php

namespace Core;


class Database extends \PDO
{
    public function __construct()
    {
        try {
            parent::__construct(DB_HOST, DB_USER, DB_PASSWD);
            $this->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $PDOException){
          echo $PDOException->getMessage();
        }
    }
}