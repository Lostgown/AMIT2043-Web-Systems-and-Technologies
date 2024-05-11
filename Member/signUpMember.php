<?php
    if(isset($_POST['name'])){
        include('../Sys/connection.php');               

                                                                                      
        $sql = "SELECT member_id FROM member ORDER BY member_id DESC LIMIT 1";
        $result= $con->query($sql);  
        $row = mysqli_fetch_assoc($result); 
        if (isset($row['member_id'])) {
                $number = ltrim($row['member_id'],'M')+1;  
                $id = 'M' . sprintf('%04d', $number);   
        }
        else {
                $id = "M0001";
        }
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Create Admin</title>
        <link rel = 'stylesheet' type = 'text/css' href = '../css/main.css'>
        <link rel = 'stylesheet' type = 'text/css' href = '../css/form.css'>
    </head>
    <body>
        <?php
        include '../Sys/authCheck.php';
        require_once '../lib/helper.php';
        ?>
        
        <form action="" method="POST">
        <div class = 'fixed'>     
            <div class = 'content'>
            <div>
            <div class = "frm" style="text-align:left;">  
            <h1 style="text-align:center"> Create Member </h1>
            
            <?php 
            if(empty($_POST)){
                //user never click or perform anything
                
            }else{
                //user click
                //1.1 receive user input from student form
                $name = trim($_POST["name"]);
                $ic = trim($_POST["ic_no"]);
                $pass = trim($_POST["pass"]);
                $phone = trim($_POST["phone_no"]);
                if(isset($_POST["gender"])){
                    $gender = trim($_POST["gender"]);
                }else{
                    $gender = NULL;
                }
                $email = trim($_POST["email"]);
                $birth = trim($_POST["birth_date"]);
                        
                //1.2 validate input
                //no validation for password as is TEMP pass
                $error["name"] = validateName($name);
                $error["ic_no"] = validateIC($ic);
                $error["phone_no"] = validatePhone($phone);
                $error["email"] = validateEmail($email);
                $error["gender"] = validateGender($gender);
                $error["pass"] = validatePass($pass);
                $error["birth_date"] = validateBirthDate($birth);

                
                //filter out empty error
                $error = array_filter($error);
                
                //check id $error contains value
                if(empty($error)){
                    //yay no error
                    $con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
                    
                    //step 2: SQL
                    $sql = "INSERT INTO member (member_id, member_name, ic_no, member_pass, phone_no, gender, email, birth_date)
                            VALUES(?,?,?,?,?,?,?,?)";
                    
                    //step 3: Process SQL
                    //NOTE: $con -> query() => when there is no "?" parameter in above sql satatement
                    //NOTE: $con -> prepare() => when there is "?" parameter in above sql satatement
                    $stmt = $con -> prepare($sql);
                    
                    //step 3.1: PAss parameter into SQL
                    //NOTE: string(s), int(i), double(d), blob(b) - binaryfile, img file
                    $stmt -> bind_param("ssssssss", $id, $name, $ic, $pass, $phone, $gender, $email, $birth);
                    
                    //step 3.2: Executer SQL
                    $stmt -> execute();
                    
                    if($stmt -> affected_rows >0){
                        //insert successful
                        printf("<div class='info'>
                                Admin <b>%s</b> has been inserted.\nID is <b>%s</b>[<a href='memberList.php'>Back to list</a>]
                                </div>", $name, $id);
                    }else{
                        //GG: unable to insert
                        echo "<div class='error'>Unable to insert.
                              <a href='createMember.php'>Try Again</a></div>";
                    }
                    
                    $stmt -> close();
                    $con -> close();
                    
                }else{
                    //oh no got error
                    echo "<ul class='error'>";
                    foreach ($error as $value) {
                        echo "<li>$value</li>";
                    }
                    echo "</ul>";
                    
                }
                
            }
            ?>

<div class = 'input_box'>
    <label class="input">
        <input class = "input_field" type = "text" name  = "name" value="<?php echo (isset($id))?$name: ""; ?>" placeholder=""/>
        <span class="input_label">Name</span>
    </label>
</div>

<div class = 'input_box'>
    <label class="input">
        <input class = "input_field" type = "text" name  = "ic_no" value="<?php echo (isset($id))?$ic: ""; ?>" placeholder=""/>
        <span class="input_label">IC Number</span>
    </label>
</div>

<div class = 'input_box'>
    <label class="input">
        <input class = "input_field" type = "password" name  = "pass" value="<?php echo (isset($id))?$pass: ""; ?>" placeholder=""/>
        <span class="input_label">Password</span>
    </label>
</div>

<div class = 'input_box'>
    <label class="input">
        <input class = "input_field" type = "text" id ="phone_no" name  = "phone_no"  value="<?php echo (isset($id))?$phone: ""; ?>" placeholder=""/>  
        <span class="input_label">Phone Number</span>
    </label>
</div>

<div class = 'input_box'>
<label class="input">
<input class = "input_field" type = "text" id ="email" name  = "email"  value="<?php echo (isset($id))?$email: ""; ?>" placeholder=""/>  
<span class="input_label">Email</span>
</label>
</div>

<div class = 'input_box'>
<label class="input">
    <input class = "input_field" type="date" name  = "birth_date"  value="<?php echo (isset($id))?$birth: ""; ?>" placeholder=""/>  
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

            
            <input type="submit" value="Insert" id="btnRegister" name="btnInsert" />
            <input type="button" value="Cancel" id= "btnCancel" name="btnCancel" onclick="location='memberList.php'"/>
            <br/>
        </form>
        
    </body>
</html>