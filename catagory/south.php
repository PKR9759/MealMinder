<?php include '/Applications/XAMPP/xamppfiles/htdocs/food2/navbar.php';
include 'config.php';
 ?>

<!doctype html>
<html lang="en">

<head>
    <link rel="stylesheet" href="cat.css">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap|Fjalla+One&display=swap" rel="stylesheet">
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
    <title>guj</title>
</head>

<body>
    <br>
    <div class="jumbotron" style="background-color:#F17766">
        <h1 class="display-4">South Indian Dishes</h1>
        <hr class="my-3" style="font-family:'Lobster',sans-serif">
        <p>Indulge in the symphony of flavors from the land of spices. Discover the true essence of South India on your
            plate. Embark on a culinary journey through the vibrant flavors of South India. Let your taste buds dance in
            delight. From crispy dosas to aromatic biryanis, our restaurant brings you the best of South Indian cuisine.
            Taste the magic that lies within every bite</p>
    </div>
    <h4>Choose Your food and cold-drinks ...</h4>
    <hr>
    <div class="recsec">

        <?php
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        if (!$conn) :
            die("sorry we failed to connect:" . mysqli_connect_error());
        else :
            echo "<br>";
        endif;

        //add to cart scripts
        if (!isset($_SESSION['totalItem'])) :
            $_SESSION['totalItem'] = 0;
        endif;
        if ($_SERVER['REQUEST_METHOD'] == 'POST') :
            if (isset($_POST['addcart'])) :

                $myItems = isset($_SESSION['cart']) ? array_column($_SESSION['cart'], 'name') : array();

                if (in_array($_POST['name'], $myItems)) :
                    // echo'<script >alert("This item is already Exist in cart");</script>';
                else :
                    $item = array(
                        'id' => $_POST['id'],
                        'name' => $_POST['name'],
                        'price' => $_POST['price'],
                        'path' => $_POST['file_path'],
                        'aviability' =>  $_POST['aviability'],
                        'quantity' => (isset($_POST['name'])) ? 1 : NULL,
                    );
                    $_SESSION['totalItem']++;
                    // $count++;
                    $_SESSION['cart'][] = $item;
                    echo "<script>location.reload();</script>";
                    echo '<script >alert("Item Successfully added to Cart");</script>';

                endif;
            endif;

        endif;

        $sql = "SELECT * FROM `south_items`";
        $result = mysqli_query($conn, $sql);

        echo '<div class="recsec">';
        echo '<div class="cardcont">';

        while (($row = mysqli_fetch_assoc($result))) :
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

            if ($row['aviability'] == 1) :
                echo ' <button class="addcart" type="submit" name="addcart" class="btn btn-secondary">Add to Cart</button>';
            else :
                echo '<p class="card-text"><span class="stock" style="color:red">Out of Stock</span></p>';
            endif;

            echo '</form>';
            echo '</div>';
            echo '</div>';
        endwhile;

        echo '</div>';
        echo '</div>';
        ?>

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
