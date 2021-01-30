<?php

namespace Modules\Core\Controllers;

use Modules\Core\Models\User;

/**
 * Class LoginController
 * @package Modules\Core\Controllers
 */
class AuthController extends CoreController
{
    /** @var User */
    private User $user;

    /**
     * AuthController constructor.
     * @param User $user
     */
    public function __construct(
        User $user
    )
    {
        $this->user = $user;
    }

    public function login()
    {
        if(isset($_COOKIE['lock_login']) && time() < $_COOKIE['lock_login']) {
            
            $_SESSION['login_failed'] = 0;
            setcookie('lock_login', time() + 600, time() + 600, "/");
            $this->message = 'Too many failed login attempts. Please try again in 10 minutes.';

            return $this->view('login_form');
        }

        if ($this->isLogged()) {

            return $this->redirect('home');

        } else if (isset($_POST['loginEmail']) && isset($_POST['loginPassword'])) {

            $email = $_POST['loginEmail'];
            $password = $_POST['loginPassword'];

            $user = $this->user->findUser($email, $password);

            if($user) {
                $_SESSION['userID'] = $user;
                $_SESSION['login_failed'] = 0;

                return $this->redirect('home');

            } else {
                if(isset($_SESSION['login_failed'])) {
                    $_SESSION['login_failed'] = $_SESSION['login_failed'] + 1;
                    
                    if($_SESSION['login_failed'] > 3) {
                        setcookie('lock_login', time() + 600, time() + 600, "/");
                    }
                } else {
                    $_SESSION['login_failed'] = 1;
                }
                $this->message = 'Login failed, wrong user credentials.';

                return $this->view('login_form');
            }
        } else {
            return $this->view('login_form');
        }
    }

    public function logout()
    {
        session_destroy();
        return $this->redirect('login');
    }

    public function register()
    {
        if ($this->isLogged()) {

            return $this->redirect('home');

        } else if (
            isset($_POST['registerEmail']) &&
            isset($_POST['registerUsername']) &&
            isset($_POST['registerPassword']) &&
            isset($_POST['passwordCheck']))
        {
            $email = $_POST['registerEmail'];
            $username = $_POST['registerUsername'];
            $password = $_POST['registerPassword'];
            $passwordCheck = $_POST['passwordCheck'];

            if($password !== $passwordCheck) {
                $this->message = 'Your password and confirmation password do not match.';
                return $this->view('registration_form');
            }

            if($this->user->findUserByEmail($email)) {
                $this->message = 'User with this email exists.';
                return $this->view('registration_form');
            }

            $user = $this->user->create($email, $username, $password);

            if($user) {
                $_SESSION['userID'] = $user;
                return $this->redirect('home');
            }
        } else {
            return $this->view('registration_form');
        }
    }
}
