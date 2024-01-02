<?php


$login = true;
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    if (isset($_POST['submit'])) {
        if ($_POST['drop'] === "Admin") {
            include 'conn.php';
            $email = $_POST['email'];
            $password = $_POST['password'];
            if($email=="kuldiprparmar9759@gmail.com" && $password=="Kuldip@9759") {
                header('location:/food2/admin/home.php');
            }
            else{
                $login=false;
            }
        }
        else{
        include 'conn.php';
        $email = $_POST['email'];
        $password = $_POST['password'];


        $cnt = "SELECT * FROM users WHERE email='$email'";

        $res = mysqli_query($conn, $cnt);
        if (($num = mysqli_num_rows($res)) > 0) {
            $arrdata = mysqli_fetch_assoc($res);
            $rpass = $arrdata['password'];
            $same = password_verify($password, $rpass);
            if ($same) {

                $login = true;
                session_start();

                $_SESSION['logedin'] = true;
                if (isset($_POST['rme'])) {
                    $_SESSION['email'] = $email;
                }
                $_SESSION['name']=$_POST['email'];
                header('location:/food2/homepage/home.php');

                exit();
            }
         else {
            $login = false;
            
        }
        }
        else{
            $login=false;
        }
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
            background-color: #cf7c34;
            background-size: cover;
            backdrop-filter: blur(15px);

        }

        .cont {

            background-color: white;
            display: flex;
            max-width: 25%;
            justify-content: center;
            align-items: center;
            padding: 50px;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.2);
            border-radius: 15px;
        }

        input[type="email"],
        input[type="password"],
        select {
            width: 100%;
            padding: 10px;
            margin: 12px 0px;
            font-size: 16px;
            border: none;
            border-radius: 20px;
            background-color: #E8E4E1;
        }

        input,
        select:focus {
            outline: none;
            border: 2px solid #f49644;
        }

        #submit {
            color: #fff;
            background-color: #f49644;
            border: none;
            border-radius: 20px;
            padding: 10px 20px;
            cursor: pointer;
            transition: all 0.2s ease-in-out;
            margin: 7% 0px 0px 6%;
        }

        #submit:hover {
            background-color: #cf7c34;
        }




        .rem input,
        .rem label {
            display: inline;
        }

        #submit {
            color: #fff;
            background-color: #f49644;
            border: none;
            border-radius: 18px;
            padding: 10px 20px;
            cursor: pointer;
            transition: all 0.2s ease-in-out;
            margin: 7% 0px 0px 6%;
            width: 30%;
        }

        #submit:hover {
            background-color: #cf7c34;
        }
    </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="cont">
        <form class="form" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <h1>Login</h1>
            <?php
            if ((!$login) && (isset($_POST['submit']))) {
                echo "
            <p style='color:white;background-color:red;padding:3px;'>invalid Details </p>
            ";

                $login = true;
            }
            ?>
            <div>
                <div class="dropdown">


                    <select name="drop"required>
                        <option value="" disabled selected>Who are You:</option>
                        <option value="User">User</option>
                        <option value="Admin">Admin</option>

                    </select>

                </div>
            </div>
            <input type="email" id="email" name="email" placeholder="E-mail" required>
            <input type="password" id="password" name="password" placeholder="Password " required>
            <div>
                <br>
                <div class="rem">
                    <input type="checkbox" id="remember-me" name="rme">
                    <label for="remember-me">Remember me</label>
                </div>
                <div>
                    <button type="submit" id="submit" name="submit">Login</button>
                </div>
                <br><br>
                <div>
                    <a href=" signup.php">Not Have An Account , Sign-Up first</a>
                </div>
        </form>
    </div>
</body>

</html>h