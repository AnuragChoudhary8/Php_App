<?php
$host = "localhost";
$username = "root";
$password = ""; // Leave blank if no password set in XAMPP
$database = "traveldatabase";

// Connect to MySQL
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch POST data
$name = $_POST['full_name'] ?? '';
$email = $_POST['email'] ?? '';
$destination = $_POST['destination'] ?? '';
$date = $_POST['travel_date'] ?? '';
$special_request = $_POST['message'] ?? '';

// Prepare and insert into DB
$sql = "INSERT INTO travel_requests (name, email, destination, date, special_request) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssss", $name, $email, $destination, $date, $special_request);

if ($stmt->execute()) {
    header("Location: success.html");
    exit();
} else {
    echo "Error: " . $stmt->error;
}


$stmt->close();
$conn->close();
?>
