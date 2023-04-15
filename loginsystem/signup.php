<?php
 $exist= false;
 $passSame = false;
 $showSucess = false;
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    
    if (isset($_POST['submit'])) {
        include 'conn.php';
        $email = $_POST['email'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];

       
        //password validation && unique user taking
        if ($password == $cpassword) {
           
            $passSame = true;
        }
        else{
            $passSame=false;
        }
        
        $cnt="SELECT * FROM users WHERE email='$email'";
        $res=mysqli_query($conn,$cnt);
        if(mysqli_num_rows($res)>0){
            $exist=true;
        }
        else{
            $exist=false;
        }
        if (($passSame) && (!$exist)) {
            $hash=password_hash($password,PASSWORD_DEFAULT);
            $sql = " INSERT INTO `users` ( `email`, `password`, `date`) VALUES ( '$email', '$hash', current_timestamp())";

            if (($result = mysqli_query($conn, $sql))) {
                 $showSucess = true;   
            }
            else
                die("something Wrong");
            
            
        }
        
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        .container {
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #195fce;

            height: 100vh;
            width: 100vw;
            padding: 0;
            margin: 0;
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
    <title>Sign Up Page</title>
</head>

<body>
<div class="valid">

<?php
if(isset($_POST['submit']) && $showSucess){
echo "
<p style='color:white;background-color:#00FF00;'>Sign-Up Sucessfully </p>
";
$showSucess=false;
}

?>
</div>
    <div class="container">
        <div class="cont">
            <form class="form" method="POST">
                <h1>Sign Up</h1>
                <div>
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" placeholder="Enter E-mail Here" required>
                </div>
                <div class="valid">
                    
                    <?php
                    if ($exist && isset($_POST['submit'])) {
                        echo "<p style='color:red;text-size:3px'>User with this E-mail ,Already Exist !!</p>";
                        $exist=false;
                    }
                    
                    ?>
                    
                </div>

                <br>
                <div>
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" placeholder="Enter Password Here" required>
                </div>
                <br>
                <!-- <div>
                    <label for="cpassword">Confirm Password:</label>
                    <input type="password" id="cpassword" name="cpassword" placeholder="Re-enter password Here"
                        required>
                </div> -->
                <div class="valid">
                    <?php
                    if ( (isset($_POST['submit'])) && !$passSame ) {
                        echo "<p style='color:red;text-size:3px'>both Passwords are not matched !!</p>";
                        $passSame=true;
                    }
                    ?>
                </div>

                <br>
                <!-- <div>
                    <button id="submit" name="submit" type="submit"
                        style="background-color:#195fce;color:aliceblue; width:100px;padding:7px;border-radius:7px; ">Sign
                        Up</button>
                </div> -->

            </form>
        </div>
    </div>
   

    
</body>

</html>