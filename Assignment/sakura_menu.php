<?php
 session_start();
 include 'reserve.php';
// Check if the user is logged in, using the session variable set at login
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    $userLoggedIn = true;
    $username = $_SESSION['username']; 
    $user_id = $_SESSION['userid'];
    $reservations = getReservation($user_id);
} else {
    $userLoggedIn = false;
    
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sakura Menu</title>
    <link rel="stylesheet" href="sakura_menu.css">
  
    <?php if ($userLoggedIn): ?>
        <div>
        <ul class="nav" id="nav">
                <a href="sakura_home.php">
                    <li style="float:left;"><img src="sakura_sushi_logo.png"></li>
                </a>
                <li><a href="#contact">Contact</a></li>
                <li><a href="logout.php">Logout</a></li>
               
                <li><a href="sakura_menu.php">Menu</a></li>
                <li><a href="sakura_location.php">Locations</a></li>
                <li><a href="sakura_reserve.php">Reserve</a></li>
                <li><a href="sakura_home.php">Home</a></li>
            </ul>
        </div>  
        <?php else: ?>
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
    <?php endif; ?>
</head>
<body>
<div id="home">
        </div>
    <div class="title">
        <h1>Menu</h1>
    </div>
    <div class="menu">
        <div class="set1">
            <div class="sushi-item">
                <img src="sushipic2.jpg">
                <h2>Sake Nigiri</h2>
                <p>Salmon over a small ball of rice, seasoned with a touch of wasabi.</p>
                <div class="price">$2.50</div>
            </div>
            <div class="sushi-item">
            <img src="sushipic2.jpg">
                <h2>Maguro Nigiri</h2>
                <p>Tuna over a small ball of rice, seasoned with a touch of wasabi.</p>
                <div class="price">$2.75</div>
            </div>
        </div>
        <div class="set2">
            <div class="sushi-item">
            <img src="sushipic2.jpg">
                <h2>California Roll</h2>
                <p>Crab, avocado, and cucumber roll, wrapped in seaweed and rice.</p>
                <div class="price">$3.50</div>
            </div>
            <div class="sushi-item">
            <img src="sushipic2.jpg">
                <h2>Dragon Roll</h2>
                <p>Shrimp tempura, cucumber, avocado, and unagi with a spicy mayo sauce.</p>
                <div class="price">$5.00</div>
            </div>
        </div>
        <div class="set1">
            <div class="sushi-item">
                <img src="sushipic2.jpg">
                <h2>Sake Nigiri</h2>
                <p>Salmon over a small ball of rice, seasoned with a touch of wasabi.</p>
                <div class="price">$2.50</div>
            </div>
            <div class="sushi-item">
            <img src="sushipic2.jpg">
                <h2>Maguro Nigiri</h2>
                <p>Tuna over a small ball of rice, seasoned with a touch of wasabi.</p>
                <div class="price">$2.75</div>
            </div>
        </div>
        <div class="set2">
            <div class="sushi-item">
            <img src="sushipic2.jpg">
                <h2>California Roll</h2>
                <p>Crab, avocado, and cucumber roll, wrapped in seaweed and rice.</p>
                <div class="price">$3.50</div>
            </div>
            <div class="sushi-item">
            <img src="sushipic2.jpg">
                <h2>Dragon Roll</h2>
                <p>Shrimp tempura, cucumber, avocado, and unagi with a spicy mayo sauce.</p>
                <div class="price">$5.00</div>
            </div>
        </div>
    </div>
</body>

<footer id="contact" style="background-color:white;color:black;padding:20px;" >
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
