<?php
    session_start();
    include('../Sys/authCheck.php');
?>

<!DOCTYPE html>
<html> 
<head>
    <title>Update Profile</title>
    <link rel = 'stylesheet' type = 'text/css' href = '../css/main.css'>
    <link rel = 'stylesheet' type = 'text/css' href = '../css/form.css'>
<head>
    
<body>

    <div class = 'fixed'>
            <?php 
            // include('../lib/navbar.php'); 
            ?>
    </div>

    <div class = 'fixed'>     
        <div class = 'content'>
            <div>
            <div class = "frm" style="text-align:left;">  
            <h1 style="text-align:center"> Edit Profile </h1>
                <form name = 'f1' action = '../Sys/update.php' onsubmit = 'return validation()' method = 'POST' autocomplete='off'>

                    <div class = 'input_box'>
                        <label class="input">
                            <input class = "input_field" type = "text" name  = "name" placeholder= " "/>
                            <span class="input_label">Name</span>
                        </label>
                    </div>

                    <div class = 'input_box'>
                        <label class="input">
                            <input class = "input_field" type = "text" id ="phone_no" name  = "phone_no" placeholder= " " required />  
                    <span class="input_label">Phone Number</span>
                </label>
            </div>
            
            <div class = 'input_box'>
                <label class="input">
                    <input class = "input_field" type = "text" id ="email" name  = "email" placeholder= " " required />  
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
                <br>
            </div>

                    <?php echo "<button id = 'btnUpdate' type = 'submit' name = 'id' value = '$_POST[id]'> Update </button>"; ?>

                </form>

                <?php $con=null; ?>
            </div>
        </div>
    </div>
</div>
    
</body>
</html> 