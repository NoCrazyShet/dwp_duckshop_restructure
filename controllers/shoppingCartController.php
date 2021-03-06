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

        $_SESSION['shoppingCart'][$_GET['productID']] = array('qty' => $currentQty, 'productName' => $product['productName'], 'productIMG' => $product['productIMG'], 'productPrice' => $product['productPrice'], 'productID' => $product['productID'], 'productSpecial' => $product['productSpecial']);
        $product = "";
        $db->disconnetDB();
        }


    public function cartTotal(){
        $grandTotal = 0;
        foreach ($_SESSION['shoppingCart'] as $cartItem) {
            if(isset($cartItem['productSpecial']) && $cartItem['productSpecial'] != NULL) {
                $total = $cartItem['qty'] * $cartItem['productSpecial'];
            }else{
            $total = $cartItem['qty'] * $cartItem['productPrice'];
            }
            $grandTotal = $grandTotal + $total;
        }
        return $grandTotal;
    }

    public function emptyCart(){
        unset($_SESSION['shoppingCart']);
    }

    public function removeItem() {
        $productID = $_GET['productID'];
        $shoppingCart = $_SESSION['shoppingCart'];

        unset($shoppingCart[$productID]);
        $_SESSION['shoppingCart'] = $shoppingCart;
    }

    public function totalItems(){
        $totalQty = 0;
        if(!empty($_SESSION['shoppingCart'])) {
        foreach ($_SESSION['shoppingCart'] as $cartItem) {
            $totalQty = $totalQty + $cartItem['qty'];
        }
        }
        return $totalQty;
    }
}