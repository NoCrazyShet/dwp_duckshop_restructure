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

    function runQuery2($query, $fetchType, $arrayType) {
        $this->result = $this->connection->query($query);
        $stored = $this->result->$fetchType($arrayType);
        return $stored;
    }

    function runQuery($query, $fetchType, $arrayType, $exe) {
        $sql = $query;
        $stmt = $this->connection->prepare($sql);
        $stmt->execute($exe);
        $stored = $stmt->$fetchType($arrayType);
        return $stored;
    }

    function boundQuery($query, $values, $fetchType = NULL, $arrayType = NULL, $types = false) {
        $stmt = $this->connection->prepare($query);
        if(isset($values)){
        foreach($values as $key => $value) {
            if($types) {
                $stmt->bindValue(":$key", $value, $types[$key]);
            } else {
                if(is_int($value))          { $param = PDO::PARAM_INT; }
                elseif (is_bool($value))    { $param = PDO::PARAM_BOOL; }
                elseif (is_null($value))    { $param = PDO::PARAM_NULL; }
                elseif (is_string($value))  { $param = PDO::PARAM_STR; }
                else                        { $param = FALSE; }

                if($param) $stmt->bindValue(":$key", $value, $param);
            }
        }
        }
        $stmt->execute();
        if($fetchType != NULL){
            $stored = $stmt->$fetchType($arrayType);
            return $stored;
        } else {
            return $stmt;
        }

    }

    function updateEntry($query) {
        $stmt = $this->connection->prepare("$query");
        $stmt->execute();
    }

}