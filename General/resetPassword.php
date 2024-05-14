<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Password Reset</title>
        <link rel = 'stylesheet' type = 'text/css' href = '../css/main.css'>
        <link rel = 'stylesheet' type = 'text/css' href = '../css/form.css'>
        
    </head>
    <body>


        <?php
        require_once '../lib/helper.php';
        ?>
        
        <form action="" method="POST">
        <div class = 'fixed'>     
            <div class = 'content'>
            <div>
            <div class = "frm" style="text-align:left;">  
            <h1 style="text-align:center"> Password Reset </h1>
            <input class = "input_field" type = "hidden" name  = "hdID" value=""/> 


        <?php 
         session_start(); 

        //using GET method and POST method together
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id =(trim($_SESSION["idUser"]));
            $password = trim($_POST["pass"]);
            $passwordCfn = trim($_POST["passCfn"]);

            // Validate the new password format
            $errorA = validatePass($password);
            $errorB = validateCfnPass($passwordCfn, $password);
        
            if (!empty($errorA)) {
                // If there's an error in the password format, display it
                echo "<div class='error'>$errorA</div>";
            } else if(!empty($errorB)) {
                echo "<div class='error'>$errorB</div>";
            } else {

            $con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
            
            $sql = "UPDATE admin SET admin_pass = ? WHERE admin_id = ?";

            $stmt = $con->prepare($sql);
            $stmt->bind_param("ss", $password, $id);
            $stmt->execute();

            if ($stmt->affected_rows > 0) {

                echo "<div class='info'>Password reset successfully for ID: $id.</div>";
            } else {

                echo "<div class='error'>Unable to reset password. Please try again.</div>";
            }
            
            $stmt->close();
            $con->close();
            }
        }
        ?>
        
        
                    <div class = 'input_box'>
                        <label class="input">
                            <input class = "input_field" type = "password" name = "pass" id="pass" value="" placeholder=""/>
                            <span class="input_label">Password</span>
                    </div>

                    <div class = 'input_box'>
                        <label class="input">
                            <input class = "input_field" type="password" name="passCfn" id="passCfn" value="" placeholder=""/>  
                            <span class="input_label">Password Confirmation</span>
                        </label>
                    </div>

                    <div class = "genderRadio">
                    <p id = "gender" style="text-align: left;"> 
                </p>    
                    <p id = "btnMale"><label>
                    <input type = "checkbox" name = "passVisibility" value="" onclick="showPassword()" /> Show password &nbsp 
                    </label>
                    </p>
                 </div>

            <input type="submit" value="Reset" id="btnUpdate" name="btnUpdate" />
            <input type="button" value="Cancel" id="btnCancel" name="Cancel" onclick="location='../Admin/menuAdmin.php'" />
            </form>
            <br/>

        
    </body>
    <script>

// function password vibility 
function showPassword() {

    var password = document.getElementById("pass");
    var passwordCfn = document.getElementById("passCfn");

    if (password.type === "password" || passwordCfn.type === "password") {
        password.type = "text";
        passwordCfn.type = "text";
    } else {
        password.type = "password";
        passwordCfn.type = "password";
    }
}
    </script>
</html>