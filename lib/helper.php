<?php      

//create function - validate student gender
function validateStudentGender($gender){
    if($gender == null){
        return "Please enter <b>gender</b>!";
    }else if(!array_key_exists($gender, allGender())){
        return "Invalid <b>Gender</b>";
    }
}

//create function - check student name
function validateStudentName($name){
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
    }else if(!preg_match ("/^[0-9]{2}[A-Z]{3}[0-9]{5}$/", $id)){
        return "Invalid <b>student id!</b>";
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