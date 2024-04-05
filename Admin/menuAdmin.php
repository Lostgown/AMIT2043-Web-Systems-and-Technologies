<?php
    session_start();
    include('../Sys/authCheck.php');
    validAdmin();
    include('../Sys/connection.php');
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
        height: 27rem;
        background-color: transparent;
        color: white;
        border-radius: 12px;
        margin: 15px;
        padding: 10px;
        box-shadow: 0 5px 10px rgba(0, 0, 0, .2);
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
        width: 15rem;
        height: 15rem;
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
                                echo $row['gender'];
                        ?>
                                    <br>
                                    <b>Email:</b>
                                    <?php
                            $sql = "SELECT email FROM admin WHERE admin_id = '$_SESSION[idUser]'";

                            $result= $con->query($sql);  
                            $row = mysqli_fetch_assoc($result);
                                echo $row['email'];
                        ?>
                                <form action='../General/updateProfile.php' method='POST'>
                                    <?php echo "<style>button {float:right;margin-top: 10px;margin-right: 10px;display: block;background: orange;color: #fff;font-size: 17px;border-radius: 30px;border:none;padding: 8px 25px;text-decoration: none;}button:hover{background: rgb(255, 186, 58);transition: all 0.3s ease 0s;}</style>
                            <button id = 'btnchng' name = 'id' value = '$_SESSION[idUser]'> Update </button></a>"; ?>
                                    <!-- <a href="#popup-box">Click to Open Popup Box!</a> -->
                                </form>
                            </div>

                            <div class="box-side-bar-nav">
                                <h3 style="color: white; text-align: center;">Navigation</h3>
                                <ul class="side-bar-nav">
                                    <li>
                                        <a href="">
                                            <p>- Register User</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            <p>- Admin Account Maintenance</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            <p>- Member Account Maintenance</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            <p>- Events Management</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            <p>- Events Bookings Details</p>
                                        </a>
                                    </li>
                                </ul>

                            </div>
                        </section>

                        <main class="main">
                            <div class="container">
                                <div class="box-recent-event">
                                    <h3 class="text-color"> Event1</h3>
                                    <button id='btnchng' name='id' value=''><a
                                            style="text-decoration: none; color: white;" href="#popup-box"> Update
                                        </a></button>
                                </div>
                                <div class="box-recent-event">
                                    <h3 class="text-color"> Event2</h3>
                                    <button id='btnchng' name='id' value=''> Update </button>
                                </div>
                                <div class="box-recent-event">
                                    <h3 class="text-color"> Event3</h3>
                                    <button id='btnchng' name='id' value=''> Update </button>
                                </div>
                                <div class="box-recent-event">
                                    <h3 class="text-color"> Event4</h3>
                                    <button id='btnchng' name='id' value=''> Update </button>
                                </div>

                            </div>
                        </main>



                    </div>
                </div>
                </p>
            </div>
        </main>

        <div id="popup-box" class="modal" style="z-index: 22;">
            <div class="contentA">
                <form action="">
                    <h2 style="text-align: center; margin: 0px;">
                        Update Events
                    </h2>

                    <legend>Event Name:</legend>
                    <input type="text" id="username" name="username"><br><br>

                    <legend>Description:</legend>
                    <input type="text" id="email" name="email"><br><br>

                    <legend>Pax:</legend>
                    <input type="number" id="password" name="password"><br><br>

                    <legend>Date:</legend>
                    <input type="date" id="password" name="password"><br><br>

                    <legend>Time:</legend>
                    <input type="time" id="password" name="password"><br><br>

                    <!-- <legend>Gender:</legend>
                    <input type="radio" name="gender" id="male">
                    <label for="male">M</label>

                    <input type="radio" name="gender" id="female">
                    <label for="female">F</label>
                    >
                    <label for="others">Others</label>
                    <input type="text" id="username" name="username" size="4"><br><br> -->


                    <input type="reset" value="Reset">
                    <input type="submit" value="Submit">

                    <a href="#" style="
                    position: absolute;
                    top: 10px;
                    right: 10px;
                    color:coral;
                    font-size: 30px;
                    text-decoration: none;
                ">&times;</a>

                </form>
            </div>
        </div>
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
    < /html>