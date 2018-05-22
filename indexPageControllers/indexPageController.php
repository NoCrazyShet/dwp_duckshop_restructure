<?php
//News
$newsInfo = $db->boundQuery("SELECT * FROM news ORDER BY articleID DESC LIMIT 3", NULL, 'fetchAll', PDO::FETCH_ASSOC);

$dailySpecial = $db->boundQuery("SELECT * FROM product WHERE productSpecial IS NOT NULL", NULL, 'fetch', PDO::FETCH_ASSOC);