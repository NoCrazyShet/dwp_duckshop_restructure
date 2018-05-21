<?php
require_once("./permanents/session.php");
require_once("./controllers/redirectController.php");
require_once("./controllers/dbController.php");
require_once("./controllers/loginController.php");
require_once("./controllers/shoppingCartController.php");
require_once("./indexPageControllers/indexController.php");
require_once ("./indexPageControllers/indexCompanyController.php");
$categories = $db->boundQuery("SELECT * FROM productCategory", NULL, 'fetchAll', PDO::FETCH_ASSOC);

    function myException($exception) {
        echo '<script language="javascript">';
        echo 'alert("Exception: '.$exception->getMessage().'");window.history.go(-1);';
        echo '</script>';
    }

set_exception_handler('myException');
?>

<html>
<head>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-15"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style/css/materialize.css">
    <link rel="stylesheet" type="text/css" href="style/css/custom.css">
</head>
<body>
<header>
    <nav id="nav" class="nav-extended">
        <div class="container">
            <div class="nav-wrapper">
                <a href="./index.php" class="brand-logo">
                    <img src="./images/top-duck.svg" style="height: 64px;">
                </a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a class="dropdown-button btn-flat white-text" href="?page=products" data-target="products">Products</a></li>
                    <li><a href="#" class="dropdown-button btn-flat white-text" data-target="shoppingCart"><i class="material-icons right">shopping_cart</i>Shopping Cart <b class="teal-text"><?php echo $sc->totalItems();?></b></a></li>
                    <li><?php if(!logged_in()) {?><a href="index.php?page=loginPage"><i class="large material-icons right">account_box</i><?php echo 'LOG IN';} else{?><a href="index.php?page=userPage"><i class="large material-icons">account_box</i><?php }?> </a></li>
                </ul>
            </div>
        </div>
    </nav>
    <ul id='products' class='dropdown-content productDrop'>
        <li>
            <a href="index.php?page=products">Products</a>
        </li>
        <li class="divider"></li>
            <?php foreach ($categories as $category) {?>
        <li>
            <a href="index.php?page=products&category=<?php echo $category['categoryID']?>">
                <?php echo $category['categoryName']?>
            </a>
        </li>
        <?php }?>
    </ul>
    <ul id="shoppingCart" class="dropdown-content">
        <li class="col s12">
            <a href="#">
                <div class="row">
                    <div class="col s12">
                        <?php
                            if(isset($_SESSION['shoppingCart']) && !empty($_SESSION['shoppingCart'])) {
                                echo "Your shopping cart total: ". $sc->cartTotal()."kr";
                            } elseif (empty($_SESSION['shoppingCart'])) {
                                echo "Your shopping cart is empty!";
                            }?>
                    </div>
                </div>
            </a>
        </li>
        <li class="divider" tabindex="-1"></li>
        <?php if(!empty($_SESSION['shoppingCart'])) {
            include("./indexPageControllers/shoppingCartViewController.php");
        } ?>
    </ul>
</header>

<main>

        <?php if(isset($_GET['page'])){
            include("indexPageControllers/indexViewController.php");}
        else {include("./pages/indexPage.php");}?>


</main>

<footer class="page-footer">
    <div class="container">
        <div class="row">
            <div class="col l6 s12">
                <h5>ABOUT US</h5>
                <p class="grey-text text-lighten-4"><?php echo $compInfo['aboutUs'] ?></p>
            </div>
            <div class="col l4 s12">
                <h5 class="white-text center">OPENING DAYS & HOURS</h5>
                <div class="col s6 m6 center">
                    <ul>
                        <?php foreach ($compInfo2 as $day) {
                            ?>
                            <li><?php echo $day['openDay'] ?></li>
                            <?php
                        } ?>
                    </ul>
                </div>
                <div class="col s6 m6 center">
                    <ul>
                        <?php foreach ($compInfo2 as $hour) {
                            ?>
                            <li><?php echo $hour['openHours'] ?></li>
                            <?php
                        } ?>
                    </ul>
                </div>
            </div>
            <div class="col l2 s12 center">
                <h5 class="white-text">CONTACT</h5>
                <ul>
                    <li><?php echo $compInfo['CVR'] ?></li>
                    <li><?php echo $compInfo['zipCode'] ?></li>
                    <li><?php echo $compInfo['street']?> <?php echo $compInfo['streetNumber'] ?></li>
                    <li><?php echo $compInfo['phone'] ?></li>
                    <li><?php echo $compInfo['eMail'] ?></li>
                <br>
                    <a class="btn-floating btn-large indigo lighten-1 pulse" href="./index.php?page=contact"><i class="material-icons">edit</i></a>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            © 2014 Copyright @ Top Duck Shop
        </div>
    </div>
</footer>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="style/js/bin/materialize.min.js"></script>
<script src="style/js/custom.js"></script>
</body>
</html>
