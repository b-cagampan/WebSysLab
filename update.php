<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get connection to database
    $db_name = "mapua_register";
    $db_username = "root";
    $db_pass = "";
    $db_host = "localhost:3307";
    $con = mysqli_connect("$db_host", "$db_username", "$db_pass", "$db_name") or die(mysqli_error());

    if (isset($_POST['appointment_id']) && isset($_POST['doctor'])) {
        $appointment_id = $_POST['appointment_id'];
        $doctor = $_POST['doctor'];

        // Update the "assign" column in the req_appointment table
        $query = "UPDATE req_appointment SET assign = '$doctor' WHERE id = $appointment_id";
        mysqli_query($con, $query);

        // Redirect to the same page after updating the database
        header("Location: secretaryPage.php");
        exit();
    }
}
?>