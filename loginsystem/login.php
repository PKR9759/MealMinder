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

            <div>
                <label for="username">E-mail:</label>
                <input type="email" id="email" name="email" placeholder="Enter E-mail Here" required>
            </div>
            <br>
            <div>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="Enter Password Here" required>
                <div>
                    <br>
                    <div>
                        <input type="checkbox" id="remember-me" name="rme">

                        <label for="remember-me">Remember me</label>
                    </div>
                    <br>
                    <div>
                        <button type="submit" name="submit"
                            style="background-color:#195fce;color:aliceblue; width:100px;padding:7px;border-radius:7px; ">Login</button>
                    </div>
                    <br>
                    <a href="signup.php">Not have an Account,Sign-Up first</a>
        </form>
    </div>
</body>

</html>