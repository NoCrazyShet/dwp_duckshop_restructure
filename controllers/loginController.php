<?php
class loginController
{
    function loginAdmin(){
        if(isset($_POST['eMail']) || isset($_POST['password'])){
            $eMail = trim(htmlspecialchars($_POST['eMail']));
            $password = trim(htmlspecialchars($_POST['password']));
            if (isset($_GET['login'])=='true') {
                $db = new dbController();

                $values = array('eMail' => $eMail);

                $result = $db->boundQuery("SELECT userID, eMail, password, accessLevel FROM admin WHERE eMail = :eMail LIMIT 1", $values, 'fetch', PDO::FETCH_ASSOC);
                if(count($result) == 4) {
                    if(password_verify($password, $result['password'])){
                        $_SESSION['userID'] = $result['userID'];
                        $_SESSION['eMail'] = $result['eMail'];
                        $_SESSION['acLe'] = intval($result['accessLevel']);

                        redirect_to("backdex.php?page=backdexYard");

                    }
                    else {
                        redirect_to('index.php?page=gate&loginStatus=incorrect');
                    }
                }
                else {
                    redirect_to('index.php?page=gate&loginStatus=logout');
                }
            }
        }
    }
    function loginUser(){
        if(isset($_POST['eMail']) || isset($_POST['password'])){
            $eMail = trim(htmlspecialchars($_POST['eMail']));
            $password = trim(htmlspecialchars($_POST['password']));
            if (isset($_GET['userLogin'])=='true') {
                $db = new dbController();

                $values = array('eMail' => $eMail);

                $result = $db->boundQuery("SELECT customerID, eMail, firstName, lastName, password FROM customer WHERE eMail = :eMail LIMIT 1", $values, 'fetch', PDO::FETCH_ASSOC);
                if(count($result) == 5) {
                    if(password_verify($password, $result['password'])){
                        $_SESSION['customerID'] = $result['customerID'];
                        $_SESSION['eMail'] = $result['eMail'];
                        $_SESSION['firstName'] = $result['firstName'];
                        $_SESSION['lastName'] = $result['lastName'];


                        redirect_to("./index.php");

                    }
                    else {
                        redirect_to('./index.php?page=gate&loginStatus=incorrect');
                    }
                }
                else {
                    redirect_to('index.php?page=gate&loginStatus=logout');
                }
            }
        }
    }

    function logout(){
        $_SESSION = array();
        if(isset($_COOKIE[session_name()])) {
            setcookie(session_name(), '', time()-42000, '/');
        }
        session_destroy();
        redirect_to("./index.php");
    }
}