<?php
$db = new dbController();
$login = new loginController();
$sc = new shoppingCartController();

if(isset($_GET['action'])){
    if($_GET['action']=='addCart'){
        $productID = $_GET['productID'];
        $sc->addToCart();
        if(isset($_GET['category'])) {
            $categoryNr = $_GET['category'];
            $catName = $_GET['catName'];
            redirect_to("./index.php?page=products&category=$categoryNr&catName=$catName");
        }else{
            redirect_to("./index.php?page=products");
        }
    }elseif ($_GET['action']=='emptyCart'){
        $sc->emptyCart();
        redirect_to("./index.php");
    }elseif ($_GET['action']=='removeItem'){
        $sc->removeItem();
    }
}