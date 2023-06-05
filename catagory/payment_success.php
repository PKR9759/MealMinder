<!DOCTYPE html>
<html>
<head>
    <title>Payment Confirmation</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            padding: 20px;
        }

        .container {
            max-width: 900px;
            margin: 0 auto;
            text-align: center;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
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
        <h2>Your Order ID is:</h2>
        <?php
        session_start();
        echo '<h2>' . $_SESSION['token'] . '</h2>';
        ?>
    </div>
</body>
</html>