<?php
// session_start();
include 'nav.php';
restore_error_handler();

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
   
      <h2>Orders Details</h2>
   

    <table class="table table-striped">
      <thead class="thead-light" >
        <tr>
          <th style="color:blue">User Name</th>
          
          <th style="color:blue">Item Name</th>
          <th style="color:blue">Quantity</th>
          <th style="color:blue">Image</th>
          <th style="color:blue">Order Status</th>
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
                   

                    echo "<td>" . $order["name_item"] . "</td>";
                    echo "<td>" . $order["quantity"] . "</td>";
                    echo "<td><img src='" . $order["img_path"] . "' alt='Image' width='100px'></td>";
                    echo "<td><form action='' method='post'><input type='hidden' name='last_order_id' value='" . ($order['id']) . "'><input type='submit' name='done' value='Order Completed'></form></td>";
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