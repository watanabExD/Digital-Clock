<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>LOG IN</title>
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
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
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

        session_start();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            require('mysqli_connect.php');

            // Validate email
            if (!empty($_POST['email'])) {
                $e = mysqli_real_escape_string($dbc, trim($_POST['email']));
            } else {
                echo '<p class="error">Please input your email address.</p>';
            }

            // Validate password
            if (!empty($_POST['psword'])) {
                $p = trim($_POST['psword']);
            } else {
                echo '<p class="error">Please input your password.</p>';
            }

            // Proceed if no validation errors
            if (!empty($e) && !empty($p)) {
                $q = "SELECT user_id, fname, user_level, psword FROM users WHERE email = ?";
                $stmt = mysqli_prepare($dbc, $q);
                mysqli_stmt_bind_param($stmt, 's', $e);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);

                // Check if user exists
                if (mysqli_stmt_num_rows($stmt) == 1) {
                    mysqli_stmt_bind_result($stmt, $user_id, $fname, $user_level, $db_password);
                    mysqli_stmt_fetch($stmt);

                    // Verify the password
                    if (password_verify($p, $db_password)) {
                        // Start session and store user info
                        $_SESSION['user_id'] = $user_id;
                        $_SESSION['fname'] = $fname;
                        $_SESSION['user_level'] = $user_level;

                        // Redirect based on user level
                        if ($user_level == 0) {
                            header('Location: members_page.php');
                        } else {
                            header('Location: admin_page.php');
                        }
                        exit();
                    } else {
                        echo '<p class="error">Invalid email or password. Please try again.</p>';
                    }
                } else {
                    echo '<p class="error">Invalid email or password. Please try again.</p>';
                }

                mysqli_stmt_close($stmt);
            }
            mysqli_close($dbc);
        }
    ?>

    <div id="register-form-container">
        <h2 class="text-center">Login</h2>
        <form action="loginpage.php" method="post">
            <div class="form-group">
                <h4>Email</h4>
                <label class="label" for="email">Email Address</label>
                <input type="email" class="form-control" id="email" name="email" maxlength="50"
                       value="<?php if (isset($_POST['email'])) echo htmlspecialchars($_POST['email']); ?>">
            </div>

            <div class="form-group">
                <h4>Password</h4>
                <label class="label" for="psword">Password</label>
                <input type="password" class="form-control" id="psword1" name="psword" maxlength="40">
            </div>

            <div class="form-group">
                <input type="submit" id="submit" name="submit" class="btn btn-primary" value="Login">
            </div>
        </form>
    </div>
</div>
<?php include('footer.php'); ?>
</body>
</html>
