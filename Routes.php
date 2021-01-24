<?php

use Modules\Core\Route;
use Modules\Core\Controllers\HomeController;

Route::set('/', function () {
    HomeController::returnView('home');
});

Route::set('test', function () {
    HomeController::returnView('test');
});
