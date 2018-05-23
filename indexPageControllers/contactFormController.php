<?php

if(isset($_POST['submit']) && !empty($_POST['submit'])) {
    if (isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) {
        //your site secret key
        $secret = '6LeghlkUAAAAAIKfU2XQZsiKsioZ5E0PavNkfubN';
        //get verify response data
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $_POST['g-recaptcha-response']);
        $responseData = json_decode($verifyResponse);
        if ($responseData->success) {

            if ((isset($_POST['name']) && !empty($_POST['name']))
                && (isset($_POST['email']) && !empty($_POST['email']))
                && (isset($_POST['subject']) && !empty($_POST['subject']))) {
                $name = $_POST['name'];
                $email = $_POST['email'];
                $subject = $_POST['subject'];
                $message = $_POST['message'];

                $to = "duranovic46@gmail.com";
                $headers = "From : " . $email;

                if (mail($to, $subject, $message, $headers)) {
                    echo '<script language="javascript">';
                    echo 'alert("Your message was succesfully sent")';
                    echo '</script>';
                }
            }else{
            throw new Exception('Something went wrong, please try again');
            }
        }else {
        throw new Exception('It seems like reCaptcha is broken');
        }
    }else {
    throw new Exception('Blep blop, show me you are no robot');
    }
}