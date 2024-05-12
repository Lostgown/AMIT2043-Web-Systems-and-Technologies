<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login Page</title>
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/index.css" rel="stylesheet" />
        <link rel = 'stylesheet' type = 'text/css' href = '../css/main.css'>
    </head>
    <body>
        <div class="form">
            
            <h1 style="text-align:center;"> TARUMT Penang Badminton Club </h1> 
            <form action="Sys/loginAuth.php" method="POST" autocomplete="off">
                <div class = "input_box">
                <label class="input">
                    <input class ="input_field" type = "text" id ="user" name  = "user" 
                        onkeyup="this.value = this.value.toUpperCase();"
                        autofocus="autofocus" placeholder= " " required
                        oninvalid="this.setCustomValidity('Fill in your ID.')"
                        oninput="this.setCustomValidity('')"/>
                    <span class="input_label">ID</span>
                </label> 
                </div>

                <div class = 'input_box'>
                <label class="input">
                    <input class = "input_field" type = "password" id ="pass" name  = "pass" 
                        placeholder= " " required
                        oninvalid="this.setCustomValidity('Fill in your password.')"
                        oninput="this.setCustomValidity('')" />  
                    <span class="input_label">Password</span>
                </label>
                </div>
                
                
                <p><a href='retrievePassword.php' style = "text-decoration: none;">&nbsp;&nbsp;Forgot Password? </a></p>

                <div class = "userType">
                    <p id = "btnMember"><label><input type = "radio" name = "loginType" value = 'member' checked/> Member </label></p>
                    <p id = "btnAdmin"><label><input type = "radio" name = "loginType" value = 'admin' /> Admin </label></p>
                </div>
    
                <p style = "text-align: center;"><input type = "submit" id = "btnlogin" name = 'btn' value = "Login" required = "required" style="border: 0px;"/></p>  

                <p id = "btnSignUp"><a href='signUpMember.php' style = "text-decoration: none;"> Sign Up as Member </a></p>  

                
                
            </form>
            
        <?php  ?>
        </div>
    </body>
</html>
