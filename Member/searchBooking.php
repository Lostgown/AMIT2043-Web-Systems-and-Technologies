<?php
    session_start();
    include('../Sys/authCheck.php');
    include ('../lib/helper.php');
?>

<?php 
$header = array(
    "booking_id"=>"Booking ID",
    "event_id"=>"Event ID",
    "member_id"=>"Member ID",
    "category"=>"Category",
    "level"=>"Level",
    "booking_date"=>"Booking Date",
    "booking_time"=>"Booking Time"
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
    <title>Booking List</title>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel = 'stylesheet' type = 'text/css' href = '../css/main.css'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>


<body class="bg-dark ">
        <div class="d-flex justify-content-end">
            <div class="p-3">
                <a href="../Admin/menuAdmin.php"><button type="button"
                class=" btn btn-primary btn-lg me-md-2 ">Back</button></a>
            </div>
        </div>
    <div class='container'>
        <div class="row mt-2">
            <div class="col">
                <div class="card mt-2">
                    <div class="card-header">
                        <h2 class="display-6 text-center">Booking List</h2>
                    </div>
                    <div class="card-body">
                    <form id="searchForm" action="searchBooking.php" method="POST">
                        <input type="text" id="searchInput" name="searchInput" placeholder="Search Member ID...">
                        <button type="submit" name="submit" class="btn btn-secondary">Search</button>
                    </form>

                    <br/>

                        <form action="" method="POST">
                        <table class=" table table-bordered text-center">
                            <tr class="table-dark ">
                                <?php 
                                    foreach($header as $key=> $value){
                                    if($key == $sort){
                                        //user can click on the column
                                        //for sorting
                                        printf("<th><a href='?sort=%s&order=%s' style='color: white; text-decoration: none;'>%s %s</a></th>",$key,$order == 'ASC' ? 'DESC' :  'ASC', $value, $order == "ASC"?'⬇️':'⬆️');
                                    }else{
                                        //user never click anything
                                        //default
                                        printf("<th><a href='?sort=%s&order=ASC' style='color: white; text-decoration: none;'>%s</a></th>",$key, $value);
                                    }
                                }
                                ?>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            <?php
                                //step 1: create DB connection
                                //NOTE: arrangement of input in mysqli is important
                                //this method is using object oriented technique(new keyword is to create object/ like declaring variable)
                                $con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
                                if($con -> connect_error){
                                    //wth error
                                    die("Connection error: ". $con->connect_error);
                                }else{
                                    //no error
                                    //step 2: sql statement
                                    $sql = "SELECT * FROM booking WHERE event_id LIKE '%$search%' AND member_id LIKE '%$_SESSION[idUser]%' ORDER BY $sort $order";

                                    //step 3: ask connection, to processs sql
                                    $result = $con -> query($sql);//object - a list of admin record

                                    //NOTE: for DB we use "->"
                                    //NOTE: for associative array we use "=>"
                                    if($result->num_rows > 0){
                                        //record found
                                        while($row = $result->fetch_object()){
                                            printf("<tr>
                                                    <td>%s </td>
                                                    <td>%s </td>
                                                    <td>%s </td>
                                                    <td>%s </td>
                                                    <td>%s </td>
                                                    <td>%s </td>
                                                    <td>%s </td>
                                                    <td><button class ='btn btn-warning'><a href='updateBooking.php?id=%s' style='text-decoration:none;color:black;'>Edit</a></button></td>  
                                                    <td><button class ='btn btn-danger'><a href='deleteBooking.php?id=%s' style='text-decoration:none;color:white;'>Delete</a></button></td>
                                                    </tr>"
                                                    , $row->booking_id
                                                    , $row->event_id
                                                    , $row->member_id
                                                    , allCategory()[$row->category]
                                                    , allLevel()[$row->level]
                                                    , $row->booking_date
                                                    , $row->booking_time
                                                    , $row->booking_id, $row->booking_id);
                                        }
                                    }

                                    printf("<tr><td colspan='9'>
                                            <b>%d</b> record(s) returned.
                                            </td></tr>", $result->num_rows);

                                    $con -> close(); //safety and security
                                    $result -> free(); //to clean the result fetched or will use RAM
                                }

                                ?>

                        </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>
<!-- <footer> -->
<footer style="padding-bottom: 2.5rem; position: relative; bottom: 0; width: 100%; height: 2.5rem;">
    <?php include('../lib/footer.php'); ?>
</footer>

</html>