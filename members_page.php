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
    <title>MEMBER PAGE</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/includes.css">
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
    <div id="wrapper">
        <div class="ad left-ad">
            <p>Left Ad</p>
        </div>
        
        <div id="container">
            <?php include('header.php'); ?>
            <?php include('nav.php'); ?> <!-- Include the navbar with logout link -->
            
            <div id="content">
                <!-- Make sure to check if the session variable exists before using it -->
                <?php if(isset($_SESSION['fname'])): ?>
                    <h2>Meow There, <?php echo htmlspecialchars($_SESSION['fname']); ?>!</h2>
                <?php endif; ?>

                <img src="https://blogstudio.s3.theshoppad.net/bella-boots-organic-pet-food/02e83b91d1fa7bef520082affb0e7ada.png" alt="Maine Coon Cat">

                <p>The Maine Coon cat has existed in the U.S. since the 1800s and is considered the oldest native cat breed in the U.S. 
                    Rugged and solidly built, the Maine Coon cat is known for its massive size, shaggy coat, and large tufted ears reminiscent of a bobcat. 
                    While the Maine Coon might appear intimidating to some, this breed is a gentle giant with a sweet, laid-back personality. Learn more about the beloved Maine Coon.</p>
            </div>
        </div>

        <div class="ad right-ad">
            <p>Right Ad</p>
        </div>
    </div>
    
    <?php include('footer.php'); ?>
</body>
</html>
