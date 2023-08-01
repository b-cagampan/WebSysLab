<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet">
    <title>Campus Care</title>

    <style>
		body{
			font-size: 1vw; 
            font-family: 'Roboto', sans-serif;
			line-height: 1.5;
            background-color: #ffff;
		}

        header {
			height: auto;
			max-height:70px;
            width: 100%;
            background-color: white;
            align-items: center;
            border-bottom: 10px solid #FFDB7D;
        }

        h1{
            text-align: center;
            font-weight:1000;
            font-size:xx-large;
        }

        header img {
            height: auto;
            max-height: 70px;
            max-width: 100%;
        }

        .header-image-container {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .btn-container {
            width: 45%;
            border: 1px solid rgba(0, 0, 0, 0.301);
            padding: 3%;
            margin: 4%;
            margin-left: auto;
            margin-right: auto;
            text-align: center;
            font: 2em sans-serif;
            font-weight: bold;
        }

        .btn-container a {
            text-decoration: none;
            text-align: center;
            color: black;
        }

        .btn-container:hover {
            background-color: #dabb6c;
        }

        /* Add Styles for the Form */
        .form-container {
            width: 80%;
            margin: 4% auto;
        }

        .form-container label {
            display: block;
            font-weight: bold;
            margin-top: 10px;
        }

        .form-container input,
        .form-container textarea {
            width: calc(100% - 30px);
            margin-top: 5px;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-container .form-row {
            display: flex;
            flex-wrap: wrap;
            margin-bottom: 20px;
        }

        .form-container .form-row label {
            flex-basis: 100px;
        }

        .form-container .form-row .form-col-1,
        .form-container .form-row .form-col-2,
        .form-container .form-row .form-col-3 {
            flex: 1;
        }

        .form-container .form-row + .form-row {
            margin-top: 20px;
            padding-top: 20px;
            
        }

        button[type="submit"] {
            height: 40px;
            width: 100%;
            color: #fff;
            font-size: 1rem;
            font-weight: 400;
            margin-top: 30px;
            border: none;
            cursor: pointer;
            transition: all 0.2s ease;
            background: #FFDB7D;
        }

        button[type="submit"]:hover {
            background: #dabb6c;
        }
		textarea{
			height: 20px;
		}
		.ret {
			margin-right: 6px;
		}
		.return-button {
            display: inline-flex; 
            justify-content: center; 
            align-items: center; 
            padding: 8px 16px;
            font-size: 16px;
            border: none;
            border-radius: 4px;
            text-decoration: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
            height: 70px;
        }
		
    </style>
</head>
<body>
    <header>
        <a href="StudentMainPage.html" class="return-button">
            <span class="ret">
					<img src="https://cdn-icons-png.flaticon.com/512/109/109618.png?fbclid=IwAR0pUR46hLcBRyU0d9UE_hz_2cCrNMrLyBwinkajzEDlVk1ZKAeoZ8-pzas" alt="Return">
			</span> 
        </a>
    </header>

    <h1>Schedule Appointment</h1>
    <div class="form-container">
        <form action="appointment.php"  method="POST" class="form">
            <div class="form-row">
                <div class="form-col-1">
                    <label>First Name</label>
                    <input type="text" name="firstname" required>
                </div>
                <div class="form-col-1">
                    <label>Last Name</label>
                    <input type="text" name="lastname" required>
                </div>
                <div class="form-col-1">
                    <label>Middle Initial</label>
                    <input type="text" name="middleInitial" class="short" required>
                </div>
                <div class="form-col-1">
                    <label>Suffix</label>
                    <input type="text" name="suffix" class="very-short">
                </div>
            </div>

            <div class="form-row">
                <div class="form-col-1">
                    <label>Student Number</label>
                    <input type="text" name="studentNumber" required >
                </div>
                <div class="form-col-1">
                    <label>Email</label>
                    <input type="text" name="email" required >
                </div>
                <div class="form-col-1">
                    <label>Program</label>
                    <input type="text" name="program" required >
                </div>
                <div class="form-col-1">
                    <label>Cellphone Number</label>
                    <input type="text" name="contactNum" required >
                </div>
            </div>

            <div class="form-row">
                <div class="date-container form-col-3">
                    <label>Select Date</label>
                    <input type="date" name="date" required >
                </div>
                <div class="form-col-3">
                    <label>Medical Condition</label>
                    <input type="text" name="medicalCondition" required>
                </div>
                <div class="form-col-3">
                    <label>Allergies</label>
                    <input type="text" name="allergies" required>
                </div>
            </div>

            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>

<?php 
//Get connection to database
if($_SERVER["REQUEST_METHOD"]== "POST") {
    $FName = ($_POST['firstname']);
    $LName = ($_POST['lastname']);
    $MName = ($_POST['middleInitial']);
    $suffix = ($_POST['suffix']);
    $studentNumber = ($_POST['studentNumber']);
    $email = ($_POST['email']);
    $program = ($_POST['program']);
    $contact = ($_POST['contactNum']);
    $date = ($_POST['date']);
    $medicalCondition = ($_POST['medicalCondition']);
    $allergies = ($_POST['allergies']);
    
    $bool = true;
    $db_name = "mapua_register";
    $db_username = "root";
    $db_pass = "";
    $db_host = "localhost:3307";
    $con = mysqli_connect("$db_host", "$db_username", "$db_pass", "$db_name") or die(mysqli_error());
    $query = "SELECT * from req_appointment";
    $results = mysqli_query($con, $query);

    if($bool) {
        mysqli_query($con, "INSERT INTO req_appointment(firstname, lastname, middleInitial, suffix, studentNum, email, program, contactNum, date, medicalCondition, Allergies) VALUES('$FName', '$LName', '$MName', '$suffix', '$studentNumber','$email', '$program', '$contact', '$date', '$medicalCondition', '$allergies')");
        Print'<script>alert("Successfully Registered");</script>';
        Print'<script>window.location.assign("appointment.php");</script>';
    } else {
        Print '<script>alert("Error Occured");</script>';
        Print'<script>window.location.assign("appointment.php");</script>';
    }
}
?>