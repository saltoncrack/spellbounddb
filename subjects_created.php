<?php
require 'config.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION["id"]) || $_SESSION["account_type"] != 'teacher') {
    header("Location: login.php");
    exit();
}

try {
    $teacher_id = $_SESSION["id"];
    $stmt = $conn->prepare("SELECT * FROM subjects WHERE teacher_id = :teacher_id");
    $stmt->execute(['teacher_id' => $teacher_id]);
    $subjects = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Subjects Created</title>
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
                <h4><?php echo htmlspecialchars($_SESSION['name']); ?></h4> <!-- Display the teacher's name -->
            </div>
            <ul>
                <li>
                    <a href="teacherdash.php">
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
            <h1>Subjects Created</h1>
            <ul>
                <?php foreach ($subjects as $subject): ?>
                    <li><?php echo htmlspecialchars($subject['name']); ?> (Code: <?php echo htmlspecialchars($subject['code']); ?>)</li>
                <?php endforeach; ?>
            </ul>
        </section>
    </div>
</body>
</html>
