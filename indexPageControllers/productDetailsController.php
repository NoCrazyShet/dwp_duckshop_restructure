<?php
require_once("./controllers/recommendationController.php");
$rc = new recommendationController();

$query = "SELECT * FROM product WHERE productID = :productID";
$values = array('productID' => $_GET['productID']);
$product = $db->boundQuery($query, $values, 'fetch', PDO::FETCH_ASSOC);

$rc->addToSession($product['productID']);
$wat = $rc->selectRecommended($product['categoryID'], $product['productID']);
$recommended = array();
foreach ($wat as $id) {
    $values = array('productID' => $id);
    $item = $db->boundQuery("SELECT * FROM product WHERE productID = :productID", $values, 'fetchAll', PDO::FETCH_ASSOC);
    array_push($recommended, $item);
}
