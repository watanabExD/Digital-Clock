<?php
session_start();

// Store user level before destroying session
$user_level = isset($_SESSION['user_level']) ? : null;

// Destroy session immediately to log out the user
$_SESSION = [];
session_destroy();

// Redirect based on user level
if ($user_level === 1) {
    // If the user was an admin, redirect to admin page
    header('Location: admin_page.php');
    exit();  // Ensures the script stops executing after redirection
} elseif ($user_level === 0) {
    // If the user was a regular member, redirect to members page
    header('Location: members_page.php');
    exit();  // Ensures the script stops executing after redirection
} else {
    // Default to login page if no valid session is found
    header('Location: loginpage.php');
    exit();  // Ensures the script stops executing after redirection
}
?>
