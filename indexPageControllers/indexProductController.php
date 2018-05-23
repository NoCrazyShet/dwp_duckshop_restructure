<?php
require_once("./controllers/shoppingCartController.php");
require_once("./controllers/paginationController.php");
$pag = new paginationController();


$searchString = "";
if(isset($_POST['search'])){
    $searchString = $_POST['search'];
}

if(isset($_GET['action'])) {
    if($_GET['action'] == 'search') {
        $query = "SELECT * FROM product WHERE productName LIKE CONCAT( '%' :search '%') or productDescription LIKE CONCAT ( '%' :search '%')";
        $values = array('search' => $searchString);
        $_SESSION['searchString'] = $searchString;
    }
} elseif(!isset($_GET['category']) && !isset($_GET['action'])){
    $query = "SELECT * FROM product";
    $values = NULL;
} elseif(isset($_GET['category'])) {
    $query = "SELECT * FROM product WHERE categoryID = :categoryID";
    $categoryID = $_GET['category'];
    $values = array('categoryID' => $categoryID);
}

$rowCount = 0;
$data = $db->boundQuery($query, $values, 'fetchAll', PDO::FETCH_ASSOC, NULL);
$numbers = $pag->paginate($data, 12);
$product = $pag->fetchResult();





