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
            printf("<tr>
                                                    <td>%s </td>
                                                    <td>%s </td>
                                                    <td>%s </td>
                                                    <td>%s </td>
                                                    <td>%s </td>
                                                    <td>%s </td>
                                                    <td>%s </td>
                                                    <td><button class ='btn btn-warning'><a href='updateAdmin.php?id=%s' style='text-decoration:none;color:black;'>Edit</a></button></td>  
                                                    <td><button class ='btn btn-danger'><a href='deleteAdmin.php?id=%s' style='text-decoration:none;color:white;'>Delete</a></button></td>
                                                    </tr>"
                                                    , $row->admin_id
                                                    , $row->admin_name
                                                    , $row->ic_no
                                                    , $row->phone_no
                                                    , allGender()[$row->gender]
                                                    , $row->email
                                                    , $row->birth_date
                                                    , $row->admin_id, $row->admin_id);
                                        
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