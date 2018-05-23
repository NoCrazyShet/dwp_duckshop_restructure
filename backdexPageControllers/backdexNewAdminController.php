<?php
admin_level(1);
if(isset($_POST["submit"])){

    $eMail = $_POST['eMail'];
    $password = $_POST['password'];
    $accesLevel = $_POST['accessLevel'];
    $iterations = ['cost' => 15];
    $hashed_password = password_hash($password, PASSWORD_BCRYPT, $iterations);
    $values = array('eMail' => $eMail);
    $check = $db->boundQuery("SELECT eMail FROM admin WHERE eMail = :eMail", $values);
    if ($check = $eMail) {
        throw new Exception("Admin already exists");
    }elseif($check != $eMail) {
        $values = array('eMail' => $eMail, 'password' => $hashed_password, 'accessLevel' => $accesLevel);
        $result = $db->boundQuery("INSERT INTO admin (eMail, password, accessLevel) VALUES(:eMail, :password, :accessLevel)", $values );
        echo "<script type='text/javascript'>alert('Admin Created');</script>";
    }else{
        throw new Exception("Admin could not be created", $connection->errorInfo());
    }
}