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
            <h1 style="text-align:center"> Edit Profile </h1>
        <?php 
        //using GET method and POST method together
        if($_SERVER["REQUEST_METHOD"] == "GET"){
            //GET method - retrieve existing record and display before delete
            //retrieve id from URL
            $id = strtoupper(trim($_GET["id"]));
            
            //retrieve record from database based on id
            //step 1: Connect DB
            $con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
            
            //step 2: SQL statement
            $sql = "SELECT * FROM admin WHERE admin_id = '$id'";
            
            //step 2.1: Remove special character
            $id = $con ->real_escape_string($id);
            
            //step 3: process SQL
            $result = $con -> query($sql);
            
            if($row = $result->fetch_object()){
                $id = $row -> admin_id;
                $name = $row -> admin_name;
                $ic = $row -> ic_no;
                $phone = $row -> phone_no;
                $gender = $row -> gender;
                $email = $row -> email;
                $birth = $row -> birth_date;
            }else{
                //unable to fetch record from DB
                echo "<div class='error'>Unable to retrieve record.
                [ <a href='adminList.php'>Back to list</a> ]</div>";
            }
            $con -> close();
            $result -> free();
            
        }else{
            //POST METHOD - update DB record
            //1.1 receive user input from student form
                $id = (trim($_POST["hdID"]));
                $name = trim($_POST["name"]);
                $ic = trim($_POST["ic_no"]);
                $phone = trim($_POST["phone_no"]);
                $email = trim($_POST["email"]);
                if(isset($_POST["gender"])){
                    $gender = trim($_POST["gender"]);
                }else{
                    $gender = NULL;
                }
                $birth = trim($_POST["birth_date"]); 

                //1.2 validate input
                $error["name"] = validateName($name);
                $error["ic_no"] = validateIC($ic);
                $error["phone_no"] = validatePhone($phone);
                $error["email"] = validateEmail($email);
                $error["gender"] = validateGender($gender);
                //$error["da"] = validateIC($ic);

                //filter out empty error
                $error = array_filter($error);
                
                //check id $error contains value
                if(empty($error)){
                    //no error - update
                    $con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
                    
                    //step 2: SQL
                    $sql = "UPDATE admin SET admin_name = ?, ic_no = ?, phone_no =?, gender = ? , email = ?, birth_date = ? WHERE admin_id = ?";
                    
                    //step 3: Process SQL
                    //NOTE: $con -> query() => when there is no "?" parameter in above sql satatement
                    //NOTE: $con -> prepare() => when there is "?" parameter in above sql satatement
                    $stmt = $con -> prepare($sql);
                    
                    //step 3.1: Pass parameter into SQL
                    //NOTE: string(s), int(i), double(d), blob(b) - binaryfile, img file
                    $stmt -> bind_param("sssssss", $name, $ic, $phone, $gender, $email, $birth, $id);
                    
                    //step 3.2: Executer SQL
                    $stmt -> execute();
                    
                    if($stmt -> affected_rows >0){
                        //insert successful
                        printf("<div class='info'>
                                Admin <b>%s</b> has been updated.[<a href='adminList.php'>Back to list</a>]
                                </div>", $name);
                    }else{
                        //GG: unable to insert
                        echo "<div class='error'>Unable to update.
                              <a href='updateAdmin.php'>Try Again</a></div>";
                    }
                    
                    $stmt -> close();
                    $con -> close();
                }else{
                    //with error
                    echo "<ul class='error'>";
                    foreach ($error as $value) {
                        echo "<li list-group-item>$value</li>";
                    }
                    echo "</ul>";
                }
        }
        ?>
            

                    <input class = "input_field" type = "hidden" name  = "hdID" value="<?php echo (isset($id))?$id: ""; ?>"/> 

                    <div class = 'input_box'>
                        <label class="input">
                            <input class = "input_field" type = "text" name  = "name" value="<?php echo (isset($name))?$name: ""; ?>"/>
                            <span class="input_label">Name</span>
                        </label>
                    </div>
        
                    <div class = 'input_box'>
                        <label class="input">
                            <input class = "input_field" type = "text" name  = "ic_no" value="<?php echo (isset($ic))?$ic: ""; ?>"/>
                            <span class="input_label">IC Number</span>
                        </label>
                    </div>

                    <div class = 'input_box'>
                        <label class="input">
                            <input class = "input_field" type = "text" id ="phone_no" name  = "phone_no"  value="<?php echo (isset($phone))?$phone: ""; ?>"/>  
                            <span class="input_label">Phone Number</span>
                        </label>
                    </div>
            
            <div class = 'input_box'>
                <label class="input">
                    <input class = "input_field" type = "text" id ="email" name  = "email"  value="<?php echo (isset($email))?$email: ""; ?>"/>  
                    <span class="input_label">Email</span>
                </label>
            </div>

            <div class = 'input_box'>
                    <label class="input">
                        <input class = "input_field" type="date" name  = "birth_date"  value="<?php echo (isset($birth))?$birth: ""; ?>"/>  
                        <span class="input_label">Birth Date</span>
                    </label>
            </div>

            <div class = "genderRadio">
                <p id = "gender" style="text-align: left;"> &nbspGender: &nbsp &nbsp </p>      
                <p id = "btnMale"><label>
                    <input type = "radio" name = "gender" value = 'M' 
                    <?php echo (isset($gender) && $gender == "M")?"checked":"" ?> /> Male &nbsp </label>
                </p>
                <p id = "btnFemale"><label>
                    <input type = "radio" name = "gender" value = 'F' <?php echo (isset($gender) && $gender == "F")?"checked":"" ?>/> Female </p></label>
                <br>
            </div>

            

            <br/>
            <input type="submit" value="Update" id="btnUpdate" name="btnUpdate" />
            <input type="button" value="Cancel" id="btnCancel" name="Cancel" onclick="location='adminList.php'" />
            </form>
            <br/>

        
    </body>
</html>