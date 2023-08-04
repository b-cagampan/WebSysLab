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
$query = "SELECT * from req_appointment WHERE assign = '{$_SESSION['user']}'";
$results = mysqli_query($con, $query);

// Fetch data from the req_documents table where assign matches the $_SESSION['user'] name
$doc_query = "SELECT * from req_document WHERE doctor = '{$_SESSION['user']}'";
$doc_result = mysqli_query($con, $doc_query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="doctorHomePage.css">
    <script src="https://kit.fontawesome.com/a81e19cd1e.js" crossorigin="anonymous"></script>
    <title>Login | Doctor</title>
</head>
<header>
    <div class="hamburger-menu">
        <div class="bar"></div>
        <div class="bar"></div>
        <div class="bar"></div>

        <ul class="menu-items">
            <li><a href="doctorLogout.php">Logout</a></li>
         </ul>
    </div>

     
    
    <img src="https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/cfbd6a18-cdfc-45a4-94ec-86f3b418839d/dezr52f-13180b66-e4a8-4dc8-bdbe-08376824eaf0.png/v1/fill/w_700,h_350,q_70,strp/flag_of_mapua_university__mu__by_tetsuya0022_dezr52f-350t.jpg?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7ImhlaWdodCI6Ijw9MTUwMCIsInBhdGgiOiJcL2ZcL2NmYmQ2YTE4LWNkZmMtNDVhNC05NGVjLTg2ZjNiNDE4ODM5ZFwvZGV6cjUyZi0xMzE4MGI2Ni1lNGE4LTRkYzgtYmRiZS0wODM3NjgyNGVhZjAucG5nIiwid2lkdGgiOiI8PTMwMDAifV1dLCJhdWQiOlsidXJuOnNlcnZpY2U6aW1hZ2Uub3BlcmF0aW9ucyJdfQ.Y9cuvNbaPiqEPzdyLJEYO6_w1zNXdwSBAZ6JpoGjCQI" alt="Mapua Clinic">
</header>
<body>
    <div class="container">
        <div class="display-block-container">
            <div class="box-container">
                <i class="fa-solid fa-file fa-2xl" style="color: #000000;"></i>
                <a href="view.php"><h2>View Requested Documents</h2></a>
            </div>
            <div class="box-container">
                <i class="fa-solid fa-calendar fa-2xl" style="color: #000000;"></i>
                <a href="application.php"><h2>View Requested Appointment</h2></a>
            </div>
            <div class="box-container">
               <i class="fa-solid fa-bullhorn fa-2xl" style="color: #000000;"></i>
               <a href="announcement.php"><h2>Create Announcement</h2></a>
            </div>
            <!-- Remove when needed -->
            <!--<div class="box-container">
                <i class="fa-solid fa-circle-user fa-2xl" style="color: #000000;"></i>
                <a href="#"><h2>Logout</h2></a>
            </div> 
            -->
        </div>
        <div class="appointment-board-sched">
            <div class="appointment-box">
                <h2>Schedule Appointment Today:</h2>
                <div class="pending-items">
                    <table>
                        <?php while ($row = mysqli_fetch_assoc($results)) { ?>
                        <tr>
                            <th><?php echo $row['firstname'] . ', ' . $row['lastname']; ?></th>
                            <th><?php echo $row['studentNum']; ?></th>
                        </tr>
                        <tr>
                            <th>Appointment Schedule:</th>
                            <th><?php echo $row['date']; ?></th>
                        </tr>
                        <tr>
                            <th>Symptoms:</th>
                            <th><?php echo $row['medicalCondition']; ?></th>
                        </tr>
                        <tr>
                            <th><a href="mailto:<?php echo $row['email']; ?>" target="_blank"><button>Email</button></a></th>
                            <th><th><a href="appointmentClear.php?id=<?php echo $row['id']; ?>"><button> Done</button></a></th></th>
                        </tr>
                        <?php } ?>
                        <?php while ($row = mysqli_fetch_assoc($doc_result)) { ?>
                        <tr>
                            <th><?php echo $row['fullname']; ?></th>
                            <th><?php echo $row['studentNum']; ?></th>
                        </tr>
                        <tr>
                            <th>Date Requested:</th>
                            <th><?php echo $row['date']; ?></th>
                        </tr>
                        <tr>
                            <th><a href="mailto:<?php echo $row['email']; ?>" target="_blank"><button>Email</button></a></th>
                            <th><th><a href="done.php?id=<?php echo $row['id']; ?>"><button> Done</button></a></th></th>
                        </tr>
                        <?php }?>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        const hamburgerMenu = document.querySelector('.hamburger-menu');
        const navigationMenu = document.querySelector('.navigation-menu');
    
        hamburgerMenu.addEventListener('click', () => {
            hamburgerMenu.classList.toggle('show-menu');
            navigationMenu.classList.toggle('show-menu');
        });
    </script>
</body>
</html>