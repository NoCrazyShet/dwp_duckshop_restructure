<?php
$allowed = array('products', 'gate', 'yard', 'contact', 'loginPage', 'userPage', 'productDetails');
$page = ( isset($_GET['page']) ) ? $_GET['page'] : 'index';
if ( in_array($page, $allowed) ) {
    include("./pages/$page.php");
}