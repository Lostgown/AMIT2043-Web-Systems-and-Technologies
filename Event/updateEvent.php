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
            <h1 style="text-align:center"> Update Event </h1>
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
            $sql = "SELECT * FROM event WHERE event_id = '$id'";
            
            //step 2.1: Remove special character
            $id = $con ->real_escape_string($id);
            
            //step 3: process SQL
            $result = $con -> query($sql);
            
            if($row = $result->fetch_object()){
                $id = $row -> event_id;
                $file = $row -> imgpath;
                $name = $row -> event_name;
                $start_date = $row -> date;
                $start = $row -> start_time;
                $end = $row -> end_time;
                $pax = $row -> pax;
                $remain_pax = $row -> remaining_pax;
                $status = $row -> status;
                
            }else{
                //unable to fetch record from DB
                echo "<div class='error'>Unable to retrieve record.
                [ <a href='../Event/eventList.php'>Back to list</a> ]</div>";
            }
            $con -> close();
            $result -> free();
        }else{
           //user click
                //1.1 receive user input from student form
                $name = $_POST['name'];
                $event_date = trim($_POST['date']);
                $event_start = $_POST['start'];
                $event_end = $_POST['end'];
                $desc = $_POST['desc'];
                $pax = $_POST['pax'];
                $file = $_FILES['image'];
                    
                //1.2 validate input
                //no validation for password as is TEMP pass
                // $error['image'] = validateFile($file);
                $error['date'] = validateEventDate($event_date);
                $error['start'] = validateTimeStart($event_start);
                $error['end'] = validateTimeEnd($event_end);
                
                //filter out empty error
                $error = array_filter($error);
                //check id $error contains value

                $i = 0;
                $i++;

                if(empty($error)){
                    $count = 0;
                    $count++;
                    if($count == 1) {
                        $status = 'Completed';
                    } else {
                        $status = 'Pending';
                    }

                    //yay no error
                    $con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
                    
                    $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

                    $save_as = uniqid() . '.' . $ext;
            
                    $uploadDir = '../photo/';
                    $imagePath = $uploadDir . $save_as;

                    move_uploaded_file($file['tmp_name'], '../photo/' . $save_as);
                    
                    printf('<div class="info"> image uploaded successfully. it is saved as <a href="gallery.php?image=%s">%s</a></div>',
                            $save_as, $save_as);

                    //step 2: SQL
                    // $con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
                    // $sql = mysqli_query($con, "INSERT INTO event (event_id, imgpath, event_name, date, start_time, end_time, description, pax, remaining_pax, status) VALUES ('$id', '$imagePath', '$name', '$event_date', '$event_start', '$event_end', '$desc', '$pax', '$pax', '$status')");
                    $sql = "UPDATE event SET imgpath = ?, event_name = ?, date = ?, start_time = ?, end_time = ?, description = ?, pax = ?, remaining_pax = ?, status = ? WHERE event_id = ?";

                    //step 3: Process SQL
                    //NOTE: $con -> query() => when there is no "?" parameter in above sql satatement
                    //NOTE: $con -> prepare() => when there is "?" parameter in above sql satatement
                    $stmt = $con->prepare($sql);
                    
                    //step 3.1: PAss parameter into SQL
                    //NOTE: string(s), int(i), double(d), blob(b) - binaryfile, img file
                    $stmt->bind_param("ssssssdsss", $imagePath, $name, $event_date, $event_start, $event_end, $desc, $pax, $pax, $status, $id);
                    
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
                    <input type="hidden" value="1048576" name="MAX_FILE_SIZE" />
                    <input class="form-control" type="file" name="image" value="" />

                </div>
            </div>
            <br/>


         
            <input type="submit" value="Insert" id="btnRegister" name="btnInsert" "/>
            <input type="button" value="Cancel" id= "btnCancel" name="btnCancel" onclick="location='eventList.php'"/>
            <br/>
            </form>
    </body>
</html>