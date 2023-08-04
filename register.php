<html>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" >
    <title>Create an Account</title>

    <style>


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

body {
    background-color: rgb(169, 86, 86);
    overflow: hidden;
    margin: 0;
    font-family: 'Roboto', sans-serif;
}

.main-bg {
    filter: opacity(0.5);
    position: relative;
}

.container {
    background-color: white;
	max-height: 500px;
    height: auto;
    max-width: auto;
	width: 700;
    position: absolute;
    top: 15%;
    bottom: -50%;
    left: 27.5%;
    border-radius: 20px;
	
}

.display-block-container {
    display: block;
    margin-left: auto;
    margin-right: auto;
    margin: 20px;
}

.display-block-container h1 {
    text-align: center;
}

.display-block-container label, .display-block-container input[type="text"], .display-block-container input[type="email"] {
    display: block;
    margin-top: 10px;
    margin-left: 25px;
    border-radius: 20px;
}

.display-block-container input[type="email"], .display-block-container input[type="text"] {
    width: 300px;
    height: 40px;
    border: 1px solid rgb(207, 206, 206);
}
.display-block-container label, .display-block-container input[type="number"], .display-block-container input[type="number"] {
    display: block;
    margin-top: 10px;
    margin-left: 25px;
    border-radius: 20px;
}
.display-block-container input[type="number"], .display-block-container input[type="number"] {
    width: 300px;
    height: 40px;
    border: 1px solid rgb(207, 206, 206);
}
.display-block-container label, .display-block-container input[type="password"], .display-block-container input[type="password"] {
    display: block;
    margin-top: 10px;
    margin-left: 25px;
    border-radius: 20px;
}
.display-block-container input[type="password"], .display-block-container input[type="password"] {
    width: 300px;
    height: 40px;
    border: 1px solid rgb(207, 206, 206);
}

.btn-submit {
    text-align: center;
}

.btn-submit input {
    background-color: #FFDB7D;
    border-radius: 20px;
    padding: 10px;
    font-size: 20px;
    width: 200px;
    height: 50px;
    border: none;
    position: relative;
    bottom: 30px;
    top: 70px;
}

.btn-submit input:hover {
    background-color: #dabb6c;
}

form {
    color: black;
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
.input-row {
    display: flex;
    justify-content: space-between;
    margin-bottom: 15px;
}

.input-column {
    flex: 1;
    margin-right: 10px;
}
        </style>
    </head>
    <header>
    <div class="hamburger-menu">
        <div class="bar"></div>
        <div class="bar"></div>
        <div class="bar"></div>

        <ul class="menu-items">
            <li><a href="index.html">Home</a></li>
         </ul>
    </div>
    <img src="https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/cfbd6a18-cdfc-45a4-94ec-86f3b418839d/dezr52f-13180b66-e4a8-4dc8-bdbe-08376824eaf0.png/v1/fill/w_700,h_350,q_70,strp/flag_of_mapua_university__mu__by_tetsuya0022_dezr52f-350t.jpg?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7ImhlaWdodCI6Ijw9MTUwMCIsInBhdGgiOiJcL2ZcL2NmYmQ2YTE4LWNkZmMtNDVhNC05NGVjLTg2ZjNiNDE4ODM5ZFwvZGV6cjUyZi0xMzE4MGI2Ni1lNGE4LTRkYzgtYmRiZS0wODM3NjgyNGVhZjAucG5nIiwid2lkdGgiOiI8PTMwMDAifV1dLCJhdWQiOlsidXJuOnNlcnZpY2U6aW1hZ2Uub3BlcmF0aW9ucyJdfQ.Y9cuvNbaPiqEPzdyLJEYO6_w1zNXdwSBAZ6JpoGjCQI" alt="Mapua Clinic">
    </header>
    <body>

        <img src="https://imgcdnblog.carmudi.com.ph/carmudi-ph/wp-content/uploads/2019/03/23035415/Prius-C-Test-Drive-min.jpg" class="main-bg" alt="">
    <div class="container">
        <div class="display-block-container">
            <h1>Sign Up</h1>
            <form action="register.php" method="post">
                <div class="input-row">
					<div class="input-column">
						<label for="firstname">First Name</label>
						<input type="text" name="firstname" class="name" required>
					</div>
					<div class="input-column">
						<label for="lastname">Last Name</label>
						<input type="text" name="lastname" class="name" required>
					</div>
				</div>
				<div class="input-row">
					<div class="input-column">
						<label for="email">Email</label>
						<input type="email" name="email" class="email" required>
					</div>
					<div class="input-column">
						<label for="contact">Contact Number</label>
						<input type="number" name="contact" class="contact" required>
					</div>
				</div>
				<div class="input-row">
					<div class="input-column">
						<label for="password">Create Password</label>
						<input type="password" name="password" class="password">
					</div>
					<div class="input-column">
						<label for="password">Confirm Password</label>
						<input type="password" name="confirmpassword" class="password">
					</div>
				</div>
                <div class="btn-submit">
                    <input type="submit">
                </div>
            </form>
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

<?php 
//Get connection to database
if($_SERVER["REQUEST_METHOD"]== "POST") {
    $FName = ($_POST['firstname']);
    $LName = ($_POST['lastname']);
    $email = ($_POST['email']);
    $contact = ($_POST['contact']);
    $password = ($_POST['password']);
    $conf_pw = ($_POST['confirmpassword']);

    $bool = true;
    $db_name = "mapua_register";
    $db_username = "root";
    $db_pass = "";
    $db_host = "localhost:3307";
    $con = mysqli_connect("$db_host", "$db_username", "$db_pass", "$db_name") or die(mysqli_error());
    $query = "SELECT * from profile";
    $results = mysqli_query($con, $query);

    if($password == $conf_pw) {
        if($bool) {
            mysqli_query($con, "INSERT INTO profile(firstname, lastname, email, password, contact) VALUES('$FName', '$LName', '$email', '$password', '$contact')");
            Print'<script>alert("Successfully Registered");</script>';
            Print'<script>window.location.assign("register.php");</script>';
        }
    } else {
        Print'<script>alert("Password does no match");</script>';
        Print'<script>window.location.assign("register.php");</script>';
    }
}


if($_SERVER["REQUEST_METHOD"]== "POST") {
    $email = ($_POST['email']);
    $password = ($_POST['password']);

    echo "Username Entered Is: ".$email. "<br/>";
    echo "Password Entered Is: ".$password;
}
?>