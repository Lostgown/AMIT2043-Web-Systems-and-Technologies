<?php
    session_start();
    include('../Sys/authCheck.php');
    validAdmin();
?>

<?php
        require_once '../lib/helper.php';
?>

<!DOCTYPE html>
<html> 
<head>
    <title>Create New Event</title>
    <link rel = 'stylesheet' type = 'text/css' href = '../css/main.css'>
    <link rel = 'stylesheet' type = 'text/css' href = '../css/form.css'>
<head>
<body>
    <div class = 'main'>
            
        
        
        <div class = 'content'>
            <div class = "frm">
                <div class = 'heading'>
                    <h1 style="text-align: center;"> Create New Event </h1>

                <?php
                if(empty($_POST)){
                    //user never click or perform anything
                    
                }else{
                    //user click
                    //1.1 receive user input 
                    $eventname = trim($_POST["event_name"]);
                    $date = trim($_POST["date"]);
                    $starttime = trim($_POST["start_time"]);
                    $endtime = trim($_POST["end_time"]);
                    $description = trim($_POST["description"]);
                    $pax = trim($_POST["pax"]);
                            
                    //1.2 validate input
                    //no validation for password as is TEMP pass
                    // $error["event_name"] = validateEventName($eventname);
                    // $error["date"] = validateDate($date);
                    // $error["start_time"] = validateStartTime($starttime);
                    // $error["end_time"] = validateEndTime($endtime);
                    // $error["description"] = validateDescription($description);
                    // $error["pax"] = validatePax($pax);
    
                    
                    //filter out empty error
                    // $error = array_filter($error);
                    
                    //check id $error contains value
                    if(empty($error)){
                        //yay no error
                        $con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
                        
                        //step 2: SQL
                        $sql = "INSERT INTO event (event_id, event_name, date, start_time, end_time, description,pax) VALUES(?,?,?,?,?,?,?)";
                        
                        //step 3: Process SQL
                        //NOTE: $con -> query() => when there is no "?" parameter in above sql satatement
                        //NOTE: $con -> prepare() => when there is "?" parameter in above sql satatement
                        $stmt = $con -> prepare($sql);
                        
                        //step 3.1: Pass parameter into SQL
                        //NOTE: string(s), int(i), double(d), blob(b) - binaryfile, img file
                        $stmt -> bind_param("sssssss", $id, $eventname, $date, $starttime, $endtime, $description, $pax);
                        
                        //step 3.2: Executer SQL
                        $stmt -> execute();
                        
                        if($stmt -> affected_rows >0){
                            //insert successful
                            printf("<div class='info'>
                                    New event <b>%s</b> has been inserted.\nID is <b>%s</b>[<a href='eventList.php'>Back to list</a>]
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


                </div>  
                <form name = "f1" action = "" method = "POST" autocomplete="off"> 
                
                    <div class = 'input_box'>
                        <label class="input">
                            <input class = "input_field" type = "text" id ="name" name  = "event_name" 
                            autofocus="autofocus" placeholder= " " required
                            oninvalid="this.setCustomValidity('Fill in the event name.')"
                            oninput="this.setCustomValidity('')" />   
                            <span class="input_label">Event Name</span>
                        </label>
                    </div>

                    <div class = 'input_box'>
                        <label class="input">
                            <input class = "input_field" type="date" name  = "date" 
                                placeholder= " " required
                                oninvalid="this.setCustomValidity('Choose the event date.')"
                                oninput="this.setCustomValidity('')" />  
                            <span class="input_label">Event Date</span>
                        </label>
                    </div>

                    <div class = 'input_box'>
                        <label class="input">
                            <input class = "input_field" type = "time" name  = "start_time" placeholder= " " required
                                oninvalid="this.setCustomValidity('Choose the event starting time.')"
                                oninput="this.setCustomValidity('')" />
                            <span class="input_label">Starting Time</span>
                        </label>
                    </div>

                    <div class = 'input_box'>
                        <label class="input">
                            <input class = "input_field" type = "time" name  = "end_time" placeholder= " " required
                                oninvalid="this.setCustomValidity('Choose the event ending time.')"
                                oninput="this.setCustomValidity('')" />
                            <span class="input_label">Ending Time</span>
                        </label>
                    </div>

                    <div class = 'input_box'>
                        <label class="input">
                                <textarea class = "input_field" type = "" id ="description" name  = "description" placeholder= " " required ></textarea>  
                                <span class="input_label">Description</span>
                        </label>
                    </div>
                    
                    <div class = 'input_box'>
                        <label class="input">
                                <input class = "input_field" type = "number" id ="pax" name  = "pax" placeholder= " " required
                                oninvalid="this.setCustomValidity('Event pax.')"
                                oninput="this.setCustomValidity('')" />  
                            <span class="input_label">Pax</span>
                        </label>
                    </div>
                    <br>

                    <button id = 'btnRegister' style = 'margin-left:42%;' name ='btn'> Create </button>

                </form>
                <a href='javascript: history.go(-1)'><button id="btnUpdate" name ='btn'> Back </button></a>
                    <br>

                <?php $con=null; ?>
                
            </div>
        </div>
    </div>
</body>

</html> 