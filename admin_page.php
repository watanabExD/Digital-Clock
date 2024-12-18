<?php
session_start();

// Check if user_level is not set or is neither 1 nor 0
if (!isset($_SESSION['user_level']) || ($_SESSION['user_level'] != 1 && $_SESSION['user_level'] != 0)) {
    header("Location: loginpage.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>ADMIN PAGE</title>
    <meta charset="UTF-8">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #000; 
            color: #fff; 
        }

        #wrapper {
            display: flex;
            justify-content: space-between;
            padding: 20px;
            width: 95%; 
            margin: 0 auto; 
        }

        .left-ad, .right-ad {
            background-color: #333; 
            color: #fff;
            padding: 20px;
            font-weight: bold;
            width: 12%; 
            text-align: center;
            border-radius: 10px;
        }

        #container {
            background-color: #fff; 
            padding: 20px;
            width: 76%; 
            max-width: 1200px; 
            border-radius: 10px;
            color: #000; 
            margin: 0 auto; 
        }

        h2 {
            color: #000; 
            text-align: center;
            font-size: 3em; 
        }

        #content p {
            font-size: 1.5em; 
            line-height: 1.6;
            margin-bottom: 20px;
            color: #000; 
        }

        img {
            display: block;
            margin: 20px auto;
            border: 5px solid #000; 
            border-radius: 15px;
            max-width: 100%;
            height: auto;
        }

        footer {
            background-color: #333;
            color: white;
            padding: 10px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div id="container">
        <?php include('header.php'); ?>
        <?php include('nav_admin.php'); ?> 

        <div id="content">
            <center><h1>Admin Page</h1></center>
            <center>
                <img src="https://cdn.boldbi.com/wp/pages/dashboards/finance/financial-mgmt.png" alt="Dashboard" class="image-center">
                <p>Dashboard content...</p>
            </center>
        </div>
    </div>
</body>
</html>
