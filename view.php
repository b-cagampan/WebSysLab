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

// Fetch data from the req_documents table where assign matches the $_SESSION['user'] name
$doc_query = "SELECT * from req_document WHERE doctor = '{$_SESSION['user']}'";
$doc_result = mysqli_query($con, $doc_query);
?>

<!DOCTYPE html>
    <html>
    <head>
        <!-- Latest compiled and minified CSS -->
        <title>Document Request</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
    

    
    
            /*Responsive*/
            @media screen and (max-width: 500px) {
          
                
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
            .card-title{
                max-width: 1000px;
                font-weight: bold;

            }
            .card-text{
                text-align: left;
            }
            .card{
                max-width: 1000px;
                width: 500px;
                margin-left: auto;
                margin-right: auto;
                
            }
            .card-body{
                max-width: 1000px;
       
            }
            .container123{
                margin-top: 50px;
                width: 600px;
                margin-left: 50px;
                border-radius: 8px;
       
            }

            button{
            height: 30px;
            width: 100%;
            color: #000000;
            font-size: 1rem;
            font-weight: 400;
            border: none;
            cursor: pointer;
            transition: all 0.2s ease;
            background: #FFDB7D;
            }

            th {
                padding: 10px;
            }
        </style>
    </head>
    <body>
        <header style="text-decoration: none;">
            <a href="doctorPage.php" class="return-button">
                <span class="ret">
                    <div class="header-image-container" style="text-decoration: none;">
                        <img src="https://cdn-icons-png.flaticon.com/512/109/109618.png?fbclid=IwAR0pUR46hLcBRyU0d9UE_hz_2cCrNMrLyBwinkajzEDlVk1ZKAeoZ8-pzas" alt="Return">
                        
                    </div>
                </span>
            </a>
            <h1 style="margin-left: 70%;">Document Request</h1>
        </header>
        <div class="container">
            <div class="row" id="documentsContainer"></div>
        </div>
        <div class="container123" align="center">
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <table>
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
    </body>
    </html>