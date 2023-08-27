<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include('./api/db.php');

    $status = $_POST['status'];
    if($status == 'Approve') {

    }

    if (isset($_POST['request_id']) && isset($_POST['doctor'])) {
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