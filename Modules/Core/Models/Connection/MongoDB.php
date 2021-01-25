<?php

namespace Modules\Core\Models\Connection;

/**
 * Class MongoDB
 * @package Modules\Core\Models\Connection
 */
abstract class MongoDB
{
    /**
     * MongoDB constructor.
     */
    public function __construct()
    {
        try {
        $mongoClient = new MongoClient();
        $db = $mongoClient->test;

        return $db;

        } catch (Exception $error) {

            return $error->getMessage();
        }
    }
}
