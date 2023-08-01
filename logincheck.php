<?php
session_start();
$email = ($_POST['email']);
$password = ($_POST['password']);
$bool = true;
$db_name = "mapua_register";
$db_username = "root";
$db_pass = "";
$db_host = "localhost:3307";
$con = mysqli_connect("$db_host", "$db_username", "$db_pass", "$db_name") or die(mysqli_error());
$query = "SELECT * from profile";
$results = mysqli_query($con, $query);
$table_users = "";
$table_password = "";
if($results != "") {
    while($row = mysqli_fetch_assoc($results))
    {
        $table_users = $row['email']; //first usernmae row is passed into table users until match into the description of username.
        $table_password = $row['password']; // query are passed into table password until it

        if(($email == $table_users) && ($password == $table_password)) {
            if($password == $table_password) {
                $_SESSION['user'] = $email;// set username in a session as a global variable.
                header("location: home.html"); //directs user to the authentication page
            } else {
                Print'<script>alert("Incorrect Password!");</script>';
                Print'<script>window.location.assign("login.php");</script>';
            }
        }
    }
}
?>