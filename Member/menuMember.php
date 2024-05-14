<?php
    session_start();
    include('../Sys/authCheck.php');
    validMember();
    include ('../Sys/connection.php');
    require_once('../lib/helper.php');

?>

<?php 
$header = array(
    "event_id"=>"Event ID",
    "event_name"=>"Event Name",
    "date"=>"Event Date",
    "start_time"=>"Start Time",
    "end_time"=>"End Time",
    "description"=>"Description",
    "pax"=>"Pax",
    "remaining_pax"=>"Remaining Pax",
    "status"=>"Status",
);

//retrieve sort parameter from URL
if(isset($_GET["sort"])){
    $sort = $_GET["sort"];
}else{
    $sort="event_id";
}

//retrive order
if (isset($_GET["order"])){
    $order = $_GET["order"];
}else{
    $order = "ASC";
}

//retrieve search
if(isset($_POST['searchInput'])) {
    // Retrieve the search query from the POST data
    $search = $_POST['searchInput'];
}else {
    $search = '';
}
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
        width: 18rem;
        height: auto;
        background-color: #ccc;
        border-radius: 12px;
        margin: 15px;
        padding: 10px;
        /* box-shadow: 0 5px 10px rgba(0, 0, 0, .2); */
    }

    
    .box-recent-event-joined {
        width: 18rem;
        color: white;
        height: auto;
        background-color: #4c5265;
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
                
                <div class="container">
                    <div class="dashboard">
                        <header class="header">
                            <h2 style="color: white; text-align: center;">Recent Event</h2>
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
                                        <a href="../Event/join_event.php">
                                            <button> Events Menu</button>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="memberBooking.php">
                                            <button> My Bookings</button>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </section>

                

                        <main class="main">
                        <form id="searchForm" action="menuMember.php" method="POST">
                        <input type="text" id="searchInput" name="searchInput" placeholder="Search Event...">
                        <button type="submit" name="submit" class="btn btn-secondary">Search</button>
                        </form>
                        <?php 
                                    foreach($header as $key=> $value){
                                        if($key == $sort){
                                            //user can click on the column
                                            //for sorting
                                            printf("<th><a href='?sort=%s&order=%s' style='color: black; text-decoration: ;'>%s %s</a></th>",$key,$order == 'ASC' ? 'DESC' :  'ASC', $value, $order == "ASC"?'⬇️':'⬆️');
                                        }else{
                                            //user never click anything
                                            //default
                                            printf("<th><a href='?sort=%s&order=ASC' style='color: black; text-decoration: ;'>%s  |  </a></th>",$key, $value);
                                        }
                                }

                                ?>
                            <h2>My Bookings</h2>
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
                                    $sql = "SELECT booking.*, event.status FROM booking INNER JOIN event ON booking.event_id = event.event_id WHERE booking.member_id LIKE '%$_SESSION[idUser]%' AND event.status LIKE '%Pending%'";

                                    $result = $con -> query($sql);//object - a list of event

                                    if($result->num_rows > 0){
                                        //record found
                                        while($row = $result->fetch_object()){
                                            printf("<div class='box-recent-event-joined'>
                                                        <p>Event ID : %s</p>
                                                        <p> Category : %s</p>
                                                        <p> Level : %s</p>
                                                        <p> Booking Date : %s</p>
                                                        <p> Booking Time : %s</p>
                                                        <button style='background-color:red;'><a href='../Booking/deleteBooking.php?id=%s' style='text-decoration:none;color:white;'>Cancel</a></button>
                                                        <button><a href='../Booking/updateBooking.php?id=%s' style='text-decoration:none;color:black;'>Update</a></button>
                                                        </div>"
                                                    , $row->event_id
                                                    , allCategory()[$row->category]
                                                    , allLevel()[$row->level]
                                                    , $row->booking_date
                                                    , $row->booking_time
                                                    , $row->booking_id, $row->booking_id 
                                                    );
                                        }
                                    } else {
                                        printf("<h3>No Recent Hosting Event</h3>");
                                    }

                                    $con -> close(); //safety and security
                                    $result -> free(); //to clean the result fetched or will use RAM
                                }

                                ?>
                            </div>

                            <hr>
                            <h2>Recent Event Hosting</h2>
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
                                    // $sql = "SELECT * FROM event WHERE status LIKE '%Pending%' ORDER BY date ASC";
                                    $sql = "SELECT * FROM event WHERE event_name LIKE '%$search%' ORDER BY $sort $order";

                                    $result = $con -> query($sql);//object - a list of event

                                    if($result->num_rows > 0){
                                        //record found
                                        while($row = $result->fetch_object()){
                                            printf("<div class='box-recent-event'>
                                                        <img src='../photo/%s' style='width:280px; height:180px;'>
                                                        <h3 class='text-color'> %s</h3>
                                                        <p> Event ID : %s</p>
                                                        <p> Date : %s</p>
                                                        <p> Start Time : %s</p>
                                                        <p> End Time : %s</p>
                                                        <p> Description : %s</p>
                                                        <p> Pax : %s</p>
                                                        <p> Remaining Pax : %s</p>
                                                        <button><a href='../Booking/createBooking.php?id=%s' style='text-decoration:none;color:black;'>Join</a></button></div>"
                                                    , $row->imgpath
                                                    , $row->event_name
                                                    , $row->event_id
                                                    , $row->date
                                                    , $row->start_time
                                                    , $row->end_time
                                                    , $row->description
                                                    , $row->pax
                                                    , $row->remaining_pax
                                                    , $row->event_id 
                                                    );
                                        }
                                    } else {
                                        printf("<h3>No Recent Hosting Event</h3>");
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
    
    </html>