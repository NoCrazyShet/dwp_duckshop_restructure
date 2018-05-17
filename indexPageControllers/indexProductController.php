<?php
require_once("./controllers/shoppingCartController.php");

if(!isset($_GET['category'])){
    $query = "SELECT * FROM product";
$values = NULL;
} elseif(isset($_GET['category'])) {
    $query = "SELECT * FROM product WHERE categoryID = :categoryID";
    $categoryID = $_GET['category'];
    $values = array('categoryID' => $categoryID);
}

$products = $db->boundQuery("$query", $values, 'fetchAll', PDO::FETCH_ASSOC, NULL);
$rowCount = 0;

?>


<div class="row">
