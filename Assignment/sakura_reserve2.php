<?php
 session_start();
 include 'reserve.php';

// Check if the user is logged in, using the session variable set at login
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    $userLoggedIn = true;
    $username = $_SESSION['username'];
    $user_id = $_SESSION['userid'];
    $reservations = getReservation($user_id);
    
    if (isset($_SESSION['current_id']) && $_SESSION['current_id'] !== null) {
        $current_id = $_SESSION['current_id'];
    } else {
        
    }
    $isFilled = false;  


    // Check if the form has been submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['id'])) {
        $isFilled = true;  
    }
    
} else {
    $userLoggedIn = false;
    header("Location: sakura_login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $action = $_POST['action'] ?? '';

    switch ($action) {
        case 'Update':
            $id = $current_id['id'] ?? '';
            $date = $_POST['date'] ?? '';
            $time = $_POST['time'] ?? '';
            $location = $_POST['location'] ?? '';
            updateReservation($id, $user_id, $date, $time, $location);
            header("Location: " . $_SERVER['PHP_SELF']);
            exit;
            break;
        case 'Read':
            $id = $_POST['id'] ?? '';
            getReservation1($id,$user_id);
            $current_id = getReservation1($id,$user_id);
           
            break;

        case 'delete':

            $id = $current_id['id'] ?? '';
            deleteReservation($id);
            header("Location: " . $_SERVER['PHP_SELF']);
            exit;
            break;
   
    }
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
    <div>
    <h1>Reservations List</h1>
    <?php if (count($reservations) > 0): ?>
        <table>
            <thead>
                <tr>
                    <th style="padding:10px;border:1px solid white">Reservation Number</th>
                    <th style="padding:10px;border:1px solid white"">Name</th>
                    <th style="padding:10px;border:1px solid white"">Date</th>
                    <th style="padding:10px;border:1px solid white"">Time</th>
                    <th style="padding:10px;border:1px solid white"">Location</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($reservations as $reservation): ?>
                <tr>
                    <td style="padding:10px;border:1px solid white""><?= htmlspecialchars($reservation['id']) ?></td>
                    <td style="padding:10px;border:1px solid white""><?= htmlspecialchars($username) ?></td>
                    <td style="padding:10px;border:1px solid white""><?= htmlspecialchars($reservation['date']) ?></td>
                    <td style="padding:10px;border:1px solid white""><?= htmlspecialchars($reservation['time']) ?></td>
                    <td style="padding:10px;border:1px solid white""><?= htmlspecialchars($reservation['location']) ?></td>
                </tr>
                <?php endforeach; ?>
                </tbody>
        </table>
    <?php else: ?>
        <p>No reservations found.</p>
    <?php endif; ?>
    </div>

    <div>
        <h1>Edit Reservation</h1>

        <?php if (!$isFilled): ?>
        <form action="sakura_reserve2.php" method="post">
        <input type="hidden" name="action" value="Read">
            <label for="date">Reservation Number:</label>
            <input type="text" name="id" >
            <button type="submit" name="read">Select</button>
        </form>
        <?php else: ?>
            <form action="sakura_reserve2.php" method="post">
        <input type="hidden" name="action" value="Read">
            <label for="date">Reservation Number:</label>
            <input type="text" name="id" value="<?= htmlspecialchars($current_id['id'] ?? '') ?>" >
            <button type="submit" name="read">Select</button><br><br>
        </form>
            <form action="sakura_reserve2.php" method="post">
        <input type="hidden" name="action" value="Update">
        <input type="hidden" name="id" value="<?= $current_id?>">

        
        <label for="date">Date:</label>
        <input type="date" id="date" name="date" value="<?= htmlspecialchars($current_id['date'] ?? '') ?>" ><br><br>

        <label for="time">Time:</label>
        <input type="time" id="time" name="time" value="<?= htmlspecialchars($current_id['time'] ?? '') ?>" ><br><br>

        <label for="location">Location:</label>
        <select id="location" name="location" >
            <option value="parnell" <?= (isset($current_id['location']) && $current_id['location'] == 'parnell') ? 'selected' : '' ?>>Parnell Street</option>
            <option value="manor" <?= (isset($current_id['location']) && $current_id['location'] == 'manor') ? 'selected' : '' ?>>Manor Street</option>
            <option value="finglas" <?= (isset($current_id['location']) && $current_id['location'] == 'finglas') ? 'selected' : '' ?>>Finglas</option>
            <option value="blanchardstown" <?= (isset($current_id['location']) && $current_id['location'] == 'blanchardstown') ? 'selected' : '' ?>>Blanchardstown</option>
        </select><br><br>

        <button type="submit" class="button" name="update">Update Reservation</button><br><br><br>
        
    </form>
    <form action="sakura_reserve2.php" method="post">
        <input type="hidden" name="action" value="delete">
        <button type="submit" class="button" name="delete">Delete Reservation</button>
        </form>
    </div>
    <?php endif; ?>
    <div>
            <br><br><a href="sakura_reserve.php"><input class="button" type="button" value="Book a Reservation"></a><br>
    </div>
    <br><br>
    
    
    
    
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