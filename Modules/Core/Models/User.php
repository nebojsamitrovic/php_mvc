<?php

namespace Modules\Core\Models;

/**
 * Class User
 * @package Modules\Core\Models
 */
class User extends Model
{
    /**
     * User constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param $email
     * @param $password
     * @return mixed
     */
    public function findUser($email, $password)
    {
        $query = $this->pdo->prepare("SELECT * FROM users WHERE email = ?");

        try {
            $this->pdo->beginTransaction();
            $query->execute([$email]);
            $this->pdo->commit();

            $user = $query->fetch();

            if($user) {
                if (password_verify($password, $user['password'])) {

                    return $user['id'];
                }
            }

        } catch(\PDOExecption $e) {
            $this->pdo->rollback();
            print "Error!: " . $e->getMessage() . "</br>";
        }
    }

    /**
     * @param $email
     * @return bool
     */
    public function findUserByEmail($email)
    {
        $query = $this->pdo->prepare("SELECT * FROM users WHERE email = ?");

        try {
            $this->pdo->beginTransaction();
            $query->execute([$email]);
            $this->pdo->commit();

            $user = $query->fetch();

            if($user) {
                return true;
            }

        } catch(\PDOExecption $e) {
            $this->pdo->rollback();
            print "Error!: " . $e->getMessage() . "</br>";
        }
    }

    public function create($email, $username, $password)
    {
        $query = $this->pdo->prepare("INSERT INTO users (username, password, email) VALUES (?, ?, ?)");

        try {
            $this->pdo->beginTransaction();
            $execute = $query->execute([$username, password_hash($password, PASSWORD_DEFAULT), $email]);
            $this->pdo->commit();

            return $this->findUser($email, $password);

        } catch(\PDOExecption $e) {
            $this->pdo->rollback();
            print "Error!: " . $e->getMessage() . "</br>";
        }
    }
}
