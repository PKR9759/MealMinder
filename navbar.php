<?php
if(session_status() !== PHP_SESSION_ACTIVE){
    session_start();
    }
if(!isset($_SESSION['logedin']) || !$_SESSION['logedin']){
    header("location:/food2/loginsystem/login.php");
    exit();
}

?>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<style>.idea li{
        padding: 15px;
        height: 50%;
    }
    
    .idea{
        
        font-size: 20px;
        color: whitesmoke;
        background-color: #E56C23;
    }
    .cart{
        position:relative;
        display: inline-block;
        
    }
    .cart img{
        border-radius: 30%;
        border:outset whitesmoke;
        outline: none;

    }
    .ind{
        position: absolute;
        top:-8px;
        right:9px;
        width: 25px;
        height: 25px;
        border-radius: 50%;
        background-color: red;
        color: white;
        text-align: center;
        font-size: 12px;
        line-height: 20px;
        font-weight: 700;
        border:1px solid white;
        
    }
    .cart img:hover{
        
        border:inset whitesmoke;
    }
    .cart img:focus{
        box-shadow: 0px 2px 4px #E56C23;
        border:none;
    }
    html {
  scroll-behavior: smooth;
}

    </style>
<div class="idea">
<nav class="navbar navbar-expand-lg navbar-expand-lg navbar-expand-sm navbar-expand-xl " style="background-color:#E56C23;padding:2px">
    <!-- <a class="navbar-brand" style=" color:aliceblue" href="#">Navbar</a> -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav" style="color:white">
            <li class="nav-item active">
                <a class="nav-link" style="color:white" href="/food2/homepage/home.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="color:white" href="/food2/homepage/form.php">Feedback</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="color:white" href="/food2/homepage/about.php">About</a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" style="color:white" href="#" id="navbarDropdownMenuLink"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Catagory
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="/food2/catagory/gujrati.php">Gujrati Items</a>
                    <a class="dropdown-item" href='/food2/catagory/punjabi.php'>Punjabi Items</a>
                    <a class="dropdown-item" href='/food2/catagory/chinese.php'>Chinese Items</a>
                    <a class="dropdown-item" href='/food2/catagory/south.php'>South Indian Items</a>
                    <a class="dropdown-item" href='/food2/catagory/snacks.php'>Snacks</a>

                </div>
            </li>
            <li class="nav-item">
                <a  class="nav-link"  style="color:white" href="/food2/loginsystem/logout.php">Logout</a>
            </li>
            </div>
        </ul>
        <div  class="cart" style="float:right" >
               <a class="cartbtn" href="/food2/catagory/maincart.php"  style="background-color:#E56C23;"> <img style="  height:40px ; width:40px ;margin-right:20px;" src="https://media.istockphoto.com/id/469047076/vector/white-icon-of-a-shopping-cart-on-orange-background.jpg?s=170667a&w=0&k=20&c=5OH1VrFlZ-Ndu1fL1h_ha_1p2hfPRIXPE1ZciKSVpXI="></a>
                <div class="ind">
                <?php 
                echo (isset($_SESSION['totalItem'])) ?$_SESSION['totalItem'] : 0;
                ?>
                </div>
        </div>
        
    </div>
    
</nav>

