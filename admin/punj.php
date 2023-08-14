<?php
// session_start();
include 'nav.php';
include '/Applications/XAMPP/xamppfiles/htdocs/food2/loginsystem/conn.php';

?>
<!doctype html>
<html lang="en">

<head>
  <style>
    .cardcont {
      float: right;
      width: 80%;
      height: 100vh;

      display: flex;
      flex-wrap: wrap;
      justify-content: space-around;
      overflow-y: auto;

    }

    .card {
      margin: 20px 0px 0px 20px;
      border-radius: 20px;
    }

    .card-img-top {
      height: 100px;
      width: 100px;
    }

    .cardcont {
      float: right;
      width: 80%;
      height: 100vh;
      display: flex;
      flex-wrap: wrap;
      /* justify-content: space-around; */
      overflow-y: auto;
      /* padding: 20px; */
    }

    /* Styles for each card */
    .card {
      /* margin: 20px 0px 0px 20px; */
      border-radius: 20px;
      width: 18rem;
      /* height: 30rem; */
      background-color: #fff;
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
      transition: transform 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    .card:hover {
      transform: translateY(-5px);
      box-shadow: 0 12px 20px rgba(0, 0, 0, 0.2);
    }

    .card img.card-img-top {
      height: 250px;
      object-fit: cover;
      border-top-left-radius: 20px;
      border-top-right-radius: 20px;
    }

    .card-body {
      padding: 20px;
      display: flex;
      flex-direction: column;
      /* justify-content: space-between; */
      height: 100%;
    }

    .card-body form {
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      height: 100%;
    }

    .card-body label {
      font-weight: bold;
      margin-bottom: 5px;
    }

    .card-body input {
      margin-bottom: 10px;
      padding: 10px;
      border-radius: 5px;
      border: 1px solid #ccc;
      font-size: 16px;
      background-color: #f5f5f5;
      color: #333;
      font-family: 'Fjalla One', sans-serif;
    }

    .card-body button.save {
      margin-top: auto;
      background-color: #6ED03E;
      color: #fff;
      border: none;
      padding: 10px;
      border-radius: 5px;
      font-size: 16px;
      font-weight: bold;
      cursor: pointer;
      transition: background-color 0.3s ease-in-out;
    }

    .card-body button.save:hover {
      background-color: #388e3c;
    }

    .remove {
      background-color: #F15F5F;
      color: white;
      border: none;
      border-radius: 5px;
      padding: 10px 20px;
      cursor: pointer;
    }

    .remove:hover {
      background-color: #dc3545;
    }

    .btns {
      display: flex;
      justify-content: space-around;

    }

    .btns button {
      height: 50px;
      width: 100px;
    }

    .addItem {
      position: absolute;
      bottom: 15px;
      right: 25px;
      z-index: 100;
      background-color: #175EE8;
      color: white;
      border: none;
      padding: 10px 20px;
      border: 4px black solid inset;
    }

    .addItem:hover,
    .addItem:focus {
      background-color: #3e8e41;
    }

    .addItem  a{
      color:white;
      
    }

    .addItem:hover {
      background-color: #4265C4;
      color: whitesmoke;
      box-shadow: 0px 2px 10px black;
    }

    .addItem:focus {
      background-color: white;
      color: #175EE8;
      /* outline:2px  #B3B8C5 inset; */
      box-shadow: 0px 2px 10px #175EE8;
      /* outline: none; */
    }
  </style>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap|Fjalla+One&display=swap">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <title>Admin navbar</title>
</head>

<body>
  <h3> Welcome, Here is Item list ...</h3>
  <?php
  if (isset($_POST['save'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $path = $_POST['url'];
    $avail = $_POST['aviability'];


    $sql = "UPDATE `punjabi_items` SET `file_path` = '$path', `name` = '$name', `price` = '$price', `aviability` = '$avail' WHERE `punjabi_items`.`id` = $id;";
    $result = mysqli_query($conn, $sql);
  }
  if (isset($_POST['remove'])) {
    $id = $_POST['id'];

    $q1 = "DELETE FROM `punjabi_items` WHERE `punjabi_items`.`id` = $id";
    mysqli_query($conn, $q1);
  
  }


  $sql = "SELECT * FROM `punjabi_items`";
  $result = mysqli_query($conn, $sql);


  $num = mysqli_num_rows($result);
  if ($num) {
    // start of container

    echo '<div class="cardcont"">';
    echo ' <a href="/food2/admin/form.php"> <button class="addItem"  type="submit" name="add" class="btn btn-secondary"><span class="material-symbols-outlined">
            add_circle
            </span>Add Item</a></button>';
    // loop through the records and create a card for each one
    while ($row = mysqli_fetch_assoc($result)) {

      echo '<div class="card" style="width: 18rem;">';
      echo '<img class="card-img-top" src="' . $row['file_path'] . '" alt="' . $row['name'] . '">';
      echo '<div class="card-body">';
      echo '<form method="post">';
      echo '<input type="hidden" name="id" value="' . $row['id'] . '" />';
      echo '<label for="name">Name:</label>';
      echo '<input type="text" name="name" value="' . $row['name'] . '" />';
      echo '<label for="price">Price:</label>';
      echo '<input type="text" name="price" value="' . $row['price'] . '" />';
      echo '<label for="name">file path or URL:</label>';
      echo '<input type="text" name="url" value="' . $row['file_path'] . '" />';
      echo '<label for="name">Item Availibility:</label>';
      echo '<input type="hidden" name="cat" value="' . "punjabi_items" . '" />';

      echo '<input type="text" name="aviability" value="' . $row['aviability'] . '" />';
      echo '<div class="btns">';

      echo ' <button class="save" type="submit" name="save" class="btn btn-secondary"><span class="material-symbols-outlined">
                save
                </span></button>';
      echo ' <button class="remove" type="submit" name="remove" class="btn btn-secondary"><span class="material-symbols-outlined">
                delete
                </span></button>';
      echo '</div>';
      echo '</form>';

      echo '</div>';
      echo '</div>';
    }
    echo '</div>';

  }
  ?>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>