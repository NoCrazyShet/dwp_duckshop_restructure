<?php

if(isset($_POST["submit"])){

    $eMail = trim(htmlspecialchars($_POST['eMail']));
    $password = trim(htmlspecialchars($_POST['password']));
    $iterations = ['cost' => 15];
    $hashed_password = password_hash($password, PASSWORD_BCRYPT, $iterations);
    $values = array('eMail' => $eMail, 'password' => $hashed_password);
    $result = $db->boundQuery("INSERT INTO customer (eMail, password) VALUES(:eMail, :password)", $values );
    if ($result->rowCount()>0) {
        throw new Exception("User already exists");
    }
    elseif ($result){
        echo "<script type='text/javascript'>alert('User Created');</script>";
    }else{
        throw new Exception("User could not be created", $connection->errorInfo());
    }

}