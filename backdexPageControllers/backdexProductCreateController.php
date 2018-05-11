<?php


if(!isset($_GET['case'])) {
    $productCase = NULL;
}elseif (isset($_GET['case'])) {
    $productCase = $_GET['case'];
}

if(isset($_GET['action'])) {
    $action = $_GET['action'];
    if($action == 'create') {
        $categoryID = htmlspecialchars(trim($_POST['categoryID']));
        $productDescription = htmlspecialchars(trim($_POST['productDescription']));
        $productStock = htmlspecialchars(trim($_POST['productStock']));
        $productPrice = htmlspecialchars(trim($_POST['productPrice']));
        $productName = htmlspecialchars(trim($_POST['productName']));


        $values = array('productIMG' => 'egg.jpg', 'categoryID' => $categoryID, 'productDescription' => $productDescription, 'productStock' => $productStock, 'productPrice' => $productPrice, 'productName' => $productName);
        $db->boundQuery("INSERT INTO product (productIMG, categoryID, productDescription, productStock, productPrice, productName) VALUES (:productIMG, :categoryID, :productDescription, :productStock, :productPrice, :productName)", $values);
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
        $imgCnt->imageUpload("SELECT productID FROM product WHERE productID = :productID", $selVal , 'productID', 'productIMG', "UPDATE product SET productIMG = :productIMG WHERE productID = :productID", "backdexProductsUpdate&id=$id");
    }
}





