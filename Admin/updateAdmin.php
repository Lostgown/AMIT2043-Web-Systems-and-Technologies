<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Update Admin</title>
        <link rel = 'stylesheet' type = 'text/css' href = '../css/main.css'>
        <link rel = 'stylesheet' type = 'text/css' href = '../css/formUpdate.css'>
    </head>
    <body>
        <?php
        include './lib/navbar.php';
        require_once './lib/helper.php';
        ?>
        
        <form action="" method="POST">
            <h1>Update Admin</h1>

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
                $phone = $row -> phone_no;
                $gender = $row -> email;
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
                $id = strtoupper(trim($_POST["hdID"]));
                $name = trim($_POST["txtStudentName"]);
                if(isset($_POST["rbgender"])){
                    $gender = trim($_POST["rbgender"]);
                }else{
                    $gender = NULL;
                }
                $program = trim($_POST["ddlProgramme"]);
                        
                //1.2 validate input
                $error["name"] = validateStudentName($name);
                $error["gender"] = validateStudentGender($gender);
                $error["program"] = validateStudentProgram($program);
                
                //filter out empty error
                $error = array_filter($error);
                
                //check id $error contains value
                if(empty($error)){
                    //no error - update
                    $con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
                    
                    //step 2: SQL
                    $sql = "UPDATE Student SET StudentName = ?, Gender =?, Program = ? WHERE StudentId = ?";
                    
                    //step 3: Process SQL
                    //NOTE: $con -> query() => when there is no "?" parameter in above sql satatement
                    //NOTE: $con -> prepare() => when there is "?" parameter in above sql satatement
                    $stmt = $con -> prepare($sql);
                    
                    //step 3.1: PAss parameter into SQL
                    //NOTE: string(s), int(i), double(d), blob(b) - binaryfile, img file
                    $stmt -> bind_param("ssss", $name, $gender, $program, $id);
                    
                    //step 3.2: Executer SQL
                    $stmt -> execute();
                    
                    if($stmt -> affected_rows >0){
                        //insert successful
                        printf("<div class='info'>
                                Student <b>%s</b> has been updated.[<a href='list-student.php'>Back to list</a>]
                                </div>", $name);
                    }else{
                        //GG: unable to insert
                        echo "<div class='error'>Unable to update.
                              <a href='insert.php'>Try Again</a></div>";
                    }
                    
                    $stmt -> close();
                    $con -> close();
                }else{
                    //with error
                    //oh no got error
                    echo "<ul class='error'>";
                    foreach ($error as $value) {
                        echo "<li>$value</li>";
                    }
                    echo "</ul>";
                }
        }
        ?>
            <table cellpadding="5">
                <tr>
                    <td>Student Id: </td>
                    <td><input type="hidden" name="hdID" value="<?php echo (isset($id))? $id:""; ?>"/>
                        <?php echo (isset($id))? $id:""; ?></td>
                </tr>
                
                <tr>
                    <td>Student Name: </td>
                    <td><input type="text" name="txtStudentName" value="<?php echo (isset($name))?$name: ""; ?>" /></td>
                </tr>
                
                <tr>
                    <td>Gender: </td>
                    <td><input type="radio" name="rbgender" value="M" <?php echo (isset($gender) && $gender == "M")?"checked":"" ?> />Male</td>
                    <td><input type="radio" name="rbgender" value="F" <?php echo (isset($gender) && $gender == "F")?"checked":"" ?> />Female</td>
                </tr>
                
                <tr>
                    <td>Programme: </td>
                    <td><select name="ddlProgramme">
                            <?php 
                                    foreach (allProgramme() as $key => $value) {
                                        if(isset($program) && $program == $key){
                                            $selected = "selected";
                                        }else{
                                            $selected = "";
                                        }
                                        echo "<option value='$key' $selected >$value</option>";
                                    }
                            ?>
                </tr>
            </table>
            <br/>
            <input type="submit" value="update" name="btnUpdate" />
            <input type="button" value="cancel" name="btnCancel" onclick="location='list-student.php'"/>
        </form>
        
        <?php
        include './general/footer.php';
        ?>
    </body>
</html>