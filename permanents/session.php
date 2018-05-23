<?php
session_start();

function logged_in(){
    return isset($_SESSION['customerID']);
}

function logged_in_admin(){
    return isset($_SESSION['acLe']);
}

function confirm_logged_in(){
    if(!logged_in()){
        redirect_to("./index.php");
    }
}

function is_admin() {
    if(logged_in_admin()) {
        if(isset($_SESSION['acLe'])){
            return isset($_SESSION['acLe']);
        }
    }
}

function confirm_admin_level() {
    if(!logged_in_admin()) {
        throw new Exception('You do not have access to this page');
        redirect_to("./index.php");

    }
}