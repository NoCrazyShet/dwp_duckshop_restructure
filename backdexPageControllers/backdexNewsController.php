<?php
confirm_admin();
admin_level(2);


if(isset($_GET['articleID'])){
    $articleID = $_GET['articleID'];
    $values = array('articleID' => $articleID);
    $newsUpdate = $db->boundQuery("SELECT * FROM news WHERE articleID = :articleID", $values, 'fetch', PDO::FETCH_ASSOC);
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

        $values = array('articleText'       => $articleText,
                        'articleTitle'      => $articleTitle,
                        'articleSubTitle'   => $articleSubTitle,
                        'articleIMG'        => $articleIMG);

        $db->boundQuery("INSERT INTO news (  articleText, 
                                                    articleTitle, 
                                                    articleSubTitle, 
                                                    articleIMG) 
                                VALUES           (  :articleText, 
                                                    :articleTitle, 
                                                    :articleSubTitle, 
                                                    :articleIMG)",
                                                    $values);

        $articleID = $db->connection->lastInsertId();

        redirect_to("./backdex.php?page=backdexNews&articleID=$articleID&action=success");
    }elseif ($action == 'update') {
        if($_FILES['image']['name']){
            require_once ('./controllers/imageUploadController.php');
            require_once("./controllers/imageResizer.php");
            $imgCnt = new imageUploadController();
            $articleIMG = $imgCnt->imageUpload("news");
        }else {
            $articleIMG = $newsUpdate['articleIMG'];
        }
        $articleID = $newsUpdate['articleID'];
        $articleText = $_POST['articleText'];
        $articleTitle = $_POST['articleTitle'];
        $articleSubTitle = $_POST['articleSubTitle'];

        $values = array('articleText' => $articleText, 'articleTitle' => $articleTitle, 'articleSubTitle' => $articleSubTitle, 'articleIMG' => $articleIMG, 'articleID' => $articleID);
        $db->boundQuery("UPDATE news SET articleText = :articleText, articleTitle = :articleTitle, articleSubtitle = :articleSubTitle, articleIMG = :articleIMG WHERE articleID = :articleID", $values);


        redirect_to("./backdex.php?page=backdexNews&articleID=$articleID&action=success");
    }elseif ($action == 'success') {
        echo "<script>alert('Edit successful');</script>";
    }
}
