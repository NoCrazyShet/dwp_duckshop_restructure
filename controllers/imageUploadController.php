<?php
require_once("../controllers/imageResizer.php");
require_once("../controllers/dbController.php");
require_once("../controllers/redirectController.php");

define("MAX_SIZE", "3000");
$upmsg = array();

if (isset($_POST['submit'])) {
    if ($_FILES['image']['name']) {
        $imagename = $_FILES['image']['name'];
        $file = $_FILES['image']['tmp_name'];
        $image_type = getimagesize($file);
        if ($image_type[2]==2 || $image_type[2]==1 || $image_type[2]==3) {
            $size = filesize($file);
            if ($size<MAX_SIZE*1024) {
                $prefix = uniqid();
                $iName = $prefix."_".$imagename;
                $newName = "../images/".$iName;
                $resObj = new imageResizer();
                $resObj->load($file);
                if (isset($_POST['resizetype'])){
                if ($_POST['resizetype']=="width") {
                    $width = $_POST['size'];
                    $resObj->resizeToWidth($width);
                    array_push($upmsg, "Image resized to $width pixels wide");
                }elseif ($_POST['resizetype']=="height") {
                    $height = $_POST['size'];
                    $resObj->resizeToHeight($height);
                    array_push($upmsg, "Image resized to $height pixels high");
                }elseif ($_POST['resizetype']=="scale") {
                    $scale = $_POST['size'];
                    $resObj->scale($scale);
                    array_push($upmsg, "image scaled to $scale %");
                }} elseif (!isset($_POST['resizetype'])){
                    $resObj->noChange();
                    array_push($upmsg, "image uploaded with no changes");
                }
            }else {array_push($upmsg, "Image to big! max 3mb");}
        }else {array_push($upmsg, "wrong filetype, accepted types are gif, jpeg and png");}


        $resObj->save($newName);
        $db = new dbController();
        $result = $db->runQuery("SELECT CVR FROM companyInfo", 'fetch', PDO::FETCH_ASSOC);
        $CVR = $result['CVR'];
        $db->updateEntry("UPDATE companyInfo SET logo='$iName' WHERE CVR = $CVR");
        array_push($upmsg, "Image uploaded!");
        redirect_to("../backdex.php?page=company");

    }else{array_push($upmsg, "no file selected");}
}