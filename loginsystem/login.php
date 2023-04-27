<?php


$login=true;
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    if (isset($_POST['submit'])) {
        include 'conn.php';
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        
        $cnt = "SELECT * FROM users WHERE email='$email'";
        
        $res = mysqli_query($conn, $cnt);
        if (($num=mysqli_num_rows($res)) > 0) {
             $arrdata = mysqli_fetch_assoc($res);
             $rpass = $arrdata['password'];
             $same = password_verify($password,$rpass);
             if($same){
                
              $login=true;
                session_start();

                $_SESSION['logedin']=true;
                if(isset($_POST['rme'])){
                $_SESSION['email']=$email;
                }
                
                
                header("location: home.php");
                
                exit();
            }
        } 
        else {
            $login=false;
        }
        
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        body {
            display: flex;
            font-size: xx-large;
            align-items: center;
            justify-content: center;
            background-color: #195fce;
            background-size: cover;
            backdrop-filter: blur(15px);

        }

        .cont {

            background-color: whitesmoke;
            display: flex;
            outline: 1px solid black;
            justify-content: center;
            align-items: center;
            padding: 50px;
            outline: 2px inset;
            border-radius: 15px;
        }

        input{
            width: 300px;
            height: 30px;
        }
        form label {
  font-size: 20px;
  
}

    </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="cont">
        <form class="form" method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
            <h1>Login</h1>
        <?php
        if((!$login) && (isset($_POST['submit']))){
            echo "
        <p style='color:white;background-color:red;'>invalid Details </p>
        ";
        $login=true;
        }
        ?>
<table>

<tr>
        
    <td>            <label for="username">E-mail:</label>
    </td><td>   
    <input type="email" id="email" name="email" placeholder="Enter E-mail Here" required>
    </td>            

    </tr>
            <br>

            <tr>

        
                <td >
                <label for="password">Password:</label>
    </td>
<td>
                <input type="password" id="password" name="password" placeholder="Enter Password Here" required>
    </td>

    </tr>
        
                    <tr>
                        <td ><input type="checkbox" id="remember-me" name="rme">
                        <label for="remember-me">Remember me</label></td><td></td>
                    </tr>
                    <div>
                        

                        
                    </div>
                    <br>
                    <tr>

                        <td>
                        <button type="submit" name="submit"
                            style="background-color:#195fce;color:aliceblue; width:100px;padding:7px;border-radius:7px; ">Login</button>
    </td>
                    
    </tr>
                    </table>
                    <br>
                    <a href="signup.php">Not Have An Account Sign-Up</a>
        </form>
    </div>
</body>

</html>
