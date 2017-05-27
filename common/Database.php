<?php

namespace common;

/**
 * Class Database
 * @package application\models\cv\database
 */
class Database
{
    /**
     * @var null|\PDO
     */
    private $connection = null;

    /**
     * @return null|\PDO
     */
    public function getConnection()
    {
        if (null === $this->connection) {
            $dbConfig = Config::getInstance()->get('database');
            $dsn = "mysql:host={$dbConfig['server']};dbname={$dbConfig['database']};charset={$dbConfig['charset']}";

            $this->connection = new \PDO($dsn, $dbConfig['user'], $dbConfig['password']);
        }

        return $this->connection;
    }

    /**
     * @param string $table
     * @return int
     */
    public function clearTable($table)
    {
        return $this->getConnection()->exec("TRUNCATE TABLE {$table}");
    }

    public function __destruct()
    {
        $this->connection = null;
    }
}
