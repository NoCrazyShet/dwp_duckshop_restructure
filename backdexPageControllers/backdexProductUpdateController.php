<?php
require_once("./controllers/imageResizer.php");
confirm_admin();
admin_level(3);
$values = array('productID' => $_GET['id']);
$updateProduct = $db->boundQuery("SELECT * FROM product WHERE productID=:productID", $values, 'fetch', PDO::FETCH_ASSOC);
$categorySelect = $db->boundQuery("SELECT * FROM productCategory", NULL, 'fetchAll', PDO::FETCH_ASSOC);

if(isset($_GET['action'])) {
    $action = $_GET['action'];
    if ($action == "update") {

        $categoryID = $_POST["categoryID"];
        $productDescription = $_POST['productDescription'];
        $productPrice = $_POST['productPrice'];
        $productName = $_POST['productName'];
        $productID = $updateProduct['productID'];
        $productSpecial = $_POST['productSpecial'];

        if($productSpecial != NULL) {
            $db->boundQuery("UPDATE product SET productSpecial = NULL WHERE productSpecial IS NOT NULL");
            $values = array('categoryID' => $categoryID, 'productDescription' => $productDescription, 'productPrice' => $productPrice, 'productName' => $productName, 'productID' => $productID, 'productSpecial' => $productSpecial);
            $stmt = $db->boundQuery("UPDATE product SET categoryID = :categoryID, productDescription = :productDescription, productPrice = :productPrice, productName = :productName, productSpecial = :productSpecial WHERE productID = :productID", $values);
        } else {
            $values = array('categoryID' => $categoryID, 'productDescription' => $productDescription, 'productPrice' => $productPrice, 'productName' => $productName, 'productID' => $productID);
            $stmt = $db->boundQuery("UPDATE product SET categoryID = :categoryID, productDescription = :productDescription, productPrice = :productPrice, productName = :productName, productSpecial = NULL WHERE productID = :productID", $values);
        }

        redirect_to('./backdex.php?page=backdexProducts');
    }elseif ($action == "productImage") {
        require_once ('./controllers/imageUploadController.php');
        $selVal = array('productID' => $updateProduct['productID']);
        $imgCnt = new imageUploadController();
        $imgCnt->imageUpload("SELECT productID FROM product WHERE productID = :productID", $selVal , 'productID', 'productIMG', "UPDATE product SET productIMG = :productIMG WHERE productID = :productID", "backdexProducts", "cut");
    }
}
