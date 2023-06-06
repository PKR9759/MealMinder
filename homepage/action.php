<?php
// establish database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rbh";

// create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// retrieve form data
$name = $_POST['fname'];
$email = $_POST['email'];
$feedback = $_POST['feedback'];

// prepare SQL statement
$stmt = $conn->prepare("INSERT INTO `feedback` (`name`, `email`, `feedback`) VALUES (?, ?, ?)");
if (!$stmt) {
    die("Error preparing statement: " . mysqli_error($conn));
}
$stmt->bind_param("sss", $name, $email, $feedback);

// execute statement
if (!$stmt->execute()) {
    die("Error executing statement: " . mysqli_error($conn));
}

// redirect to success page
else{
    echo <<<HTML
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Success</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container mt-5">
            <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">Record Added Successfully!</h4>
                <p>Your feedback has been recorded. Thank you for taking the time to share your thoughts with us!</p>
                <hr>
                <p class="mb-0">Click <a href="index.php">here</a> to go back to the feedback form.</p>
            </div>
        </div>
    </body>
    </html>
HTML;

}
// close statement and connection
$stmt->close();
$conn->close();
?>
