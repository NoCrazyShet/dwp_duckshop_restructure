<?php
class dbController
{
    private $host = 'mysql:dbname=duckshopdb;host=localhost';
    private $user = 'root';
    private $password = '123456';
    private $connection;
    public $result;

    function __construct()
    {
        $this->connection = $this->connectDB();
    }

    function connectDB() {
        $connection = new PDO($this->host, $this->user, $this->password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_PERSISTENT=>false));
        return $connection;
    }

    function runQuery($query, $fetchType, $arrayType) {
        $this->result = $this->connection->query($query);
        $stored = $this->result->$fetchType($arrayType);
        return $stored;
    }

}