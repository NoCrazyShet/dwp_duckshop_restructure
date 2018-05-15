<?php
require_once("./controllers/imageResizer.php");
$values = array('productID' => $_GET['id']);
$updateProduct = $db->boundQuery("SELECT * FROM product WHERE productID=:productID", $values, 'fetch', PDO::FETCH_ASSOC);
$categorySelect = $db->boundQuery("SELECT * FROM productCategory", NULL, 'fetchAll', PDO::FETCH_ASSOC);

if(isset($_GET['action'])) {
    $action = $_GET['action'];
    if ($action == "update") {

        $categoryID = htmlspecialchars(trim($_POST["categoryID"]));
        //$productIMG = htmlspecialchars(trim($_POST['productIMG']));
        $productDescription = htmlspecialchars(trim($_POST['productDescription']));
        $productPrice = htmlspecialchars(trim($_POST['productPrice']));
        $productName = htmlspecialchars(trim($_POST['productName']));
        $productID = htmlspecialchars(trim($updateProduct['productID']));

        $values = array('categoryID' => $categoryID, 'productDescription' => $productDescription, 'productPrice' => $productPrice, 'productName' => $productName, 'productID' => $productID);
        $stmt = $db->boundQuery("UPDATE product SET categoryID = :categoryID, productDescription = :productDescription, productPrice = :productPrice, productName = :productName WHERE productID = :productID", $values);
        redirect_to('./backdex.php?page=backdexProducts');
    }elseif ($action == "productImage") {
        require_once ('./controllers/imageUploadController.php');
        $selVal = array('productID' => $updateProduct['productID']);
        $imgCnt = new imageUploadController();
        $imgCnt->imageUpload("SELECT productID FROM product WHERE productID = :productID", $selVal , 'productID', 'productIMG', "UPDATE product SET productIMG = :productIMG WHERE productID = :productID", "backdexProducts", "cut");
    }
}
