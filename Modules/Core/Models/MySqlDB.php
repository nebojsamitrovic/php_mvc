<?php

namespace Modules\Core\Models;

/**
 * Class MySqlDB
 * @package Modules\Core\Models
 */
abstract class MySqlDB
{
    /**
     * MySqlDB constructor.
     */
    public function __construct()
    {
        require_once dirname(__DIR__) . 'app.ini';

        $config = parse_ini_file('app.ini');

        $host = $config['host'];
        $database = $config['db_name'];
        $username = $config['db_user'];
        $password = $config['db_password'];

        try  {
            $connection = new PDO("mysql:host=" . $host . ";dbname=" . $database, $username, $password);
            $connection -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $connection;

        } catch (PDOException $error) {

            return $error->getMessage();
        }
    }
}
