<?php
session_start(); // Start session (if not already started)

// Check if the user is logged in
if (isset($_SESSION['user_id'])) {
    // Unset all session variables
    session_unset();

    // Destroy the session
    session_destroy();

    // Redirect the user to the index page or any other page you prefer
    header("Location: index.php");
    exit();
} else {
    // If the user is not logged in, redirect them to the index page
    header("Location: index.php");
    exit();
}
?>
