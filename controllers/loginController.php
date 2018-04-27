<?php
class loginController
{
    function loginAdmin(){
        if(isset($_POST['eMail']) || isset($_POST['password'])){
            $eMail = trim(htmlspecialchars($_POST['eMail']));
            $password = trim(htmlspecialchars($_POST['password']));
            if (isset($_GET['login'])=='true') {
                $db = new dbController();
                $result = $db->runQuery("SELECT COUNT(userID), userID, eMail, password, adminConfirm FROM admin WHERE eMail = '{$eMail}' LIMIT 1", fetch, PDO::FETCH_ASSOC);
                if($db->result==1) {
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