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

  

  <div id="carouselExampleIndicators" style="height:500px" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
       <a href="gujarati.php">
  <img class="d-block w-100" src="slide1.avif" alt="First slide">
</a>

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
    <h3> Which type you Eat today? </h3>
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
        <a href='/food2/catagory/jain.php'><img src="https://as2.ftcdn.net/v2/jpg/02/95/46/33/1000_F_295463303_8tHIfwhbHygFrxLcVptH934mRzL7xJ4w.jpg" alt="First catagory"></a>
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