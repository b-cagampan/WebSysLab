<?php 
session_start();
if(!isset($_SESSION['user'])) {
    // Redirect to the login page or perform other actions if the user is not logged in
    header("Location: index.html");
    exit();
}
//Get connection to database
$db_name = "mapua_register";
$db_username = "root";
$db_pass = "";
$db_host = "localhost:3307";
$con = mysqli_connect("$db_host", "$db_username", "$db_pass", "$db_name") or die(mysqli_error());

// Fetch data from the req_appointment table
$query = "SELECT * from req_appointment WHERE assign IS NULL";
$results = mysqli_query($con, $query);

// Fetch data from the req_documents table
$doc_query = "SELECT * from req_document WHERE doctor IS NULL";
$doc_result = mysqli_query($con, $doc_query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="secretaryPage.css">
    <script src="https://kit.fontawesome.com/a81e19cd1e.js" crossorigin="anonymous"></script>
    <title>CampusCare</title>
</head>
<header>
    <div class="hamburger-menu">
        <div class="bar"></div>
        <div class="bar"></div>
        <div class="bar"></div>

        <ul class="menu-items">
            <li><a href="doctorLogout.php"></a></li>
            <li><a href="index.html">Logout</a></li>
         </ul>
    </div>
    <img src="https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/cfbd6a18-cdfc-45a4-94ec-86f3b418839d/dezr52f-13180b66-e4a8-4dc8-bdbe-08376824eaf0.png/v1/fill/w_700,h_350,q_70,strp/flag_of_mapua_university__mu__by_tetsuya0022_dezr52f-350t.jpg?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7ImhlaWdodCI6Ijw9MTUwMCIsInBhdGgiOiJcL2ZcL2NmYmQ2YTE4LWNkZmMtNDVhNC05NGVjLTg2ZjNiNDE4ODM5ZFwvZGV6cjUyZi0xMzE4MGI2Ni1lNGE4LTRkYzgtYmRiZS0wODM3NjgyNGVhZjAucG5nIiwid2lkdGgiOiI8PTMwMDAifV1dLCJhdWQiOlsidXJuOnNlcnZpY2U6aW1hZ2Uub3BlcmF0aW9ucyJdfQ.Y9cuvNbaPiqEPzdyLJEYO6_w1zNXdwSBAZ6JpoGjCQI" alt="Mapua Clinic">
</header>
<body>
    <div class="container">
        <div class="appointment-board-sched">
            <div class="appointment-box">
                <h2>Pending Appointments:</h2>
                <div class="pending-items">
                    <table>
                            <tr>
                                <th>Name</th>
                                <th>Student Number</th>
                                <th>Request Schedule</th>
                                <th>Email</th>
                                <th>Assigned</th>
                            </tr>
                        <?php while ($row = mysqli_fetch_assoc($results)) { ?>
                        <tr>
                            <td><?php echo $row['firstname'] . ', ' . $row['lastname'] . $row['middleInitial']; ?></td>
                            <td><?php echo $row['studentNum']; ?></td>
                            <td><?php echo $row['date']; ?></td>
                            <td><a href="mailto:<?php echo $row['email']; ?>" target="_blank">Email</a></td>
                            <td>
                                <form action="update.php" method="POST">
                                    <input type="hidden" name="appointment_id" value="<?php echo $row['id']; ?>">
                                    <select id="assign" name="doctor">
                                        <option value="brcagampan@gmail.com">Dr.Cagampan</option>
                                        <option value="pjguinto@gmail.com">Dr.Guinto</option>
                                        <option value="acdeguzman@gmail.com">Dr.Deguzman</option>
                                        <option value="relagman@gmail.com">Dr.Lagman</option>
                                    </select>
                                    <input type="submit">
                                </form>
                            </td>
                        </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
            <div class="appointment-box">
                <h2>Pending Documents:</h2>
                <div class="pending-items">
                    <table>
                            <tr>
                                <th>Name</th>
                                <th>Student Number</th>
                                <th>Request Schedule</th>
                                <th>Email</th>
                                <th>Assigned</th>
                            </tr>
                        <?php while ($row = mysqli_fetch_assoc($doc_result)) { ?>
                        <tr>
                            <td><?php echo $row['fullname']; ?></td>
                            <td><?php echo $row['studentNum']; ?></td>
                            <td><?php echo $row['date']; ?></td>
                            <td><a href="mailto:<?php echo $row['email']; ?>" target="_blank">Email</a></td>
                            <td>
                                <form action="documentUpdate.php" method="POST">
                                    <input type="hidden" name="document_id" value="<?php echo $row['id']; ?>">
                                    <select id="assign" name="doctor">
                                        <option value="brcagampan@gmail.com">Dr.Cagampan</option>
                                        <option value="pjguinto@gmail.com">Dr.Guinto</option>
                                        <option value="acdeguzman@gmail.com">Dr.Deguzman</option>
                                        <option value="relagman@gmail.com">Dr.Lagman</option>
                                    </select>
                                    <input type="submit">
                                </form>
                            </td>
                        </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    const hamburgerMenu = document.querySelector('.hamburger-menu');
    const navigationMenu = document.querySelector('.navigation-menu');

    hamburgerMenu.addEventListener('click', () => {
        hamburgerMenu.classList.toggle('show-menu');
        navigationMenu.classList.toggle('show-menu');
    });
</script>
</html>