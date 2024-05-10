<?php
    session_start();
    include('../Sys/authCheck.php');
    validAdmin();
    include ('../Sys/connection.php');

    $query = "select * from event";
    $result = mysqli_query($con,$query); 
?>

<!DOCTYPE html>
<html>

<head>
    <title>Booking List</title>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel='stylesheet' type='text/css' href='../css/list.css'>
</head>


<body class="bg-dark">
    
        <div class="d-flex justify-content-end">
            <div class="p-4">
                <form method="POST" action="searchResult.php">
                <input type="text" class="searchBar " name="search" placeholder="Search ID..."
                    onkeyup="this.value = this.value.toUpperCase();">
                </form>
            </div>
            <div class="p-3">
                <a href="../Event/createEvent.php"><button type="button"
                class=" btn btn-secondary btn-lg me-md-2">Create</button></a>
            </div>
            <div class="p-3">
                
                <a href="menuAdmin.php"><button type="button"
                class=" btn btn-primary btn-lg me-md-2 ">Back</button></a>
            </div>
        </div>
    <div class='container'>
        <div class="row mt-2">
            <div class="col">
                <div class="card mt-2">
                    <div class="card-header">
                        <h2 class="display-6 text-center">Event List</h2>
                    </div>
                    <div class="card-body">
                        <table class=" table table-bordered text-center">
                            <tr class="table-dark">
                                <td>Event ID</td>
                                <td>Event Name</td>
                                <td>Event Date</td>
                                <td>Event Time</td>
                                <td>Description</td>
                                <td>Pax</td>
                                <td>Edit</td>
                                <td>Delete</td>
                            </tr>
                            <tr>
                                <?php 
                                            while($row =mysqli_fetch_assoc($result))
                                            {
                                         ?>
                                <td><?php echo $row['event_id']; ?></td>
                                <td><?php echo $row['event_name']; ?></td>
                                <td><?php echo $row['date']; ?></td>
                                <td><?php echo $row['time']; ?></td>
                                <td><?php echo $row['description']; ?></td>
                                <td><?php echo $row['pax']; ?></td>
                                <td><?php echo "<form action='../Event/updateEvent.php' method='POST'><button class ='btn btn-warning' type='submit' name='id' value='$row[event_id]'>Edit</button></form>"?>
                                </td>
                                <td><?php echo "<form action='../Sys/deleteEvent.php' method='POST'><button class ='btn btn-danger' type='submit' name='id' value='$row[event_id]'>Delete</button></form>"?>
                                </td>

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
<!-- <footer> -->
<footer style="padding-bottom: 2.5rem; position: relative; bottom: 0; width: 100%; height: 2.5rem;">
    <?php include('../lib/footer.php'); ?>
</footer>

</html>