

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
            flex-direction: column;
            float:left;
            height:100vh;
            width:15%;
            margin:0;
            padding:4px;
            background-color: black;
            color: white;
        }
        .logoname{
          display:flex;
          padding:10px;
          
        }
        .logoname i{
            height:50px;
            margin-right:10px;

        }
        .logoname p{
            font-family: 'Tilt Prism', cursive;
            font-size:30px;
            font-weight:600;
            margin:0;
            padding:0;
        }
        .menu{
            margin-top:20px;
        }
        .menu ul {
            font-family:"Audiowide",sans-serif;
            font-size:25px;
            padding:0;
            list-style: none;
           text-align:center;
            
        }
        .menu li{
            margin-top:10px;
            
        }
        
        .menu a{
            margin:0;
            padding:0;
            text-decoration: none;
            /* text-align: center; */
            color: white;
            
           
        }
        .menu a:hover{
            color:black;
            background-color: white;
            text-decoration:underline;
            text-decoration-color: black;
            text-decoration-thickness: 5px;
            
            
        }
        
       
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Tilt+Prism&display=swap ||Audiowide" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="cont">
        <div class="logoname">
        <i class="fa-sharp fa-solid fa-music fa-3x"></i>
        <p>Music</p>
        </div>
        
        <div class="menu">
            <ul>
                <li><i class="fa-solid fa-house fa-0.5x"></i> <a href="/rbh/home.php">Home</a></li>
                <li><i class="fa-solid fa-magnifying-glass"></i><a href="/rbh/home.php">Search</a></li>
                <li><i class="fa-solid fa-list-music"></i><a href="/rbh/home.php">Playlist</a></li>
                <li><i class="fa-sharp fa-solid fa-list-music"></i><a href="/rbh/home.php">About</a></li>
            </ul>
        </div>
    </div>
    </div>
    


<script src="https://kit.fontawesome.com/53cda3bc09.js" crossorigin="anonymous"></script>
   
</body>
</html>