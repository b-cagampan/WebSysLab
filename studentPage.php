<?php 
session_start();
if($_SESSION['user']) {}

//Get connection to database
$db_name = "mapua_register";
$db_username = "root";
$db_pass = "";
$db_host = "localhost:3307";
$con = mysqli_connect("$db_host", "$db_username", "$db_pass", "$db_name") or die(mysqli_error());

// Fetch data from the req_appointment table
$query = "SELECT * from req_appointment WHERE email = '{$_SESSION['user']}'";
$results = mysqli_query($con, $query);

// Fetch data from the req_documents table where assign matches the $_SESSION['user'] name
$doc_query = "SELECT * from req_document WHERE email = '{$_SESSION['user']}'";
$doc_result = mysqli_query($con, $doc_query);

$announcement_query =  "SELECT * from announcements";
$announcement= mysqli_query($con,$announcement_query)
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" >
    <script src="https://kit.fontawesome.com/a81e19cd1e.js" crossorigin="anonymous"></script>
    <title>Student Page</title>
    <style>
        *{
    margin: 0;
    font-family: 'Roboto', sans-serif;
}

header {
    width: 100%;
    background-color: white;
    align-items: center;
    border-bottom: 10px solid #FFDB7D;
}
header img {
    height: 70px;
    position: relative;
    left: 45%;
    right: 50%;
}

.container {
    display: flex;
    margin-top: -100px;
}

.display-block-container {
    margin: 150px;
}

.box-container {
    margin-top: 30px;
    border-radius: 30px;
    border: 1px solid #B3B3B3;
    padding: 30px;
    width: 500px;

    
}

.box-container:hover {
    cursor: pointer;
}



.box-container a {
    text-decoration: none;
    color: black;
    
}

.appointment-board-sched {
    margin: 100px;
    width: 100%;
    
}

.appointment-box {
    text-align: center;
    border-radius: 10px;
    border: 1px solid #B3B3B3;
    padding: 20px;
    width: 100%;
    height: 80%;
    margin-top: 80px;

}

.pending-items {
    border-bottom: 1px solid #B3B3B3;
    border-top: 1px solid #B3B3B3;
    align-items: center;
}

/* Remove the width property from the table to make it inherit the width of its parent */
table {
    font-family: arial, sans-serif;
    text-align: center;
    margin-left: auto;
    margin-right: auto;
    width: 70%;
}

td, th {
    border: 1px solid #B3B3B3;
    text-align: left;
    padding: 8px;
}

th {
    border: none;
}

/* Hambuger Menu CSS */
.hamburger-menu {
    position: relative;
    cursor: pointer;
    padding: 10px;
    z-index: 1000;
}

.bar {
    width: 30px;
    height: 3px;
    background-color: #000;
    margin: 5px 0;
    transition: transform 0.3s ease-in-out;
}

.btn-container{
    margin: 4%;
    margin-right: auto;
    text-align: left;
    font: 2em sans-serif;
    font-weight:bold;
    margin-top: 30px;
    border-radius: 30px;
    border: 1px solid #B3B3B3;
    padding: 30px;
    width: 500px;
					
    }

    .btn-container a{
        
        text-decoration: none;
        text-align: center;
        color: black;
    }

    .btn-container:hover {
        background-color: #FFDB7D;
    }

    .btn-container img{
        height: 25px;
    }


/* Positioning the hamburger menu on the top left corner */
.hamburger-menu {
    position: absolute;
    top: 15px;
    left: 15px;
}

.hamburger-menu .menu-items {
    list-style: none;
    padding: 10;
    margin: 0;
    margin-top: 18px;
    position: absolute;
    top: 50px; /* Adjust this value to position the menu items below the hamburger menu */
    left: -20px; /* Adjust this value to position the menu items to the right of the hamburger menu */
    background-color: #F1F1F1;
    box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
    transform: translateX(-100%);
    transition: transform 0.3s ease-in-out;
    z-index: 998; /* Ensure it's above other elements except the hamburger menu */
    width: 500px;
    height: 800px;
    
    
}

