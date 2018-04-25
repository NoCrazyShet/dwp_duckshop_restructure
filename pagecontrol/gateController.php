<?php
require_once("./permanents/session.php");
require_once("./controllers/redirectController.php");

if(logged_in()) {
    redirect_to("yard.php");
}

if(!empty($_GET['loginStatus'])) {
    if($_GET['loginStatus']=='incorrect'){
        echo "<p>Your password/email combination seems to be incorrect. <br>Please try again!</p>";
        $_GET['loginStatus'] = '';
    }
    else if($_GET['loginStatus']=='logout') {
        echo "<p>You are logged out</p>";
        $_GET['loginStatus'] = '';
    }
}