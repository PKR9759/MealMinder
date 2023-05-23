<?php
// session_start();
include 'C:\xampp\htdocs\food2\admin\nav.php';
?>
<!doctype html>
<html lang="en">

<head>
  <style>
    .nav {
      float: left;
      height: 100vh;
      width: 20%;
      background-color: black;
    }

    .nav a {
      width: 240px;
    }

    .content {
      width: 74%;
      float: right;
      margin: 0px 12px;
      font-family: 'Fjalla One', sans-serif;
    }

    body {
      font-family: Arial, sans-serif;
      background-color: #f5f5f5;
      margin: 0;
      padding: 20px;
    }

    h1 {
      text-align: center;
      color: #333333;
    }

    #order-list {
      margin-top: 20px;
    }

    .user-order {
      position: relative;
      margin-bottom: 30px;
      padding: 20px;
      background-color: #ffffff;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      border-radius: 4px;
      display: flex;
      flex-direction: column;
      min-height: 100px;
      max-height: 300px;
      overflow-y: auto;
    }

    .upper {
      display: flex;
      justify-content: space-between;
    }

    .lower {
      display: flex;
      flex-direction: column;
    }

    .user-info {
      margin-bottom: 20px;
    }

    .email {
      font-size: 18px;
      font-weight: bold;
    }

    .item-list {
      list-style-type: none;
      padding: 0;
      margin: 0;
    }

    .item {
      display: flex;
      align-items: center;
      margin-bottom: 10px;
    }

    .item-details {
      display: flex;
      align-items: center;
    }

    .item-details img {
      width: 80px;
      height: 80px;
      margin-right: 10px;
      object-fit: cover;
      border-radius: 4px;
    }

    .details {
      display: flex;
      flex-direction: column;
    }

    .item-name {
      font-weight: bold;
      font-size: 16px;
      margin-bottom: 5px;
    }

    .item-price {
      color: #555555;
      font-size: 14px;
      margin-bottom: 5px;
    }

    .quantity {
      color: #888888;
      font-size: 14px;
      margin-bottom: 5px;
    }

    .remove {
      /* position:absolute; */
      height: 20px;
      width: 20px;
    }
  </style>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap|Fjalla+One&display=swap">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <title>Admin navbar</title>
</head>

<body>
  <div class="content">
    <div class="jumbotron jumbotron-fluid">
      <div class="container">
        <h1 class="display-4">Welcome Admin</h1>
        <p class="lead">
          Welcome to the Food Site Admin Dashboard! As an administrator of your food site, you have access to all the tools you need to manage and customize your site. This dashboard is designed to provide a user-friendly interface that lets you easily create, read, update, and delete content.
        </p>
        <p>
          Whether you need to add new recipes, update menu items, this dashboard has got you covered. You can use the menu on the left-hand side to navigate to the area you want to work on. From there, you'll have access to a wide range of features and options that make it easy to keep your site running smoothly.
        </p>
        <p>
          Finally, this dashboard is designed to be intuitive and easy to use, even if you don't have a lot of technical experience. You can create and manage content without needing to write any code or use any complex tools.
        </p>
        <p>
          So let's get started!
        </p>
      </div>
    </div>

    <?php
    if (isset($_POST['cancel'])) {
      $id = $_POST['id'];

      $q1 = "DELETE FROM `token` WHERE `token`.`id` = $id";
      mysqli_query($conn, $q1);
    }

    $sql = "SELECT * FROM `token`";
    $result = mysqli_query($conn, $sql);
    $currentTokenID = null;
    $total = 0;

    echo '<h1>Orders</h1>
    <div id="order-list">';

    while ($row = mysqli_fetch_assoc($result)) {
      $tokenID = $row['token_id'];

      if ($tokenID !== $currentTokenID) {
        $total = 0;
        echo '<div class="user-order">
                <div class="upper">
                  <div class="token">
                    <span class="token_id">Token Id: ' . $tokenID . '</span>
                  </div>
                  <div class="totalprice">
                    <span class="">&#8377; ' . $total . '</span>
                  </div>
                  <div class="remove" title="Remove From List">
                    <form action="" method="post">
                      <input type="hidden" name="id" value="' . $row["id"] . '">
                      <button type="submit" name="cancel">
                        <img src="img_dir/cross.png">
                      </button>
                    </form>
                  </div>
                </div>
                <div class="lower">
                  <ul class="item-list">';
      }

      $itemName = $row['name'];
      $itemPrice = $row['price'];
      $itemQuantity = $row['quantity'];
      $img = $row['path'];
      $total += $itemPrice * $itemQuantity;

      echo '<li class="item">
              <div class="item-details">
                <img src="' . $img . '" alt="Item 1">
                <div class="details">
                  <span class="item-name">' . $itemName . '</span>
                  <span class="item-price">&#8377; ' . $itemPrice . '</span>
                  <span class="quantity">Quantity: ' . $itemQuantity . '</span>
                </div>
              </div>
            </li>';
    }

    echo '</ul>
          </div>
        </div>
      </div>';
    ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
