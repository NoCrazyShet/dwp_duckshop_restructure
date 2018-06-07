<?php
ob_start();
require_once("./permanents/session.php");
require_once("./controllers/exceptionHandler.php");
require_once("./controllers/redirectController.php");
require_once("./controllers/dbController.php");
require_once("./controllers/loginController.php");
$db = new dbController();
$login = new loginController();
if(isset($_GET['page']) != 'backdexGate') {
    admin_level(3);
}
if(isset($_GET['action'])) {
    if($_GET['action'] == 'logout') {
        $login->logout();
    }
}
?>

<html>
<head>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="robots" content="noindex">
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-15"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style/css/materialize.css">
    <link rel="stylesheet" type="text/css" href="style/css/custom.css">
    <script src="style/js/bin/materialize.min.js"></script>
    <link rel="stylesheet" href="style/richtext/richtext.min.css">
</head>
<body>
<header>
    <nav class="grey">
        <div class="container">
            <div class="nav-wrapper">
                    <a href="./backdex.php?page=backdexPage" class="brand-logo">
                        <img src="./images/top-duck.svg" style="height: 64px;">
                    </a>
                <ul id="nav-mobile" class="right hide-on-med-and-down valign-wrapper">
                    <?php if(isset($_SESSION['userID'])){?>
                    <li><a href="backdex.php?page=backdexCompany">Edit Company</a></li>
                    <li><a href="backdex.php?page=backdexProducts">Edit products</a></li>
                    <li><a href="backdex.php?page=backdexNewsEdit">Edit news</a></li>
                    <!-- <li><a href="index.php?page=login">Login to your account</a></li> -->
                    <?php
                        echo '<li><form action="./backdex.php?action=logout" method="post" style="margin-bottom: 0; display: inherit;">';
                        echo '<button type="submit" class="waves-effect waves-light btn indigo lighten-1">Log Out</button>';
                        echo '</form></li>';
                    }?>
                </ul>
            </div>
        </div>
    </nav>
</header>

<main>
    <div class="container" style="margin-top: 50px;">
        <?php if(isset($_GET['page'])) {include("backdexPageControllers/backdexViewController.php");} else {include("./backdexPages/backdexGate.php");};?>
    </div>
</main>

<footer class="page-footer grey">
</footer>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="style/js/bin/materialize.min.js"></script>
<script src="style/richtext/jquery.richtext.min.js"></script>
<script src="style/js/custom.js"></script>
</body>
</html>
