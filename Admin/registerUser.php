<?php

// function detectError() {
// global $name;
// $name = trim($_POST['name']);

// $error = array();

// if ($name == null) {
//     $error['name'] = "Please enter your <b>NAME</b>";
//     //NOTE: count() is for array
//     //NOTE: strlen() is to count string char
// } else if (strlen($name) > 30) {
//     $error['name'] = "Your <b>NAME</b> exceeded 30 characters!";
// }else if (!preg_match("/^[A-Za-z @,\'\.\-\/]+$/", $name)) {
//     $error['name'] = "Invalid <b>NAME</b>";
// }
// return $error;
// }

// $error = detectError();

// if(empty($error)) {
//     echo 'no error';
// } else {
//     echo 'got error';
// }
?>

<?php
    session_start();
    include('../Sys/authCheck.php');
    validAdmin();
?>

<!DOCTYPE html>
<html> 
<head>
    <title>Register User</title>
    <link rel = 'stylesheet' type = 'text/css' href = '../css/main.css'>
    <link rel = 'stylesheet' type = 'text/css' href = '../css/formUpdate.css'>
<head>
<body>
    <div class = 'main'>

        
        <div class = 'content'>
            <div class = "frm">
                <div class = 'heading'>
                    <h1 style="text-align: center;"> Register New User </h1>
                </div>  
                <form name = "f1" action = "../Sys/signup.php" onsubmit = "" method = "POST" autocomplete="off"> 
                
                    <div class = 'input_box'>
                        <label class="input">
                            <input class="input_field" type="text" id="txtname" name="txtname" autofocus="autofocus" placeholder= "" required
                            oninvalid="this.setCustomValidity('Fill in the name.')"
                            //oninput="this.setCustomValidity('')"
                            oninput="validation()"
                             />   
                            <span class="input_label">Full Name</span>
                        </label>
                    </div>

                    <div class = 'input_box'>
                        <label class="input">
                            <input class = "input_field" type = "password" name  = "pass"  id = "pass" placeholder= " " required
                                oninvalid="this.setCustomValidity('Fill in the password.')"
                                //oninput="this.setCustomValidity('')"
                                oninput="passwordValidation()"
                                />  
                                
                            <span class="input_label">Password</span>
                        </label>
                    </div>

                    <div class = 'input_box'>
                        <label class="input">
                            <input class="input_field" type="password" name ="passcfm" id = "passcfn" placeholder= " " required
                                oninvalid="this.setCustomValidity('Fill in your password again..')"
                                //oninput="this.setCustomValidity('')"
                                oninput="passwordCfnValidation()"
                                 />
                            <span class="input_label">Password Confirmation</span>
                        </label>
                    </div>


                    <div class = 'input_box'>
                        <label class="input">
                                <input class = "input_field" type = "tel" name = "phone_no" id ="phone_no" placeholder= "60+" required
                                    oninvalid="this.setCustomValidity('Fill in your phone number.')"
                                    //oninput="this.setCustomValidity('')"
                                    oninput = "telNumValidation()"
                                     />  
                                <span class="input_label">Phone Number</span>
                        </label>
                    </div>
                    
                    <div class = 'input_box'>
                        <label class="input">
                                <input class = "input_field" type = "text" id ="email" name  = "email" placeholder= "" required
                                oninvalid="this.setCustomValidity('Fill in your email.')"
                                //oninput="this.setCustomValidity('')"
                                oninput="mailValidation()"
                                 />  
                            <span class="input_label">Email</span>
                        </label>
                    </div>

                    <div class = "genderRadio">
                        <p id = "gender" style="text-align: left;"> &nbspGender: &nbsp &nbsp </p>      
                        <p id = "btnMale"><label>
                        <input type = "radio" name = "gender" value = 'Male' required = "required"
                        oninvalid="this.setCustomValidity('Choose your gender.')"
                        oninput="this.setCustomValidity('')" /> Male &nbsp </label>
                        </p>
                        <p id = "btnFemale"><label><input type = "radio" name = "gender" value = 'Female' required = "required"/> Female </p></label>
                    </div>

                    <div class = "userRadio">
                        <p id = "user"> User Type: </p>
                        <p id = "btnMember"><label>
                            <input type = "radio" name = "regType" value = 'member' required = "required" 
                        oninvalid="this.setCustomValidity('Please choose the user type that you want to register.')" oninput="this.setCustomValidity('')" /> Member </label></p>
                        <p id = "btnAdmin"><label><input type = "radio" name = "regType" value = 'admin' required = "required" /> Admin </label></p>
                        <br>
                    </div>

                    <button id = 'btnRegister' style = 'margin-left:42%;' name ='btnRegister'> Register </button>
                    <a href='javascript: history.go(-1)'><button id="btnUpdate" name ='btn'> Back </button></a>
                </form>
                
                    <br>

                <?php $con=null; ?>
                
            </div>
        </div>
    </div>
</body>

<script>  
function validation() {
            var nameInput = document.getElementById('txtname');
            var name = nameInput.value.trim();
            // var errorSpan = document.getElementById('nameError');

            if (name === '') {
                // errorSpan.textContent = 'Please enter your name.';
                nameInput.setCustomValidity('please enter your name');
                // return false;
            } else if (name.length > 30) {
                // errorSpan.textContent = 'Your name exceeds 30 characters.';
                nameInput.setCustomValidity('Your name exceeds 30 characters.');
                // return false;
            } else if (!/^[A-Za-z @,.'\-\/]+$/.test(name)) {
                // errorSpan.textContent = 'Invalid characters in the name.';
                nameInput.setCustomValidity('Invalid characters in the name.');
                // return false;
            } else {
                // errorSpan.textContent = '';
                // return true;
                nameInput.setCustomValidity('');
            }
        }
</script>

</html> 