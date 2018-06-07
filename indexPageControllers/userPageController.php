<?php
confirm_logged_in();
if(!empty($_GET['login'])){
    if($_GET['login']=='false'){
        $login->logout();
    }
}
$values = array('customerID' => $_SESSION['customerID']);
$customerInfo = $db->boundQuery("SELECT * FROM customer WHERE customerID = :customerID", $values, 'fetch', PDO::FETCH_ASSOC, NULL);

if(isset($_GET['action'])) {
    $action = $_GET['action'];
    if ($action == 'update')
    {
        $email = $_POST['eMail'];
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $cardHolderName = $_POST['cardHolderName'];
        $cardNumber = $_POST['cardNumber'];
        $CVC = $_POST['CVC'];
        $expirationMonth = $_POST['expirationMonth'];
        $expirationYear = $_POST['expirationYear'];
        $customerID = $customerInfo['customerID'];

        $values = array('eMail' => $email, 'firstName' => $firstName, 'lastName' => $lastName, 'cardHolderName' => $cardHolderName, 'cardNumber' => $cardNumber, 'CVC' => $CVC, 'expirationMonth' => $expirationMonth, 'expirationYear' => $expirationYear, 'customerID' => $customerID);

        $stmt = $db->boundQuery("UPDATE customer SET eMail = :eMail, firstName = :firstName, lastName = :lastName, cardHolderName = :cardHolderName, cardNumber = :cardNumber, CVC = :CVC, expirationMonth = :expirationMonth, expirationYear = :expirationYear WHERE customerID = :customerID", $values);
        redirect_to('./index.php?page=userPage');
    }
}