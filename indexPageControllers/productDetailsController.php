<?php
require_once("./controllers/recommendationController.php");
$rc = new recommendationController();

$query = "SELECT * FROM product WHERE productID = :productID";
$values = array('productID' => $_GET['productID']);
$product = $db->boundQuery($query, $values, 'fetch', PDO::FETCH_ASSOC);

//Adding cartItems to session and choosing recommended products
$rc->addToSession($product['productID']);
$reco = $rc->selectRecommended($product['categoryID'], $product['productID']);
$things = array();
foreach ($reco as $key) {
    array_push($things, $key);
}
$recommended = $db->boundQuery("SELECT * FROM product WHERE productID IN (:0, :1, :2)", $things, 'fetchAll', PDO::FETCH_ASSOC);

