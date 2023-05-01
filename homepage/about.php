<?php
include '/Applications/XAMPP/xamppfiles/htdocs/food2/navbar.php';
?>

<!DOCTYPE html>
<html>



<!doctype html>
<html lang="en">

<head>
    <title>About Us - Food Token</title>
    <!-- Add the Tailwind CSS CDN -->
    <link href="https://cdn.tailwindcss.com" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<style>
    .idea li{
        padding: 15pxa;
        height: 50%;
    }
    body{
        font-size: 30px;
     color: whitesmoke;
        background-color: #1f242d;
    }
    .social-media {
        display: flex;
        margin: 30px 0;
        justify-content: center;

    }
.social-media a {
    padding: 0;
    box-sizing: border-box;
    background-color: #1f242d;
    color: #fff;
    display:inline-flex;
    justify-content: center;
    align-items: center;
    width: 40px;
    height: 40px;
    background: transparent;
    border: 2px solid #0ef;
    border-radius: 50%; 
    font-size: 30px;
    color: #0ef;
    text-decoration: none;
    margin-right: 15px;
    transition: 0.5s ease;
    opacity: 0;
    animation: slide-left 1s ease forwards;
    animation-delay: calc(.2s * var(--i));
}

.social-media a:hover{
    background: #0ef;
    color: #1f242d;
    /* most important for hovereffect */
    box-shadow: 0 0 20px #0ef;
}

   .h1 {
font-family: 'Roboto', sans-serif;
font-size: 60px;
font-weight: 700;

   }
   .p {
    font-size: 28px;
			color: #0ef;
            margin-left: 100px;
			line-height: 1.75;
			text-align: justify;
			max-width: 800px;
			margin-bottom: 20px;
    }

    .social-media a {
        padding: 0;
        box-sizing: border-box;
        background-color: #1f242d;
        color: #fff;
        display: inline-flex;
        justify-content: center;
        align-items: center;
        width: 40px;
        height: 40px;
        background: transparent;
        border: 2px solid #0ef;
        border-radius: 50%;
        font-size: 30px;
        color: #0ef;
        text-decoration: none;
        margin-right: 15px;
        transition: 0.5s ease;
        opacity: 0;
        animation: slide-left 1s ease forwards;
        animation-delay: calc(.2s * var(--i));
    }

    .social-media a:hover {
        background: #0ef;
        color: #1f242d;
        /* most important for hovereffect */
        box-shadow: 0 0 20px #0ef;
    }

    .h1 {
        margin-top: 40px;
        margin-left: 70px;
        font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        font-size: 60px;
        font-weight: 700;

    }

    /* .p {
        font-size: 28px;
        color: #dbdcdf;
        margin-left: 100px;
        line-height: 1.75;
        text-align: justify;
        max-width: 800px;
        margin-bottom: 20px;
    } */
    .imgcont{
        display:flex;
        justify-content: space-around;
        margin-top: -800px;
        margin-left: 1000px;
    }
    .imgcont-b{
        display:flex;
        justify-content: space-around;
        margin-top: 50px;
        margin-left: 1000px;
    }
    .img {
        height:300px;
        width:300px;
        width:300px;
        margin-left: 11px;
        margin-top: 00px;
        border-radius: 50%;
    }

    .img-2 {
        max-width: 300px;
        margin-left: 1150px;
        margin-top: -400px;
        border-radius: 50%;
    }

    @keyframes slide-left {
        0% {
            opacity: 0;
            transform: translateX(100px);

        }

        100% {
            transform: translateX(0px);
            opacity: 1;
        }
    }
    .copyright{
        display:flex;
        justify-content: center;
    }
</style>
<!-- Bootstrap CSS -->


<body>


    <h1 class="h1">About Us</h1>

    <p class="p">Welcome to the Food Token website! We are Parmar Lakhman and Kuldip Parmar, the creators of this
        platform.</p>

    <p class="p">Parmar Lakhman is an enthusiastic food lover who always wanted to find a better way to manage food
        tokens. He is passionate about building digital solutions that simplify everyday life. Kuldip Parmar is an
        experienced web developer with a keen eye for design. He enjoys creating intuitive interfaces that are both
        aesthetically pleasing and user-friendly.</p>
    <p class="p">Together, we have combined our expertise to create Food Token, a website that simplifies the process of
        getting food tokens. Our goal is to make it easy for you to get your hands on your favorite food without the
        hassle of waiting in long lines.</p>
    <p class="p">We hope you enjoy using Food Token and welcome any feedback you may have. Thank you for choosing our
        platform!</p>
    <div class="imgcont">
        <div><img src="kuldip.jpeg" alt="photo" class="img">
            <div class="social-media">
                <a href="#" style="--i:7;"><i class='bx bxl-facebook'></i></a>
                <a href="#" style="--i:8;"><i class='bx bxl-twitter'></i></a>
                <a href="#" style="--i:9;"><i class='bx bxl-instagram'></i></a>
                <a href="#" style="--i:10;"><i class='bx bxl-github'></i></a>
            </div>
        </div>
    </div>
        <div class="imgcont-b">
            <div>
            <img src="lakhman.jpeg" alt="photo" class="img">
            <div class="social-media" >
            <a href="#" style="--i:7;"><i class='bx bxl-facebook'></i></a>
            <a href="#" style="--i:8;"><i class='bx bxl-twitter'></i></a>
            <a href="#" style="--i:9;"><i class='bx bxl-instagram'></i></a>
            <a href="#" style="--i:10;"><i class='bx bxl-github'></i></a>
        </div>
    </div>
   </div>
    <div class="copyright">
    <footer >
        <p>&copy; 2023 Food Token</p>
    </footer>
    <div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <script src="https://unpkg.com/typed.js@2.0.14/dist/typed.umd.js"></script>
    <script src="script.js"></script>
</body>

</html>