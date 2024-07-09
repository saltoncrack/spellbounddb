<?php
require 'config.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION["id"]) || $_SESSION["account_type"] != 'teacher') {
    header("Location: login.php");
    exit();
}

if (isset($_POST["create_subject"])) {
    $subject_name = $_POST["subject_name"];
    $code = substr(md5(uniqid(mt_rand(), true)), 0, 6); // Generate unique code
    $teacher_id = $_SESSION["id"];
    
    try {
        $stmt = $conn->prepare("INSERT INTO subjects (name, code, teacher_id) VALUES (:name, :code, :teacher_id)");
        $stmt->execute(['name' => $subject_name, 'code' => $code, 'teacher_id' => $teacher_id]);
        echo "<script>alert('Subject created with code: $code');</script>";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Teacher Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <input type="checkbox" id="checkbox">
    <header class="header">
        <h2 class="u-name">SIDE <b>BAR</b>
            <label for="checkbox">
                <i id="navbtn" class="fa fa-bars" aria-hidden="true"></i>
            </label>
        </h2>
        <i class="fa fa-user" aria-hidden="true"></i>
    </header>
    <div class="body">
        <nav class="side-bar">
            <div class="user-p">
                <img src="assets/images/user1.jpg">
                <h4><?php echo htmlspecialchars($_SESSION['name']); ?></h4> <!-- Display the user's name -->
            </div>
            <ul>
                <li>
                    <a href="#">
                        <i class="fa fa-desktop" aria-hidden="true"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="subjects_created.php" class="active-link">
                        <i class="fa fa-book" aria-hidden="true"></i>
                        <span>Subjects Created</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <i class="fa fa-envelope-o" aria-hidden="true"></i>
                        <span>Message</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-comment-o" aria-hidden="true"></i>
                        <span>Comment</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-info-circle" aria-hidden="true"></i>
                        <span>About</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-cog" aria-hidden="true"></i>
                        <span>Setting</span>
                    </a>
                </li>
                <li>
                    <a href="logout.php">
                        <i class="fa fa-power-off" aria-hidden="true"></i>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
        </nav>
        <section class="section-1">
            <h1>WELCOME</h1>
            <p>#CodingWithElias</p>

            <!-- Create Subject Form -->
            <h2>Create Subject</h2>
            <form method="post" action="">
                <label for="subject_name">Subject Name:</label>
                <input type="text" id="subject_name" name="subject_name" required>
                <button type="submit" name="create_subject">Create Subject</button>
            </form>
        </section>
    </div>
</body>
</html>
