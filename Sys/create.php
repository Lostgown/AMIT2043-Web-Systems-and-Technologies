<?php   
        //data check
        if (!isset($_POST['name'])) {
                echo "<link rel = 'stylesheet' type = 'text/css' href = '../css/main.css'><div></div>
                <script> alert('Please enter event name.'); window.location.href='javascript: history.go(-1)' </script>";
        }

        session_start();
        include('connection.php');               

                                                                                      
            $sql = "SELECT event_id FROM event ORDER BY event_id DESC LIMIT 1";
            $result= $con->query($sql);  
            $row = mysqli_fetch_assoc($result); 
            if (isset($row['event_id'])) {
                    $number = ltrim($row['event_id'],'E')+1;  
                    $id = 'E' . $number;   
            }
            else {
                    $id = "E1";
            }
                
 

        $name = $_POST['name'];  
        $date = $_POST['date'];  
        $time = $_POST['time'];
        $description = $_POST['description'];
        $pax = $_POST['pax'];


        $sql ="INSERT INTO `event` 
        (`event_id`, `event_name`, `date`, `time`, `description`,`pax`) 
        VALUES('$id', '$name', '$date', '$time', '$description','$pax')";
        $con->query($sql); 

        echo "<link rel = 'stylesheet' type = 'text/css' href = '../Bling/main.css'><div></div>
                <script>
                        alert('Successful Create Event. The Event ID is $id');
                        window.location.href = '../Admin/eventMaintain.php';
                </script>";
        
?>