<?php
class dbController
{
    private $host = 'mysql:dbname=duckshopdb;host=localhost';
    private $user = 'root';
    private $password = '123456';
    public $connection;
    public $result;


    function connectDB() {
        $connection = new PDO($this->host, $this->user, $this->password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_PERSISTENT=>false));
        return $connection;
    }

    function boundQuery($query, $values = NULL, $fetchType = NULL, $arrayType = NULL, $types = false) {
        try{
        $this->connection = $this->connectDB();
        $stmt = $this->connection->prepare($query);
            if(isset($values)){
                foreach($values as $key => $value) {
                    $value = trim(filter_var($value, FILTER_SANITIZE_STRING));
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
        $done = $stmt->execute();
        if($fetchType != NULL){
            $stored = $stmt->$fetchType($arrayType);
            if(!is_bool($stored)){
            array_walk_recursive($stored, function(&$value){
                $value = trim(filter_var($value, FILTER_SANITIZE_STRING));
            });
            }
            //$this->connection = NULL;
            return $stored;
        } else {
            //$this->connection = NULL;
            return $done;
        }}catch (PDOException $e){
            throw new Exception($e->getMessage(), (int)$e->getCode());
        }

    }

    function disconnetDB() {
        $this->connection = NULL;
    }

}