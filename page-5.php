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
  <title>TYPE OF MAINECOON</title>
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
    <h1>TYPE OF MAINECOON</h1>
    <p>The Maine Coon breed itself is quite consistent in its characteristics, but it does have various coat colors and patterns. Here are some of the common types:</p>

    <p>1. Solid Colors: Maine Coons can be found in solid colors like black, white, blue, red, and cream. Solid colors are one of the more straightforward patterns and are quite striking.</p>

    <p>2. Tabby Patterns: This is one of the most common patterns, and Maine Coons can have classic, mackerel, or spotted tabby markings. Tabby patterns can include a range of colors such as brown, silver, and gray.</p>

    <p>3. Bicolor: Maine Coons with bicolor patterns have a mix of white with another color, such as black, blue, or red. This pattern usually has a white face, legs, and underbelly with the rest of the coat in a different color.</p>

    <p>4. Tortoiseshell: This pattern combines two colors, typically black and orange, in a mottled or patchy pattern. Tortoiseshell Maine Coons often have a distinctive, colorful appearance.</p>

    <p>5. Calico: Similar to tortoiseshell but with added white patches. Calico Maine Coons have a mix of white with black and orange.</p>

    <p>6. Smoke: Maine Coons with a smoke pattern have a white undercoat with darker tips on their fur, creating a striking, shimmering effect.</p>

    <p>7. Shaded: Shaded Maine Coons have a lighter undercoat with darker tips, giving their coat a gradient appearance. This can be in colors like golden, silver, or blue.</p>

    <p>While these patterns are common, Maine Coons are recognized for their variety of colors and can come in many different combinations, contributing to their unique and beautiful appearance.</p>
    

    <img src="https://i0.wp.com/thediscerningcat.com/wp-content/uploads/2022/04/maine-coon-cats.jpg" alt="Maine Coon Cat Types" class="image-center">
    <p></p>
    <a href="members_page.php" class="btn btn-primary">Back to Home</a>
  </div>
  <?php include('footer.php'); ?>
</body>
</html>
