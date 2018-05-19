<?php
require_once("./controllers/recommendationController.php");
$rc = new recommendationController();

$query = "SELECT * FROM product WHERE productID = :productID";
$values = array('productID' => $_GET['productID']);
$product = $db->boundQuery($query, $values, 'fetch', PDO::FETCH_ASSOC);

$rc->addToSession($product['productID']);
$wat = $rc->selectRandomItems($product['productID']);
var_dump($wat);
