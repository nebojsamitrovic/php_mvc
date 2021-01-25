<?php

use Modules\Core\Models\User;
use Modules\Core\Route;
use Modules\Core\Controllers\HomeController;
use Modules\Core\Controllers\AuthController;

Route::set('/', function () {
    HomeController::returnView('welcome');
});

Route::set('test', function () {
    HomeController::returnView('test');
});


Route::set('login', function () {
    $authController = new AuthController(new User);
    $authController->login();
});

Route::set('logout', function () {
    $authController = new AuthController(new User);
    $authController->logout();
});

Route::set('register', function () {
    $authController = new AuthController(new User);
    $authController->register();
});

Route::set('home', function () {
    $homeController = new HomeController;
    $homeController->getHomepage();
});
