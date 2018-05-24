<?php
require_once("./controllers/redirectController.php");
$db = new dbController();
$login = new loginController();
$sc = new shoppingCartController();

if(isset($_GET['action'])){
    if($_GET['action']=='addCart'){
        $productID = $_GET['productID'];
        if(isset($_POST['quantity'])){
            $sc->addToCart($_POST['quantity']);
        }elseif (!isset($_POST['quantity'])){
        $sc->addToCart();
        }
        if(isset($_GET['category'])) {
            $categoryNr = $_GET['category'];
            redirect_to("./index.php?page=products&category=$categoryNr");
        }elseif (isset($_GET['page']) && $_GET['page']=='productDetails'){
            $productID = $_GET['productID'];
            redirect_to("./index.php?page=productDetails&productID=$productID");
        }
        else{
            redirect_to("./index.php?page=products");
        }
    }elseif ($_GET['action']=='emptyCart'){
        $sc->emptyCart();
        redirect_to("./index.php");
    }elseif ($_GET['action']=='removeItem'){
        $sc->removeItem();
    }
}