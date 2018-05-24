<?php

if(isset($_POST["submit"])){

    $eMail = $_POST['eMail'];
    $password = $_POST['password'];

    $iterations = ['cost' => 15];
    $hashed_password = password_hash($password, PASSWORD_BCRYPT, $iterations);
    $values = array('eMail' => $eMail);
    $check = $db->boundQuery("SELECT eMail FROM customer WHERE eMail = :eMail", $values, 'fetch', PDO::FETCH_ASSOC);
    if($check['eMail'] == $eMail){
        throw new Exception("User already exists");
    }elseif ($check != $eMail){
        $values = array('eMail' => $eMail, 'password' => $hashed_password);
        $result = $db->boundQuery("INSERT INTO customer (eMail, password) VALUES(:eMail, :password)", $values );
        echo "<script type='text/javascript'>alert('User Created');</script>";
        redirect_to("./index.php?page=loginPage&res=success");
    }else {
        throw new Exception("User could not be created", $connection->errorInfo());
    }
}