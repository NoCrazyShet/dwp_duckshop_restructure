<?php
require_once("./permanents/session.php");
require_once("./controllers/redirectController.php");
require_once("./controllers/dbController.php");
require_once("./controllers/loginController.php");
require_once("./controllers/shoppingCartController.php");
$db = new dbController();
$login = new loginController();
$sc = new shoppingCartController();
$categories = $db->boundQuery("SELECT * FROM productCategory");

?>

<html>
<head>
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
                <a href="./index.php" class="brand-logo">Logo</a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a class="dropdown-button btn-flat white-text" href="?page=products" data-target="dropdown1"><?php if(!isset($_GET['category'])) { echo "Products" ;} elseif (isset($_GET['category']) && isset($_GET['catName'])) {echo "Products - "; echo $_GET['catName'];} ?></a></li>
                    <li><a href="index.php?page=login">Login to your account</a></li>
                    <li><a href="#" class="dropdown-button btn-flat white-text" data-target="cart"><i class="material-icons">shopping_cart</i></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <ul id='dropdown1' class='dropdown-content productDrop'>
        <li><a href="index.php?page=products">Products</a></li>
        <li class="divider"></li>
        <?php foreach ($categories as $category) {?>
        <li><a href="index.php?page=products&category=<?php echo $category['categoryID']?>&catName=<?php echo $category['categoryName']?>"><?php echo $category['categoryName']?></a></li>
        <?php }?>
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
                <h5 class="white-text">Footer Content</h5>
                <p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer content.</p>
            </div>
            <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Links</h5>
                <ul>
                    <li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
                    <li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
                    <li><a class="grey-text text-lighten-3" href="#!">Link 3</a></li>
                    <li><a class="grey-text text-lighten-3" href="#!">Link 4</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            © 2014 Copyright Text
            <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
        </div>
    </div>
</footer>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="style/js/bin/materialize.min.js"></script>
<script src="style/js/custom.js"></script>
</body>
</html>
