<?php
$db_name = "mapua_register";
$db_username = "root";
$db_pass = "";
$db_host = "localhost:3307";
$con = mysqli_connect($db_host, $db_username, $db_pass, $db_name) or die(mysqli_error());

$query = "SELECT * FROM req_document";
$results = mysqli_query($con, $query);

$documents = array();

if (mysqli_num_rows($results) > 0) {
    while ($row = mysqli_fetch_assoc($results)) {
        $documents[] = $row;
    }
}

// Close the database connection
mysqli_close($con);

// Convert the data to JSON format and return it
header('Content-Type: application/json');
echo json_encode($documents);
?>
