<?php 
include('../api/db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $deliver_method = $_POST['deliver_method'];
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $middleInitial = $_POST['middle_initial'];
    $idNum = $_POST['id_number'];
    $date = $_POST['date'];
    $email = $_POST['email'];
    
    $bool = true;

    if($bool) {
        mysqli_query($con, "INSERT INTO request_document(date, first_name, last_name, middle_initial, email, id_number, delivery_method) VALUES('$date', '$firstName', '$lastName', '$middleInitial', '$email', '$idNum', '$deliver_method')");
        Print'<script src="./alert.js"></script>';
    }
}
?>