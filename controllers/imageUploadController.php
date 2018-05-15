<?php
class imageUploadController {

    function __construct()
    {
        define("MAX_SIZE", "3000");
    }

    function imageUpload($selectQuery, $selectVal=NULL, $key, $target,  $changeQuery, $redTarg, $imghandling) {
        $_SESSION['upmsg'] = array();

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
                        $newName = "./images/".$iName;
                        $resObj = new imageResizer();
                        $resObj->load($file);
//                        if (isset($_POST['resizetype'])){
//                        if ($_POST['resizetype']=="width") {
//                            $width = $_POST['size'];
//                            $resObj->resizeToWidth($width);
//                            array_push($_SESSION['upmsg'], "Image resized to $width pixels wide");
//                        }elseif ($_POST['resizetype']=="height") {
//                            $height = $_POST['size'];
//                            $resObj->resizeToHeight($height);
//                            array_push($_SESSION['upmsg'], "Image resized to $height pixels high");
//                        }elseif ($_POST['resizetype']=="scale") {
//                            $scale = $_POST['size'];
//                            $resObj->scale($scale);
//                            array_push($_SESSION['upmsg'], "image scaled to $scale %");
//                        }} elseif (!isset($_POST['resizetype'])){
//                            $resObj->cutFromCenter(500, 600);
//                            array_push($_SESSION['upmsg'], "image uploaded with no changes");
//                        }
                        if($imghandling == "width") {
                            $width = $_POST['size'];
                            $resObj->resizeToWidth($width);
                            array_push($_SESSION['upmsg'], "Image resized to $width pixels wide");
                        } elseif ($imghandling == "height") {
                            $height = $_POST['size'];
                            $resObj->resizeToHeight($height);
                            array_push($_SESSION['upmsg'], "Image resized to $height pixels high");
                        } elseif ($imghandling == "scale") {
                            $scale = $_POST['size'];
                            $resObj->scale($scale);
                            array_push($_SESSION['upmsg'], "image scaled to $scale %");
                        } elseif ($imghandling == "cut") {
                            $resObj->cutOrFill(500, 600);
                            array_push($_SESSION['upmsg'], "It has been cut and/or filled");
                        } elseif ($imghandling == "none") {
                            $resObj->noChange();
                            array_push($_SESSION['upmsg'], "Image uplaoded with no changes");
                        }
                        $resObj->save($newName);
                        $db = new dbController();
                        $result = $db->boundQuery($selectQuery,$selectVal, 'fetch', PDO::FETCH_ASSOC);
                        $resKey = $result["{$key}"];
                        $resTarg = $key;
                        $values = array($target => $iName , $resTarg => $resKey);
                        $db->boundQuery($changeQuery, $values);
                        redirect_to("./backdex.php?page=$redTarg");

                    }else  {array_push($_SESSION['upmsg'], "Image to big! max 3mb");
                        redirect_to('./backdex.php?page=company');
                    }

                }else {array_push($_SESSION['upmsg'], "Wrong filetype, accepted types are gif, jpeg and png");
                    //redirect_to('./backdex.php?page=company');
                }

            }else{array_push($_SESSION['upmsg'], "No file selected");
                redirect_to('./backdex.php?page=backdexProducts');
            }
        }
    }
}