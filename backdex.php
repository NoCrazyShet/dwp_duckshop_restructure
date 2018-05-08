<?php
require_once("./permanents/session.php");
require_once("./controllers/redirectController.php");
require_once("./controllers/dbController.php");
require_once("./controllers/loginController.php");
$db = new dbController();
$login = new loginController();
?>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-15"/>
    <link rel="stylesheet" type="text/css" href="style/css/materialize.css">
    <link rel="stylesheet" type="text/css" href="style/css/custom.css">
    <script src="style/js/bin/materialize.min.js"></script>
</head>
<body>
<header>
    <nav>
        <div class="container">
            <div class="nav-wrapper">
                <a href="#" class="brand-logo">Logo</a>
                <ul id="nav-mobile" class="right hide-on-med-and-down valign-wrapper">
                    <li><a href="backdex.php?page=company">Edit Company</a></li>
                    <li><a href="backdex.php?page=backdexProducts">Edit products</a></li>
                    <!-- <li><a href="index.php?page=login">Login to your account</a></li> -->
                    <?php if(isset($_SESSION['userID'])){
                        echo '<li><form action="index.php?page=yard&login=false" method="post" style="margin-bottom: 0; display: inherit;">';
                        echo '<button type="submit" class="waves-effect waves-light btn">Log Out</button>';
                        echo '</form></li>';
                    }?>
                </ul>
            </div>
        </div>
    </nav>
</header>

<main>
    <div class="container center">
        <?php include("backdexPageControllers/backdexViewController.php");?>
    </div>
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
</body>
</html>
