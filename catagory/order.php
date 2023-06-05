<?php
include '/Applications/XAMPP/xamppfiles/htdocs/food2/loginsystem/conn.php';
include '/Applications/XAMPP/xamppfiles/htdocs/food2/navbar.php';
?>

<?php
// Check if the data has already been inserted
if (!isset($_SESSION['order_placed'])) {
    // Fetch values from the session cart and insert them into the table
    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $item) {
            $nameItem = $item['name'];
            $email = $_SESSION['name'];
            $emailParts = explode("@", $email);
            $done = $emailParts[0];
            $nameUser = $done;
            $quantity = $item['quantity'];
            $imgPath = $item['path'];

            // Prepare the SQL statement with placeholders
            $sql = "INSERT INTO orders (name_item, name_user, quantity, img_path)
                    VALUES (?, ?, ?, ?)";

            // Create a prepared statement
            $stmt = $conn->prepare($sql);

            // Bind parameters to the prepared statement
            $stmt->bind_param("ssis", $nameItem, $nameUser, $quantity, $imgPath);

            // Execute the prepared statement
            if ($stmt->execute()) {
                echo "New record inserted successfully";
            } else {
                echo "Error inserting record: " . $stmt->error;
            }

            // Close the statement
            $stmt->close();
        }

        // Set the session variable to indicate that the order has been placed
        $_SESSION['order_placed'] = true;
    }
}

// Close the database connection
$conn->close();
?>
