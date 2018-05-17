<?php
$allowed = array('products', 'gate', 'yard', 'contact', 'loginPage', 'userPage');
$page = ( isset($_GET['page']) ) ? $_GET['page'] : 'index';
if ( in_array($page, $allowed) ) {
    include("./pages/$page.php");
}