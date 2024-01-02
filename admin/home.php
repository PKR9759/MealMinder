<?php
// Your existing PHP code...
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



// Check if there are any orders
$groupedOrders = [];

// If there are any orders, group them by user name
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $userName = $row["name_user"];

        // If the user name already exists in the array, append the current order to their orders
        // Otherwise, create a new entry for the user in the array
        $groupedOrders[$userName]["orders"][] = $row;
        $groupedOrders[$userName]["name"] = $userName;
    }
}
?>

<!doctype html>
<html lang="en">

<head>
  <title>Admin navbar</title>
  <!-- Include Tailwind CSS -->
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.2/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">

  <div class="container mx-auto px-6 py-8">
    <h2 class="text-gray-700 text-3xl font-medium">Orders Details</h2>

    <div class="mt-8">
      <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
              <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                  <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">User Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Item Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Quantity</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Image</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Order Status</th>
                  </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
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
                              echo "<td>" . $order["name_item"] . "</td>";
                              echo "<td>" . $order["quantity"] . "</td>";
                              echo "<td><img src='" . $order["img_path"] . "' alt='Image' class='w-24'></td>";
                              echo "<td><form action='' method='post'><input type='hidden' name='last_order_id' value='" . ($order['id']) . "'><input type='submit' name='done' class='px-4 py-2 bg-blue-500 text-white rounded' value='Order Completed'></form></td>";
                              echo "</tr>";
                          }
                      }
                  } else {
                      echo "<tr><td colspan='5'>No orders found</td></tr>";
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php
    // Your existing PHP code to close the database connection...
    ?>

  </div>

</body>
</html>