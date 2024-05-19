<?php
session_start();
// Initialization of variables for feedback
$loginMessage = "";
$signupMessage = "";
$loginSuccess = false;
$signupSuccess = false;

// Function to connect to the database
function connectDB() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "sushi_sakura";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['action']) && $_POST['action'] == "Login") {
        $username = $_POST['login_username'];
        $password = $_POST['login_password'];

        $conn = connectDB();
        $stmt = $conn->prepare("SELECT id,username,password FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            
            if (password_verify($password, $row['password'])) {
                $loginMessage = "Login successful!";
                $loginSuccess = true;
                $_SESSION['loggedin'] = true;
                $_SESSION['userid'] = $row['id'];
                $_SESSION['username'] = $row['username'];
                header("Location: sakura_home.php");
            } else {
                $loginMessage = "Invalid username or password.";
                $loginSuccess = false;
            }
        } else {
            $loginMessage = "Invalid username or password.";
            $loginSuccess = false;
        }

        $stmt->close();
        $conn->close();
    } elseif (isset($_POST['action']) && $_POST['action'] == "Create Account") {
        $username = $_POST['signup_username'];
        $password = password_hash($_POST['signup_password'], PASSWORD_DEFAULT); // Hash the password

        $conn = connectDB();
        $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $username, $password);

        if ($stmt->execute()) {
            $signupMessage = "Account created successfully!";
            $signupSuccess = true;
        } else {
            $signupMessage = "Error: " . $stmt->error;
            $signupSuccess = false;
        }

        $stmt->close();
        $conn->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sakura Sushi</title>
    <link rel="stylesheet" href="sakura_login.css">
    

    <div>
        <ul class="nav" id="nav">
                <a href="sakura_home.php">
                    <li style="float:left;"><img src="sakura_sushi_logo.png"></li>
                </a>
                <li><a href="#contact">Contact</a></li>
                <li><a href="sakura_login.php">Login</a></li>
            
                <li><a href="sakura_menu.php">Menu</a></li>
                <li><a href="sakura_location.php">Locations</a></li>
                <li><a href="sakura_reserve.php">Reserve</a></li>
                <li><a href="sakura_home.php">Home</a></li>
            </ul>
    </div>
</head>
<body>
<div id="home">
        </div>
<div style="padding-left:20px"class="login">

    <h1>Login</h1>
        <!-- Form for user login -->
        <form method="post" action="sakura_login.php">
            <input type="text" name="login_username" placeholder="Username" required>
            <input type="password" name="login_password" placeholder="Password" required>
            <input type="submit" style="font-family: text_font, sans-serif;
    padding: 10px;
    border: none;
    color: white;
    font-size: 16px;
    background-color: #87a38d;
    cursor: pointer;" name="action" value="Login">
        </form>

        
        <?php if (isset($_POST['action']) && $_POST['action'] == "Login"): ?>
            <p style="color: <?= $loginSuccess ? 'green' : 'red'; ?>;"><?= $loginMessage; ?></p>
        <?php endif; ?>
</div>
     <div style="padding-bottom:100px;padding-left:20px"class="create">
        <h1>Create Account</h1>
        <!-- Form for creating a new account -->
        <form method="post" action="sakura_login.php">
            <input type="text" name="signup_username" placeholder="Username" required>
            <input type="password" name="signup_password" placeholder="Password" required>
            <input type="submit" style="font-family: text_font, sans-serif;
    padding: 10px;
    border: none;
    color: white;
    font-size: 16px;
    background-color: #87a38d;
    cursor: pointer;" name="action" value="Create Account">
        </form>
    
        
        <?php if (isset($_POST['action']) && $_POST['action'] == "Create Account"): ?>
            <p style="color: <?= $signupSuccess ? 'green' : 'red'; ?>;"><?= $signupMessage; ?></p>
        <?php endif; ?>
    </div>
</body>
<footer id="contact" style="background-color:white;color:black;padding:20px;margin-bottom:-50px;" >
    <div style="padding-left:30px;">
        <h1 style="padding-bottom:30px;">Contact Us</h1>
        <a href="#home"><input type="button" class="button" style="float:right;margin-right:30px;margin-top:-30px;padding-left:35px;padding-top:15px;padding-right:35px;padding-bottom:15px;font-family: text_font, sans-serif;
    padding: 10px;
    border: none;
    color: white;
    font-size: 16px;
    background-color: #87a38d;
    cursor: pointer;" value="Back to Top"></a>
        <div  class="social-icons">
            <a style="padding:5px;" href="https://www.facebook.com" >Facebook</a>
            <a style="padding:5px;" href="https://www.twitter.com" >Twitter</a>
            <a style="padding:5px;" href="https://www.instagram.com" >Instagram</a>
            
        </div>

    </div>
  
</footer>
</html>