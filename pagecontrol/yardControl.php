<?php
if(!empty($_GET['login'])){
    if($_GET['login']=='false'){
        $login->logout();
    }
}