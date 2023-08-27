<?php 
if($_SERVER["REQUEST_METHOD"]== "POST") {
    $FName = ($_POST['first_name']);
    $LName = ($_POST['last_name']);
    $email = ($_POST['email']);
    $contact = ($_POST['studentId']);
    $password = ($_POST['password']);
    $conf_pw = ($_POST['confirm_password']);

    $bool = true;
    include('../api/db.php')
    $query = "SELECT * FROM profile";
    $results = mysqli_query($con, $query);

    if($password == $conf_pw) {
        if($bool) {
            mysqli_query($con, "INSERT INTO profile(firstname, lastname, email, password, contact) VALUES('$FName', '$LName', '$email', '$password', '$contact')");
            Print'<script>alert("Successfully Registered");</script>';
            Print'<script>window.location.assign("../page/register.html");</script>';
        }
    } else {
        Print'<script>alert("Password does no match");</script>';
        Print'<script>window.location.assign("../page/register.html");</script>';
    }
}
?>