<?php 
session_start();
if(!isset($_SESSION['user'])) {
    // Redirect to the login page or perform other actions if the user is not logged in
    header("Location: index.html");
    exit();
}

include("../api/db.php");

$query = "SELECT * from profile WHERE email = '{$_SESSION['user']}'";
$results = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/page.css">
    <script src="https://kit.fontawesome.com/a81e19cd1e.js" crossorigin="anonymous"></script>
    <title>Campus Care</title>
</head>
<body>
    <div class="container">
        <div class="menu">
            <img src="https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/cfbd6a18-cdfc-45a4-94ec-86f3b418839d/dezr52f-13180b66-e4a8-4dc8-bdbe-08376824eaf0.png/v1/fill/w_700,h_350,q_70,strp/flag_of_mapua_university__mu__by_tetsuya0022_dezr52f-350t.jpg?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7ImhlaWdodCI6Ijw9MTUwMCIsInBhdGgiOiJcL2ZcL2NmYmQ2YTE4LWNkZmMtNDVhNC05NGVjLTg2ZjNiNDE4ODM5ZFwvZGV6cjUyZi0xMzE4MGI2Ni1lNGE4LTRkYzgtYmRiZS0wODM3NjgyNGVhZjAucG5nIiwid2lkdGgiOiI8PTMwMDAifV1dLCJhdWQiOlsidXJuOnNlcnZpY2U6aW1hZ2Uub3BlcmF0aW9ucyJdfQ.Y9cuvNbaPiqEPzdyLJEYO6_w1zNXdwSBAZ6JpoGjCQI" alt="Mapua Clinic">
            <ul class="menu-items">
                <li><a href="announcement.php">Announcement</a></li>
                <li><a href="calendar.php">Schedule</a></li>
                <li><a href="../functions/logout.php">Logout</a></li>
            </ul>
        </div>
    </div>
    <div class="appointment">
        <h1>Clinic Services</h1>
        <?php while($row = mysqli_fetch_assoc($results)) { ?>
        <p>Good day <?php echo $row['firstname']; ?>! How may i help you?</p>
        <?php }?>
        <div class="cards">
            <div class="card-item">
                <i class="fa-solid fa-plus"></i><br>
                <a href="./schedule.php">Schedule an Appointment</a>
            </div>
            <div class="card-item">
                <i class="fa-solid fa-file"></i><br>
                <a href="./document.php">Request for a Clearance</a>
            </div>
            <div class="card-item">
                <i class="fa-solid fa-bell"></i><br>
                <a href="./status.php">Status</a>
            </div>
        </div>
    </div>
</body>
</html>
