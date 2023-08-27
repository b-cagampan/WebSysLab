<?php 
session_start();
if(!isset($_SESSION['user'])) {
    // Redirect to the login page or perform other actions if the user is not logged in
    echo '<script>alert("Error Occured please login again.");</script>';
    header("Location: index.html");
    exit();
}

echo $_SESSION['user'];
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/schedule.css">
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
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
    </div>
    <div class="appointment">
        <h1>Appointment Schedule</h1>
        <p>Let's schedule your health check-up</p>
        <div class="cards">
            <div class="card-item">
                <form action="../functions/request_document.php" method="POST">
                    <label>I am scheduling my check-up via?</label>
                    <div class="row-radio-btn">
                        <div class="radio-btn">
                            <label>
                                <input type="radio" name="delivery_method" value="On-Campus" checked>
                                On-Campus
                            </label>
                        </div>
                        <div class="radio-btn">
                            <label>
                                <input type="radio" name="delivery_method" value="Online">
                                Online
                            </label>
                        </div>
                    </div>
                    <label>Patient's Full Name</label>
                    <div class="input-field">
                        <input type="text" id="first_name" name="first_name" placeholder="First Name" required>
                    </div>
                    <div class="input-field">
                        <input type="text" id="last_name" name="last_name" placeholder="Last Name" required>
                    </div>
                    <div class="input-field">
                        <input type="text" id="middle_initial" name="middle_initial" placeholder="Middle Initial" required>
                    </div>

                    <table>
                        <tr>
                            <th>ID number</th>
                            <th>Date</th>
                        </tr>
                        <tr>
                            <th>
                                <div class="input-field">
                                    <input type="text" id="id_number" name="id_number" placeholder="ID number" required>
                                </div>
                            </th>
                            <th>
                                <div class="input-field">
                                    <input type="date" id="date" name="date" required>
                                </div>
                            </th>
                        </tr>                        
                    </table>
                    <input type="hidden" name="email" value="<?php echo $_SESSION['user']; ?>"/>
                    <button type="submit">Set Appointment</button>
                    <a href="./status.php" class="status">Check your status</a>
                </form>
            </div>
    </div>
</body>
</html>