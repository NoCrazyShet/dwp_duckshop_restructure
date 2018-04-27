<?php
$compInfo = $db->runQuery("SELECT * FROM companyInfo", 'fetch', PDO::FETCH_ASSOC);

if(isset($_GET['action'])) {
    $action = $_GET['action'];
    if ($action == "update"); {

        $logoText = htmlspecialchars(trim($_POST["logoText"]));
        $aboutUs = htmlspecialchars(trim($_POST['aboutUs']));
        $street = htmlspecialchars(trim($_POST['street']));
        $streetNr = htmlspecialchars(trim($_POST['streetNumber']));
        $zip = htmlspecialchars(trim($_POST['zipCode']));
        $CVR = htmlspecialchars(trim($compInfo['CVR']));
        $updateCompany = "UPDATE companyInfo SET logoText = '{$logoText}', aboutUs = '{$aboutUs}', street = '{$street}', streetNumber = '{$streetNr}', zipCode = '{$zip}' WHERE CVR= '{$CVR}'";
        $stmt = $db->updateEntry($updateCompany);
        redirect_to('./backdex.php?page=company');
    }
}