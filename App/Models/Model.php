<?php
namespace App\Models;

trait Model{

    static string $database;


    public static function getClassName()
    {
        self::$database = strtolower(explode("\\", get_called_class())[2]);
    }

}