<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Login | Student</title>
</head>
<header>
    <img src="https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/cfbd6a18-cdfc-45a4-94ec-86f3b418839d/dezr52f-13180b66-e4a8-4dc8-bdbe-08376824eaf0.png/v1/fill/w_700,h_350,q_70,strp/flag_of_mapua_university__mu__by_tetsuya0022_dezr52f-350t.jpg?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7ImhlaWdodCI6Ijw9MTUwMCIsInBhdGgiOiJcL2ZcL2NmYmQ2YTE4LWNkZmMtNDVhNC05NGVjLTg2ZjNiNDE4ODM5ZFwvZGV6cjUyZi0xMzE4MGI2Ni1lNGE4LTRkYzgtYmRiZS0wODM3NjgyNGVhZjAucG5nIiwid2lkdGgiOiI8PTMwMDAifV1dLCJhdWQiOlsidXJuOnNlcnZpY2U6aW1hZ2Uub3BlcmF0aW9ucyJdfQ.Y9cuvNbaPiqEPzdyLJEYO6_w1zNXdwSBAZ6JpoGjCQI" alt="Mapua Clinic">
</header>
<body>
    <img src="https://imgcdnblog.carmudi.com.ph/carmudi-ph/wp-content/uploads/2019/03/23035415/Prius-C-Test-Drive-min.jpg" class="main-bg" alt="">
    <div class="container">
        <div class="display-block-container">
            <h1>Login as Student</h1>
            <form action="student.php" method="post">
                <label for="email">Email</label>
                <input type="email" name="email" class="emailAdd" required>
                <label for="passwd">Password</label>
                <input type="text" name="password" class="thePassword">
                <div class="btn-submit">
                    <input type="submit">
                </div>
            </form>
        </div>
    </div>
</body>
</html>

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
                header("location: studentPage.php"); //directs user to the authentication page
            } else {
                Print'<script>alert("Incorrect Password!");</script>';
                Print'<script>window.location.assign("student.php");</script>';
            }
        }
    }
}
?>

