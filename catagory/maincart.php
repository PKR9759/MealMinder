<?php
session_start();
include '/Applications/XAMPP/xamppfiles/htdocs/food2/navbar.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="cart.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Tilt+Prism&display=swap|Audiowide&Righteous&display&Alfa+Slab+One&Titan+One&display|Sigmar&display=swap|Poltawski+Nowy&display=swap|Teko&display=swap|Righteous&display=swap">
    <link rel="stylesheet" href="cat.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        /* Your custom styles here */
    </style>
    <script>
        if (window.history.replaceState) window.history.replaceState(null, null, window.location.href);
    </script>
    <title>Punjabi</title>
</head>

<body>
    <?php
    if (isset($_POST['increase_quantity'])) {
        // Handle quantity increase logic
    }

    if (isset($_POST['decrease_quantity'])) {
        // Handle quantity decrease logic
    }
    ?>

    <div class="title">
        <h2>Welcome to Cart..</h2>
    </div>

    <div class="container">
        <div class="left">
            <?php
            // Display cart items
            if (isset($_SESSION['cart'])) {
                foreach ($_SESSION['cart'] as $key => $item) {
                    if (!empty($item) && isset($item['quantity'])) {
                        $subtotal += ($item['price'] * $item['quantity']);
                        echo '<div class="carditems">';
                        echo '<div class="itemslft">';
                        echo '<img src="' . $item['path'] . '">';
                        echo '<p>' . $item['name'] . '</p>';
                        echo '</div>';
                        echo '<div class="itemsright">';
                        echo '<div class="cartform prcode">';
                        echo '<form method="post">';
                        echo '<input type="hidden" name="itemIndex" value="' . $key . '">';
                        echo '<button type="submit" title="Decrease Quantity" name="decrease_quantity">-</button>';
                        echo '<span style="margin: 0px 5px;">' . $item['quantity'] . '</span>';
                        echo '<button type="submit" title="Increase Quantity" name="increase_quantity">+</button>';
                        echo '</form>';
                        echo '</div>';
                        echo '<div>';
                        echo '<p>&#8377;' . $item['price'] . '</p>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }
                }
            }
            ?>
        </div>

        <div class="right">
            <?php
            // Display subtotal, GST, and total
            if (isset($_SESSION['cart'])) {
                echo '<div class="subtotal">';
                echo '<div class="">';
                echo '<p>SubTotal</p>';
                echo '<p>&#8377;' . $subtotal . '</p>';
                echo '</div>';
                echo '<div class="">';
                echo '<p>GST</p>';
                echo '<p>+' . '&#8377;' . $subtotal * 0.18 . ' (18%)</p>';
                echo '</div>';
                echo '</div>';
                echo '<hr style="height:3px;border:none;background-color:#C1BBB8">';
                echo '<div class="total">';
                echo '<p>Total</p>';
                echo '<p>&#8377;' . ($subtotal + $subtotal * 0.18) . '</p>';
                echo '</div>';
                echo '<hr style="height:2px;border:none;background-color:#C1BBB8">';
                echo '<div class="placeorder">';
                echo '<form action="order.php" method="post">';
                echo '<button class="btn btn-block" name="place" type="submit">Place Order</button>';
                echo '</form>';
                echo '</div>';
            }
            ?>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery, Popper.js, Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>
