<?php

$products = $db->runQuery("SELECT * FROM product", 'fetchAll', PDO::FETCH_ASSOC, NULL);
