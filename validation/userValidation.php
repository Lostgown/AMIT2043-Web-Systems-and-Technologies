<?php
function validation($name) {
    if ($name == '') {
        return 'Please enter your <b>NAME</b>';
    } else if (strlen($name) > 30) {
        return "Your <b>NAME</b> exceeded 30 characters!";
    } else if (!preg_match("/^[A-Za-z @,\'\.\-\/]+$/", $name)) {
        return "Invalid <b>NAME</b>";
    } else {
        // Return an empty string if the input is valid
        return '';
    }
}

?>