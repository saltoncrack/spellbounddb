<?php
session_start();

// Check if the user is not logged in as an admin, redirect to login page
if (!isset($_SESSION["admin_login"]) || $_SESSION["admin_login"] !== true) {
    header("Location: login.php");
    exit();
}

// Admin is logged in, you can proceed with displaying the admin dashboard content
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Add your CSS and JavaScript includes here -->
</head>
<body>
    <!-- Add your admin dashboard content here -->
    <h1>Welcome to Admin Dashboard, <?php echo $_SESSION["admin_username"]; ?>!</h1>
    <p>This is the admin-only area where you can manage your website.</p>
    <!-- Add more dashboard elements as needed -->
</body>
</html>
