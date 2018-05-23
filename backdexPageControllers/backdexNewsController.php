<?php
confirm_admin_level();
$newsInfo = $db->boundQuery("SELECT * FROM news ORDER BY articleID DESC LIMIT 3", NULL, 'fetchAll', PDO::FETCH_ASSOC);

if(!isset($_GET['case'])) {
    $newsCase = NULL;
}elseif (isset($_GET['case'])) {
    $newsCase = $_GET['case'];
}

if(isset($_GET['action'])) {
    $action = $_GET['action'];
    if ($action == 'create') {

        $articleText = $_POST['articleText'];
        $articleTitle = $_POST['articleTitle'];
        $articleSubTitle = $_POST['articleSubTitle'];
        $articleIMG = $_POST['articleIMG'];

$values = array('articleText' => $articleText, 'articleTitle' => $articleTitle, 'articleSubTitle' => $articleSubTitle, 'articleIMG' => 'egg.jpg');
$db->boundQuery("INSERT INTO news (articleText, articleTitle, articleSubTitle, articleIMG) VALUES (:articleText, :articleTitle, :articleSubTitle, :articleIMG)", $values);
$id = $db->connection->lastInsertId();
redirect_to("./backdex.php?page=backdexNews&id=$id&case=picture");
    }
    elseif ($action == "newsImage") {
        require_once ('./controllers/imageUploadController.php');
        require_once("./controllers/imageResizer.php");

        $values = array('articleID' => $_GET['id']);
        $updateArticle = $db->boundQuery("SELECT * FROM news WHERE articleID=:articleID", $values, 'fetch', PDO::FETCH_ASSOC);
        $id = $updateArticle['articleID'];
        $selVal = array('articleID' => $updateArticle['articleID']);
        $imgCnt = new imageUploadController();
        $imgCnt->imageUpload("SELECT articleID FROM news WHERE articleID = :articleID", $selVal, 'articleID', 'articleIMG', "UPDATE news SET articleIMG = :articleIMG WHERE articleID = :articleID", "backdexNews&id=$id", "news" );
        redirect_to("./backdex.php?page=backdex");
    }
}