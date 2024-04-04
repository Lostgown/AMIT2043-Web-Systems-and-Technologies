<?php
    session_start();
    include('../Sys/authCheck.php');
    validAdmin();
    include ('../Sys/connection.php');

    $query = "select * from admin";
    $result = mysqli_query($con,$query); 
?>

<!DOCTYPE html>
<html> 
<head>
    <title>Member List</title>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel = 'stylesheet' type = 'text/css' href = '../css/list.css'>
</head>

   
<body class="bg-dark">
            <form method = "POST" action="searchResult.php">
                <input type="text" class = "searchBar mt-5 ml-xl-6" name ="search" placeholder="Search ID..." onkeyup="this.value = this.value.toUpperCase();">
            </form>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-3 me-3">
            <a href="menuAdmin.php"><button type="button" class=" btn btn-primary btn-lg me-md-2 rounded-pill">Back</button></a>
        </div>
        <div class = 'container'>
                <div class="row mt-2">
                    <div class="col">
                        <div class="card mt-2">
                            <div class="card-header">
                                <h2 class="display-6 text-center">Admin List</h2>
                            </div>
                            <div class="card-body">
                                <table class=" table table-bordered text-center">
                                    <tr class="table-dark">
                                        <td>Admin ID</td>
                                        <td>Name</td>
                                        <td>Phone No.</td>
                                        <td>Email</td>
                                        <td>Edit</td>
                                        <td>Delete</td>
                                    </tr>
                                    <tr>
                                        <?php 
                                            while($row =mysqli_fetch_assoc($result))
                                            {
                                         ?>       
                                            <td><?php echo $row['admin_id']; ?></td>
                                            <td><?php echo $row['admin_name']; ?></td>
                                            <td><?php echo $row['phone_no']; ?></td>
                                            <td><?php echo $row['email']; ?></td>
                                            <td><?php echo "<form action='../General/updateProfile.php' method='POST'><button class ='btn btn-warning' type='submit' name='id' value='$row[admin_id]'>Edit</button></form>"?></td>
                                            <td><?php echo "<form action='../Sys/delete.php' method='POST'><button class ='btn btn-danger' type='submit' name='id' value='$row[admin_id]'>Delete</button></form>"?></td>

                                            </tr>
                                        <?php 
                                            }
                                        ?>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</body>
<footer>
    <?php include('../lib/footer.php'); ?>
</footer>
</html>