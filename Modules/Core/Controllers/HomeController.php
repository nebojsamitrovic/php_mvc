<?php

namespace Modules\Core\Controllers;

/**
 * Class HomeController
 * @package Modules\Core\Controllers
 */
class HomeController extends CoreController
{

    public function getHomepage()
    {
        if ($this->isLogged()) {
            $this->view('home');
        }

        $this->redirect('login');
    }
}
