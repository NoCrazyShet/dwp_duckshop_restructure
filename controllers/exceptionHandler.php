<?php
function myException($exception) {
    echo '<script language="javascript">';
    echo 'alert("Error: '.$exception->getMessage().'");window.history.go(-1);';
    echo '</script>';
}

set_exception_handler('myException');