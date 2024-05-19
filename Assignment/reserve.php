<?php
// Connect to Database
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

// Create Reservation
function createReservation($userid,$date, $time, $location) {
    $conn = connectDB();
    $stmt = $conn->prepare("INSERT INTO reservations (user_id,date, time, location) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss",$userid, $date, $time, $location);
    $stmt->execute();
    $stmt->close();
    $conn->close();
}

// Update Reservation
function updateReservation($id,$user_id, $date, $time, $location) {
    $conn = connectDB();
    $stmt = $conn->prepare("UPDATE reservations SET user_id = ?, date = ?, time = ?, location = ? WHERE id = ?");
    $stmt->bind_param("isssi",$user_id, $date, $time, $location, $id);
    $stmt->execute();
    $stmt->close();
    $conn->close();
}

// Read Reservation
function getReservation($id) {
    $conn = connectDB();
    $sql = "SELECT id,user_id,date,time, location FROM reservations WHERE user_id = $id ORDER BY date DESC";
    $result = $conn->query($sql);

    $reservations = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $reservations[] = $row;
        }
    }
    $conn->close();
    return $reservations;
}

// Read Reservation
function getReservation1($id, $user_id) {
    $conn = connectDB();
    $sql = "SELECT id, user_id, date, time, location FROM reservations WHERE user_id = $user_id AND id = $id";
    $result = $conn->query($sql);

    $reservation1 = null;
    if ($result->num_rows > 0) {
        $reservation1 = $result->fetch_assoc(); // Directly fetch the first row
    }
    $conn->close();
    $_SESSION['current_id'] = $reservation1;
    return $reservation1;
}



// Delete Reservation
function deleteReservation($id) {
    $conn = connectDB();
    $stmt = $conn->prepare("DELETE FROM reservations WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
    $conn->close();
}

?>