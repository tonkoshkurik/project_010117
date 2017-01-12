<?php

/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 11.01.2017
 * Time: 14:09
 */
final class DbComponent extends Component
{
    private $connection;

    public function init()
    {
        // TODO: Implement init() method.
    }

    public function __destruct() {
        $this->disconnect();
    }


    public function connect() {
        $dsn = ('mysql:'
            . 'host=' . DB_HOST . ';'
//            . 'port=' . $this->db_config['port'] . ';'
            . 'dbname=' . DB_NAME . ';'
        );

        try{
            $this->connection = new \PDO($dsn, DB_USER, DB_PASS);
        } catch (\PDOException $e) {
            print " Connect to db Error!: " . $e->getMessage() . "<br/>";
            die();
        }

        return $this->connection;
    }

    public function disconnect() {
        $this->connection = null;
    }
}