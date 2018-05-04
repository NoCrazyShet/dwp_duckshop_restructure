<?php
require_once("./controllers/imageResizer.php");
    //For a stored procedure we would first create the procedure within the DB and then call it from within this controller.
    //The stored procedure would look as such

        // CREATE DEFINER=`root`@`localhost`
            // PROCEDURE `proc_get_compInfo`()
                // BEGIN
                    // SELECT * From companyInfo;
                // END

    //$statement= "CALL proc_get_compInfo";
    //The $statement variable would then be injected as a parameter in our runQuery function shown below.

    $compInfo = $db->runQuery("SELECT * FROM companyInfo", 'fetch', PDO::FETCH_ASSOC);

if(isset($_GET['action'])) {
    $action = $_GET['action'];
    if ($action == "update") {

        $logoText = htmlspecialchars(trim($_POST["logoText"]));
        $aboutUs = htmlspecialchars(trim($_POST['aboutUs']));
        $street = htmlspecialchars(trim($_POST['street']));
        $streetNr = htmlspecialchars(trim($_POST['streetNumber']));
        $zip = htmlspecialchars(trim($_POST['zipCode']));
        $CVR = htmlspecialchars(trim($compInfo['CVR']));
        $updateCompany = "UPDATE companyInfo SET logoText = '{$logoText}', aboutUs = '{$aboutUs}', street = '{$street}', streetNumber = '{$streetNr}', zipCode = '{$zip}' WHERE CVR= '{$CVR}'";
        $stmt = $db->updateEntry($updateCompany);
        redirect_to('./backdex.php?page=company');
    }elseif ($action == "logo") {
        require_once("./controllers/imageUploadController.php");
        redirect_to('./backdex.php?page=company');
    }
}