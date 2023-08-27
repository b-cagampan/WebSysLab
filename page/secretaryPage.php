<?php 
session_start();
if(!isset($_SESSION['user'])) {
    // Redirect to the login page or perform other actions if the user is not logged in
    header("Location: index.html");
    exit();
}

include("../api/db.php");
// Fetch data from the req_documents table
$doc_query = "SELECT * from request_document WHERE doctor IS NULL";
$results = mysqli_query($con, $doc_query);
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
                <th>Status</th>
                <th>Email</th>
                <th>Assign To</th>
                <th>Date</th>
                <th>Request For</th>
                <th>Student ID</th>
                <th>Name</th>
            </tr>
            </div>
            <div class="row-pending">
            <?php while ($row = mysqli_fetch_assoc($results)) { ?>
                <?php if(isset($_POST['status']) && $_POST['status'] == 'Approve') {?>
                <?php $email = $row['email'];?>
                <?php $subject = 'Submission Received!';?>
                <?php $message = 'Your appointment has already been scheduled with Dr. ' . $row['doctor'] . ' on ' . $row['schedule'] . '. Important reminders: If your schedule is for an in-person appointment, please be on time. If its an online appointment, the doctor will contact you via Microsoft Teams. Thank you.'; ?>
                <?php mail($email, $subject, $message);?>
                <?php header('location: secretaryPage.php'); ?>
                <?php }?>
                <tr>
                <form id="updateForm" action="update.php" method="POST">
                    <th><button type="submit" name="status" value="Approve"><?php ?>Done</button></th>
                    <th><a href="mailto:<?php echo $row['email']; ?>"><button>Email</button></a></th>
                    <td>
                        <select id="assign" name="doctor">
                            <option value="brcagampan@gmail.com">Dr.Cagampan</option>
                            <option value="pjguinto@gmail.com">Dr.Guinto</option>
                            <option value="acdeguzman@gmail.com">Dr.Deguzman</option>
                            <option value="relagman@gmail.com">Dr.Lagman</option>
                        </select>
                    </td>
                    <td>
                        <input type="date" name="schedule_date" required>
                    </td>
                </form>
                    <th><?php echo $row['delivery_method']; ?></th>
                    <th><?php echo $row['id_number']; ?></th>
                    <th><?php echo $row['first_name'] . ', ' . $row['last_name'] . ' '. $row['middle_initial']; ?></th>
            <?php } ?>
                </tr>
            </div>
        </table>
    </div>
</body>
</html>