<?php
session_start();

include 'C:\xampp\htdocs\food2\navbar.php';
?>

<!doctype html>
<html lang="en">

<head>
    <link href="https://fonts.googleapis.com/css2?family=Tilt+Prism&display=swap
            ||Audiowide&Righteous&display&Alfa+Slab+One&Titan+One&display|Sigmar&display=swap|Poltawski+Nowy&display=swap|Teko&display=swap|Righteous&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #D7D6D6;
        }

        .title {
            font-weight: 600;
            font-family: 'Sigmar', cursive;
            margin: 20px;
        }

        .container {

            margin: 30px;
            padding: 30px;
            display: flex;
            justify-content: space-between;
            width: 100vw;
            height: 100vh;



        }

        .left {
            margin: 0px;
            padding: 0;
            display: flex;
            flex-direction: column;
            width: 65%;
            height: 100%;
            overflow-y: auto;
            box-shadow: 0px 2px 4px #4C4543;
            border-radius: 10px;
        }

        .left p {
            font-family: 'Righteous', cursive;
            margin-left: 12px;
        }

        .right {
            width: 30%;
            height: 80%;
            box-shadow: 0px 2px 4px #4C4543;
            border-radius: 10px;
            font-family: 'Righteous', cursive;
            overflow-y: auto;
        }

        .carditems {
            display: flex;
            justify-content: space-between;
            border: 1px solid #4C4543;
            border-radius: 20px;
            height: 100px;
            padding: 4px;
            ;
            font-family: 'Teko', sans-serif;
            font-weight: 600;
            box-shadow: 0px 2px 3px #ACA7A6;
            align-items: center;
            margin: 10px;
        }



        .itemslft {
            display: flex;
            justify-content: space-around;
            width: 60%;
            height: 100%;
            margin-right: 20px;

            object-fit: fill;

        }



        .itemslft img {
            /* height:50px;
            width:50px; */
            margin-right: 12px;
            ;
            object-fit: fill;
            border-radius: 20px;
            ;
        }

        .itemsright {
            display: flex;
            justify-content: space-between;

            align-items: center;
            /* text-align: right; */

        }



        .prcode {
            margin: 20px 5px 10px 5px;
        }

        .prcode button {
            margin: 0;

            background-color: #F45817;
            color: aliceblue;
        }

        .prcode input {
            outline: none;
            border-radius: 2px;
            border: none;
            background-color: #EAE5E3;
            height: 35px;
            width: 70%;
            padding: 6px;
            display: inline-block;
        }

        .subtotal {
            margin: 0px 4px;
            padding: 10px;
            display: flex;
            flex-direction: column;

        }

        .subtotal div {
            display: flex;
            justify-content: space-between;
        }

        .total {
            margin: 0px 4px;
            padding: 5px;
            display: flex;
            justify-content: space-between;
            font-size: 20px;
            font-weight: 600;
        }

        .placeOrder {
            margin: 5px 2px;
            padding: 4px;
        }

        .placeOrder button {

            background-color: #F45817;
            color: aliceblue;
        }
    </style>
    <link rel="stylesheet" href="cat.css">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>punjabi</title>
</head>

<body>
    <div class="title">
        <h2>Welcome to Cart..</h2>
    </div>
    <?php
    $subtotal = 0;
    echo '<div class="container">';
    echo '<div class="left">';
    
   
    echo '<p>you are selected (' . $totalItem . ') items</p>';
    
    if (isset($_SESSION['cart'])) {
       
        foreach ($_SESSION['cart'] as  $item) {
            $subtotal += ($item["price"] * $item["quantity"]);
            echo '<div class="carditems">';
            echo '<div class="itemslft">';
            echo ' <img src="' . $item["file_path"] . '">';
            echo '<p>' . $item["name"] . '</p>';
            echo '</div>';

            echo '<div class="itemsright">';

            echo '<div class="contity">';
            echo ' <nav aria-label="Page navigation example">';
            echo '<ul class="pagination">';
            echo '<li class="page-item">';
            echo ' <a class="page-link" style="color:#F45817" href="#" aria-label="minus">';
            echo '  <span aria-hidden="true">&minus;</span>';

            echo '    </a>';
            echo '    </li>';
            echo '   <li class="page-item" ><a style="background-color:#F45817;color:aliceblue" class="page-link" href="#">' . $item['quantity'] . '</a></li>';

            echo '<li class="page-item">';
            echo '  <a class="page-link" style="color:#F45817" href="#" aria-label="Next">';
            echo '      <span aria-hidden="true"> &plus;</span>';

            echo '    </a>';
            echo '   </li>';
            echo '   </ul>';
            echo ' </nav>';
            echo ' </div>';
            echo ' <div>';
            echo ' <p>'. '&#8377;'  . $item["price"]
                . '</p>';
            echo '  </div>';
            echo '</div>';
            echo '</div>';
        }
    }
        echo '</div>';
        echo '<div class="right">';
       
        echo '<hr style="height:4px;border:none;background-color:#958D89">';
        
        echo '<div class="subtotal">';
        echo ' <div class="">';
        echo '<p>SubTotal</p>';
        echo '<P>'. '&#8377;'  . $subtotal . '</P>';
        echo '</div>';
        echo '<div>';
        echo ' <p>Shipping-fees</p>';
        echo '<P>' . '&#8377;' . '20</P>';
        echo ' </div>';
        echo '<div class="">';
        echo ' <p>Discount</p>';
        echo '<P>-' . '&#8377;' . '40</P>';
        echo '</div>';
        echo ' </div>';
        echo '<hr style="height:3px;border:none;background-color:#C1BBB8">';

        echo '<div class="total">';
        echo '<p>Total</p>';
        echo '<P>'. '&#8377;'  . ($subtotal - 40 + 20) . '</P>';
        echo ' </div>';
        echo '<hr style="height:2px;border:none;background-color:#C1BBB8">';
        echo '<div class="placeorder">';
        echo '<button class="btn btn-block" type="submit">Get-Token</button>';

        echo ' </div>';
        echo '</div>';
        echo ' </div>';
    
    ?>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>