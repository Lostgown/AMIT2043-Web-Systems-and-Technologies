<?php     
// include('../css/form.css'); 

date_default_timezone_set("Asia/Kuala_Lumpur");


function validateRemaining($event){
    $con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    
    $sql = "SELECT remaining_pax FROM event WHERE event_id = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("s", $event);
    $stmt->execute();
    $result = $stmt->get_result();

    // Fetch the remaining pax count from the result
    $row = $result->fetch_assoc();
    $remainingPax = $row['remaining_pax'];

    // Close statement
    $stmt->close();

    // Check if there are remaining pax
    if ($remainingPax > 0) {
        // There are remaining pax
        return "";
    } else {
        // No remaining pax
        return "There is no remaining pax!";
    }
}

function validateJoinedEvent($event,$member){
    //step 1: connect to database
    $con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    
    $sql = "SELECT * FROM booking WHERE member_id = ? AND event_id = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("ss", $member, $event);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        return "You had already joined the event!"; // Member has joined the event
    } else {
        return ""; // Member has not joined the event
    }

    $result -> free();
    $con ->close();
}

// create function - validate birth date
function validateBirthDate($birth){

    $now = date("m/d/Y");

    // Convert birth date and current date to timestamps for comparison
    $birth_timestamp = strtotime($birth);
    $now_timestamp = strtotime($now);

    if($birth == null){
        return "Please provide your <b>Birth date</b>!";
    } else if($birth_timestamp > $now_timestamp) {
        return "Your <b>Birth date</b> cannot exceed the current date.";
    } else {
        return "";
    } 
}

function validateEventDate($a) {
    $now = date("m/d/Y");

    $birth_timestamp = strtotime($a);
    $now_timestamp = strtotime($now);

    if($a == null){
        return "Please provide <b>Event Date</b>";
    } else if($birth_timestamp < $now_timestamp) {
        return "The event must be <b>host in the future</b>.";
    } else {
        return "";
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

//create function - validate category
function validateCategory($category){
    if($category == null){
        return "Please select a <b>Category</b>.";
    }else if(!array_key_exists($category, allCategory())){
        return "Invalid <b>Category</b>";
    }
}

//create function - validate level
function validateLevel($level){
    if($level == null){
        return "Please select a <b>Level</b>.";
    }else if(!array_key_exists($level, allLevel())){
        return "Invalid <b>Level</b>";
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
function validateAdminId($id) {
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

// function validateTempPass($password) {
//     if($password == null) {
//         return 'Please enter your <b>Password</b>.';
//     } 
// }

function validatePass($password) {
    if($password == null) {
        // echo 'Please enter your <b>Password</b>.';
        return 'Please enter your <b>Password</b>.';
    } else if (strlen($password) !== 10) {
        return 'Your <b>Password</b> must in within <b>10</b> character only.';
    } else if (!preg_match("/[A-Z]/", $password)) {
        return 'Your password should contain atleast one <b>Uppercase</b>.';
    } else if (!preg_match("/[0-9]/", $password)) {
        return 'Your password should contain atleast one <b>Number</b>';
    } else {
        return '';
        // $pattern = '/^(?=.*[A-Z])(?=.*\d).+$/';
        // suprisingly.. this format are not working 
    }
}

function validatePassTemp($password) {
    if($password == null) {
        return 'Please enter your <b>Password</b>.';
    } 
}



function validateCfnPass($passwordCfn, $password) {
    if($passwordCfn == null) {
        return 'Please enter your <b>Password Confirmation</b>.';
    } else if($password == null) {
        return 'Your <b>Password</b> is null.';
    }
    else if(strcmp($passwordCfn, $password)) {
        return 'Your <b>Password Confirmation</b> must be the same as <b>Password</b>.';
    } else {
        return '';
    }
}

function validateTimeStart($time) {
    if($time == null) {
        return 'Please provide a <b>Start</b> time.';
    }
}

function validateTimeEnd($time) {
    if($time == null) {
        return 'Please provide an <b>End</b> time.';
    }
}

function validateFile($file) {
    if ($file['error'] === UPLOAD_ERR_NO_FILE) {
        return 'No file was selected';
    } elseif ($file['error'] !== UPLOAD_ERR_OK) {
        return 'There was an error while uploading the file';
    } else {
        // Check the file size
        if ($file['size'] > 1048576) { // 1MB in bytes
            return 'File uploaded is too large. Maximum 1MB allowed';
        }
        
        // Check the file extension
        $allowedExtensions = ['jpg'];
        $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        if (!in_array($ext, $allowedExtensions)) {
            return 'Only JPG formats are allowed';
        }
        
        // If no errors, return null to indicate no validation error
        return null;
    }
}



//create function - return all gender 
function allGender(){
    return array(
        "M" => "Male",
        "F" => "Female"              
    );
}

function allCategory(){
    return array(
        "MS" => "Men's Single",
        "MD" => "Men's Doubles",
        "WS" => "Women's Single",
        "WD" => "Women's Doubles",
        "XD" => "Mixes Doubles"
    );
}

function allLevel(){
    return array(
        "BGN" => "Beginner",
        "ITM" => "Intermediate",
        "PRO" => "Professional"
    );
}

function generateRecovery(){
    return rand(100000,999999);
}


define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "amit-2043");
 
?> 