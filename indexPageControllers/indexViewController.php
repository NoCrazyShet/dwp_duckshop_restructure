<?php
$allowed = array('products', 'gate', 'yard');
$page = ( isset($_GET['page']) ) ? $_GET['page'] : 'index';
if ( in_array($page, $allowed) ) {
    include("./pages/$page.php");
}