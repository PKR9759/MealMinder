<?php
include '/Applications/XAMPP/xamppfiles/htdocs/food2/loginsystem/conn.php';
include '/Applications/XAMPP/xamppfiles/htdocs/food2/navbar.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Payment Confirmation</title>
 
   
    <style>
        .container {
            align-items: center;
            max-width: 900px;
            margin: 0 auto;
            text-align: center;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        
        }
        .container:hover{
            filter: brightness(90%);
        }

        
        h1 {
            color: #007bff;
            margin-bottom: 20px;
        }

        h2 {
            color: #343a40;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Payment Done</h1>
        <h2>Your Order ID is:
            <?php
            $order_placed = 0;
            if (!$order_placed) {
                $order_id = 1;
                $userNamesQuery = "SELECT name_user FROM orders ORDER BY id";

                // Execute the query
                $result = $conn->query($userNamesQuery);

                if ($result->num_rows > 0) {
                    $previousUserName = "";
                    while ($row = $result->fetch_assoc()) {
                        $currentUserName = $row['name_user'];

                        if ($previousUserName !== $currentUserName) {
                            // Perform your desired action when the name changes
                            $order_id++;
                        }

                        // Assign the current name as the previous name for the next iteration
                        $previousUserName = $currentUserName;
                    }
                    echo $order_id;
                }
                // Free the result set
                $result->free_result();
            }
            ?>
        </h2>
    </div>
</body>
</html>