a {
    text-decoration:none;
    color: red;
}

.hamburger-menu .menu-items li {
    padding: 30px;
    font-size: 30px;
    
    font-weight: 700;;
    
}

/* Show the menu items when the menu is active */
.show-menu .menu-items {
    transform: translateX(0);
    
}


/* Styling the navigation menu that slides from left to right */
.navigation-menu {
    position: fixed;
    top: 0;
    left: 0;
    height: 100%;
    width: 200px;
    background-color: #fff;
    box-shadow: 2px 0 5px rgba(0, 0, 0, 0.2);
    transform: translateX(-100%);
    transition: transform 0.3s ease-in-out;
    z-index: 999;
}


.show-menu .navigation-menu {
    transform: translateX(0);
}


.show-menu .bar:nth-child(1) {
    transform: translateY(8px) rotate(45deg);
}

.show-menu .bar:nth-child(2) {
    opacity: 0;
}

.show-menu .bar:nth-child(3) {
    transform: translateY(-8px) rotate(-45deg);
}

        </style>
</head>
<header>
    <div class="hamburger-menu">
        <div class="bar"></div>
        <div class="bar"></div>
        <div class="bar"></div>

        <ul class="menu-items">
            <li><a href="studentLogout.php">Logout</a></li>
         </ul>
    </div>
    <img src="https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/cfbd6a18-cdfc-45a4-94ec-86f3b418839d/dezr52f-13180b66-e4a8-4dc8-bdbe-08376824eaf0.png/v1/fill/w_700,h_350,q_70,strp/flag_of_mapua_university__mu__by_tetsuya0022_dezr52f-350t.jpg?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7ImhlaWdodCI6Ijw9MTUwMCIsInBhdGgiOiJcL2ZcL2NmYmQ2YTE4LWNkZmMtNDVhNC05NGVjLTg2ZjNiNDE4ODM5ZFwvZGV6cjUyZi0xMzE4MGI2Ni1lNGE4LTRkYzgtYmRiZS0wODM3NjgyNGVhZjAucG5nIiwid2lkdGgiOiI8PTMwMDAifV1dLCJhdWQiOlsidXJuOnNlcnZpY2U6aW1hZ2Uub3BlcmF0aW9ucyJdfQ.Y9cuvNbaPiqEPzdyLJEYO6_w1zNXdwSBAZ6JpoGjCQI" alt="Mapua Clinic">
</header>
<body>
    <div class="container">
        <div class="display-block-container">
        <div class="btn-container">
            <img src="https://cdn-icons-png.flaticon.com/512/32/32360.png">
            <br>
            <a href="documents.php">Request Documents</a> 

        </div>
        <div class="btn-container">
            <img src="https://cdn-icons-png.flaticon.com/512/55/55281.png">
            <br><a href="appointment.php">Schedule an Appointment</a>
        </div>
    </div>
    <div class="appointment-board-sched">
            <div class="appointment-box">
                <h2>Announcements</h2>
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
                                <th><th><a href=""><button><b>✓</b> Done</button></a></th></th>
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
                                <th><a href="done.php"><button>Cancel</button></a></th></th>
                            </tr>
                            <tr>
                                <th>Assigned: </th>
                                <th><?php echo $row['doctor']; ?></th>
                            </tr>
                        <?php }?>
                        <?php while ($row = mysqli_fetch_assoc($announcement)) { ?>
                            <tr>
                                <th><?php echo $row['subject']; ?></th>
                            </tr>
                            <tr>
                                <th>By: </th>
                                <th><?php echo $row['announcer']; ?></th>
                            </tr>
                            <tr>
                                <th><?php echo $row['announcement']; ?></th>
                            </tr>
                            <tr>
                                <th><a href="clear.php?id=<?php echo $row['id']; ?>"><button> Clear</button></a></th>
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