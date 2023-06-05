
<?php
// session_start();
include 'nav.php';
restore_error_handler();

// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rbh";

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch the orders from the "orders" table
$sql = "SELECT * FROM orders";
if (isset($_POST['done'])) {
  $lastOrderId = $_POST['last_order_id']; // Get the last order ID
  $sql2 = "DELETE FROM orders WHERE id = $lastOrderId"; // Delete all orders with ID less than or equal to the last order ID
  $conn->query($sql2);
  // Use $lastOrderId for further processing or database operations
}
$result = $conn->query($sql);

// Associative array to group orders by user name
$groupedOrders = array();

// Check if there are any orders
if ($result->num_rows > 0) {
    // Group orders by user name
    while ($row = $result->fetch_assoc()) {
        $userName = $row["name_user"];
        
        // Check if the user name already exists in the array
        if (isset($groupedOrders[$userName])) {
            // Add the current order to the existing user's orders
            $groupedOrders[$userName]["orders"][] = $row;
        } else {
            // Create a new entry for the user in the array
            $groupedOrders[$userName] = array(
                "name" => $userName,
                "orders" => array($row)
            );
        }
    }
}
?>

<!doctype html>
<html lang="en">

<head>
  <title>Admin navbar</title>
</head>

<body>
  <div class="content">
    <div class="jumbotron jumbotron-fluid">
      <!-- ... -->
    </div>

    <table class="table table-striped">
      <thead class="thead-dark">
        <tr>
          <th>User Name</th>
          <th>Order ID</th>
          <th>Item Name</th>
          <th>Quantity</th>
          <th>Image</th>
        </tr>
      </thead>
      <tbody>
        <?php
        // Check if there are any grouped orders
        if (!empty($groupedOrders)) {
            // Output data of each user's orders
            foreach ($groupedOrders as $userOrders) {
                $userName = $userOrders["name"];
                $orders = $userOrders["orders"];
                
                // Output data of each order
                foreach ($orders as $order) {
                    echo "<tr>";
                    if ($orders[0] == $order) {
                        echo "<td rowspan='" . count($orders) . "'>" . $userName . "</td>";
                    }
                    // echo "<td>" . $order["id"] . "</td>";
                    echo "<td><form action='' method='post'><input type='hidden' name='last_order_id' value='" . ($order['id']) . "'><input type='submit' name='done' value='Done'></form></td>";

                    echo "<td>" . $order["name_item"] . "</td>";
                    echo "<td>" . $order["quantity"] . "</td>";
                    echo "<td><img src='" . $order["img_path"] . "' alt='Image' width='100px'></td>";
                    echo "</tr>";
                }
            }
        } else {
            echo "<tr><td colspan='5'>No orders found</td></tr>";
        }
        ?>
      </tbody>
    </table>

    <?php
    // Close the database connection
    $conn->close();
    ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- ... -->
  </body>
</html>
