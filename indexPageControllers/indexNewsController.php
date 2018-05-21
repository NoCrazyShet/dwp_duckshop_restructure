<?php
$articleID = $_GET['articleID'];
$values = array('articleID' => $articleID);
$newsInfo2 = $db->boundQuery("SELECT * FROM news WHERE articleID=:articleID", $values, 'fetch', PDO::FETCH_ASSOC);