<?php
session_start();

function logged_in(){
    return isset($_SESSION['userID']);
}

function confirm_logged_in(){
    if(!logged_in()){
        redirect_to("./index.php?page=gate");
    }
}

function is_admin() {
    if(logged_in()) {
        if(isset($_SESSION['acLe'])){
            return isset($_SESSION['acLe']);
        }
    }
}

function confirm_admin_level() {
    if(!is_admin()) {
        redirect_to("./index.php");
    }
}