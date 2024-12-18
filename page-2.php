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
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CHARACTERISTIC</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .image-center {
      display: block;
      margin: 0 auto;
      max-width: 100%;
      height: auto;
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
  </style>
</head>
<body>
  <div class="container text-center">
    <h1>CHARACTERISTIC</h1>
    <p>The Maine Coon is known for its large size, making it one of the biggest domesticated cat breeds. In addition to its impressive size, Maine Coons are distinguished by their thick, water-resistant fur, bushy tail, and tufted ears with lynx-like tips. They are also famous for their affectionate and gentle personalities, often described as "dog-like" due to their loyalty and playful nature. Despite their size, they have soft voices, frequently using trills and chirps to communicate rather than loud meows.</p>
    
    
    <img src="https://www.thesprucepets.com/thmb/0GwOLF6djJKgSdcv1Df9etFteyY=/2119x0/filters:no_upscale():strip_icc()/GettyImages-1184479027-8a7212a5c4fe411abfb1941479f3391d.jpg" alt="Maine Coon Cat" class="image-center">
    <p></p>
    <a href="members_page.php" class="btn btn-primary">Back to Home</a>
  </div>
  <?php include('footer.php'); ?>
</body>
</html>
