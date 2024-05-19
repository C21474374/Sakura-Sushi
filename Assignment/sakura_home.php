<?php
session_start(); // Start the session

// Check if the user is logged in, using the session variable set at login
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    $userLoggedIn = true;
    $username = $_SESSION['username']; 
} else {
    $userLoggedIn = false;
    
}
?>


<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sakura Sushi</title>
    <link rel="stylesheet" href="sakura_home.css">
    
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
    <!-- home section -->
    <div class="welcome" >
        <div class="sushi1">
            <img src="sushipic1.webp">
        </div>
        <div class="welcome_info">
        <h1>Sakura Sushi</h1>
        <p>Nestled in Dublin, our sushi spot is a culinary haven.
        With minimalist décor and fresh ingredients,
        our chefs craft traditional favorites and innovative rolls.
        From nigiri to maki, each bite is a masterpiece.
        Experience Japan's culinary heritage in every dish with us.</p>
        <a href="sakura_reserve.php"><input class="button" type="button"  value="Make a Reservation"><a>
        </div>
    </div>
    
 <!-- pink section -->
    <div class="location">
        <div class="left_location">
            <h1>Based in Dublin!</h1>
            <a href="sakura_location.php"><input class="button" type="button" value="View our Locations"></a>
        </div>
        <div class="right_location">
            <img src="Sushi-Restaurant.jpg">
        </div>
    </div>

    <!-- menu section -->
    <div class="menu">
        <div class="menu_pics">
            <div class="pic1">
                <img src="sushipic3.jpg"><br>
                
                <span>Sushi</span>
            </div>
            <div class="pic2">
                <img src="sushipic3.jpg"><br>
                <span>Sushi</span>
            </div>
            <div class="pic3">
                <img src="sushipic3.jpg"><br>
                <span>Sushi</span>
            </div>
        </div>
        <div class="chef">
            <p>Made with love from the best Sushi chefs in Dublin with original Japense Sushi Taste</p>
            <br>
            <a href="sakura_menu.php"><input type="button" class="button" value="Browse Our Menu"></a>
        </div>   
    </div>

    <!-- reviews section -->
    <div class="reviews">
        <h1>Recent Reviews</h1>
        <div style="color:black;" class="review">
            <p>"Fantastic sushi spot! Fresh fish, cozy ambiance, and great service. Will definitely be back!"</p>
        </div>
        <br>
        <div class="review">
            <p>"Sushi heaven! Incredible variety, delicious flavors, and friendly staff. Highly recommend!"</p>
        </div>
        <br>
        <div class="review">
            <p>"Underwhelming. Average sushi, slow service, and high prices. Won't be returning."</p>
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
