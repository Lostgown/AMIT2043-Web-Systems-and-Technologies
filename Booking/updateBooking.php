<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Update booking</title>
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
            <h1 style="text-align:center"> Edit Booking </h1>
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
            $sql = "SELECT * FROM booking WHERE booking_id = '$id'";
            
            //step 2.1: Remove special character
            $id = $con ->real_escape_string($id);
            
            //step 3: process SQL
            $result = $con -> query($sql);
            
            if($row = $result->fetch_object()){
                $id = $row -> booking_id;
                $event = $row -> event_id;
                $member = $row -> member_id;
                $category = $row -> category;
                $level = $row -> level;
            }else{
                //unable to fetch record from DB
                echo "<div class='error'>Unable to retrieve record.
                [ <a href='bookingList.php'>Back to list</a> ]</div>";
            }
            $con -> close();
            $result -> free();
        }else{
            //POST METHOD - update DB record
            //1.1 receive user input from student form
                $id = (trim($_POST["hdID"]));
                $event = trim($_POST["event"]);
                $member = trim($_POST["member"]);
                $category = trim($_POST["category"]);
                $level = trim($_POST["level"]);
                $date = 
                $time =  

                //1.2 validate input
                $error["name"] = validateName($name);
                $error["ic_no"] = validateIC($ic);

                //filter out empty error
                $error = array_filter($error);
                
                //check id $error contains value
                if(empty($error)){
                    //no error - update
                    $con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
                    
                    //step 2: SQL
                    $sql = "UPDATE booking SET category = ?, level = ?, booking_date = ?, booking_time = ? WHERE admin_id = ?";
                    
                    //step 3: Process SQL
                    //NOTE: $con -> query() => when there is no "?" parameter in above sql satatement
                    //NOTE: $con -> prepare() => when there is "?" parameter in above sql satatement
                    $stmt = $con -> prepare($sql);
                    
                    //step 3.1: Pass parameter into SQL
                    //NOTE: string(s), int(i), double(d), blob(b) - binaryfile, img file
                    $stmt -> bind_param("sssss", $category, $level, $date, $time, $id);
                    
                    //step 3.2: Executer SQL
                    $stmt -> execute();
                    
                    if($stmt -> affected_rows >0){
                        //insert successful
                        printf("<div class='info'>
                                Booking <b>%s</b> has been updated.[<a href='bookingList.php'>Back to list</a>]
                                </div>", $id);
                    }else{
                        //GG: unable to insert
                        echo "<div class='error'>Unable to update.
                              <a href='updateBooking.php'>Try Again</a></div>";
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
            

                <div class = 'input_box'>
                        <label class="input">
                            <input class = "input_field" type = "text" name  = "hdID" value="<?php echo (isset($id))?$id: ""; ?>" readonly/>
                            <span class="input_label">Booking ID</span>
                        </label>
                    </div> 

                    <div class = 'input_box'>
                        <label class="input">
                            <input class = "input_field" type = "text" name  = "event" value="<?php echo (isset($event))?$event: ""; ?>" readonly/>
                            <span class="input_label">Event ID</span>
                        </label>
                    </div>
        
                    <div class = 'input_box'>
                        <label class="input">
                            <input class = "input_field" type = "text" name  = "member" value="<?php echo (isset($member))?$member: ""; ?>" readonly/>
                            <span class="input_label">Member ID</span>
                        </label>
                    </div>

                    <div class = 'input_box'>
                        <div class="category">
                        <label> Category:
                        <select name="category">
                            <?php 
                                    foreach (allCategory() as $key => $value) {
                                        if(isset($category) && $category == $key){
                                            $selected = "selected";
                                        }else{
                                            $selected = "";
                                        }
                                        echo "<option value='$key' $selected >$value</option>";
                                    }
                            ?>  
                        </label>
                        </div>
                    </div>

            </div>

            
            </p>    
                    <p id = "btnMale"><label>
                    <input type = "checkbox" name = "passVisibility" value="" onclick="showPassword()" /> Show password &nbsp 
                    </label>
                    </p>
                 </div>


            <input type="submit" value="Update" id="btnUpdate" name="btnUpdate" />
            <input type="button" value="Cancel" id="btnCancel" name="Cancel" onclick="location='../Admin/menuAdmin.php'" />
            </form>
            <br/>

        
    </body>
</html>