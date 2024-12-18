<!doctype html>
<html lang="en">
<head>
    <title>HOME PAGE</title>
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
            <?php include('nav-login.php'); ?>
            <div id="content">
                <h2>REGISTER NOW!</h2>

           
                <img src="https://newengland.com/wp-content/uploads/maine-coon-cat-trivia.jpg" alt="Maine Coon Cat">
            <p><center><h3>The cat (Felis catus), also referred to as the domestic cat or house cat, is a small domesticated carnivorous mammal. It is the only domesticated species of the family Felidae. 
                Advances in archaeology and genetics have shown that the domestication of the cat occurred in the Near East around 7500 BC.</h3></center></p>
            </div>
        </div>

        <div class="ad right-ad">
        
            <p>Right Ad</p>
        </div>
    </div>
    
    <?php include('footer.php'); ?>
</body>
</html>
