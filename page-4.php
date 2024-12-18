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
  <title>ORIGIN</title>
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
    <h1>ORIGIN</h1>
    <p>The origin of the Maine Coon cat breed is surrounded by myths and legends. One popular theory is that they originated in the U.S. state of Maine, where they became the state's official cat. Some believe that Maine Coons are descendants of long-haired cats brought to America by Vikings, which might explain their resemblance to the Norwegian Forest Cat.</p>

    <p>Another legend suggests that the breed is a mix between domestic cats and raccoons, which is genetically impossible but contributed to their name, "Maine Coon." More realistically, they likely evolved from long-haired cats brought by European settlers, adapting to Maine's cold climate with their thick, water-resistant fur and rugged build.</p>
    
 
    <img src="https://mainecooncatsworld.com/wp-content/uploads/2023/03/History-and-Origin-of-Maine-Coons.jpg" alt="Maine Coon Cat Origin" class="image-center">
    <p></p>
    <a href="members_page.php" class="btn btn-primary">Back to Home</a>
  </div>
  <?php include('footer.php'); ?>
</body>
</html>
