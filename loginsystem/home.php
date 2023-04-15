<?php 
session_start();
if(!isset($_SESSION['logedin']) || $_SESSION['logedin']==false){
    header("location:login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        body{
            margin: 0;
            padding: 0;
        }
        .cont{
            display:flex;
            justify-content: space-between;
            margin:0;
            padding:0;
            background-color: black;
            color: white;
            font-size: 20px;
            
        }
        .logoname{
            float:left;
            display: flex;
        }
        .logoname p{
            margin:0;
            padding: 0;
            margin-left: 12px;
            color:aqua;
            font-family:fantasy;
        }
        .logoname img{
            height:20px;
        }
        .navbar ul{
            display: flex;
            list-style: none;
            margin:0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            
            
        }
        
       
        .navbar a{
            margin-left: 20px;
            text-decoration: none;
            text-align: center;
            color: white;
            padding: 7px;
            font-weight: 500;
        }
        .navbar a:hover{
            color:black;
            background-color: white;
            text-decoration:underline;
            text-decoration-color: black;
            text-decoration-thickness: 5px;
            font-weight: 600;
            
        }
        .cont2{
            margin:0;
            padding:0;
        }
        .lft{
            float:left;
            width:50%;
            height: 100vh;
            background-color:white;
        }
        .leftp{
            color:#195fce;
            display: flex;
            margin: 40px 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            align-items: center;

        }
        .logsign{
            display: flex;
           margin-top: 50px;
            justify-content:center;
           
            align-items: center;
        }
        .logsign button{
            font-family:Georgia, 'Times New Roman', Times, serif;
            margin-right: 20px;
            background-color:#195fce ;
            text-align: center;
            width:150px;
            padding: 0;
            margin-left:0;
            color:aliceblue;
            font-size: 20px;
        }
        .lft button:hover{
            box-shadow: inset;
            opacity:0.9;
            outline:2px solid black;
        }
       
        .rgt{
            display:flexbox;
            float:right;
            
            width:50%;
            height: 100vh;

            background-color:grey;

        }




    </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="cont">
        <div class="logoname">

        <div><img src="/logos/linkd.png" alter="logo"></img></div>
        <p class="cname"></p>
        </div>
        <div class="navbar">
            <ul>
                <li><a href="/rbh/home.php">HOME</a></li>
                <li><a href="/rbh/home.php">HOME</a></li>
                <li><a href="/rbh/home.php">HOME</a></li>
                <li><a href="/rbh/home.php">HOME</a></li>
            </ul>
        </div>
    </div>
    <div class="cont2">
            <div class="lft">
            <div class="leftp">  
            <p style="font-size: 20px;margin-left:20px; ">Welcome to</p>
            <p style="font-size: 40px;margin-left:20px ;padding:0; ">RBH</p>
            </div>
            <br><br>
           <div class="logsign">
            <a href="signup.php"><button>Sign Up</button></a>
            <a href="login.php"><button>Login</button></button></a>
            <a href="logout.php"><button>Log Out</button></button></a>
           </div>
            </div>

            <div class="rgt">

            </div>


    </div>
   
</body>
</html>
