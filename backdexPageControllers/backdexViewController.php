<?php
confirm_admin();
$allowed = array('backdexYard', 'backdexCompany', 'backdexProducts', 'backdexProductsUpdate', 'backdexProductsCreate', 'backdexCompanyContact', 'backdexNews');
$page = ( isset($_GET['page']) ) ? $_GET['page'] : 'backdex';
if ( in_array($page, $allowed) ) {
    include("./backdexPages/$page.php");
}