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
    if($_SESSION['acLe'] > $aL) {
        throw new Exception("You don't have access to this page");
    }
}
