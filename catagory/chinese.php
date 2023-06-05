<?php
// include '/Applications/XAMPP/xamppfiles/htdocs/food2/navbar.php';
include 'C:\xampp2\htdocs\food2\navbar.php';

?>
<!doctype html>
<html lang="en">

<head>
<style>
        
        .cardcont {
            width: 100vw;
            display: grid;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            /* grid-template-columns: repeat(3,1fr);
            grid-template-rows: repeat(5,1fr); */
        }

        .card {
            margin: 20px 0px 0px 20px;
            border-radius: 20px;
        }

        .card-img-top {
            height: 250px;
            width: 100px;
        }

        .addcart {
            color: aliceblue;
            background-color: #F17766;
            border-radius: 7px;
            border: none;
            font-size: 20px;
            ;
            font-family: 'Fjalla One', sans-serif;
        }

        .addcart:hover {
            box-shadow: 0px 2px 2px black;
        }

        .addcart:focus {
            box-shadow: none;
            outline: none;
            border: outset;
        }
        </style>
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
        if(session_status() !== PHP_SESSION_ACTIVE){
        session_start();
        }
        //connecting to the database
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "RBH";
        //creating a connection
        $conn = mysqli_connect($servername, $username, $password, $database);

        if (!$conn) {
            die("sorry we failed to connect:" . mysqli_connect_error());
        } else {
            // echo "connected successfully  ";
            echo "<br>";
        }

        //add to cart scripts
        if(!isset($_SESSION['totalItem'])){
            $_SESSION['totalItem'] = 0;
        }
        if($_SERVER['REQUEST_METHOD']=='POST'){
        if (isset($_POST['addcart']) ) {

            // if (!isset($_SESSION['cart']) || !is_array($_SESSION['cart']) || empty($_SESSION['cart'])) {
            //     $_SESSION['cart'] =array();
            // }
                
                
            $myItems = isset($_SESSION['cart']) ? array_column($_SESSION['cart'], 'name') : array();

                if(in_array($_POST['name'],$myItems)){
                    echo'<script >alert("This item is already Exist in cart");</script>';
                }
                else{
                    
                $item = array(
                    'id' => $_POST['id'],
                    'name' => $_POST['name'],
                    'price' => $_POST['price'],
                    'path' => $_POST['file_path'],
                    'availability' =>  $_POST['availability'],
                    'quantity' => (isset($_POST['name'])) ? 1 :NULL,

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

        $sql = "SELECT * FROM `chinese_items`";
        $result = mysqli_query($conn, $sql);

        
            // start of container
            echo '<div class="recsec" >';
            echo '<div class="cardcont">';
            // loop through the records and create a card for each one
           
            while (($row = mysqli_fetch_assoc($result) ) ) {

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
                echo '<input type="hidden" name="availability" value="' . $row['availability'].'" />';
                



                if ($row['availability'] == 1) {

                    echo ' <button class="addcart" type="submit" name="addcart" class="btn btn-secondary">Add to Cart</button>';
                } else {
                    echo '<p class="card-text"><span class="stock" style="color:red">Out of Stock</span></p>';
                }
                echo '</form>';




                echo '</div>';
                echo '</div>';
            }
        
       

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