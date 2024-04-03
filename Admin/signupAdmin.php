<?php
    session_start();
    include('../Sys/authCheck.php');
    validAdmin();
?>

<!DOCTYPE html>
<html> 
<head>
    <title>Badminton Club Event Management System</title>
    <link rel = 'stylesheet' type = 'text/css' href = '../css/main.css'>
    <link rel = 'stylesheet' type = 'text/css' href = '../css/form.css'>
<head>
<body>
    <div class = 'main'>

        <div class = 'title'>
            <h2> &nbsp Badminton Club Event Management System </h2>
        </div>

        <div class = 'ui'>
            <?php include('../lib/navbar.php'); ?>
        </div>
            
        <div class = 'heading'>
            <h1> Sign Up User </h1>
        </div>
        
        <div class = 'content'>
            <div class = "form">  
                <form name = "f1" action = "../Sys/signup.php" onsubmit = "return validation()" method = "POST" autocomplete="off"> 
                
                    <div class = 'input_box'>
                        <label class="input">
                            <input class = "input_field" type = "text" id ="name" name  = "name" 
                            autofocus="autofocus" placeholder= " " required
                            oninvalid="this.setCustomValidity('Fill in the name.')"
                            oninput="this.setCustomValidity('')" />   
                            <span class="input_label">Full Name</span>
                        </label>
                    </div>

                    <div class = 'input_box'>
                        <label class="input">
                            <input class = "input_field" type = "password" name  = "pass" 
                                placeholder= " " required
                                oninvalid="this.setCustomValidity('Fill in the password.')"
                                oninput="this.setCustomValidity('')" />  
                            <span class="input_label">Password</span>
                        </label>
                    </div>

                    <div class = 'input_box'>
                        <label class="input">
                            <input class = "input_field" type = "password" name  = "passcfm" placeholder= " " required
                                oninvalid="this.setCustomValidity('Fill in your password again..')"
                                oninput="this.setCustomValidity('')" />
                            <span class="input_label">Password Confirmation</span>
                        </label>
                    </div>


                    <div class = 'input_box'>
                        <label class="input">
                                <input class = "input_field" type = "text" id ="phone_no" name  = "phone_no" placeholder= " " required
                                    oninvalid="this.setCustomValidity('Fill in your phone number.')"
                                    oninput="this.setCustomValidity('')" />  
                                <span class="input_label">Phone Number</span>
                        </label>
                    </div>
                    
                    <div class = 'input_box'>
                        <label class="input">
                                <input class = "input_field" type = "text" id ="email" name  = "email" placeholder= " " required
                                oninvalid="this.setCustomValidity('Fill in your email.')"
                                oninput="this.setCustomValidity('')" />  
                            <span class="input_label">Email</span>
                        </label>
                    </div>

                    <div class = "genderRadio">
                        <p id = "gender"> Gender: </p>           
                        <p id = "btnMale"><label>
                            <input type = "radio" name = "jantina" value = 'Male' required = "required" 
                            oninvalid="this.setCustomValidity('Choose your gender.')"
                            oninput="this.setCustomValidity('')" /> Male &nbsp </label>
                        </p>
                        <p id = "btnFemale"><label><input type = "radio" name = "gender" value = 'Female' required = "required"/> Female </p></label>
                        <br>
                    </div>

                    <div class = "userType">
                        <p id = "btnMember"><label><input type = "radio" name = "regType" value = 'member' required = "required" 
                        oninvalid="this.setCustomValidity('Please choose the user type that you want to register.')" oninput="this.setCustomValidity('')" /> Member </label></p>
                        <p id = "btnAdmin"><label><input type = "radio" name = "regType" value = 'admin' required = "required" /> Admin </label></p>
                    </div>




                    <button id = 'btn' style = 'margin-left:42%;' name ='btn'> Register </button>

                </form>

                <?php $con=null; ?>
                
            </div>
        </div>
    </div>
</body>

<script>  
        function validation() {  
            var ps=document.f1.pass.value;  
            var pscfm=document.f1.passcfm.value; 
            
            if(ps != pscfm) {  
                alert("Please confirm your password is same!");  
                return false;
            }
            else if (ps == pscfm) {
                return true;
            }     
        }                              
    </script>

</html> 