<?php
        include '../Sys/authCheck.php';
        require_once '../lib/helper.php';
        ?><!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Delete</title>
        <link rel = 'stylesheet' type = 'text/css' href = '../css/main.css'>
        <link rel = 'stylesheet' type = 'text/css' href = '../css/delete.css'>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    </head>
    <body class="bg-dark ">
        <div class='container-sm' style="width: 700px;">
        <div class="row mt-2">
            <div class="col">
                <div class="card mt-2">
                    <div class="card-header">
        
        <h1 class="display-6 text-center">Delete Booking</h1>
        <div class="card-body">
        <?php 
        //using GET method and POST method together
        if($_SERVER["REQUEST_METHOD"] == "GET"){
            //GET method - retrieve existing record and display before delete
            //retrieve id from URL
            $id = (trim($_GET["id"]));
            
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
                $date = $row -> booking_date;
                $time = $row -> booking_time;
                
                printf("<h5 style='color: red;'>Are you sure you want to delete the following Booking?</h5>
                        <table class='table table-dark table-striped text-center' style='width:600px;'>
                           <tr>
                                <td>Booking ID:</td>
                                <td>%s</td>
                           </tr>
                           <tr>
                                <td>Event ID:</td>
                                <td>%s</td>
                           </tr>
                           <tr>
                                <td>Member ID:</td>
                                <td>%s</td>
                           </tr>
                           <tr>
                                <td>Category:</td>
                                <td>%s</td>
                           </tr>
                            <tr>
                                <td>Level:</td>
                                <td>%s</td>
                           </tr>
                           <tr>
                                <td>Booking Date:</td>
                                <td>%s</td>
                           </tr>
                           <tr>
                                <td>Booking Time:</td>
                                <td>%s</td>
                           </tr>
                        </table>
                        
                        <form action='' method='POST'>
                            <input type='hidden' name='hdID' value='%s' />
                            <input type='hidden' name='hdName' value='%s' />
                            <div class='d-flex justify-content-around'>
                            <input type='submit' id='btnYes' name='btnYes' value='Yes' class/>
                            <input type='button' id='btnCancel' name='btnCancel' value='Cancel' onclick='location=\"adminList.php\"' />
                            </div>
                        </form>
                        <br/>
                        "
                        , $id
                        , $event
                        , $member
                        , $category
                        , $level
                        , $date
                        , $time
                        , $id
                        , $event);
            }
            //to prevent security breach
            $con -> close();
            $result -> free();
        }else{
            //POST method - delete function when the user click yes button
            //retrieve admin id from hidden field
            $id = (trim($_POST["hdID"]));
            $event = trim($_POST["hdName"]);
            //step 1: create connection
            $con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
            
            //step 2: sql(parameterized query)
            $sql = "DELETE FROM booking WHERE booking_id = ?";
            
            //step 2.1: pass in value into sql parameter
            //NOTE: $con -> query() is used when sql has no "?"(no param)
            //NOTE: $con -> prepare() is used when sql contains "?"(with param)
            $stmt = $con -> prepare($sql);
           
            //step 2.2: bind value into sql
            //NOTE: inside bind_param need indicate data type of value
            //s - string, i - integer, d - double, b - blob
            $stmt ->bind_param("s", $id);
            
            //step 3: execute sql
            $stmt -> execute();
            
            if($stmt -> affected_rows > 0){
                //successfully deleted
                printf("<div class='info'><b>%s</b> has been deleted.
                       [ <a href='bookingList.php'>Back to list</a> ]
                        </div>", $id);
            }else{
                //unable to delete
                echo "<div class='error'>Unable to delete.
                [ <a href='bookingList.php'>Back to list</a> ]</div>";
                
            }
           $con -> close();
           $stmt -> close();
        }
        ?>
        </div>
        </div>
        </div>
        </div>
        </div>
        </div>
        <br/>
        <?php
        include '../lib/footer.php';
        ?>
        
        
    </body>
</html>