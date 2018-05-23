<?php
session_start();

function logged_in(){
    return isset($_SESSION['customerID']);
}

function confirm_logged_in(){
    if(!logged_in()){
        redirect_to("./index.php");
    }
}
function logged_in_admin(){
    return isset($_SESSION['acLe']);
}

function confirm_admin() {
    if(!logged_in_admin()) {
        throw new Exception('You do not have access to this page');
    }

}

function admin_level($aL) {
    if(!isset($_SESSION['acLe'])) {
        throw new Exception("You don't seem to be logged in! Please log in.");
    }elseif ($_SESSION['acLe'] > $aL) {
        throw new Exception("You don't have access to this page, your clearance is not high enough. Contact your system administrator!");
    }
}
