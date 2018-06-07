<?php
$allowed = array('products', 'yard', 'contact', 'loginPage', 'userPage', 'productDetails', 'newsView', 'newUser', 'cart');
$page = ( isset($_GET['page']) ) ? $_GET['page'] : 'index';
if ( in_array($page, $allowed) ) {
    include("./pages/$page.php");
}