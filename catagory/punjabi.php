<?php
include '/Applications/XAMPP/xamppfiles/htdocs/food2/navbar.php';
include 'config.php';
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="cat.css">
    <title>Punjabi Food</title>
</head>

<body>
    <!-- Navbar Included -->
    <?php
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }

  

    if (!$conn) {
        die("Sorry, we failed to connect: " . mysqli_connect_error());
    }

    // Adding Items to Cart
    if (!isset($_SESSION['totalItem'])) {
        $_SESSION['totalItem'] = 0;
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addcart'])) {
        $myItems = isset($_SESSION['cart']) ? array_column($_SESSION['cart'], 'name') : array();
        if (!in_array($_POST['name'], $myItems)) {
            $item = array(
                'id' => $_POST['id'],
                'name' => $_POST['name'],
                'price' => $_POST['price'],
                'path' => $_POST['file_path'],
                'aviability' => $_POST['aviability'],
                'quantity' => (isset($_POST['name'])) ? 1 : NULL,
            );
            $_SESSION['totalItem']++;
            $_SESSION['cart'][] = $item;
            echo "<script>location.reload();</script>";
            echo '<script>alert("Item Successfully added to Cart");</script>';
        }
    }

    // Fetching Punjabi Items
    $sql = "SELECT * FROM `punjabi_items`";
    $result = mysqli_query($conn, $sql);
    ?>

    <!-- Jumbotron Section -->
    <div class="jumbotron" style="background-color: #F17766">
        <h1 class="display-4">Punjabi Food</h1>
        <hr class="my-3" style="font-family: 'Lobster', sans-serif">
        <p>
            Indulge in the rich and hearty flavors of Punjabi cuisine at our restaurant. Our menu features a wide
            selection of dishes that are made using traditional Punjabi spices and cooking techniques. From creamy butter
            chicken and tender tandoori chicken to savory chana masala and spicy biryani, our dishes are sure to
            tantalize your taste buds. Made with the freshest and highest quality ingredients, our dishes are cooked to
            perfection and served with warm and fluffy naan bread. So come and experience the authentic flavors of Punjab
            at our restaurant today.
        </p>
    </div>

    <!-- Choose Food Section -->
    <h4>Choose Your Food and Cold Drinks...</h4>
    <hr>

    <!-- Display Punjabi Food Items -->
    <div class="recsec">
        <div class="cardcont">
            <?php
            while (($row = mysqli_fetch_assoc($result))) {
                echo '<div class="card" style="width: 18rem;">';
                echo '<img class="card-img-top" src="' . $row['file_path'] . '" alt="' . $row['name'] . '">';
                echo '<div class="card-body">';
                echo '<form method="post">';
                echo '<h5 class="card-title">' . $row['name'] . '</h5>';
                echo '<p class="card-text">' . '&#8377;' . $row['price'] . '</p>';
                echo '<input type="hidden" name="id" value="' . $row['id'] . '" />';
                echo '<input type="hidden" name="name" value="' . $row['name'] . '" />';
                echo '<input type="hidden" name="price" value="' . $row['price'] . '" />';
                echo '<input type="hidden" name="file_path" value="' . $row['file_path'] . '" />';
                echo '<input type="hidden" name="aviability" value="' . $row['aviability'] . '" />';
                if ($row['aviability'] == 1) {
                    echo '<button class="addcart btn btn-secondary" type="submit" name="addcart">Add to Cart</button>';
                } else {
                    echo '<p class="card-text"><span class="stock" style="color: red">Out of Stock</span></p>';
                }
                echo '</form>';
                echo '</div>';
                echo '</div>';
            }
            ?>
        </div>
    </div>

    <!-- Bootstrap Scripts -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
</body>

</html>
