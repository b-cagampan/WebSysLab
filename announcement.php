<?php 
session_start();
if(!isset($_SESSION['user'])) {
    // Redirect to the login page or perform other actions if the user is not logged in
    header("Location: index.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="announce.css">
    <title>Campus Care</title>
</head>
<header>
    <a href="doctorPage.php"> <!-- Replace "link-to-your-destination.php" with the actual URL you want to link to -->
        <img src="https://cdn-icons-png.flaticon.com/512/109/109618.png" alt="Arrow" id="arrow">
    </a>
    <!-- Move the announcement title inside the header -->
    <h2 class="announcement">Announcement</h2>
</header>
<body>
    <div class="container">
        <form action="announcement.php" method="POST">
            <div class="input-box">
                <label for="announcer">Announced By:</label>
                <input type="text" id="announcer" name="who" placeholder="Enter Name" required>
            </div>
            <div class="input-box">
                <label for="subject">Subject:</label>
                <input type="text" id="subject" name="what" placeholder="Enter Subject" required>
            </div>
            <div class="input-box">
                <label for="announcement">Announcement:</label>
                <input type="text" id="announcement" name="description" placeholder="Enter Announcement" required></input>
            </div>
            <div class="btn-submit">
                <input type="submit">
            </div>
        </form>
    </div>
</body>
</html>

<?php
// Create connection to database
if($_SERVER["REQUEST_METHOD"]== "POST") {
    $bool = true;
    $db_name = "mapua_register";
    $db_username = "root";
    $db_pass = "";
    $db_host = "localhost:3307";
    $con = mysqli_connect("$db_host", "$db_username", "$db_pass", "$db_name") or die(mysqli_error());

    // Get data from form
    $announcer = ($_POST['who']);
    $subject = ($_POST['what']);
    $announcement = ($_POST['description']);

    if($bool) {
        // Insert data into database
        $sql = "INSERT INTO announcements (announcer, subject, announcement) VALUES ('$announcer', '$subject', '$announcement')";
        mysqli_query($con,$sql);
        Print'<script>alert("Successfully Announced");</script>';
        Print'<script>window.location.assign("announcement.php");</script>';
    } else {
        Print'<script>alert("ERORR! Try again");</script>';
        Print'<script>window.location.assign("announcement.php");</script>';
    }
}
?>