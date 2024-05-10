<?php      

//create function - validate birth date
// function validateBirthDate($birth){
//     if($birth == null){
//         return "Please enter your <b>Name</b>!";
//     }else if(strlen($birth) > 30){
//         return "Your <b>Name</b> exceeded 30 characters!";
//     }else if(!preg_match("/^[A-Za-z \'@\.]+$/", $birth)){
//         return "Invalid <b>Name</b>!";
//     }
// }

//create function - validate ic no
function validateIC($ic){
    if($ic == null){
        return "Please enter your IC number.";
    }else if(strlen($ic) != 12){
        return "Your <b>IC</b> should in within 12 character";
    }else if(!preg_match("/^[0-9]{6}-[0-9]{2}-[0-9]{4}$/", $ic)){
        return "Invalid IC foma.";
    }
}

//create function - validate gender
function validateGender($gender){
    if($gender == null){
        return "Please enter your<b>Gender</b>!";
    }else if(!array_key_exists($gender, allGender())){
        return "Invalid <b>Gender</b>";
    }
}

//create function validateEmail
function validateEmail($email) {
    if($email == null){
        return "Please enter your <b>Email</b>!";
    }else if(filter_var($email, FILTER_VALIDATE_EMAIL) == false){
        // Use filter_var() function with FILTER_VALIDATE_EMAIL filter
        return "Invalid <b>Email</b>!";
    }
}

//create function - check name
function validateName($name){
    if($name == null){
        return "Please enter your <b>Name</b>!";
    }else if(strlen($name) > 30){
        return "Your <b>Name</b> exceeded 30 characters!";
    }else if(!preg_match("/^[A-Za-z \'@\.]+$/", $name)){
        return "Invalid <b>Name</b>!";
    }
}


//create function - check admin id
function validateAdminId($id){
    if($id== null){
        return "Please enter your <b>Admin ID!</b>";
    }else if(!preg_match ("/^M\d+/", $id)){
        return "Invalid <b>Admin ID!</b>";
    }
}

function validatePhone($phone) {
    if ($phone == null) {
        return "Please enter your <b>Phone Number</b>";
    } else if (!preg_match("/^01[0-9]-\d{7,8}$/", $phone)) {
        return "Invalid <b>Phone Number</b>";
    }
}

function validatePass($password) {
    if($password == null) {
        return 'Please enter your password.';
    } else if (strlen($password) != 10) {
        return 'Your password should in within 10 character only.';
    } else {
        return '';
    }
}

function validateCfnPass($passwordCfn, $password) {
    if($passwordCfn == null) {
        return 'Please enter your password Confirmation.';
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