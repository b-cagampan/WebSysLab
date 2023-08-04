<?php
session_start();
// Get connection to the database
$db_name = "mapua_register";
$db_username = "root";
$db_pass = "";
$db_host = "localhost:3307";
$con = mysqli_connect("$db_host", "$db_username", "$db_pass", "$db_name") or die(mysqli_error());

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Delete the record with the specified ID
    $delete_query = "DELETE FROM req_document WHERE id = $id";
    $delete_result = mysqli_query($con, $delete_query);
    
    if ($delete_result) {
        // Redirect back to doctorPage.php
        header("Location: doctorPage.php");
        exit();
    } else {
        // Handle error if delete query fails
        echo "Error deleting record: " . mysqli_error($con);
    }
} else {
    // Redirect back to doctorPage.php if ID is not provided
    header("Location: doctorPage.php");
    exit();
}
?>