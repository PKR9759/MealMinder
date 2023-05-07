
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
            width: 60%;
            height: 100%;
            overflow-y: auto;
            box-shadow: 0px 2px 4px #4C4543;
            border-radius: 10px;
        }

        .left p {
            font-family: 'Righteous', cursive;
            margin-right: 12px;
            max-width:100px;
            width:60px;

        }

        .right {
            width: 30%;
            height: 60%;
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
            width:96%;
            font-family: 'Teko', sans-serif;
            font-weight: 600;
            box-shadow: 0px 2px 3px #ACA7A6;
            align-items: center;
            margin: 10px;
        }

        .carditems p {}

        .itemslft {
            display: flex;
            justify-content:space-around;
            /* width: 60%; */
            height: 100%;
            margin-right: 20px;
            align-items: center;
            object-fit:fill;

        }

        .itemslft p {}



        .itemslft img {
            padding: 4px;
            
            height:100px;
            width:100px; 
            margin-right: 12px 15px;
            max-width: 100%;
            object-fit:fill;
            border-radius: 20px;
            ;
        }

        .itemsright {
            display: flex;
            justify-content: space-between;

            align-items: center;
            text-align: right;

        }



        .prcode {
            margin: 20px 5px 10px 5px;
            /* border:1px solid #4C4543; */
        }

        .prcode button {
            margin: 0;
            /* padding:0; */
            background-color: #F45817;
            color: aliceblue;
            border-radius: 5px;
            height: 30px;
            width: 30px;
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

        .contform {
            display: inline-block;

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

   
    // increase andd decrease the quantity
    if (isset($_POST['increase_quantity'])) {
        // Get the item ID from the form
        $ind=$_POST['itemIndex'];
        $_SESSION['cart'][$ind]['quantity']++;

        // Increase the item quantity in the cart
        
    }

    if (isset($_POST['decrease_quantity'])) {
        // Get the item ID from the form
        $ind=$_POST['itemIndex'];
        if($_SESSION['cart'][$ind]['quantity']==1){
            unset($_SESSION['cart'][$ind]);
        }
        else{
        $ind=$_POST['itemIndex'];
        $_SESSION['cart'][$ind]['quantity']--;
        }

        // Decrease the item quantity in the cart, but don't allow it to go below 1
       
    }

    $subtotal = 0;
    echo '<div class="container">';
    echo '<div class="left">';
    if(!isset($_SESSION['totalItem'])){

    
    $_SESSION['totalItem'] =0;
    }
    if (!isset($_SESSION['cart'])) {
        echo "Your cart is empty";
    }

    // echo (isset($_SESSION['cart']));
    if (isset($_SESSION['cart'])) {
        // for($i=0;$i<count($_SESSION['cart']);$i++){
        for ($j = 0; $j < count($_SESSION['cart']); $j++) {
            if(isset($_SESSION['cart'][$j])==null) continue;
            $item = $_SESSION['cart'][$j];
            $_SESSION['totalItem']++;
            $subtotal += ($item['price'] * $item['quantity']);
            echo '<div class="carditems">';
            echo    '<div class="itemslft">';
            echo        ' <img src="' . $item['file_path'] . '">';
            echo         '<p>' . $item['name'] . '</p>';
            echo    '</div>';

            echo    '<div class="itemsright">';

            echo '<div class="cartform prcode">
                    <form method="post">
                    
                    <input type="hidden" name="itemIndex" value="'.$j.'">

                    <button type="submit" title="decrease  quantity" name="decrease_quantity">-</button>
                    <span style="margin:0px 5px;">'.$item['quantity'].'</span>
                    
                    <button type="submit" title="increase quantity" name="increase_quantity">+</button>
                    </form>
                </div>';
             echo '      <div>';
            echo '          <p>&#8377;' . $item['price'] . '</p>';
            echo '      </div>';
            echo '</div>';
            echo '</div>';
        }
       
        echo '</div>';
        echo '<div class="right">';

        echo '<div class="subtotal">';
        echo ' <div class="">';
        echo '<p>SubTotal</p>';
        echo '<P>&#8377;' . $subtotal . '</P>';
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
        echo '<P>&#8377;' . ($subtotal - 40 + 20) . '</P>';
        echo ' </div>';
        echo '<hr style="height:2px;border:none;background-color:#C1BBB8">';
        echo '<div class="placeorder">';
        echo '<button class="btn btn-block" type="submit">Place-Order</button>';

        echo ' </div>';
        echo '</div>';
        echo ' </div>';
    }
    ?>



    
    </script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>