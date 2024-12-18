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
  <title>DID YOU KNOW?</title>
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
    <h1>DID YOU KNOW?</h1>
    <p>A fun fact about Maine Coons is that they are sometimes called the "gentle giants" of the cat world due to their large size and sweet temperament. Despite their impressive size, Maine Coons often love to play fetch, much like a dog! Their playful, friendly nature and love of water make them unique among cat breeds. Some Maine Coons even enjoy splashing in water or drinking from faucets.</p>
    
    
    <img src="https://media.mercola.com/ImageServer/Public/2014/December/10-facts-maine-coon-cats-fb.jpg" alt="Maine Coon Cat Fun Fact" class="image-center">
    <p></p>
    <a href="members_page.php" class="btn btn-primary">Back to Home</a>
  </div>
  <?php include('footer.php'); ?>
</body>
</html>
