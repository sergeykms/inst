<?php

namespace App\Application\Router;

use App\Controllers\PagesController;
use App\Services\Services;

class Router
{
    use RouterHelpers;

    public function route(array $routes): void
    {
        $requestMethod = $_SERVER['REQUEST_METHOD'];
        $path = $_SERVER["REQUEST_URI"]; // путь в строке браузера
        if ($requestMethod === 'POST') {
            $actionsRoutes = self::filterRouters($routes, 'post');
            foreach ($actionsRoutes as $route) {
                if ($route['uri'] === $path) {
                    $controller = new $route['controller'](); // создание инстанса класс контроллера по статической ссылке, содержащейся в $route
                    $action = $route['actions']; // вызов метода (экшена) контроллера из $route
                    $controller->$action($_POST);
                    return;
                }
            }
        } else {
            $pagesRoutes = self::filterRouters($routes, 'page');
            foreach ($pagesRoutes as $route) {
                if ($route['uri'] === $path) {
                    $controller = new $route['controller'](); // создание инстанса класс контроллера по статической ссылке, содержащейся в $route
                    $auth = Services::isUserChecked();
                    $params = $route['params'] += ['auth' => $auth]; // добавление к параметрам значения авторизироан ли пользователь
                    $controller->getViews($route['views'], $params); // вызов метода контроллера для отображени view из $route
                    return;
                }
            }
            // если роут не найден в массиве
            $controller = new PagesController();
            $controller->getViews('404');
        }
    }

}