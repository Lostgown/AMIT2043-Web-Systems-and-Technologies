<?php
    session_start();
    include('../Sys/authCheck.php');
    validAdmin();
    include('../Sys/connection.php');
    require_once('../lib/helper.php');
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Menu</title>
    <link rel='stylesheet' type='text/css' href='../css/main.css'>
    <link rel='stylesheet' type='text/css' href='../css/menuAdmin.css'>
    <!-- <link rel = 'stylesheet' type = 'text/css' href = '../css/dashboard.css'> -->
    <!-- <link rel = 'stylesheet' type = 'text/css' href = '../css/popupBox.css'> -->
    <style>
    .side-bar-nav {
        padding: 12px;
        text-align: left;
        list-style-type: none;
        /* text-decoration: none; */
    }

    li a {
        display: block;
        color: white;
        padding: 0.1px;
        text-decoration: none;
    }

    .box-side-bar-nav {
        width: 15rem;
        height: 30rem;
        background-color: transparent;
        color: white;
        border-radius: 12px;
        margin: 15px;
        padding: 10px;
        box-shadow: 0 5px 10px rgba(0, 0, 0, .2);
    }

    .box-side-bar-nav button {
        width: 200px;
        margin-bottom:5px;
        color:black;
        background-color: #EDF1F5;
        transition: all 0.3s ease 0s;
    }

    .box-side-bar-nav button:hover {
        background-color: #F7FBFF;
        scale: 105%;
    }

    .text-color {
        color: #555555;
    }

    .container {
        display: flex;
        flex-wrap: wrap;
    }

    .box-recent-event {
        width: 31rem;
        height: 20rem;
        background-color: #ccc;
        border-radius: 12px;
        margin: 15px;
        padding: 10px;
        box-shadow: 0 5px 10px rgba(0, 0, 0, .2);
    }

    .box-profile-admin {
        width: 16rem;
        height: 16rem;
        background-color: transparent;
        color: white;
        border-radius: 12px;
        margin: 15px;
        padding: 10px;
        box-shadow: 0 5px 10px rgba(0, 0, 0, .2);
    }

    .dashboard {
        margin: 0;
        /* width: 150rem; */
        width: 100%;
        /* width: relative; */
        height: 50rem;
        background-color: #ccc;
        /* box-shadow: 0 5px 10px rgba(0, 0, 0, .2); */
        border-radius: 12px;
        overflow: auto;
        overflow-x: hidden;
        display: grid;
        grid-template-columns: 300px 1fr;
        grid-template-rows: 60px 1fr;

    }

    .header {
        background-color: #323949;

        border-radius: 6px;
        margin: -3px;

        grid-column: 2 / 3;
        grid-row: 1 / 2;
    }

    .sidebar {
        background-color: #282A2C;

        grid-column: 1 / 2;
        grid-row: 1 / 3;
    }

    .main {
        /* background-color: #c3c5ca; */
        background-color: #fff;
        padding: 15px;

        grid-column: 2 / 3;
        grid-row: 2 / 3;
    }
    </style>

    <head>

    <body>

        <header class="heading" style="display:block;">
            <?php include('../lib/navbar.php'); ?>
        </header>


        <main>
            <div class="content">

                <div style="display:inline-block;">
                    <h1 style="color:#555555;margin-top:30px;font-weight: 400px;
                    font-size: 30px;text-decoration: none;text-align: center;">ADMIN MENU<h1>
                </div>

                <!-- <div class="box-container"> -->
                <div class="container">
                    <!-- <div class="box-profile"> -->
                    <div class="dashboard">
                        <header class="header">
                            <h2 style="color: white; text-align: center;">Recent Event Hosting</h2>
                        </header>

                        <section class="sidebar">
                            <!-- <li< /li> -->



                            <div class="box-profile-admin">
                                <h3 style="text-align: center;">Profile</h3>
                                <p><b>ID:</b><?php echo $_SESSION['idUser']?>
                                    <br>
                                    <b>Name:</b>
                                    <?php
                            $sql = "SELECT admin_name FROM admin WHERE admin_id = '$_SESSION[idUser]'";

                            $result= $con->query($sql);  
                            $row = mysqli_fetch_assoc($result);
                                echo $row['admin_name'];
                        ?>
                                    <br>
                                    <b>IC No:</b>
                                    <?php
                            $sql = "SELECT ic_no FROM admin WHERE admin_id = '$_SESSION[idUser]'";

                            $result= $con->query($sql);  
                            $row = mysqli_fetch_assoc($result);
                                echo $row['ic_no'];
                        ?>
                                    <br>
                                    <b>Phone No:</b>
                                    <?php
                            $sql = "SELECT phone_no FROM admin WHERE admin_id = '$_SESSION[idUser]'";

                            $result= $con->query($sql);  
                            $row = mysqli_fetch_assoc($result);
                                echo $row['phone_no'];
                        ?>
                                    <br>
                                    <b>Gender:</b>
                                    <?php
                            $sql = "SELECT gender FROM admin WHERE admin_id = '$_SESSION[idUser]'";

                            $result= $con->query($sql);  
                            $row = mysqli_fetch_assoc($result);
                                $gender = $row['gender'];
                                echo allGender()[$gender];
                        ?>
                                    <br>
                                    <b>Email:</b>
                                    <?php
                            $sql = "SELECT email FROM admin WHERE admin_id = '$_SESSION[idUser]'";

                            $result= $con->query($sql);  
                            $row = mysqli_fetch_assoc($result);
                                echo $row['email'];
                        ?>
                                    <br>
                                    <b>Birth Date:</b>
                                    <?php
                            $sql = "SELECT birth_date FROM admin WHERE admin_id = '$_SESSION[idUser]'";

                            $result= $con->query($sql);  
                            $row = mysqli_fetch_assoc($result);
                                echo $row['birth_date'];
                        ?>

                            <?php 
                            echo "<style>button {float:right;margin-top: 10px;margin-right: 10px;display: block;background: orange;color: #fff;font-size: 17px;border-radius: 30px;border:none;padding: 8px 25px;text-decoration: none;}button:hover{background: rgb(255, 186, 58);transition: all 0.3s ease 0s;}</style>"
                            ?>
                            <?php
                            printf("<button class ='btn'><a href='updateAdmin.php?id=%s' style='text-decoration:none;color:black;'>Edit</a></button>",$_SESSION['idUser']);
                            ?> 
                            </div>

                            <div class="box-side-bar-nav">
                                <h3 style="color: white; text-align: center;">Navigation</h3>
                                <ul class="side-bar-nav">
                                    <li>
                                        <a href="../General/resetPassword.php">
                                            <button> Reset Password</button>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="adminList.php">
                                            <button> Admin Account Maintenance</button>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="../Member/memberList.php">
                                            <button> Member Account Maintenance</button>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="../Event/eventList.php">
                                            <button> Events Management</button>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="../Booking/bookingList.php">
                                            <button> Events Bookings Details</button>
                                        </a>
                                    </li>
                                </ul>

                            </div>
                        </section>

                        <main class="main">
                            <div class="container">
                            <?php
                                //step 1: create DB connection
                                //NOTE: arrangement of input in mysqli is important
                                //this method is using object oriented technique(new keyword is to create object/ like declaring variable)
                                $con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
                                if($con -> connect_error){
                                    //wth error
                                    die("Connection error: ". $con->connect_error);
                                }else{
                                    //step 2: sql statement
                                    $sql = "SELECT * FROM event WHERE status LIKE '%Pending%'";

                                    $result = $con -> query($sql);//object - a list of event

                                    if($result->num_rows > 0){
                                        //record found
                                        while($row = $result->fetch_object()){
                                            printf("<div class='box-recent-event'>
                                                        <h3 class='text-color'> %s</h3>
                                                        <img src='../photo/%s'>
                                                        <button class ='btn btn-warning'><a href='updateEvent.php?id=%s' style='text-decoration:none;color:black;'>Edit</a></button></div>"
                                                    , $row->event_name
                                                    , $row->imgpath
                                                    , $row->event_id 
                                                    );
                                        }
                                    } else {
                                        printf("<h3>No Recent Hosting Event</h3>
                                        <a href='../Event/createEvent.php'>
                                        <button type='button'
                                        style='color:white; background-color:green; margin-left:20px;'>Create Event</button></a>");
                                    }

                                    $con -> close(); //safety and security
                                    $result -> free(); //to clean the result fetched or will use RAM
                                }

                                ?>

                            </div>
                        </main>



                    </div>
                </div>
                </p>
            </div>
        </main>

    </body>
    <!-- <footer> -->
    <footer style="padding-bottom: 2.5rem; position: relative; bottom: 0; width: 100%; height: 2.5rem;">
        <?php include('../lib/footer.php'); ?>
    </footer>
    <style>
    .modal {
        /* background-color: aquamarine; */
        position: fixed;
        inset: 0;
        display: none;
        align-items: center;
        justify-content: center;
    }

    .contentA {
        position: absolute;
        background-color: #3d3e51;
        color: #fff;
        padding: 5rem;
        border-radius: 12px;
        width: 50rem;
        height: 23rem;
    }

    .modal:target {
        display: flex;
    }
    </style>
    </html>