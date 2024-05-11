<?php 
        session_start();
        include('../Sys/connection.php');   
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Update Admin</title>
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
            <h1 style="text-align:center"> Password reset </h1>
            <input class = "input_field" type = "hidden" name  = "hdID" value=""/> 


        <?php 
          
        $loginType = $_SESSION['loginType']; 

        //using GET method and POST method together
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = strtoupper(trim($_POST["id"]));
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
            
            // if($_SESSION['id'] == 'admin') {
            //     $sql = "UPDATE admin SET admin_pass = ? WHERE admin_id = ?";
            // } else if($_SESSION['id'] == 'member') {
            //     $sql = "UPDATE member SET member_pass = ? WHERE member_id = ?";
            // } else {
            //     //ERROR MESSAGE
            //     echo "<div class='error'>Invalid user role.</div>";
            //     exit;
            // }

        if ($loginType == 'member') {
            $sql = "UPDATE member SET member_pass = ? WHERE member_ id = ?";
        }
        else if ($loginType == 'admin') {
            $sql = "UPDATE admin SET admin_pass = ? WHERE admin_id = ?";
        }
        else {
            echo "<div class='error'>Invalid login type.</div>";
            exit;
        }

            $stmt = $con->prepare($sql);
            $stmt->bind_param("ss", $password, $id);
            $stmt->execute();

            if ($stmt->affected_rows > 0) {
                // Password reset successful
                echo "<div class='info'>Password reset successfully for ID: $id.</div>";
            } else {
                // Unable to update password
                echo "<div class='error'>Unable to reset password. Please try again.</div>";
            }
            
            $stmt->close();
            $con->close();
            }
        }
        ?>
        
        

        <div class = 'input_box'>
                        <label class="input">
                            <input class = "input_field" type = "text" name  = "id" value="" placeholder=""/>
                            <span class="input_label">Id</span>
                        </label>
                    </div>
        
                    <div class = 'input_box'>
                        <label class="input">
                            <input class = "input_field" type = "text" name  = "pass" value="" placeholder=""/>
                            <span class="input_label">Password</span>
                        </label>
                    </div>

                    <div class = 'input_box'>
                        <label class="input">
                            <input class = "input_field" type="text" name="passCfn"  value="" placeholder=""/>  
                            <span class="input_label">Password Confirmation</span>
                        </label>
                    </div>

            <br/>
            <input type="submit" value="Update" id="btnUpdate" name="btnUpdate" />
            <input type="button" value="Cancel" id="btnCancel" name="Cancel" onclick="location='../Admin/menuAdmin.php'" />
            </form>
            <br/>

        
    </body>
</html>