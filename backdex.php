<?php
require_once("./permanents/session.php");
require_once("./controllers/redirectController.php");
require_once("./controllers/dbController.php");
require_once("./controllers/loginController.php");
require_once("./controllers/exceptionHandler.php");
$db = new dbController();
$login = new loginController();
confirm_admin_level();
var_dump($_SESSION)
?>

<html>
<head>
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textareaz' });</script>
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-15"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style/css/materialize.css">
    <link rel="stylesheet" type="text/css" href="style/css/custom.css">
    <script src="style/js/bin/materialize.min.js"></script>
</head>
<body>
<header>
    <nav>
        <div class="container">
            <div class="nav-wrapper">
                <a href="./backdex.php" class="brand-logo">Logo</a>
                <ul id="nav-mobile" class="right hide-on-med-and-down valign-wrapper">
                    <li><a href="backdex.php?page=backdexCompany">Edit Company</a></li>
                    <li><a href="backdex.php?page=backdexProducts">Edit products</a></li>
                    <li><a href="backdex.php?page=backdexNews">Edit news</a></li>
                    <!-- <li><a href="index.php?page=login">Login to your account</a></li> -->
                    <?php if(isset($_SESSION['userID'])){
                        echo '<li><form action="./backdex.php?action=logout" method="post" style="margin-bottom: 0; display: inherit;">';
                        echo '<button type="submit" class="waves-effect waves-light btn">Log Out</button>';
                        echo '</form></li>';
                    }?>
                </ul>
                <form class="hide-on-med-and-down" method="post" id="form1" action="./backdex.php?page=backdexProducts&action=search">
                    <div class="input-field" style="max-width: 400pt;">
                        <input id="search" name="search" type="search" required>
                        <label class="label-icon " for="search"><i class="material-icons">search</i></label>
                        <i class="material-icons">close</i>
                    </div>
                </form>
            </div>
        </div>
    </nav>
</header>

<main>
    <div class="container" style="margin-top: 50px;">
        <?php if(isset($_GET['page'])) {include("backdexPageControllers/backdexViewController.php");} else {include("./backdexPages/backdexPage.php");};?>
    </div>
</main>

<footer class="page-footer">
</footer>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="style/js/bin/materialize.min.js"></script>
<script src="style/js/custom.js"></script>
</body>
</html>
