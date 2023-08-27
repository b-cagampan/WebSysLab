<?php 
include('../api/db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!empty($email) && !empty($password)) {
        $query = "SELECT * FROM profile WHERE email = '$email'";
        $results = mysqli_query($con, $query);

        if ($results) {
            while ($row = mysqli_fetch_assoc($results)) {
                $table_users = $row['email'];
                $table_password = $row['password'];

                if ($password == $table_password) {
                    session_start();
                    $_SESSION['user'] = $email;
                    header("location: ../page/studentPage.php");
                    exit(); // Make sure to exit to prevent further execution
                } else {
                    echo '<script>alert("Incorrect Password!");</script>';
                    echo '<script>window.location.assign("../page/student.php");</script>';
                    exit(); // Make sure to exit to prevent further execution
                }
            }

            // If loop ends without finding a matching user
            echo '<script>alert("User not found!");</script>';
            echo '<script>window.location.assign("../page/student.html");</script>';
        } else {
            echo "Query execution failed: " . mysqli_error($con);
        }
    }
}

?>