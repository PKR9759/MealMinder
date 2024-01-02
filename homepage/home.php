<?php
include '/Applications/XAMPP/xamppfiles/htdocs/food2/navbar.php';
?>
<!doctype html>
<html lang="en">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia|DynaPuff">

<head>
  <style>
    .serch {
      display: flex;
      margin-bottom: 10px;
    }

    #carouselExampleIndicators {
      padding: 19px 15px;
      width: 100%;
      height: 400px;
      overflow: hidden;
      background-size: cover;
      background-repeat: no-repeat;

    }

    .catsec {
      display: flex;
      overflow-y: hidden;
      margin: 0;
      padding: 0;
     
    }

    .cat {
      margin-top: 20px;
      display: flex;
      flex-direction: column;
      margin-left: 20px;
      justify-content: center;
      align-items: center;
    }

    .cat img {
      overflow: hidden;

      width: 200px;
      height: 200px;
      border-radius: 50%;
      border: 2px solid black;
     
    }

    .cat p {
      font-size: larger;
      font-family: 'DynaPuff', sans-serif;
    }
    .cat:hover{
      color: rebeccapurple;
      transition: 0.5s ease-in-out;
      transform: scale(1.1);
    }
    .catagory{
      margin: 0 40px;
    
    }
  .carousel-item img {
  pointer-events: none;
}

    </style>
  <link rel="stylesheet" href="cat.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <title>home</title>
</head>

<body>

  <div id="carouselExampleIndicators" style="height:500px" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        
          <img class="d-block w-100" src="slide1.avif" alt="First slide">
      

      </div>

      <div class="carousel-item">
        <img class="d-block w-100" src="slide2.avif" alt="Third slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="slide3.avif" alt="Third slide">
      </div>


    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  <br>
  <hr>


  <div class="catagory">
    <h3> what you want to eat today ?</h3>
    <div class="catsec">
      <div class="cat">
        <a href='/food2/catagory/gujrati.php'><img src="https://b.zmtcdn.com/data/o2_assets/52eb9796bb9bcf0eba64c643349e97211634401116.png" alt="First catagory"></a>


        <p>Gujrati</p>
        </a>
      </div>
      <div class="cat">
        <a href='/food2/catagory/punjabi.php'><img src="https://t4.ftcdn.net/jpg/02/12/69/59/360_F_212695921_GaiXzq0hWQHwAtNzTNkEu7HYKpBfcgmj.jpg" alt="First catagory"></a>
        <p>Punjabi</p>
      </div>
      <div class="cat">
        <a href='/food2/catagory/south.php'><img src="https://as2.ftcdn.net/v2/jpg/02/95/46/33/1000_F_295463303_8tHIfwhbHygFrxLcVptH934mRzL7xJ4w.jpg" alt="First catagory"></a>
        <p>South Indian</p>

      </div>
      <div class="cat">
        <a href='/food2/catagory/snacks.php'><img src="https://media.istockphoto.com/id/520134277/photo/take-out-food-classic-cheeseburger-meal-isolated-on-white.jpg?s=612x612&w=0&k=20&c=-e-sj-hieOBQclUBRu8E7wRfIxqe4mB_CKnkJwyr-es=" alt="First catagory"></a>
        <p>Snacks & Drinks</p>
      </div>
      <div class="cat">
        <a href='/food2/catagory/chinese.php'><img src="https://previews.123rf.com/images/espies/espies1904/espies190400176/121497894-manchurian-hakka-schezwan-noodles-popular-indochinese-food-served-in-a-bowl-selective-focus.jpg" alt="First catagory"></a>
        <p>Chinese</p>
      </div>

    </div>

  </div>
  <hr>
  <div class="recsec">
    <?php

    if (session_status() !== PHP_SESSION_ACTIVE) {
      session_start();
    }
    //connecting to the database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "rbh";
    //creating a connection
    $conn = mysqli_connect($servername, $username, $password, $database);

    if (!$conn) {
      die("sorry we failed to connect:" . mysqli_connect_error());
    } else {
      // echo "connected successfully  ";
      echo "<br>";
    }

    //add to cart scripts
    if (!isset($_SESSION['totalItem'])) {
      $_SESSION['totalItem'] = 0;
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      if (isset($_POST['addcart'])) {

        // if (!isset($_SESSION['cart']) || !is_array($_SESSION['cart']) || empty($_SESSION['cart'])) {
        //     $_SESSION['cart'] =array();
        // }


        $myItems = isset($_SESSION['cart']) ? array_column($_SESSION['cart'], 'name') : array();

        if (in_array($_POST['name'], $myItems)) {
          //echo'<script >alert("This item is already Exist in cart");</script>';
        } else {

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


          // exit();
        }
      }
    }
    echo '<div class="recsec" >';
    echo '<div class="cardcont">';
    // loop through the records and create a card for each one
    for ($i = 0; $i < 18; $i++) {
      $tables = array('gujarati_items', 'chinese_items', 'snacks', 'south_items', 'punjabi_items');
      $randomTable = $tables[array_rand($tables)];

      // Select 15 random items from the random table
      $query = "SELECT * FROM `$randomTable` ORDER BY RAND() LIMIT 1";
      $result = $conn->query($query);
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

          echo ' <button class="addcart" type="submit" name="addcart" class="btn btn-secondary">Add to Cart</button>';
        } else {
          echo '<p class="card-text"><span class="stock" style="color:red">Out of Stock</span></p>';
        }
        echo '</form>';
        echo '</div>';
        echo '</div>';
      }
    }
    echo '</div>';
    echo '</div>';
    ?>
  </div>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>