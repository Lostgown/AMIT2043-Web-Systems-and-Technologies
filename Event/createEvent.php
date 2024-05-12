<?php
    if(isset($_POST['name'])){
        include('../Sys/connection.php');               

                                                                                      
        $sql = "SELECT event_id FROM admin ORDER BY event_id DESC LIMIT 1";
        $result= $con->query($sql);  
        $row = mysqli_fetch_assoc($result); 
        if (isset($row['event_id'])) {
                $number = ltrim($row['event_id'],'E')+1;  
                $id = 'E' . sprintf('%04d', $number);   
        }
        else {
                $id = "E0001";
        }
    }

?>

<?php
        require_once '../lib/helper.php';
?>

<?php
error_reporting(0);
 
$msg = "";
 
// If upload button is clicked ...
if (isset($_POST['btnInsert'])) {
 
    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "./image/" . $filename;
 
    $db = mysqli_connect("localhost", "root", "", "geeksforgeeks");
 
    // Get all the submitted data from the form
    $sql = "INSERT INTO image (filename) VALUES ('$filename')";
 
    // Execute query
    mysqli_query($db, $sql);
 
    // Now let's move the uploaded image into the folder: image
    if (move_uploaded_file($tempname, $folder)) {
        echo "<h3>  Image uploaded successfully!</h3>";
    } else {
        echo "<h3>  Failed to upload image!</h3>";
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
            <h1 style="text-align:center"> Create Event </h1>
            
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
                $error["pass"] = validatePassTemp($pass);
                $error["birth_date"] = validateBirthDate($birth);

                
                //filter out empty error
                $error = array_filter($error);
                
                //check id $error contains value
                if(empty($error)){
                    //yay no error
                    $con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
                    
                    //step 2: SQL
                    $sql = "INSERT INTO event (event_id, imgpath, event_name, date, start_time, end_time, description, pax, remaining_pax, status) VALUES(?,?,?,?,?,?,?,?,?,'Pending')";
                    
                    //step 3: Process SQL
                    //NOTE: $con -> query() => when there is no "?" parameter in above sql satatement
                    //NOTE: $con -> prepare() => when there is "?" parameter in above sql satatement
                    $stmt = $con -> prepare($sql);
                    
                    //step 3.1: PAss parameter into SQL
                    //NOTE: string(s), int(i), double(d), blob(b) - binaryfile, img file
                    $stmt -> bind_param("sssssssss", $id, $path, $name, $date, $start, $end, $desc, $pax, $pax);
                    
                    //step 3.2: Executer SQL
                    $stmt -> execute();
                    
                    if($stmt -> affected_rows >0){
                        //insert successful
                        printf("<div class='info'>
                                Event <b>%s</b> has been inserted.\nID is <b>%s</b>[<a href='eventList.php'>Back to list</a>]
                                </div>", $name, $id);
                    }else{
                        //GG: unable to insert
                        echo "<div class='error'>Unable to insert.
                              <a href='createEvent.php'>Try Again</a></div>";
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
            <div>
                <div class = 'input_box'>
                    <label class="input">
                        <input class = "input_field" type = "text" name = "name" value="<?php echo (isset($id))?$name: ""; ?>" placeholder=""/>
                        <span class="input_label">Name</span>
                    </label>
                </div>

                <div class = 'input_box'>
                <label class="input">
                    <input class = "input_field" type="date" name = "date"  value="<?php echo (isset($id))?$date: ""; ?>" placeholder=""/>  
                    <span class="input_label">Event Date</span>
                </label>
                </div>

                <div class = 'input_box'>
                    <label class="input">
                        <input class = "input_field" type = "time" name = "start"  value="<?php echo (isset($id))?$start: ""; ?>" placeholder=""/>  
                        <span class="input_label">Start Time</span>
                    </label>
                </div>

                <div class = 'input_box'>
                    <label class="input">
                        <input class = "input_field" type = "time" name = "end"  value="<?php echo (isset($id))?$end: ""; ?>" placeholder=""/>  
                        <span class="input_label">End Time</span>
                    </label>
                </div>

                <div class = 'input_box'>
                        <label class="input">
                                <textarea class = "input_field" type = "" name  = "desc" placeholder= " " value="<?php echo (isset($id))?$desc: ""; ?>" ></textarea>  
                                <span class="input_label">Description</span>
                        </label>
                </div>

                <div class = 'input_box'>
                    <label class="input">
                        <input class = "input_field" type = "number" name = "pax"  value="<?php echo (isset($id))?$pax: ""; ?>" placeholder=""/>  
                        <span class="input_label">Pax</span>
                    </label>
                </div>

                <div class = 'input_box'>
                    <label>Upload Photo :  </label>
                    <input class="form-control" type="file" name="uploadfile" value="" />
                </div>
            </div>
            <br/>


         
            <input type="submit" value="Insert" id="btnRegister" name="btnInsert" />
            <input type="button" value="Cancel" id= "btnCancel" name="btnCancel" onclick="location='eventList.php'"/>
            <br/>
        </form>
        
    </body>
</html> 