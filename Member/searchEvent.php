<?php
// Include necessary files and establish database connection
include ('../lib/helper.php');

// Establish database connection
$con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if ($con->connect_error) {
    die("Connection error: " . $con->connect_error);
}

// Check if the search query is present in the POST data
if (isset($_POST['searchQuery']) && !empty($_POST['searchQuery'])) {
    // Retrieve the search query from the POST data
    $searchQuery = $_POST['searchQuery'];

    // Perform the search operation
    $sql = "SELECT * FROM event WHERE event_name LIKE '%$searchQuery%' AND status LIKE '%Pending%'";
} else {
    // Show all events by default
    $sql = "SELECT * FROM event WHERE status LIKE '%Pending%'";
}

$result = $con->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_object()) {
        // Output the search results (You can customize this part based on your requirements)
        printf(
            "<div class='box-recent-event'>
                <img src='../photo/%s' style='width:280px; height:180px;'>
                <h3 class='text-color'> %s</h3>
                <p> Event ID : %s</p>
                <p> Date : %s</p>
                <p> Start Time : %s</p>
                <p> End Time : %s</p>
                <p> Description : %s</p>
                <p> Pax : %s</p>
                <p> Remaining Pax : %s</p>
                <button><a href='../Booking/createBooking.php?id=%s' style='text-decoration:none;color:black;'>Join</a></button>
            </div>",
            $row->imgpath,
            $row->event_name,
            $row->event_id,
            $row->date,
            $row->start_time,
            $row->end_time,
            $row->description,
            $row->pax,
            $row->remaining_pax,
            $row->event_id
        );
    }
} else {
    echo "No results found";
}

$con->close();
?>




