<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet">
    <title>Request Documents</title>
    <style>
        body{

		    font-size:larger; 
            font-family: 'Roboto', sans-serif;
			line-height: 1.5;
            background-color: #ffff;
		}

        header {
            width: 100%;
            background-color: white;
            align-items: center;
            border-bottom: 10px solid #FFDB7D;
            display: flex;
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

        h1{
            text-align: center;
            font-weight:1000;
            font-size:xx-large;
        }

        .container {
            margin-left: auto;
            margin-right: auto;
            position: relative;
            max-width: 700px;
            width: 100%;
            background: #fff;
            padding: 25px;
            border-radius: 8px;
        }

        .container header {
            font-size: 1.5rem;
            color: #333;
            font-weight: 500;
            text-align: center;
        }

        .container .form {
            margin-top: 30px;
        }

        .form .input-box {
            width: 100%;
            margin-top: 20px;
        }

        .input-box label {
            color: #333;
            font-weight: bold;
        }

        .form :where(.input-box input, .select-box) {
            position: relative;
            height: 55px; /* Same height as the submit button */
            width: 100%;
            outline: none;
            font-size: 1rem;
            color: #707070;
            margin-top: 8px;
            border: 1px solid #ddd;
            border-radius: 6px;
            padding: 10px 15px; /* Adjust the padding */
            box-sizing: border-box; /* Add box-sizing property */
        }

        .input-box input:focus {
            box-shadow: 0 1px 0 rgba(0, 0, 0, 0.1);
        }

        .form .column {
            display: flex;
            column-gap: 15px;
        }

        .form :where(.gender-option, .gender) {
            display: flex;
            align-items: center;
            column-gap: 50px;
            flex-wrap: wrap;
        }

        .form .gender {
            column-gap: 5px;
        }

        .gender input {
            accent-color: rgb(130, 106, 251);
        }

        .form :where(.gender input, .gender label) {
            cursor: pointer;
        }

        .gender label {
            color: #707070;
        }

        .address :where(input, .select-box) {
            margin-top: 15px;
        }

        .select-box select {
            height: 100%;
            width: 100%;
            outline: none;
            border: none;
            color: #707070;
            font-size: 1rem;
        }

        .form button {
            height: 55px;
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

        .form button:hover {
            background: #dabb6c;
        }

        /*Responsive*/
        @media screen and (max-width: 500px) {
            .form .column {
                flex-wrap: wrap;
            }
            .form :where(.gender-option, .gender) {
                row-gap: 15px;
            }
			
			.ret {
				margin-right: 6px;
			}
			
			.return-button {
				display: inline-block;
				padding: 8px 16px;
				font-size: 16px;
				border: none;
				border-radius: 4px;
				text-decoration: none;
				cursor: pointer;
				transition: background-color 0.3s ease;
				height: 70px;
			}
			
			.return-button:hover {
				background-color: #E0C96B;
			}
			
        }
    </style>
</head>
<body>
    <header style="text-decoration: none;">
        <a href="studentPage.php" class="return-button">
            <span class="ret">
                <div class="header-image-container" style="text-decoration: none;">
                    <img src="https://cdn-icons-png.flaticon.com/512/109/109618.png?fbclid=IwAR0pUR46hLcBRyU0d9UE_hz_2cCrNMrLyBwinkajzEDlVk1ZKAeoZ8-pzas" alt="Return">
                </div>
            </span>
        </a>
    </header>

    <h1>Request Documents</h1>

    <section class="container">
        <form action="documents.php" method="POST" class="form">
            <div class="input-box">
                <label>Student Full Name</label>
                <input type="text" name="fullname" placeholder="Enter full name" required />
            </div>
            <div class="column">
                <div class="input-box">
                    <label>Student Number</label>
                    <input type="number" name="studentNum" placeholder="Enter student number" required />
                </div>
            </div>
            <div class="column">
                <div class="input-box">
                    <label>Date Today</label>
                    <input type="date" name="date" required />
                </div>
            </div>
            <div class="input-box">
                <label>E-Mail</label>
                <input type="text" name="email" placeholder="Enter email address" required />
            </div>
            <div class="input-box address">
                <label>What type of Document you want to request?</label>
                <input style="padding: 5%;" type="text" name="notes" placeholder="medical certificate/ Illness / Fit to resume school" required />
            </div>
            <button>Submit</button>
        </form>
    </section>
</body>
</html>

<?php 
if($_SERVER["REQUEST_METHOD"]== "POST") {
    $fullname = ($_POST['fullname']);
    $studentNum = ($_POST['studentNum']);
    $date = ($_POST['date']);
    $email = ($_POST['email']);
    $notes = ($_POST['notes']);

    $bool = true;
    $db_name = "mapua_register";
    $db_username = "root";
    $db_pass = "";
    $db_host = "localhost:3307";
    $con = mysqli_connect("$db_host", "$db_username", "$db_pass", "$db_name") or die(mysqli_error());
    $query = "SELECT * from req_document";
    $results = mysqli_query($con, $query);

    if($bool) {
        mysqli_query($con, "INSERT INTO req_document(fullname, studentNum, email, note) VALUES('$fullname', '$studentNum', '$email', '$notes')");
        Print'<script>alert("Submitted!, Your request document will be mail through your email, Thank you!");</script>';
        Print'<script>window.location.assign("documents.php");</script>';

    } else {
        Print '<script>alert("Error Occured");</script>';
        Print'<script>window.location.assign("documents.php");</script>';
    }
}
?>