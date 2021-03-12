<?php

namespace App\Controllers;

use App\Config\Database;
use App\Models\User;

class TestController{

    public function sayHello()
    {
       echo User::class;
    }
}