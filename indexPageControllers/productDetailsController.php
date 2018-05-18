<?php
$query = "SELECT * FROM product WHERE productID = :productID";
$values = array('productID' => $_GET['productID']);
$product = $db->boundQuery($query, $values, 'fetch', PDO::FETCH_ASSOC);