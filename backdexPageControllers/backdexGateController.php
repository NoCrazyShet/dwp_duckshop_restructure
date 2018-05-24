<?php
var_dump($_SESSION);
if(!empty($_GET['login'])){
    if($_GET['login']=='true'){
        $login->loginAdmin();
    }
}