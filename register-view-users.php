<?php
session_start();

// Check if user_level is not set or is neither 1 nor 0
if (!isset($_SESSION['user_level']) || ($_SESSION['user_level'] != 1 && $_SESSION['user_level'] != 0)) {
    header("Location: loginpage.php");
    exit();
}
?>

<!doctype html>
<html lang="en">
<head>
    <title>VIEW USERS</title>
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
            justify-content: center;
            padding: 20px;
            width: 100%;
            margin: 0 auto;
        }

        #container {
            background-color: #fff; 
            padding: 30px;
            width: 80%;
            max-width: 800px; 
            border-radius: 10px;
            color: #000;
            margin: 0 auto; 
            text-align: center;
        }

        h2 {
            color: #000;
            font-size: 2.5em;
            margin-bottom: 20px;
        }

        #content p {
            font-size: 1.2em;
            line-height: 1.6;
            color: #000;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 1.2em;
        }

        th, td {
            padding: 15px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
            color: #333;
            font-weight: bold;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .action-icon {
            width: 24px;
            height: 24px;
            cursor: pointer;
            transition: transform 0.2s ease;
            margin: 0 5px; 
            display: inline-block;
        }

        .action-icon:hover {
            transform: scale(1.2);
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
            font-size: 1em;
        }
    </style>
</head>
<body>
    <div id="content">
        <?php include('header.php'); ?>
        <?php include('nav_admin.php'); ?>
        <div id="container">
            <h2>Registered Users</h2>
            <p>
                <?php
                    require("mysqli_connect.php");

                    $q = "SELECT fname, lname, email, 
                    DATE_FORMAT(registration_date, '%M %d, %Y') AS regdat, user_id
                    FROM users ORDER BY user_id ASC";
                    $result = @mysqli_query($dbc, $q);
                    if ($result) {
                        echo '<table><tr><th>Name</th><th>Email</th><th>Registered Date</th><th>Action</th></tr>';
                        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                            echo '<tr>
                            <td>'.$row['lname'].', '.$row['fname'].'</td>
                            <td>'.$row['email'].'</td>
                            <td>'.$row['regdat'].'</td>
                            <td>
                                <a href="edit_user.php?id='.$row['user_id'].'">
                                    <img src="https://static.vecteezy.com/system/resources/previews/000/645/877/original/vector-pencil-icon-symbol-sign.jpg" alt="Edit" class="action-icon">
                                </a>
                                <a href="delete_user.php?id='.$row['user_id'].'">
                                    <img src="https://static.vecteezy.com/system/resources/previews/000/630/510/original/vector-trash-can-icon-symbol-illustration.jpg" alt="Delete" class="action-icon">
                                </a>
                            </td>
                            </tr>';
                        }
                        echo '</table>';
                        mysqli_free_result($result);
                    } else {
                        echo '<p class="error"> The current users could not be retrieved. Contact the system administrator.</p>';
                    }
                    mysqli_close($dbc);
                ?>
            </p>
        </div>
    </div>
    
    <?php include('footer.php'); ?>
</body>
</html>
