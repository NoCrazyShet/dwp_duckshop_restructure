<?php
require_once("./controllers/imageResizer.php");
confirm_admin();
admin_level(1);

    //For a stored procedure we would first create the procedure within the DB and then call it from within this controller.
    //The stored procedure would look as such

        // CREATE DEFINER=`root`@`localhost`
            // PROCEDURE `proc_get_compInfo`()
                // BEGIN
                    // SELECT * From companyInfo;
                // END

   // $statement= "CALL proc_get_compInfo";
    //The $statement variable would then be injected as a parameter in our runQuery function shown below.

    $compInfo = $db->boundQuery("SELECT * FROM companyInfo", NULL, 'fetch', PDO::FETCH_ASSOC, NULL);


if(isset($_GET['action'])) {
    $action = $_GET['action'];
    if ($action == "update") {

        $logoText = $_POST["logoText"];
        $aboutUs = $_POST['aboutUs'];
        $street = $_POST['street'];
        $streetNr = $_POST['streetNumber'];
        $zip = $_POST['zipCode'];
        $eMail = $_POST['eMail'];
        $phone = $_POST['phone'];
        $CVR = $compInfo['CVR'];


        $values = array('logoText' => $logoText, 'aboutUs' => $aboutUs, 'street' => $street, 'streetNumber' => $streetNr, 'zipCode' => $zip, 'eMail' => $eMail, 'phone' => $phone, 'CVR' => $CVR);
        $stmt = $db->boundQuery("UPDATE companyInfo SET logoText = :logoText, aboutUs = :aboutUs, street = :street, streetNumber = :streetNumber, zipCode = :zipCode, phone = :phone, eMail = :eMail WHERE CVR = :CVR", $values);
        redirect_to('./backdex.php?page=backdexCompany&action=success');

        }elseif ($action == "logo") {
        require_once("./controllers/imageUploadController.php");
        $imgCnt = new imageUploadController();
        $logoName = $imgCnt->imageUpload( "none");
        $CVR = $compInfo['CVR'];
        $values = array('logo' => $logoName, 'CVR' => $CVR);
        $stmt = $db->boundQuery("UPDATE companyInfo SET logo = :logo WHERE CVR = :CVR", $values);
        redirect_to("./backdex.php?page=backdexCompany&action=success");

    }
    elseif ($action == "update2") {
        $openHours = $_POST['openHours'];
        $openDay = $_POST['openDay'];
        $contactID = $_POST['contactID'];

        $values = array('openHours' => $openHours, 'openDay' => $openDay, 'contactID' => $contactID);
        $stmt = $db->boundQuery("UPDATE companyContact SET openHours = :openHours, openDay = :openDay WHERE contactID = :contactID", $values);
        redirect_to('./backdex.php?page=backdexCompany&action=success');
    }elseif ($action == 'success') {
        echo '<script>alert("Update succeeded");</script>';
    }
}


// $values = array('contactID' => $_GET['id']);
$companyOpening = $db->boundQuery("SELECT * FROM companyContact", NULL, 'fetchAll', PDO::FETCH_ASSOC);


if(isset($_GET['action'])) {
    $action = $_GET['action'];

}



