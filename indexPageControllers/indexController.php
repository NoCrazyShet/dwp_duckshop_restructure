<?php

if(isset($_GET['action'])){
    if($_GET['action']=='addCart'){
        $sc = new shoppingCartController();
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
        $sc = new shoppingCartController();
        $sc->emptyCart();
    }
}