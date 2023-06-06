<?php
// establish database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rbh";

// create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// prepare SQL statement
$stmt = $conn->prepare("INSERT INTO `info` (name, gender, number, email, feedback, rating) VALUES (?, ?, ?, ?, ?, ?)");

// check if prepare was successful
if (!$stmt) {
    die("Error: " . $conn->error);
}

// bind parameters
$name = $_POST['fname'];
$gender = $_POST['gender'];
$number = $_POST['number'];
$email = $_POST['email'];
$feedback = $_POST['feedback'];
$rating = $_POST['rating'];

if (!$stmt->bind_param("sssssi", $name, $gender, $number, $email, $feedback, $rating)) {
    die("Error binding parameters: " . $stmt->error);
}

// execute statement
if (!$stmt->execute()) {
    die("Error executing statement: " . $stmt->error);
}

echo "New record created successfully";

// close statement and connection
$stmt->close();
$conn->close();
?>