<?php
include '/Applications/XAMPP/xamppfiles/htdocs/food2/navbar.php';
//Applications/XAMPP/xamppfiles/htdocs/food2/navbar.php
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
      overflow: auto;
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

      /* margin-bottom:10px; */
    }

    .cat p {
      font-size: larger;
      font-family: 'DynaPuff', sans-serif;
    }
    .cardcont{
            width:100vw;
            display:grid;
            display:flex;
            flex-wrap: wrap;
            justify-content: space-around;
            /* grid-template-columns: repeat(3,1fr);
            grid-template-rows: repeat(5,1fr); */
        }
   
  </style>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <title>home</title>
</head>

<body>

  <div class="search">
    <nav class="navbar navbar-light bg-#EC451C" style="float:right; ">
      <form class="form-inline">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit" style="background-color:#EC451C;color:white"
          ;>Search</button>
      </form>
    </nav>
  </div><br><br>

  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
       <a href="gujarati.php">
  <img class="d-block w-100" src="https://source.unsplash.com/featured/?food2,punjabi" alt="First slide">
</a>

      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="https://source.unsplash.com/featured/?food2,chinese" alt="Second slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="https://source.unsplash.com/featured/?food2,gujrati" alt="Third slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="https://source.unsplash.com/featured/?food2,south-indian" alt="Third slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="https://source.unsplash.com/featured/?food2,marathi" alt="Third slide">
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


  <div class="category">
    <h3> Which type you Eat today? </h3>
    <div class="catsec">
      <div class="cat">
        <a href='/food2/category/gujarati.php'><img src="https://source.unsplash.com/random/?Gujratifood2-circle," alt="First category"></a>
      
        
      <p>Gujrati</p>
      </a>
      </div>
      <div class="cat">
        <a href='/food2/category/punjabi.php'><img src="https://source.unsplash.com/random/?Punjabifood2-circle," alt="First category"></a>
        <p>Punjabi</p>
      </div>
      <div class="cat">
        <a href='/food2/category/jain.php'><img src="https://source.unsplash.com/random/?jainfood2-circle," alt="First category"></a>
        <p>Jain</p>
        
      </div>
      <div class="cat">
      <a href='/food2/category/snacks.php'><img src="https://source.unsplash.com/random/?jainfood2-circle," alt="First category"></a>
        <p>Snacks</p>
      </div>
      <div class="cat">
        <a href='/food2/category/chinese.php'><img src="https://source.unsplash.com/random/?chinesefood2-circle," alt="First category"></a>
        <p>Chinese</p>
      </div>
    </div>

  </div>
  <hr>
  <div class="recsec">

  <?php
//connecting to the database
$servername = "localhost";
$username="root";
$password="";
$database="rbh2";
//creating a connection
$conn = mysqli_connect($servername,$username,$password,$database);

if (!$conn) {
    die("sorry we failed to connect:" . mysqli_connect_error());
} else {
    // echo "connected successfully  ";
    echo "<br>";
}

$rand=2;

//selecting data from the database
if($rand==1){
$sql = "SELECT * FROM `gujarati_items`";
}
elseif($rand==2){
  $sql = "SELECT * FROM `punjabi_items`";
}
elseif($rand==3){
  $sql = "SELECT * FROM `chinese_items`";
}
elseif($rand==4){
  $sql = "SELECT * FROM `snacks`";
}


$result = mysqli_query($conn,$sql);

//find the number of records if greater than zero we will do further process
$num = mysqli_num_rows($result);
if ($num) {
    // start of container
    echo '<div class="recsec" >';
    echo '<div class="cardcont" >';

    // loop through the records and create a card for each one
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<div class="card" style="width: 18rem;">';
        echo '<img class="card-img-top" src="' . $row['file_path'] . '" alt="' . $row['name'] . '">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">' . $row['name'] . '</h5>';
        
        if ($row['aviability'] == 1) {
            echo '<p class="card-text"><span class="stock green">In Stock</span> - Price: ' . $row['price'] . '</p>';
            echo '<form method="POST" action="">';
            echo '<input type="hidden" name="item_id" value="'.$row['id'].'">';
            echo '<input type="hidden" name="item_name" value="'.$row['name'].'">';
            echo '<input type="hidden" name="item_price" value="'.$row['price'].'">';
            echo '<input type="hidden" name="path" value="'.$row['file_path'].'">';
            echo '<input type="submit" class="btn btn-primary" name="buy_now" value="Buy Now">';
            echo '</form>';
        } else {
            echo '<p class="card-text"><span class="stock red">Out of Stock</span></p>';
        }
        
        echo '</div>';
        echo '</div>';
    }
    
}

// $session_id = session_id(); // get the current session ID
// echo "Session ID: " . $session_id;
// var_dump($_SESSION);
?>


  </div>

  
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