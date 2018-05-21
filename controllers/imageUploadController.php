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
                        if($imghandling == "width") {
                            $width = $_POST['size'];
                            $resObj->resizeToWidth($width);
                        } elseif ($imghandling == "height") {
                            $height = $_POST['size'];
                            $resObj->resizeToHeight($height);
                        } elseif ($imghandling == "scale") {
                            $scale = $_POST['size'];
                            $resObj->scale($scale);
                        } elseif ($imghandling == "cut") {
                            $resObj->cutOrFill(500, 600);
                        } elseif ($imghandling == "none") {
                            $resObj->noChange();
                        } elseif ($imghandling == 'news'){
                            $resObj->cutOrFill(1920, 1080);
                        }
                        $resObj->save($newName);
                        $db = new dbController();
                        $result = $db->boundQuery($selectQuery,$selectVal, 'fetch', PDO::FETCH_ASSOC);

                        $resKey = $result["{$key}"];
                        $resTarg = $key;

                        $values = array($target => $iName , $resTarg => $resKey);
                        $db->boundQuery($changeQuery, $values);
                        redirect_to("./backdex.php?page=$redTarg");

                    }else  {
                        throw new Exception('Image to big! Max 3mb.');
                    }

                }else {
                    throw new Exception('Wrong filetype, accepted types are gif, jpeg and png');
                }

            }else{
                throw new Exception('No file selected, please choose a file and try again');
            }
        }
    }
}