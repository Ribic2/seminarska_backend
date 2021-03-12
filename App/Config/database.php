<?php

namespace App\Config;

use mysqli;

class Database{
    
    /**
     * Connects to database
     *
     * @return void
     */
    public static function connect()
    {
        return \mysqli_connect(
            'localhost',
            'root',
            '',
            'seminarska'
        );
    }
} 