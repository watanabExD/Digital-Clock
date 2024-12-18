<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN NAVIGATION</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .nav-link {
            color: #000; 
            padding: 15px 20px; 
            font-weight: bold; 
            font-size: 1.25em; 
        }
        .nav-link:hover {
            color: #007bff; 
        }
        .navbar {
            background-color: #f8f9fa; 
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="admin_page.php" title="DASHBOARD">DASHBOARD</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="register-view-users.php" title="VIEW MEMBERS">VIEW MEMBERS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="search_user.php" title="SEARCH">SEARCH</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="change_password.php" title="CHANGE PASSWORD">CHANGE PASSWORD</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php" title="LOG OUT">LOG OUT</a>
                </li>
            </ul>
        </div>
    </nav>
</body>
</html>
