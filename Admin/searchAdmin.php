<?php
// Include necessary files and establish database connection
include ('../lib/helper.php');
// Check if the search query is present in the POST data
if(isset($_POST['searchQuery'])) {
    // Retrieve the search query from the POST data
    $searchQuery = $_POST['searchQuery'];

    // Perform the search operation
    // You need to replace the following logic with your actual database query
    // Query your database based on the search query
    // Fetch and format the search results

    // Example:
    // Assume 'admin' is your database table name and 'admin_name' is the column you want to search
    $con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if($con->connect_error){
        die("Connection error: ".$con->connect_error);
    }

    $sql = "SELECT * FROM admin WHERE admin_name LIKE '%$searchQuery%'";

    $result = $con->query($sql);

    if($result->num_rows > 0){
        while($row = $result->fetch_object()){
            // Output the search results (You can customize this part based on your requirements)
            printf("<div>%s - %s</div>", $row->admin_id, $row->admin_name);
        }
    } else {
        echo "No results found";
    }

    $con->close();
} else {
    // If the search query is not present, return an error message
    echo "Error: No search query provided";
}
?>