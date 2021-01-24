<?php

namespace Modules\Core;

/**
 * Class Route
 * @package Modules\Core
 */
class Route
{
    /**
     * @param $route
     * @param $function
     */
    public static function set($route, $function)
    {
        if ($route === '/') {
            $route = 'index.php';
        }

        if ($_GET['url'] == $route) {
            $function->__invoke();
        }
    }
}
