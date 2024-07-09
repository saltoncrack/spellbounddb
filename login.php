<?php
require 'config.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!empty($_SESSION["id"])) {
    header("Location: index.php");
    exit();
}

if (isset($_POST["submit"])) {
    $usernameemail = $_POST["usernameemail"];
    $password = $_POST["password"];
    
    try {
        $stmt = $conn->prepare("SELECT * FROM tb_users WHERE username = :usernameemail OR email = :usernameemail");
        $stmt->execute(['usernameemail' => $usernameemail]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($row) {
            if (password_verify($password, $row["password"])) {
                $_SESSION["id"] = $row["id"];
                $_SESSION["name"] = $row["name"]; // Set the user's name session variable
                $_SESSION["account_type"] = $row["account_type"];
                
                if ($row["account_type"] == 'admin') {
                    header("Location: admindash.php");
                } elseif ($row["account_type"] == 'teacher') {
                    header("Location: teacherdash.php"); // Direct teacher to their dashboard
                } else {
                    header("Location: index.php");
                }
                exit();
            } else {
                echo "<script>alert('Wrong Password');</script>";
            }
        } else {
            echo "<script>alert('User Not Registered');</script>";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Login</title>
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <link href="https://assets-global.website-files.com/663f0b338e5ea3b0b65e2166/css/spellbound-a74583.webflow.80b1bdad3.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css2?family=Varela&family=Changa+One:ital,wght@0,400;1,400&family=Bungee&display=swap" rel="stylesheet">
    <link rel="icon" href="assets\images\logo.png" type="image"/>
</head>
<body class="body">
    <section class="section_big _90">
        <div class="image-wrap"></div>
        <div class="form-block-3 w-form">
            <form id="wf-form-Register" name="wf-form-Register" method="post" class="form-2">
                <h1 class="mb-20">Log in</h1>
                <p class="p-light">Enter your credentials to log in. Don't have an account?<br /></p>
                <a href="registration.php" class="link">Create one</a>
                <div class="form-field">
                    <div class="label">Email</div>
                    <input class="field w-input" maxlength="256" name="usernameemail" placeholder="Enter your Email" type="text" id="usernameemail" required />
                </div>
                <div class="form-field">
                    <div class="label">Password</div>
                    <input class="field w-input" maxlength="256" name="password" placeholder="Enter your Password" type="password" id="password" required />
                </div>
                <div class="spacer-20"></div>
                <button type="submit" name="submit" class="button _100 w-button">Log in</button>
            </form>
            <div class="w-form-done">
                <div>Thank you! Your submission has been received!</div>
            </div>
            <div class="w-form-fail">
                <div>Oops! Something went wrong while submitting the form.</div>
            </div>
        </div>
    </section>
    <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js"></script>
</body>
</html>
