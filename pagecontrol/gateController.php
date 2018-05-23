<?php
if(logged_in()) {
    redirect_to("index.php?page=yard");
}

if(!empty($_GET['loginStatus'])) {
    if($_GET['loginStatus']=='incorrect'){
        $_GET['loginStatus'] = '';
    }
    else if($_GET['loginStatus']=='logout') {
        $_GET['loginStatus'] = '';
    }
}

if(!empty($_GET['userLogin'])){
    if($_GET['userLogin']=='true'){
        $login->loginUser();
    }
}