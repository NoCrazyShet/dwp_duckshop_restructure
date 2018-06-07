<?php
$compInfo2 = $db->boundQuery("SELECT * FROM companyContact", NULL, 'fetchAll', PDO::FETCH_ASSOC, NULL);
$compInfo = $db->boundQuery("SELECT * FROM companyInfo", NULL, 'fetch', PDO::FETCH_ASSOC, NULL);