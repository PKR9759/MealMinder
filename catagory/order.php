<?php
include '/Applications/XAMPP/xamppfiles/htdocs/food2/loginsystem/conn.php';
include '/Applications/XAMPP/xamppfiles/htdocs/food2/navbar.php';
$order_placed=0;
?>

<?php
// Check if the data has already been inserted
if (!$order_placed) {
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
             
               header('location:/food2/catagory/payment_success.php');
            } else {
                echo "Error inserting record: " . $stmt->error;
            }

            // Close the statement
            $stmt->close();
        }

       
       
      $order_placed=1;
      unset($_SESSION['totalItem']);
      unset($_SESSION['cart']);
    }
}

// Close the database connection
$conn->close();
?>