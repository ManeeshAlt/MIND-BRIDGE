<?php
session_start();
include("connect.php");

if (!isset($_SESSION['email'])) {
    header("Location: index.php");
    exit();
}

$email = $_SESSION['email'];
$query = mysqli_query($conn, "SELECT * FROM `users` WHERE email='$email'");
$user = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MindBridge - Homepage</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
    <nav>
        <a href="#Home">Home</a>
        <a href="about.php">About</a>
        <a href="services.php">Services</a>
        <a href="contact.php">Contact</a>
        <a href="logout.php">Logout</a>
    </nav>

    <header>
        <img src="image.png" alt="MindBridge Logo">
    </header>

    <div class="container" id="home">
        <h2>Welcome to MindBridge, <?php echo $user['firstName'] . ' ' . $user['lastName']; ?>!</h2>
        <p>Your mental health is our priority. Connect with AI ChatBots, join group chats, and access professional therapists.</p>
    </div>

    <div class="container" id="services">
        <h2>Our Services</h2>
        <div class="service-grid">
            <div class="service-item">
                <i class="fas fa-robot"></i>
                <h3>AI ChatBots</h3>
                <p>24/7 support through our intelligent chatbots.</p>
            </div>
            <div class="service-item">
                <i class="fas fa-users"></i>
                <h3>Group Chats</h3>
                <p>Join supportive communities and share experiences.</p>
            </div>
            <div class="service-item">
                <i class="fas fa-user-md"></i>
                <h3>Professional Therapists</h3>
                <p>Connect with licensed therapists for personalized care.</p>
            </div>
        </div>
    </div>

    <div class="container" id="profile">
        <h2>Your Profile</h2>
        <p><strong>Name:</strong> <?php echo $user['firstName'] . ' ' . $user['lastName']; ?></p>
        <p><strong>Email:</strong> <?php echo $user['email']; ?></p>
        <a href="edit_profile.php" class="btn">Edit Profile</a>
    </div>
    
    <footer class="footer">
        <p>&copy; 2024 MindBridge. All rights reserved.</p>
    </footer>

    <script src="script.js"></script>
</body>
</html>