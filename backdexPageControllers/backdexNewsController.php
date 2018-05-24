<?php
confirm_admin();
admin_level(2);
$newsInfo = $db->boundQuery("SELECT * FROM news ORDER BY articleID DESC LIMIT 3", NULL, 'fetchAll', PDO::FETCH_ASSOC);

if(!isset($_GET['case'])) {
    $newsCase = NULL;
}elseif (isset($_GET['case'])) {
    $newsCase = $_GET['case'];
}

if(isset($_GET['action'])) {
    $action = $_GET['action'];
    if ($action == 'create') {
        require_once ('./controllers/imageUploadController.php');
        require_once("./controllers/imageResizer.php");
        $imgCnt = new imageUploadController();
        $articleIMG = $imgCnt->imageUpload("news");

        $articleText = $_POST['articleText'];
        $articleTitle = $_POST['articleTitle'];
        $articleSubTitle = $_POST['articleSubTitle'];

        $values = array('articleText' => $articleText, 'articleTitle' => $articleTitle, 'articleSubTitle' => $articleSubTitle, 'articleIMG' => $articleIMG);
        $db->boundQuery("INSERT INTO news (articleText, articleTitle, articleSubTitle, articleIMG) VALUES (:articleText, :articleTitle, :articleSubTitle, :articleIMG)", $values);
        redirect_to("./backdex.php?page=backdexPage");

    }
}