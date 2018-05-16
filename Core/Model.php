<?php

namespace Core;


class Model
{
    public function __construct()
    {
        $this->db = new Database();
    }
    public function run ()
    {
    }
}