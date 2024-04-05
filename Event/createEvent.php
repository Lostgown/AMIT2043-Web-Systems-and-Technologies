<?php
    session_start();
    include('../Sys/authCheck.php');
    validAdmin();
?>

<!DOCTYPE html>
<html> 
<head>
    <title>Create Event</title>
    <link rel = 'stylesheet' type = 'text/css' href = '../css/main.css'>
    <link rel = 'stylesheet' type = 'text/css' href = '../css/formUpdate.css'>
<head>
<body>
    <div class = 'main'>
            
        
        
        <div class = 'content'>
            <div class = "frm">
                <div class = 'heading'>
                    <h1 style="text-align: center;"> Create New Event </h1>
                </div>  
                <form name = "f1" action = "../Sys/create.php" method = "POST" autocomplete="off"> 
                
                    <div class = 'input_box'>
                        <label class="input">
                            <input class = "input_field" type = "text" id ="name" name  = "name" 
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
                            <input class = "input_field" type = "time" name  = "time" placeholder= " " required
                                oninvalid="this.setCustomValidity('Choose the event starting time.')"
                                oninput="this.setCustomValidity('')" />
                            <span class="input_label">Starting Time</span>
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