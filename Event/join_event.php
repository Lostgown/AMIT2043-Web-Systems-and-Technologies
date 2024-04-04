<?php
    session_start();
    include('../Sys/authCheck.php');
    // validMember();
    // include ('../Sys/connection.php');
?>

<!DOCTYPE html>
<html> 
<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Member Menu</title>
    <link rel = 'stylesheet' type = 'text/css' href = '../css/main.css'>
    <link rel = 'stylesheet' type = 'text/css' href = '../css/menuMember.css'>

    <style>

        .container {
            display: flex;
        }
        

        .box {
           width: 40rem;
           height: 20rem;
           background-color: #ccc;
           margin: 15px;
           padding: 10px; 
           box-shadow: 0 5px 10px rgba(0, 0, 0, .2);
        }
    </style>
<head>
    
<header class = "heading" style="display:block;">
            <?php include('../lib/navbar.php'); ?>
</header>

<body>
        

        <main>
            <div class = "content">

                <div style="display:inline-block;">
                    <h1 style="color:#555555;margin-top:30px;font-weight: 400px;
                    font-size: 30px;text-decoration: none;text-align: center;">Event Menu<h1>
                </div>
                <!-- <div class="container"> -->
                <div class="container">
                  <div class="box">event1</div>
                  <div class="box">event2</div>
                  <div class="box">event3</div>
                </div>

                <div class="container">
                  <div class="box">event4</div>
                  <div class="box">event5</div>
                  <div class="box">event6</div>
                </div>

            <!-- </div> -->
    </main>
</body>
<!-- <footer> -->
<footer style="padding-bottom: 2.5rem; position: absolute; bottom: 0; width: 100%; height: 2.5rem;">
    <?php include('../lib/footer.php'); ?>
</footer>
</html>