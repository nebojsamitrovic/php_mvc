<?php

namespace Modules\Core\Controllers;

/**
 * Class CoreController
 * @package Modules\Core\Controllers
 */
class CoreController
{
    /** message variable */
    public $message = '';

    /**
     * @param $viewName
     */
    public function view($viewName)
    {
        if (file_exists(dirname(__DIR__) . '/Views/' . $viewName . '.php')) {
            require_once dirname(__DIR__) . '/Views/' . $viewName . '.php';
            die;
        }
    }

    /**
     * @param $route
     */
    public function redirect($route)
    {
        header('location:' . $route);
    }

    /**
     * @return bool
     */
    public function isLogged()
    {
        if (isset($_SESSION['userID'])) {
            return true;
        }
    }

    /**
     * @param $viewName
     */
    public static function returnView($viewName)
    {
        return (new self)->view($viewName);
    }
}
