<!doctype html>
<html lang="en">
<head>
    <title>EDIT USER</title>
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

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            font-size: 1.2em;
            display: block;
            margin-bottom: 5px;
            color: #000;
        }

        .form-group input[type="text"] {
            font-size: 1.2em;
            padding: 10px;
            width: 100%;
            border-radius: 5px;
            border: 1px solid #333;
            margin-top: 5px;
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
                <h2>Edit User Details</h2>

                <?php
                    require('mysqli_connect.php');

                    $updateSuccess = false;

                    if ((isset($_GET['id'])) && (is_numeric($_GET['id']))) {
                        $id = $_GET['id'];
                    } elseif ((isset($_POST['id'])) && (is_numeric($_POST['id']))) {
                        $id = $_POST['id'];
                    } else {
                        echo '<p>Invalid user ID.</p>';
                        echo '<a href="register-view-users.php" class="btn">Back to View Users</a>';
                        exit();
                    }

               
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        $fname = mysqli_real_escape_string($dbc, trim($_POST['fname']));
                        $lname = mysqli_real_escape_string($dbc, trim($_POST['lname']));

                       
                        if (!empty($fname) && !empty($lname)) {
                         
                            $q = "UPDATE users SET fname='$fname', lname='$lname' WHERE user_id = $id";
                            $result = @mysqli_query($dbc, $q);
                            
                            if (mysqli_affected_rows($dbc) == 1) {
                                $updateSuccess = true; 
                            } else {
                                echo '<p>Error: Could not update user details.</p>';
                            }
                        } else {
                            echo '<p>Please fill in all fields.</p>';
                        }
                    } else {
                       
                        $q = "SELECT fname, lname FROM users WHERE user_id = $id";
                        $result = @mysqli_query($dbc, $q);
                        
                        if (mysqli_num_rows($result) == 1) {
                            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                            $fname = $row['fname'];
                            $lname = $row['lname'];
                        } else {
                            echo '<p>User not found pare, gusto mo bang mag register?.</p>';
                            echo '<a href="register-page.php" class="btn">Register</a>';
                            exit();
                        }
                    }

                    mysqli_close($dbc);
                ?>

              
                <?php if ($updateSuccess): ?>
                    <p>User details updated successfully!</p>
                <?php endif; ?>

              
                <?php if (!$updateSuccess): ?>
                    <form action="edit_user.php" method="post">
                        <div class="form-group">
                            <label for="fname">First Name:</label>
                            <input type="text" name="fname" id="fname" value="<?php echo htmlspecialchars($fname ?? '', ENT_QUOTES); ?>">
                        </div>
                        <div class="form-group">
                            <label for="lname">Last Name:</label>
                            <input type="text" name="lname" id="lname" value="<?php echo htmlspecialchars($lname ?? '', ENT_QUOTES); ?>">
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <button type="submit" class="btn">Update</button>
                    </form>
                <?php endif; ?>

               
                <a href="register-view-users.php" class="btn">Back to View Users</a>
            </div>
        </div>
    </div>

   
    <?php include('footer.php'); ?>
</body>
</html>
