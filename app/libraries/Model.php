<?php
namespace App\Libraries;

abstract class Model
{
    private $db;

    public function __construct()
    {
        $this->db = new \App\Libraries\Database;
    }

    // public static function getConstants()
    // {
    //     $oClass = new \ReflectionClass(\get_called_class());
    //     return $oClass->getConstants();
    // }

    public function findOne()
    {
        // echo(static::TABLENAME);
        return 'hi';
    }
}
