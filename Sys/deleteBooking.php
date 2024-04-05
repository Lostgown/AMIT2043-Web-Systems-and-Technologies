<?php
    session_start();
    include('connection.php');

    $id = $_POST['id'];

    $sql = "DELETE FROM booking  WHERE booking_id='$id'";
    $con->query($sql);
    
      
  echo "<link rel = 'stylesheet' type = 'text/css' href = '../css/main.css'>
  <div></div>
  <script>
    alert('$id had been deleted.')
    window.location.href = 'javascript: history.go(-1)'
  </script>";
  
        
?>