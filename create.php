<?php
include 'connect.php';

if(isset($_POST['submit'])){
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password = md5($password);

    $checkEmail = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($checkEmail);
    if($result->num_rows > 0){
        $error = "Email Address Already Exists!";
    } else {
        $insertQuery = "INSERT INTO users (firstName, lastName, email, password)
                        VALUES ('$firstName', '$lastName', '$email', '$password')";
        if($conn->query($insertQuery) === TRUE){
            header("Location: index.php");
            exit();
        } else {
            $error = "Error: " . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <nav>
        <a href="index.html">Home</a>
        <a href="about.html">About</a>
        <a href="services.html">Services</a>
        <a href="contact.html">Contact</a>
    </nav>

    <header>
        <img src="image.png" alt="MindBridge Logo">
    </header>

    <div class="container">
        <div class="register-box">
            <h1>Create Account</h1>
            <?php if(isset($error)) { echo "<p class='error'>$error</p>"; } ?>
            <form id="register-form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <div class="textbox">
                    <input type="text" placeholder="First Name" name="firstName" required>
                </div>
                <div class="textbox">
                    <input type="text" placeholder="Last Name" name="lastName" required>
                </div>
                <div class="textbox">
                    <input type="email" placeholder="Email" name="email" required>
                </div>
                <div class="textbox">
                    <input type="password" placeholder="Create a Password" name="password" required>
                </div>
                <input type="submit" class="btn" value="Create Account" name="submit">
            </form>
        </div>
    </div>
    <script src="scripts.js"></script>
</body>
</html>