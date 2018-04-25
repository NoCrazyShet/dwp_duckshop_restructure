<?php
//This document establishes the connection via PDO: It has basic error handling
require("constants.php");
try {
    $connection = new PDO(DB_SERVER, DB_USER, DB_PASS);
    echo 'Connection succesful';
} catch(PDOException $e){
    echo 'Connection failed: ' . $e->getMessage();
}