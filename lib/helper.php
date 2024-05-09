<?php      

//create function - validate student gender
function validateGender($gender){
    if($gender == null){
        return "Please enter <b>Gender</b>!";
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
        return "Please enter your <b>Password</b>";
    } else if (!preg_match("/^[A-Za-z0-9]{10}$/", $password)) {
        return "please enter at least 10 character of password";
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