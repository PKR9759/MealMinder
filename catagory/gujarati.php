
 <?php
include '/Applications/XAMPP/xamppfiles/htdocs/food2/navbar.php';
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
    <title>guj</title>
</head>

<body>
    <br>
    <div class="jumbotron" style="background-color:#F17766">
        <h1 class="display-4">Gujrati Dishes</h1>
        <hr class="my-3" style="font-family:'Lobster',sans-serif">
        <p>Whether you are a lifelong fan of Gujarati cuisine or trying it for the first time, our site is the perfect place to savor the flavors and textures of this unique regional cuisine. So come and join us for a culinary journey through the tastes and traditions of Gujarat!</p>
    </div>
    <h4>Choose Your food2 and cold-drinks ...</h4>
    <hr>
    <div class="recsec">

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

$sql = "SELECT * FROM `gujarati_items`";
$result = mysqli_query($conn,$sql);

//find the number of records if greater than zero we will do further process
$num = mysqli_num_rows($result);
if ($num) {
    // start of container
    echo '<div class="recsec" >';
    // catagory/img_dir
    // loop through the records and create a card for each one
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<div class="card" style="width: 18rem;">';
        echo '<img class="card-img-top" src="' . $row['file_path'] . '" alt="' . $row['name'] . '">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">' . $row['name'] . '</h5>';
    
        if ($row['aviability'] == 1) {
           
            echo '<p class="card-text"><span class="stock green">In Stock</span> - Price: ' . $row['price'] . '</p>';
            // add buy now button
            echo '<form method="post" action="">';
            echo '<input type="hidden" name="item_id" value="' . $row['id'] . '">';
            
            echo '<button type="submit" class="btn btn-primary" value="false">Buy Now</button>';
            echo '</form>';
            }
         else {
            echo '<p class="card-text"><span class="stock red">Out of Stock</span></p>';
        }
         echo '</div>';
        echo '</div>';
    }
 
    echo '</div>';
}
?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
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


