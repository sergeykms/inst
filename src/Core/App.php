<?php

namespace App\Core;

use App\Application\Route\Route;
use App\Application\Router\Router;

class App
{
    public static function run(): void
    {
        require_once __DIR__ . "/routes.php";
        require_once __DIR__ . "/actions.php";
        $router = new Router();
        $router->route(Route::getRoutes());
    }
}