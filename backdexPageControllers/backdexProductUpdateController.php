<?php
require_once("./controllers/imageResizer.php");
confirm_admin();
admin_level(3);
$values = array('productID' => $_GET['id']);
$updateProduct = $db->boundQuery("SELECT * FROM product WHERE productID=:productID", $values, 'fetch', PDO::FETCH_ASSOC);
$categorySelect = $db->boundQuery("SELECT * FROM productCategory", NULL, 'fetchAll', PDO::FETCH_ASSOC);

if(isset($_GET['action'])) {
    $action = $_GET['action'];
    if ($action == 'update') {
        if($_FILES['image']['name']){
        require_once ('./controllers/imageUploadController.php');
        require_once("./controllers/imageResizer.php");
        $imgCnt = new imageUploadController();
        $productIMG = $imgCnt->imageUpload("cut");
        }else {
            $productIMG = $updateProduct['productIMG'];
        }

        $categoryID = $_POST["categoryID"];
        $productDescription = $_POST['productDescription'];
        $productStock = $_POST['productStock'];
        $productPrice = $_POST['productPrice'];
        $productName = $_POST['productName'];
        $productSpecial = $_POST['productSpecial'];
        $productID = $updateProduct['productID'];

        if($productSpecial != NULL) {
            $db->boundQuery("UPDATE product SET productSpecial = NULL WHERE productSpecial IS NOT NULL");
            $values = array('productIMG' => $productIMG, 'categoryID' => $categoryID, 'productDescription' => $productDescription, 'productPrice' => $productPrice, 'productName' => $productName, 'productID' => $productID, 'productStock' => $productStock, 'productSpecial' => $productSpecial);
            $stmt = $db->boundQuery("UPDATE product SET productIMG = :productIMG, categoryID = :categoryID, productDescription = :productDescription, productPrice = :productPrice, productName = :productName, productStock = :productStock, productSpecial = :productSpecial WHERE productID = :productID", $values);
        } else {
            $values = array('productIMG' => $productIMG, 'categoryID' => $categoryID, 'productDescription' => $productDescription, 'productPrice' => $productPrice, 'productName' => $productName, 'productID' => $productID);
            $stmt = $db->boundQuery("UPDATE product SET productIMG = :productIMG, categoryID = :categoryID, productDescription = :productDescription, productPrice = :productPrice, productName = :productName, productSpecial = NULL WHERE productID = :productID", $values);
        }
        redirect_to("./backdex.php?page=backdexProductsUpdate&id=$productID&action=usuccess");
    }elseif ($action == 'success'){
        echo '<script>alert("Product Created Successfully!");</script>';
    }elseif ($action == 'usuccess'){
        echo '<script>alert("Product Updated Successfully!");</script>';
    }
}
