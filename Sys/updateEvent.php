<?php

    session_start();
    include('connection.php');  

    $id = $_POST['id'];
    $name = $_POST['name'];  
    $date = $_POST['date'];  
    $time = $_POST['time'];
    $description = $_POST['description'];
    $pax = $_POST['pax'];

    $sql ="UPDATE `event` 
               SET `event_name` = '$name', `date` = '$date', `time` = '$time', `description` = '$description', 
               `pax` = '$pax'
               WHERE `event`.`event_id` = '$id'; ";
        $con->query($sql);

        echo "<link rel = 'stylesheet' type = 'text/css' href = '../css/main.css'><div></div> 
        <script> 
          alert('Event $id Updated.'); 
          window.location.href='../Admin/eventMaintain.php' 
        </script>";



?>