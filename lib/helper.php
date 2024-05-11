<?php     

date_default_timezone_set("Asia/Kuala_Lumpur");

$now = date("Y/m/d");
//test
// create function - validate birth date
function validateBirthDate($birth){
    if($birth == null){
        return "Please provide your <b>Birth date</b>!";
    }else if($birth > $now) {
        return "Your <b>Birth date</b> cannot exceended current time";
    }else {
        return "Invalid <b>Birth date</b>!";
    }
}

//create function - validate ic no
function validateIC($ic){
    if($ic == null){
        return "Please provide your <b>IC</b>.";
    }else if(!preg_match("/^\d{6}-\d{2}-\d{4}$/", $ic)){
        return "Invalid <b>IC</b>.";
    }
}

//create function - validate gender
function validateGender($gender){
    if($gender == null){
        return "Please select a <b>Gender</b>.";
    }else if(!array_key_exists($gender, allGender())){
        return "Invalid <b>Gender</b>";
    }
}

//create function validateEmail
function validateEmail($email) {
    if($email == null){
        return "Please provide your <b>Email</b>.";
    }else if(filter_var($email, FILTER_VALIDATE_EMAIL) == false){
        // Use filter_var() function with FILTER_VALIDATE_EMAIL filter
        return "Invalid <b>Email</b>.";
    }
}

//create function - check name
function validateName($name){
    if($name == null){
        return "Please provide your <b>Name</b>.";
    }else if(strlen($name) > 30){
        return "Your <b>Name</b> exceeded 30 characters.";
    }else if(!preg_match("/^[A-Za-z \'@\.]+$/", $name)){
        return "Invalid user <b>Name</b>.";
    }
}
// add check uppercase 

//create function - check admin id
function validateAdminId($id){
    if($id== null){
        return "Please provide your <b>Admin ID.</b>";
    }else if(!preg_match ("/^M\d+/", $id)){
        return "Invalid <b>Admin ID.</b>";
    }
}

function validatePhone($phone) {
    if ($phone == null) {
        return "Please provide your <b>Phone Number</b>.";
    } else if (!preg_match("/^01[0-9]-\d{7,8}$/", $phone)) {
        return "Invalid <b>Phone Number</b>";
    }
}

function validateTempPass($password) {
    if($password == null) {
        return 'Please enter your <b>Password</b>.';
    } 
}

function validatePass($password) {
    if($password == null) {
        return 'Please enter your <b>Password</b>.';
    } else if (strlen($password) != 10) {
        return 'Your <b>Password</b> must in within <b>10</b> character only.';
    } else {
        return '';
    }
}

function validateCfnPass($passwordCfn, $password) {
    if($passwordCfn == null) {
        return 'Please your password Confirmation.';
    }
    else if($passwordCfn != $password) {
        return 'Your password confirmation must be the same as password.';
    } else {
        return '';
    }
}


//create function - return all gender
function allGender(){
    return array(
        "M" => "Male",
        "F" => "Female"              
    );
}


define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "amit-2043");
 
?> 