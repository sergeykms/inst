<?php

use App\Application\Route\Route;
use App\Controllers\PagesController;

$path =$_SERVER['REQUEST_URI'];

// Перечень роутов для обработки представлений
// uri -> путь из адресной строки
// controller - контроллеер для обработки представления
// views -> функция в контроллере дял обработки представления
// params -> массив параметров 'page' - отображаемая стрвница
// 'unavailable' массив проверок на недоступность роута (ключь - имя проверяемой куки, значение условие недоступности (есть кука или нет)
// если false - роут нелоступен когда куки нет, true - роут недоступен когда кука есть
// 'goTo' - на какую станицу переходить если роут недоступен
//Route::page(uri, controller, views, ['page' => 'main', 'unavailable' => ['jwt' => false], 'goTo' => '/login']);
//Route::page('/', PagesController::class, 'layout', ['page' => 'main', 'unavailable' => ['jwt' => false], 'goTo' => '/login']);


Route::page('/', PagesController::class, 'layout', ['page' => 'main', 'unavailable' => ['jwt' => false], 'goTo' => '/login']);
Route::page('/home', PagesController::class, 'layout', ['page' => 'home', 'unavailable' => ['jwt' => false], 'goTo' => '/login']);
Route::page('/about', PagesController::class, 'layout', ['page' => 'about','unavailable' => ['jwt' => false], 'goTo' => '/login']);
Route::page('/contacts', PagesController::class, 'layout', ['page' => 'contacts', 'unavailable' => ['jwt' => false], 'goTo' => '/login']);
Route::page('/login', PagesController::class, 'layout', ['page' => 'login', 'unavailable' => ['jwt' => true], 'goTo' => '/']);
Route::page('/register', PagesController::class, 'layout', ['page' => 'register', 'unavailable' => ['jwt' => true], 'goTo' => '/']);
Route::page('/404', PagesController::class, 'layout', ['page' => '404']);

