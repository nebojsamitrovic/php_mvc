<?php

namespace Modules\Core\Controllers;

/**
 * Class CoreController
 * @package Modules\Core\Controllers
 */
class CoreController
{
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
     * @param $viewName
     */
    public static function returnView($viewName)
    {
        return (new self)->view($viewName);
    }
}
