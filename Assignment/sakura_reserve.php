<?php
 session_start();
 include 'reserve.php'; // adding CRUD functions
// Check if the user is logged in, using the session variable set at login
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    $userLoggedIn = true;
    $username = $_SESSION['username'];
    $user_id = $_SESSION['userid'];
    $reservations = getReservation($user_id);
} else {
    $userLoggedIn = false;
    header("Location: sakura_login.php");
}
 


?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="sakura_reserve.css">
    
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
<body>
<div id="home">
        </div>
    <div class="reserve">
        <div class="left_reserve">
            <h1>Make a Reservation</h1>
            <img  src="table.jpg">
        </div>
        <div class="right_reserve">
            <form action="sakura_reserve.php" method="post">
            <input type="hidden" name="action" value="Create">
                <label for="location">Location:</label>
                <select id="location" name="location" required>
                    <option value="parnell">Parnell Street</option>
                    <option value="manor">Manor Street</option>
                    <option value="finglas">Finglas</option>
                    <option value="blanchardstown">Blanchardstown</option>
                </select><br><br>
                
                <label for="date">Date:</label>
                <input type="date" id="date" name="date" required><br><br>
            
                <label for="time">Time:</label>
                <input type="time" id="time" name="time" min="13:00" max="20:00" required><br><br>
                
                <input type="submit" class="button" value="Book Reservation"><br><br>
            </form>
            <script>
                document.getElementById('date').setAttribute('min', new Date().toISOString().split('T')[0]);
            </script>
            <a href="sakura_reserve2.php"><input class="button" type="button" value="View Your Reservations"></a>
        </div>

       



    </div>

    
    <?php
             

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $action = $_POST['action'];

                switch ($action) {
                    case 'Create':
                        $user_id = $_SESSION['userid'];
                        $date = $_POST['date'];
                        $time = $_POST['time'];
                        $location = $_POST['location'];
                        createReservation($user_id, $date, $time, $location);
                        
                        echo "Reservation created successfully!";
                        break;
                    case 'Read':
                            
                            break;
                    case 'Update':
                        $id = $_POST['id'];
                        $user_id = $_SESSION['userid'];
                        $date = $_POST['date'];
                        $time = $_POST['time'];
                        $location = $_POST['location'];
                        updateReservation($id,$user_id, $date, $time, $location);
                       
                        echo "Reservation updated successfully!";
                        break;
                    case 'Delete':
                       
                        break;
                    default:
                        echo "Invalid action!";
                }
            }
            ?>
    
    
    
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