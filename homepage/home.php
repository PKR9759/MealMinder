<?php
include 'C:\xampp\htdocs\rbh\navbar.php';
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
    .recsec{
      display: flex;
      flex-wrap: wrap;
      justify-content:space-around;
      /* grid-template-rows: repeat(4,1fr); */
      /* flex-wrap: wrap; */
      
      
      
    }
    .card{
      margin-top:20px;
      border-radius: 20px; 
      
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
  <img class="d-block w-100" src="https://source.unsplash.com/featured/?food,punjabi" alt="First slide">
</a>

      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="https://source.unsplash.com/featured/?food,chinese" alt="Second slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="https://source.unsplash.com/featured/?food,gujrati" alt="Third slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="https://source.unsplash.com/featured/?food,south-indian" alt="Third slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="https://source.unsplash.com/featured/?food,marathi" alt="Third slide">
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
    <h3> Which type you Eat today? </h3>
    <div class="catsec">
      <div class="cat">
        <a href='/rbh/catagory/gujrati.php'><img src="https://source.unsplash.com/random/?Gujratifood-circle," alt="First catagory"></a>
      
        
      <p>Gujrati</p>
      </a>
      </div>
      <div class="cat">
        <a href='/rbh/catagory/punjabi.php'><img src="https://source.unsplash.com/random/?Punjabifood-circle," alt="First catagory"></a>
        <p>Punjabi</p>
      </div>
      <div class="cat">
        <a href='/rbh/catagory/jain.php'><img src="https://source.unsplash.com/random/?jainfood-circle," alt="First catagory"></a>
        <p>Jain</p>
        <img src="https://source.unsplash.com/random/?Punjabifood-circle," alt="First catagory">
       <a href="punjabi.php"> <p>Punjabi</p></a>
      </div>
      <div class="cat">
        <img src="https://source.unsplash.com/random/?jainfood-circle," alt="First catagory">
        <p>Snacks</p>
      </div>
      <div class="cat">
        <a href='/rbh/catagory/chinese.php'><img src="https://source.unsplash.com/random/?chinesefood-circle," alt="First catagory"></a>
        <p>Chinese</p>
      </div>
    </div>

  </div>
  <hr>
  <div class="recsec">

    <div class="card" style="width: 18rem;">
      <img class="card-img-top" src="https://source.unsplash.com/random/?Gujratifood-circle" alt="Card image cap">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
          content.</p>

      </div>
    </div>

    <div class="card" style="width: 18rem;">
      <img class="card-img-top" src="https://source.unsplash.com/random/?Gujratifood-circle" alt="Card image cap">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
          content.</p>

      </div>
    </div>

    <div class="card" style="width: 18rem;">
      <img class="card-img-top" src="https://source.unsplash.com/random/?Gujratifood-circle" alt="Card image cap">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
          content.</p>

      </div>
    </div>

    <div class="card" style="width: 18rem;">
      <img class="card-img-top" src="https://source.unsplash.com/random/?Gujratifood-circle" alt="Card image cap">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
          content.</p>

      </div>
    </div>

    <div class="card" style="width: 18rem;">
      <img class="card-img-top" src="https://source.unsplash.com/random/?Gujratifood-circle" alt="Card image cap">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
          content.</p>

      </div>
    </div>

    <div class="card" style="width: 18rem;">
      <img class="card-img-top" src="https://source.unsplash.com/random/?Gujratifood-circle" alt="Card image cap">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
          content.</p>

      </div>
    </div>

    <div class="card" style="width: 18rem;">
      <img class="card-img-top" src="https://source.unsplash.com/random/?Gujratifood-circle" alt="Card image cap">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
          content.</p>

      </div>
    </div>

    <div class="card" style="width: 18rem;">
      <img class="card-img-top" src="https://source.unsplash.com/random/?Gujratifood-circle" alt="Card image cap">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
          content.</p>

      </div>
    </div>

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