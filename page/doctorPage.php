<?php 
include('../api/db.php');
session_start();
if(!isset($_SESSION['user'])) {
    // Redirect to the login page or perform other actions if the user is not logged in
    header("Location: index.html");
    exit();
}

$query = "SELECT * from request_document WHERE doctor = '{$_SESSION['user']}'";
$results = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/page.css">
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
        <h1>My Appointment</h1>
        <p>Good Day doctor!, Here are your agendas for today</p>
        <table>
            <div class="row-pending">
                            <tr>
                <th>Email</th>
                <th>Status</th>
                <th>Date</th>
                <th>Request For</th>
                <th>Student ID</th>
                <th>Name</th>
            </tr>
            </div>
            <div class="row-pending">
                <tr>
                <?php  while ($row = mysqli_fetch_assoc($results)) { ?>
                    <th><a href="mailto:<?php echo $row['email']; ?>" target="_blank"><button>Email</button></a></th>
                    <th><a href="../functions/delete.php"><button>Clear</button></a></th>
                    <th><?php echo $row['date']; ?></th>
                    <th><?php echo $row['reason']; ?></th>
                    <th><?php echo $row['studentId']; ?></th>
                    <th><?php echo $row['firstname'] . ', ' . $row['lastname'] . $row['middleInitial']; ?></th>
                </tr>
                <?php } ?>
            </div>
        </table>
    </div>
</body>
</html>