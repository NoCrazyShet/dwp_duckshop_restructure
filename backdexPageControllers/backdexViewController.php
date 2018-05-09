<?php
$allowed = array('backdexYard', 'company', 'backdexProducts', 'backdexProductsUpdate');
$page = ( isset($_GET['page']) ) ? $_GET['page'] : 'backdex';
if ( in_array($page, $allowed) ) {
    include("./backdexPages/$page.php");
}