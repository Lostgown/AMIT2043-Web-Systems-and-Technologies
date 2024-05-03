<?php
    //data check
    if (!isset($_POST['id'])) {
      echo "<link rel = 'stylesheet' type = 'text/css' href = '../css/main.css'><div></div>
      <script> alert('Please Login.'); window.location.href='../index.php' </script>";
    }

    session_start();
    include('connection.php');

    $id = $_POST['id'];

    if ($_SESSION['idUser'] == $id ) {
        echo "<link rel = 'stylesheet' type = 'text/css' href = '../css/main.css'>
          <div></div>
          <script>
            alert('You can't delete your own account.')
            window.location.href = 'javascript: history.go(-1)'
          </script>";
    }
    else {
      if (substr_replace($id, '', 1, 1) == 'M') {
        $sql = "DELETE FROM member  WHERE member_id='$id'";
        $con->query($sql);
      }

      if (substr_replace($id, '', 1, 1) == 'A') {
        $sql = "DELETE FROM admin WHERE admin_id='$id'";
        $con->query($sql);
      }
     
  }
 echo "<link rel = 'stylesheet' type = 'text/css' href = '../css/main.css'>
  <div></div>
  <script>
    alert('$id had been deleted.')
    window.location.href = 'javascript: history.go(-1)'
  </script>";
  
        
?>