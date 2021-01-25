<?php

namespace Modules\Core\Models;

use Modules\Core\Models\Connection\MySqlDB;

/**
 * Class Model
 * @package Modules\Core\Models
 */
class Model extends MySqlDB
{
    /**
     * Model constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return \PDO
     */
    public function pdo()
    {
        return $this->pdo;
    }
}
