<html>
    <head>
        <title>FLAMES | Sign Up</title>
        <link rel="stylesheet" type="text/css" href="styles.css">
    </head>
    <body>
        <div class="container-center">
            <h1> Sign Up </h1>
            <form action="register.php" method="POST">
                <table>
                    <tr>
                        <td>First Name</td>
                        <td><input type="text" name="firstname" class="name" required></td>
                    </tr>
                    <tr>
                        <td>Last Name</td>
                        <td><input type="text" name="lastname" class="name" required></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><input type="text" name="email" class="email" required></td>
                    </tr>
                    <tr>
                        <td>Contact No.</td>
                        <td><input type="text" name="contact" class="contact" required></td>
                    </tr>
                    <tr>
                        <td>Create Password</td>
                        <td><input type="password" name="password" class="password" required></td>
                    </tr>
                    <tr>
                        <td>Confirm Password</td>
                        <td><input type="password" name="conf-password" class="password" required></td>
                    </tr>
                </table>
                <input type="submit" class="submit-btn">
            </form>
            <a href="login.php"> Already have account? </a>
        </div>
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
    $conf_pw = ($_POST['conf-password']);

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

