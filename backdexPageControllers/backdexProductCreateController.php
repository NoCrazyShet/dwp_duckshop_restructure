<?php


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

        redirect_to("./backdex.php?page=backdexProductsUpdate&id=$id");
    }
}
