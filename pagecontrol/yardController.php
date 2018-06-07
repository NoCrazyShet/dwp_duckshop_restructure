<?php
confirm_logged_in();

if(!empty($_GET['login'])){
    if($_GET['login']=='false'){
        $login->logout();
    }
}