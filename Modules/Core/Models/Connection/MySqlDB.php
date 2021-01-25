<?php

namespace Modules\Core\Models\Connection;

/**
 * Class MySqlDB
 * @package Modules\Core\Models\Connection
 */
abstract class MySqlDB
{
    /** @var \PDO */
    protected $pdo;

    /**
     * MySqlDB constructor.
     */
    public function __construct()
    {
        $config = parse_ini_file(__DIR__ . '/app.ini');

        $host = $config['host'];
        $database = $config['db_name'];
        $username = $config['db_user'];
        $password = $config['db_password'];

        try  {
            $connection = new \PDO("mysql:host=" . $host . ";dbname=" . $database, $username, $password);
            $connection -> setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

            $this->pdo =  $connection;

        } catch (\PDOException $error) {

            return $error->getMessage();
        }
    }
}
