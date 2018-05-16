<?php
class shoppingCartController

{
    public function addToCart() {
        $values = array('productID' => $_GET['productID']);
        $query = "SELECT * FROM product WHERE productID = :productID";

        $db = new dbController();
        $product = $db->boundQuery($query, $values, 'fetch');

        $currentQty = $_SESSION['products'][$_GET['productID']]['qty']+1;

        $_SESSION['products'][$_GET['productID']] = array('qty' => $currentQty, 'productName' => $product['productName'], 'productIMG' => $product['productIMG'], 'productPrice' => $product['productPrice']);
        $product = "";
    }
}