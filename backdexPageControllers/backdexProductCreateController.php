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
        require_once ('./controllers/imageUploadController.php');
        require_once("./controllers/imageResizer.php");
        $imgCnt = new imageUploadController();
        $productIMG = $imgCnt->imageUpload("cut");

        $categoryID = $_POST['categoryID'];
        $productDescription = $_POST['productDescription'];
        $productStock = $_POST['productStock'];
        $productPrice = $_POST['productPrice'];
        $productName = $_POST['productName'];
        $productSpecial = $_POST['productSpecial'];

        if($productSpecial != NULL) {
            $db->boundQuery("UPDATE product SET productSpecial = NULL WHERE productSpecial IS NOT NULL");
            $values = array('productIMG' => $productIMG, 'categoryID' => $categoryID, 'productDescription' => $productDescription, 'productStock' => $productStock, 'productPrice' => $productPrice, 'productName' => $productName, 'productSpecial' => $productSpecial);
            $db->boundQuery("INSERT INTO product (productIMG, categoryID, productDescription, productStock, productPrice, productName, productSpecial) VALUES (:productIMG, :categoryID, :productDescription, :productStock, :productPrice, :productName, :productSpecial)", $values);
        }else {
            $values = array('productIMG' => $productIMG, 'categoryID' => $categoryID, 'productDescription' => $productDescription, 'productStock' => $productStock, 'productPrice' => $productPrice, 'productName' => $productName);
            $db->boundQuery("INSERT INTO product (productIMG, categoryID, productDescription, productStock, productPrice, productName, productSpecial) VALUES (:productIMG, :categoryID, :productDescription, :productStock, :productPrice, :productName, NULL)", $values);
        }

        $id = $db->connection->lastInsertId();
        redirect_to("./backdex.php?page=backdexProductsUpdate&id=$id&action=success");
    }
}






