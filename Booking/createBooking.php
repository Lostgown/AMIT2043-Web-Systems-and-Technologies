<?php
    if(isset($_POST['event'])){
        include('../Sys/connection.php');               

                                                                                      
        $sql = "SELECT booking_id FROM booking ORDER BY booking_id DESC LIMIT 1";
        $result= $con->query($sql);  
        $row = mysqli_fetch_assoc($result); 
        if (isset($row['booking_id'])) {
                $number = ltrim($row['booking_id'],'B')+1;  
                $id = 'B' . sprintf('%04d', $number);   
        }
        else {
                $id = "B0001";
        }
    }

?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Create Booking</title>
        <link rel = 'stylesheet' type = 'text/css' href = '../css/main.css'>
        <link rel = 'stylesheet' type = 'text/css' href = '../css/form.css'>
        
    </head>
    <body>
        <?php
        require_once '../lib/helper.php';
        session_start();
        
        ?>
        
        <form action="" method="POST">
        <div class = 'fixed'>     
            <div class = 'content'>
            <div>
            <div class = "frm" style="text-align:left;">  
            <h1 style="text-align:center"> Create Booking </h1>
        <?php 
        //using GET method and POST method together
        if($_SERVER["REQUEST_METHOD"] == "GET"){
            //GET method - retrieve existing record and display before delete
            //retrieve id from URL
            $event =(trim($_GET["id"]));
            
            //retrieve record from database based on id
            //step 1: Connect DB
            $con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
            
            //step 2: SQL statement
            $sql = "SELECT * FROM booking";
            
            //step 3: process SQL
            $result = $con -> query($sql);
            
            if($row = $result->fetch_object()){
                $id = $_SESSION['idUser'];
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
                $event = trim($_POST["event"]);
                $member = trim($_POST["member"]);
                $category = trim($_POST["category"]);
                $level = trim($_POST["level"]);
                $date = date("Y-m-d");
                $time =  date("H:i:s");

                //1.2 validate input
                $error["category"] = validateCategory($category);
                //$error["ic_no"] = validateIC($ic);

                //filter out empty error
                $error = array_filter($error);
                
                //check id $error contains value
                if(empty($error)){
                    //no error - update
                    $con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
                    
                    //step 2: SQL
                    $sql = "INSERT INTO booking (booking_id, event_id, member_id, category, level, booking_date, booking_time) VALUES(?,?,?,?,?,?,?)";
                    
                    //step 3: Process SQL
                    //NOTE: $con -> query() => when there is no "?" parameter in above sql satatement
                    //NOTE: $con -> prepare() => when there is "?" parameter in above sql satatement
                    $stmt = $con -> prepare($sql);
                    
                    //step 3.1: Pass parameter into SQL
                    //NOTE: string(s), int(i), double(d), blob(b) - binaryfile, img file
                    $stmt -> bind_param("sssssss", $id, $event, $member, $category, $level, $date, $time);
                    
                    //step 3.2: Executer SQL
                    $stmt -> execute();
                    
                    if($stmt -> affected_rows >0){
                        //insert successful
                        printf("<div class='info'>
                                Booking <b>%s</b> has been inserted.[<a href='bookingList.php'>Back to list</a>]
                                </div>", $id);
                    }else{
                        //GG: unable to insert
                        echo "<div class='error'>Unable to insert.
                              <a href='createBooking.php'>Try Again</a></div>";
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
            

            <div>    
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
                        </select>  
                        </label>
                        </div>
                    </div>

                    <div class = 'input_box'>
                        <div class="level">
                        <label> Level:
                        <select name="level">
                            <?php 
                                    foreach (allLevel() as $key => $value) {
                                        if(isset($level) && $level == $key){
                                            $selected = "selected";
                                        }else{
                                            $selected = "";
                                        }
                                        echo "<option value='$key' $selected >$value</option>";
                                    }
                            ?>
                        </select>  
                        </label>
                        </div>
                    </div>

            </div>

            <br/>
            <input type="submit" value="Create" id="btnUpdate" name="btnUpdate" />
            <input type="button" value="Cancel" id="btnCancel" name="Cancel" onclick="location='../Member/menuMember.php'" />
            </form>
            <br/>

        
    </body>
</html>