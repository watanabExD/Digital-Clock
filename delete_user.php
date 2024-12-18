<!doctype html>
<html lang="en">
<head>
    <title>DELETE USER</title>
    <meta charset="utf-8">
    <style>
        
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #000;
            color: #fff; 
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        
        #wrapper {
            width: 100%;
            max-width: 800px;
            padding: 20px;
            margin-top: 20px;
        }

        
        #container {
            background-color: #fff;
            padding: 40px;
            border-radius: 10px;
            color: #000;
            text-align: center;
            font-size: 1.2em; 
        }

        
        h2 {
            color: #000;
            font-size: 2.5em; 
            margin-bottom: 20px;
        }


        #content p {
            font-size: 1.5em; 
            line-height: 1.8;
            margin-bottom: 20px;
            color: #000;
        }

        
        .btn {
            display: inline-block;
            padding: 12px 24px;
            background-color: #333;
            color: white;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            font-size: 1.2em; 
            margin-top: 15px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #555;
        }

      
        input[type="submit"] {
            padding: 12px 24px;
            font-size: 1.2em; 
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin: 5px;
        }

        #submit-yes {
            background-color: #4CAF50;
            color: white;
        }

        #submit-no {
            background-color: #f44336;
            color: white;
        }

        footer {
            background-color: #333;
            color: white;
            padding: 10px;
            text-align: center;
            font-size: 1em;
            width: 100%;
            position: fixed;
            bottom: 0;
        }
    </style>
</head>
<body>
    <div id="wrapper">
        
        <?php include('header.php'); ?>
        <?php include('nav_admin.php'); ?>

      
        <div id="container">
            <div id="content">
                <h2>Deleting Record...</h2>
                <?php
                    if ((isset($_GET['id'])) && (is_numeric($_GET['id']))) {
                        $id = $_GET['id'];
                    } elseif ((isset($_POST['id'])) && (is_numeric($_POST['id']))) {
                        $id = $_POST['id'];
                    } else {
                        echo '<p>Hindi ka pwede dito yah.</p>';
                        echo '<a href="index.php" class="btn">Back to Homepage</a>';
                        exit();
                    }

                    require('mysqli_connect.php');
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        if ($_POST['sure'] == 'Yes') {
                            $q = "DELETE FROM users WHERE user_id = $id";
                            $result = @mysqli_query($dbc, $q);
                            if (mysqli_affected_rows($dbc) == 1) {
                                echo '<p>The record has been deleted na pare</p>';
                                echo '<a href="register-view-users.php" class="btn">Back to View Users</a>';
                            } else {
                                echo '<p>Pre maintenance kame</p>';
                                echo '<a href="index.php" class="btn">Back to Homepage</a>';
                                exit();
                            }
                        } else {
                            echo '<p>Ano bayan pare di kaba sure?</p>';
                            echo '<a href="register-view-users.php" class="btn">Back to View Users</a>';
                        }
                    } else {
                        $q = "SELECT CONCAT(lname, ', ', fname) FROM users WHERE user_id = $id";
                        $result = @mysqli_query($dbc, $q);
                        if (mysqli_num_rows($result) == 1) {
                            $row = mysqli_fetch_array($result, MYSQLI_NUM);
                            echo "<h3>Are you sure you want to delete $row[0]?</h3>";
                            echo '
                            <form action="delete_user.php" method="POST">
                                <input id="submit-yes" type="submit" name="sure" value="Yes">
                                <input id="submit-no" type="submit" name="sure" value="No">
                                <input type="hidden" name="id" value="'.$id.'">
                            </form>';
                        } else {
                            echo '<p>Di kita kilala pre, pwede kabang mag register?</p>';
                            echo '<a href="register-page.php" class="btn">Register</a>';
                        }
                    }
                    mysqli_close($dbc);
                ?>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php include('footer.php'); ?>
</body>
</html>
