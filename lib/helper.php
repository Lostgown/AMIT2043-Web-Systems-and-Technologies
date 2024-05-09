<?php      

//create function - validate student gender
function validateGender($gender){
    if($gender == null){
        return "Please enter <b>gender</b>!";
    }else if(!array_key_exists($gender, allGender())){
        return "Invalid <b>Gender</b>";
    }
}

//create function - check student name
function validateName($name){
    if($name == null){
        return "Please enter your <b>Name</b>!";
    }else if(strlen($name) > 30){
        return "Your <b>Name</b> exceeded 30 characters!";
    }else if(!preg_match("/^[A-Za-z \'@\.]+$/", $name)){
        return "Invalid <b>Name</b>!";
    }
}


//create function - check student id
function validateAdminId($id){
    if($id== null){
        return "Please enter your <b>student id!</b>";
    }else if(!preg_match ("/^M\d+/", $id)){
        return "Invalid <b>Admin ID!</b>";
    }
}

function validationTel($phone) {
    if ($phone == null) {
        return "Please enter your <b>phone number</b>";
    } else if (!preg_match("/^01[0-9]-\d{7,8}$/", $phone)) {
        return "Invalid <b>Phone number</b>";
    }
}

function validatePass($password) {
    if($password == null) {
        return "Please enter your password";
    } else if (!preg_match("/^[A-Za-z0-9]{10}$/"), $password) {
        return "please enter atleast 10 character of password";
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