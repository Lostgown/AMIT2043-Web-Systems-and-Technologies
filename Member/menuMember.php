<?php
    session_start();
    include('../Sys/authCheck.php');
    validMember();
    include ('../Sys/connection.php');
    require_once('../lib/helper.php');
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Member Menu</title>
    <link rel='stylesheet' type='text/css' href='../css/main.css'>
    <link rel='stylesheet' type='text/css' href='../css/menuMember.css'>

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
        padding: 0px;
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
        /* box-shadow: 0 5px 10px rgba(0, 0, 0, .2); */
    }

    .box-profile-member {
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
        width: 150rem;
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
                    font-size: 30px;text-decoration: none;text-align: center;">Member Menu<h1>
                </div>

                <!-- <div class="box-container"> -->
                <div class="container">
                    <!-- <div class="box-profile"> -->
                    <div class="dashboard">
                        <header class="header">
                            <h2 style="color: white; text-align: center;">Current Event Hosting</h2>
                        </header>

                        <section class="sidebar">


                        <div class="box-profile-member">
                                <h3 style="text-align: center;">Profile</h3>
                                <p><b>ID:</b><?php echo $_SESSION['idUser']?>
                                    <br>
                                    <b>Name:</b>
                                    <?php
                            $sql = "SELECT member_name FROM member WHERE member_id = '$_SESSION[idUser]'";

                            $result= $con->query($sql);  
                            $row = mysqli_fetch_assoc($result);
                                echo $row['member_name'];
                        ?>
                                    <br>
                                    <b>IC No:</b>
                                    <?php
                            $sql = "SELECT ic_no FROM member WHERE member_id = '$_SESSION[idUser]'";

                            $result= $con->query($sql);  
                            $row = mysqli_fetch_assoc($result);
                                echo $row['ic_no'];
                        ?>
                                    <br>
                                    <b>Phone No:</b>
                                    <?php
                            $sql = "SELECT phone_no FROM member WHERE member_id = '$_SESSION[idUser]'";

                            $result= $con->query($sql);  
                            $row = mysqli_fetch_assoc($result);
                                echo $row['phone_no'];
                        ?>
                                    <br>
                                    <b>Gender:</b>
                                    <?php
                            $sql = "SELECT gender FROM member WHERE member_id = '$_SESSION[idUser]'";

                            $result= $con->query($sql);  
                            $row = mysqli_fetch_assoc($result);
                                $gender = $row['gender'];
                                echo allGender()[$gender];
                        ?>
                                    <br>
                                    <b>Email:</b>
                                    <?php
                            $sql = "SELECT email FROM member WHERE member_id = '$_SESSION[idUser]'";

                            $result= $con->query($sql);  
                            $row = mysqli_fetch_assoc($result);
                                echo $row['email'];
                        ?>
                                    <br>
                                    <b>Birth Date:</b>
                                    <?php
                            $sql = "SELECT birth_date FROM member WHERE member_id = '$_SESSION[idUser]'";

                            $result= $con->query($sql);  
                            $row = mysqli_fetch_assoc($result);
                                echo $row['birth_date'];
                        ?>

                            <?php 
                            echo "<style>button {float:right;margin-top: 10px;margin-right: 10px;display: block;background: orange;color: #fff;font-size: 17px;border-radius: 30px;border:none;padding: 8px 25px;text-decoration: none;}button:hover{background: rgb(255, 186, 58);transition: all 0.3s ease 0s;}</style>"
                            ?>
                            <?php
                            printf("<button class ='btn'><a href='updateMember.php?id=%s' style='text-decoration:none;color:black;'>Edit</a></button>",$_SESSION['idUser']);
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
                                        <a href="../Event/join_event.php">
                                            <button> Events Menu</button>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="JoinedEventMember.php">
                                            <button> My Bookings</button>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </section>

                        <main class="main">
                            <div class="container">
                                <div class="box-recent-event">
                                    <h3 class="text-color"> Event1</h3>
                                    <!-- <button id='btnchng' name='id' value='$_SESSION[idUser]'> View </button> -->
                                    <button onclick="JoinEvent()" id='btnchng' name='id' value='$_SESSION[idUser]'> Join
                                    </button>
                                </div>
                                <div class="box-recent-event">
                                    <h3 class="text-color"> Event1</h3>
                                    <!-- <button id='btnchng' name='id' value='$_SESSION[idUser]'> View </button> -->
                                    <button onclick="JoinEvent()" id='btnchng' name='id' value='$_SESSION[idUser]'> Join
                                    </button>
                                </div>
                                <div class="box-recent-event">
                                    <h3 class="text-color"> Event1</h3>
                                    <!-- <button id='btnchng' name='id' value='$_SESSION[idUser]'> View </button> -->
                                    <button onclick="JoinEvent()" id='btnchng' name='id' value='$_SESSION[idUser]'> Join
                                    </button>
                                </div>
                                <div class="box-recent-event">
                                    <h3 class="text-color"> Event1</h3>
                                    <!-- <button id='btnchng' name='id' value='$_SESSION[idUser]'> View </button> -->
                                    <button onclick="JoinEvent()" id='btnchng' name='id' value='$_SESSION[idUser]'> Join
                                    </button>

                                    <!-- view button removed -->
                                </div>

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
    <script>
    var i = 0;

    function JoinEvent() {
        if (i < 5) {
            alert("You have successfully joined the event!!");
            i++;
        } else {

            alert("The pax is full");
        }
        console.log(i);
    }
    </script>
    < /html>