<?php
//News
$newsInfo = $db->boundQuery("SELECT * FROM news ORDER BY articleID DESC LIMIT 3", NULL, 'fetchAll', PDO::FETCH_ASSOC);


$dailySpecial = $db->boundQuery("SELECT * FROM product WHERE productSpecial IS NOT NULL", NULL, 'fetch', PDO::FETCH_ASSOC);
if(is_bool($dailySpecial)){
    $dailySpecial = FALSE;
    require_once("./controllers/recommendationController.php");
    $rc = new recommendationController();
    $reco = $rc->selectRecommended(NULL, NULL);
    $things = array();
    foreach ($reco as $key) {
        array_push($things, $key);
    }
    $recommended = $db->boundQuery("SELECT * FROM product WHERE productID IN (:0, :1, :2)", $things, 'fetchAll', PDO::FETCH_ASSOC);
}
//}else {
//    $dailySpecial = FALSE;
//    require_once("./controllers/recommendationController.php");
//    $rc = new recommendationController();
//    $reco = $rc->selectRecommended(NULL, NULL);
//    $things = array();
//    foreach ($reco as $key) {
//        array_push($things, $key);
//    }
//    $recommended = $db->boundQuery("SELECT * FROM product WHERE productID IN (:0, :1, :2)", $things, 'fetchAll', PDO::FETCH_ASSOC);
//}
//var_dump($specialCheck);