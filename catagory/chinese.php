<?php
include '/Applications/XAMPP/xamppfiles/htdocs/food/navbar.php';
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
<link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>chinese</title>
</head>

<body>
    <br>
    <div class="jumbotron" style="background-color:#F17766">
        <h1 class="display-4">Chinese Foods</h1>
        
        <hr class="my-3" style="font-family:'Lobster',sans-serif">
        <p>Savor the flavors of China with our authentic and delicious Chinese cuisine. From spicy Sichuan dishes to savory Cantonese classics, our menu features a wide variety of dishes that will transport your taste buds to the streets of China. Made with the freshest and highest quality ingredients, our dishes are cooked to perfection using authentic cooking techniques. So come and experience the rich and varied flavors of China at our site today.</p>
        
    </div>
    <h4>Chose Your food and cold-drinks ...<h4>
    <hr>
    <?php
//connecting to the database
$servername = "localhost";
$username="root";
$password="";
$database="RBH";
//creating a connection
$conn = mysqli_connect($servername,$username,$password,$database);

if (!$conn) {
    die("sorry we failed to connect:" . mysqli_connect_error());
} else {
    echo "connected successfully  ";
    echo "<br>";
}

$sql = "SELECT * FROM `chinese_items`";
$result = mysqli_query($conn,$sql);

//find the number of records if greater than zero we will do further process
$num = mysqli_num_rows($result);
if ($num) {
    // start of container
    echo '<div class="recsec" >';

    // loop through the records and create a card for each one
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<div class="card" style="width: 18rem;">';
        echo '<img class="card-img-top" src="' . $row['file_path'] . '" alt="' . $row['name'] . '">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">' . $row['name'] . '</h5>';
        if ($row['aviability'] == 1) {
            echo '<p class="card-text"><span class="stock green">In Stock</span> - Price: ' . $row['price'] . '</p>';
        } else {
            echo '<p class="card-text"><span class="stock red">Out of Stock</span></p>';
        }
        
        
        echo '</div>';
        echo '</div>';
    }
 
    echo '</div>';
}
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