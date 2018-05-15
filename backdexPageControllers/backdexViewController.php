<?php
$allowed = array('backdexYard', 'backdexCompany', 'backdexProducts', 'backdexProductsUpdate', 'backdexProductsCreate', 'backdexCompanyContact');
$page = ( isset($_GET['page']) ) ? $_GET['page'] : 'backdex';
if ( in_array($page, $allowed) ) {
    include("./backdexPages/$page.php");
}