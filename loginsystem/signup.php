
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
       body{
        margin:0;padding:0;
       }
        .container {
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #cf7c34;
            
            height: 100vh;
            width: 100vw;
            padding: 0;
            margin: 0;
        }

        .cont {
            background-color: whitesmoke;
            display: flex;
           
            justify-content: center;
            align-items: center;
            padding: 50px;
           
            border-radius: 15px;
            
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.2);
        }
      input{
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: none;
            border-radius: 20px;
            background-color: #E8E4E1;
      }
      input:focus{
        outline: none;
        border: 2px solid #f49644;
      }
       #submit{
        color: #fff;
            background-color: #f49644;
            border: none;
            border-radius: 20px;
            padding: 10px 20px;
            cursor: pointer;
            transition: all 0.2s ease-in-out;
            margin: 7% 0px 0px 6%;
       }
       #submit:hover{
        background-color: #cf7c34;
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
                    
                    <input type="email" id="email" name="email" placeholder=" E-mail " required>
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
                   
                    <input type="password" id="password" name="password" placeholder="Password " required >
                </div>
                <br>
                <div>
                    
                    <input type="password" id="cpassword" name="cpassword" placeholder="Confirm password "
                        required>
                </div>
                <div class="valid">
                    <?php
                    if ( (isset($_POST['submit'])) && !$passSame ) {
                        echo "<p style='color:red;text-size:3px'>both Passwords are not matched !!</p>";
                        $passSame=true;
                    }
                    ?>
                </div>

                <br>
                <div>
                    <button id="submit" name="submit" type="submit">Sign Up</button>
                </div>

            </form>
        </div>
    </div>
   

    
</body>

</html>