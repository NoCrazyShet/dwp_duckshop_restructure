<?php
confirm_admin();
admin_level(3);
$categorySelect = $db->boundQuery("SELECT * FROM productCategory", NULL, 'fetchAll', PDO::FETCH_ASSOC);


if(!isset($_GET['case'])) {
    $productCase = NULL;
}elseif (isset($_GET['case'])) {
    $productCase = $_GET['case'];
}

if(isset($_GET['action'])) {
    $action = $_GET['action'];
    if($action == 'create') {
        $categoryID = $_POST['categoryID'];
        $productDescription = $_POST['productDescription'];
        $productStock = $_POST['productStock'];
        $productPrice = $_POST['productPrice'];
        $productName = $_POST['productName'];
        $productSpecial = $_POST['productSpecial'];

        if($productSpecial != NULL) {
            $values = array('productIMG' => 'egg.jpg', 'categoryID' => $categoryID, 'productDescription' => $productDescription, 'productStock' => $productStock, 'productPrice' => $productPrice, 'productName' => $productName, 'productSpecial' => $productSpecial);
            $db->boundQuery("INSERT INTO product (productIMG, categoryID, productDescription, productStock, productPrice, productName, productSpecial) VALUES (:productIMG, :categoryID, :productDescription, :productStock, :productPrice, :productName, :productSpecial)", $values);
        }else {
            $values = array('productIMG' => 'egg.jpg', 'categoryID' => $categoryID, 'productDescription' => $productDescription, 'productStock' => $productStock, 'productPrice' => $productPrice, 'productName' => $productName);
            $db->boundQuery("INSERT INTO product (productIMG, categoryID, productDescription, productStock, productPrice, productName, productSpecial) VALUES (:productIMG, :categoryID, :productDescription, :productStock, :productPrice, :productName, NULL)", $values);
        }

        $id = $db->connection->lastInsertId();


        redirect_to("./backdex.php?page=backdexProductsCreate&id=$id&case=picture");
    } elseif ($action == "productImage") {
        require_once ('./controllers/imageUploadController.php');
        require_once("./controllers/imageResizer.php");

        $values = array('productID' => $_GET['id']);
        $updateProduct = $db->boundQuery("SELECT * FROM product WHERE productID=:productID", $values, 'fetch', PDO::FETCH_ASSOC);
        $id = $updateProduct['productID'];
        $selVal = array('productID' => $updateProduct['productID']);
        $imgCnt = new imageUploadController();
        $imgCnt->imageUpload("SELECT productID FROM product WHERE productID = :productID", $selVal , 'productID', 'productIMG', "UPDATE product SET productIMG = :productIMG WHERE productID = :productID", "backdexProductsUpdate&id=$id", "cut");
    }
}






