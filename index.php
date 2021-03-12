<?php

require __DIR__ . '/vendor/autoload.php';

use App\Controllers\TestController;
use App\Controllers\TestController2;
use App\Router\Router;

$router = new Router();

$router->get('/', [TestController::class, 'sayHello']);
$router->get('/test', [TestController2::class, 'sayHelloAgain']);

$router->load(
    $_SERVER['REQUEST_URI'],
    $_SERVER['REQUEST_METHOD']
);