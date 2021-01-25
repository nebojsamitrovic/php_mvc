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
        if ($this->isLogged()) {

            $this->redirect('home');

        } else if (isset($_POST['loginEmail']) && isset($_POST['loginPassword'])) {

            $email = $_POST['loginEmail'];
            $password = $_POST['loginPassword'];

            $user = $this->user->findUser($email, $password);

            if($user) {
                $_SESSION['userID'] = $user;
                $this->redirect('home');

            } else {
                $this->message = 'Login failed, wrong user credentials.';
                $this->view('login_form');
            }
        } else {
            $this->view('login_form');
        }
    }

    public function logout()
    {
        session_destroy();
        $this->redirect('login');
    }

    public function register()
    {
        if ($this->isLogged()) {

            $this->redirect('home');

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
                $this->view('registration_form');
            }

            if($this->user->findUserByEmail($email)) {
                $this->message = 'User with this email exists.';
                $this->view('registration_form');
            }

            $user = $this->user->create($email, $username, $password);

            if($user) {
                $_SESSION['userID'] = $user;
                $this->redirect('home');
            }
        } else {
            $this->view('registration_form');
        }
    }
}
