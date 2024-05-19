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
    <link rel="stylesheet" href="sakura_home.css">
    <title>Sakura Sushi/Reserve</title>
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
<body style="text-align:center;padding:0px">
<div id="home">
        </div>
        <div class="Parnell" style="padding-bottom:50px;padding-top:20px;"> 
            <h1 style="padding-bottom:20px;font-family: title_font;letter-spacing:1px;">Parnell Street</h1>  
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2381.5208618497036!2d-6.26547952457184!3d53.35183267431456!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48670e814ba42539%3A0x3eebd04f7462c124!2sParnell%20St%2C%20Dublin!5e0!3m2!1sen!2sie!4v1713762803210!5m2!1sen!2sie" width="700" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="Manor" style="padding-bottom:50px;background-color:#E29B9C;padding-top:20px;">
        <h1 style="padding-bottom:20px;font-family: title_font;letter-spacing:1px;">Manor Street</h1>  
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2381.4909100305663!2d-6.2864989245718075!3d53.35236877427451!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48670c3280ed0739%3A0x97a3802d58ce6911!2sManor%20St%2C%20Dublin!5e0!3m2!1sen!2sie!4v1713762831112!5m2!1sen!2sie" width="700" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="Finglas" style="padding-bottom:50px;padding-top:20px;background-color:white;color:black;">
        <h1 style="padding-bottom:20px;font-family: title_font;letter-spacing:1px;">Finglas</h1>  
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4761.11072568775!2d-6.302965589981909!3d53.38930048595885!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4867120c5fc65929%3A0x4ceed9f67217bf62!2sHale%20Vaping%20-%20Finglas%2C%20Co.%20Dublin!5e0!3m2!1sen!2sie!4v1713762563665!5m2!1sen!2sie" width="700" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="Blanchardstown" style="padding-bottom:50px;background-color:#87a38d;padding-top:20px;">
        <h1 style="padding-bottom:20px;font-family: title_font;letter-spacing:1px;">Blanchardstown</h1>  
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4758.463017506012!2d-6.397509924568355!3d53.39279847124844!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48676d4d7806ebb9%3A0x4b154115229066d3!2sMusashi%20Sushi%20Blanchardstown!5e0!3m2!1sen!2sie!4v1713762870883!5m2!1sen!2sie" width="700" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    
    
</body>
<footer id="contact" style="background-color:white;color:black;padding:20px;text-align:left" >
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