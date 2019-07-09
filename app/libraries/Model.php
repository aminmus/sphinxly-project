<?php
namespace App\Libraries;

abstract class Model
{
    private $db;

    public function __construct()
    {
        $this->db = new \App\Libraries\Database;
    }

    public function findOne()
    {
    }
}
