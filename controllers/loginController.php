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

                $result = $db->boundQuery("SELECT userID, eMail, password FROM admin WHERE eMail = :eMail LIMIT 1", 'fetch', PDO::FETCH_ASSOC, $values);
                if(count($result) == 3) {
                    if(password_verify($password, $result['password'])){
                        $_SESSION['userID'] = $result['userID'];
                        $_SESSION['eMail'] = $result['eMail'];
                        $_SESSION['adminConfirm'] = $result['adminConfirm'];
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

    function logout(){
        $_SESSION = array();
        if(isset($_COOKIE[session_name()])) {
            setcookie(session_name(), '', time()-42000, '/');
        }
        session_destroy();
        redirect_to("./index.php?page=gate&loginStatus=logout");
    }
}