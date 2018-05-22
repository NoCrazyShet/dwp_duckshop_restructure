<?php
require_once("./controllers/shoppingCartController.php");

$searchString = "";
if(isset($_POST['search'])){
    $searchString = $_POST['search'];
}

if(isset($_GET['action'])) {
    if($_GET['action'] == 'search') {
        $query = "SELECT * FROM product WHERE productName OR productDescription LIKE CONCAT( '%' :search '%') ";
        $values = array('search' => $searchString);
    }
} elseif(!isset($_GET['category']) && !isset($_GET['action'])){
    $query = "SELECT * FROM product";
    $values = NULL;
} elseif(isset($_GET['category'])) {
    $query = "SELECT * FROM product WHERE categoryID = :categoryID";
    $categoryID = $_GET['category'];
    $values = array('categoryID' => $categoryID);
}

$products = $db->boundQuery($query, $values, 'fetchAll', PDO::FETCH_ASSOC, NULL);
$rowCount = 0;




?>


<div class="row">
