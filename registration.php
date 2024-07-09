<?php
require 'config.php';

// No need to call session_start() again since it's already handled in config.php

if (!empty($_SESSION["id"])) {
    header("Location: index.php");
    exit();
}

if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $Cpassword = $_POST["Cpassword"];
    
    // Check if username or email already exists
    $stmt = $conn->prepare("SELECT * FROM tb_users WHERE username = :username OR email = :email");
    $stmt->execute(['username' => $username, 'email' => $email]);
    
    if ($stmt->rowCount() > 0) {
        echo "<script>alert('Username or Email Has Already Taken');</script>";
    } else {
        if ($password == $Cpassword) {
            // Hash the password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            
            // Prepare and execute the SQL query
            $stmt = $conn->prepare("INSERT INTO tb_users (name, username, email, password) VALUES (:name, :username, :email, :password)");
            $stmt->execute(['name' => $name, 'username' => $username, 'email' => $email, 'password' => $hashed_password]);
            
            echo "<script>alert('Registration Success');</script>";
            header("Location: login.php");
            exit();
        } else {
            echo "<script>alert('Password Does Not Match');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Sign Up</title>
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
                <h1 class="mb-20">Sign up</h1>
                <p class="p-light">Enter your credentials to log in. Already have an account?<br /></p>
                <a href="login.php" class="link">Login</a>
                <div class="form-field">
                    <div class="label">Name</div>
                    <input class="field w-input" maxlength="256" name="name" placeholder="Enter your Full Name" type="text" id="name" required />
                </div>
                <div class="form-field">
                    <div class="label">Username</div>
                    <input class="field w-input" maxlength="256" name="username" placeholder="Enter your Username" type="text" id="username" required />
                </div>
                <div class="form-field">
                    <div class="label">Email</div>
                    <input class="field w-input" maxlength="256" name="email" placeholder="Enter your Email" type="email" id="email" required />
                </div>
                <div class="form-field">
                    <div class="label">Password</div>
                    <input class="field w-input" maxlength="256" name="password" placeholder="Enter your Password" type="password" id="password" required />
                </div>
                <div class="form-field">
                    <div class="label">Re-type password</div>
                    <input class="field w-input" maxlength="256" name="Cpassword" placeholder="Re-Type your Password" type="password" id="Cpassword" required />
                </div>
                <div class="spacer-20"></div>
                <input type="submit" name="submit" class="button _100w w-button" value="Register" />
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
 