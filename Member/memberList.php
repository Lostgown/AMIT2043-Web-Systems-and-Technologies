<?php
    session_start();
    include('../Sys/authCheck.php');
    validAdmin();
    include ('../lib/helper.php');

?>
<?php 
$header = array(
    "member_id"=>"Member ID",
    "member_name"=>"Name",
    "ic_no"=>"IC Number",
    "phone_no"=>"Phone Number",
    "gender"=>"Gender",
    "email"=>"Email",
    "birth_date"=>"Birth Date"
);
//every header has the ability to do ascending and decending

//retrieve sort parameter from URL
if(isset($_GET["sort"])){
    $sort = $_GET["sort"];
}else{
    $sort="member_id";
}

//retrive order
if (isset($_GET["order"])){
    $order = $_GET["order"];
}else{
    $order = "ASC";
}


?>

<!DOCTYPE html>
<html>

<head>
    <title>Member List</title>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel='stylesheet' type='text/css' href='../css/list.css'>
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
    $('#searchInput').on('input', function() {
        var searchValue = $(this).val(); // Get search query
        if (searchValue.trim() !== '') { // Check if the search query is not empty
            $.ajax({
                type: 'POST',
                url: 'searchMember.php',
                data: { searchQuery: searchValue },
                success: function(response) {
                    $('#searchResults').html(response); // Display search results
                }
            });
        } else {
            $('#searchResults').html(''); // Clear search results if search query is empty
        }
    });
});
</script>

<body class="bg-dark ">
        <div class="d-flex justify-content-end">
            <div class="p-3">
                <a href="createMember.php"><button type="button"
                class=" btn btn-secondary btn-lg me-md-2 ">Create New Member</button></a>
            </div>
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
                        <h2 class="display-6 text-center">Member List</h2>
                    </div>
                    <div class="card-body">
                        <form id="searchForm">
                            <input type="text" id="searchInput" name="searchInput" placeholder="Search Name...">
                        </form>
                        <div id="searchResults"></div>
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
                                    // $sql = "SELECT * FROM admin ORDER BY $sort $order ";
                                    $sql = "SELECT * FROM member ORDER BY $sort $order";

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
                                                    <td><button class ='btn btn-warning'><a href='../Member/updateMember.php?id=%s' style='text-decoration:none;color:black;'>Edit</a></button></td>  
                                                    <td><button class ='btn btn-danger'><a href='deleteMember.php?id=%s' style='text-decoration:none;color:white;'>Delete</a></button></td>
                                                    </tr>"
                                                    , $row->member_id
                                                    , $row->member_name
                                                    , $row->ic_no
                                                    , $row->phone_no
                                                    , allGender()[$row->gender]
                                                    , $row->email
                                                    , $row->birth_date
                                                    , $row->member_id, $row->member_id);
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