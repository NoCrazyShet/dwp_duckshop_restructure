<?php
class shoppingCartController

{
    public function addToCart($x = 1) {
        $values = array('productID' => $_GET['productID']);
        $query = "SELECT * FROM product WHERE productID = :productID";

        $db = new dbController();
        $product = $db->boundQuery($query, $values, 'fetch');

        if (isset($_SESSION['shoppingCart'][$product['productID']]['qty'])){
            $currentQty = $_SESSION['shoppingCart'][$product['productID']]['qty']+$x;
        }elseif (!isset($_SESSION['shoppingCart'][$product['productID']]['qty'])) {
            $currentQty = $x;
        }


        $_SESSION['shoppingCart'][$_GET['productID']] = array('qty' => $currentQty, 'productName' => $product['productName'], 'productIMG' => $product['productIMG'], 'productPrice' => $product['productPrice']);
        $product = "";
    }
}