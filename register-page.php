<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>REGISTER PAGE</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa; 
        }
        #container {
            max-width: 900px; 
            margin: 0 auto; 
            padding: 20px; 
            background-color: #fff; 
            border-radius: 20px; 
            box-shadow: 0 2px 10px rgba(0,0,0,0.1); 
        }
        h2 {
            font-size: 22.5remrem; 
        }
        .form-group {
            margin-bottom: 1.5rem; 
        }
        .btn {
            width: 100%; 
        }
    </style>
</head>
<body>
    <div id="container">
        <?php 
        include('header.php'); 
        include('nav-login.php');  
        include('mysqli_connect.php'); 

       
        $errors = array(); 

      
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            if (empty($_POST['fname'])) {
                $errors[] = 'Please enter your first name.';
            } else {
                $fn = trim($_POST['fname']);
            }

           
            if (empty($_POST['lname'])) {
                $errors[] = 'Please enter your last name.';
            } else {
                $ln = trim($_POST['lname']);
            }

           
            if (empty($_POST['email'])) {
                $errors[] = 'Please enter your email.';
            } else {
                $email = trim($_POST['email']);
            }

            
            if (empty($_POST['psword1'])) {
                $errors[] = 'Please enter your password.';
            } else {
                $psword1 = trim($_POST['psword1']);  
               
                if ($psword1 != $_POST['psword2']) {
                    $errors[] = 'Your passwords do not match.';
                } else {
                   
                    $p_hashed = password_hash($psword1, PASSWORD_DEFAULT); 
                }
            }

   
            if (empty($errors)) {
           
                $query = "INSERT INTO users (fname, lname, email, psword, registration_date) VALUES (?, ?, ?, ?, NOW())";

                $stmt = mysqli_prepare($dbc, $query);
                mysqli_stmt_bind_param($stmt, 'ssss', $fn, $ln, $email, $p_hashed);

                if (mysqli_stmt_execute($stmt)) {

                    header('Location: register-thanks.php');
                    exit(); 
                } else {
                    echo '<h2>Error during registration. Please try again.</h2>';
                }

                mysqli_stmt_close($stmt);
            } else {

                echo '<h2 class="text-danger">Error!</h2>
                      <p class="text-danger">The following error(s) occurred:<br>';
                foreach ($errors as $ex) {
                    echo "→ $ex<br/>";
                }
                echo '</p><h4>Please try again</h4><br/><br/>';
            }
        }
        ?>

        <div id="register-form-container">
            <h2 class="text-center">Register</h2>
            <form action="register-page.php" method="post">
                <div class="form-group">
                    <h4>First Name</h4>
                    <label class="label" for="fname">First Name</label>
                    <input type="text" class="form-control" id="fname" name="fname" maxlength="40"
                    value="<?php if (isset($_POST['fname'])) echo htmlspecialchars($_POST['fname']); ?>">
                </div>

                <div class="form-group">
                <h4>Last Name</h4>
                    <label class="label" for="lname">Last Name</label>
                    <input type="text" class="form-control" id="lname" name="lname" maxlength="40"
                    value="<?php if (isset($_POST['lname'])) echo htmlspecialchars($_POST['lname']); ?>">
                </div>

                <div class="form-group">
                <h4>Email</h4>
                    <label class="label" for="email">Email Address</label>
                    <input type="email" class="form-control" id="email" name="email" maxlength="50"
                    value="<?php if (isset($_POST['email'])) echo htmlspecialchars($_POST['email']); ?>">
                </div>

                <div class="form-group">
                <h4>Password</h4>
                    <label class="label" for="psword1">Password</label>
                    <input type="password" class="form-control" id="psword1" name="psword1" maxlength="40">
                </div>

                <div class="form-group">
                <h4>Confirm Password</h4>
                    <label class="label" for="psword2">Confirm Password</label>
                    <input type="password" class="form-control" id="psword2" name="psword2" maxlength="40">
                </div>

                <div class="form-group">
                    <input type="submit" id="submit" name="submit" class="btn btn-primary" value="Register">
                </div>
            </form>
        </div>
    </div>
    <?php include('footer.php'); ?>
</body>
</html>
