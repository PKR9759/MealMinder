<?php
session_start();

$exist = false;
$passSame = false;
$showSuccess = false;

// Function to generate a random CAPTCHA string


if ($_SERVER['REQUEST_METHOD'] == "POST") {

    if (isset($_POST['submit'])) {
        // Validate the entered CAPTCHA text
        $enteredCaptcha = $_POST['captcha'];
        if ($_SESSION['captcha'] === $enteredCaptcha) {
            include 'conn.php';
            $email = $_POST['email'];
            $password = $_POST['password'];
            $cpassword = $_POST['cpassword'];

            // Password validation && unique user taking
            if ($password == $cpassword) {
                $passSame = true;
            } else {
                $passSame = false;
            }

            $cnt = "SELECT * FROM users WHERE email='$email'";
            $res = mysqli_query($conn, $cnt);
            if (mysqli_num_rows($res) > 0) {
                $exist = true;
            } else {
                $exist = false;
            }

            if (($passSame) && (!$exist)) {
                $hash = password_hash($password, PASSWORD_DEFAULT);
                $sql = "INSERT INTO `users` (`email`, `password`, `date`) VALUES ('$email', '$hash', current_timestamp())";

                if (($result = mysqli_query($conn, $sql))) {
                    $showSuccess = true;
                    $_SESSION['logedin'] = true;
                } else {
                    die("Something went wrong");
                }
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
            margin: 0;
            padding: 0;
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

        input {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: none;
            border-radius: 20px;
            background-color: #E8E4E1;
        }

        input:focus {
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
    </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Page</title>
</head>

<body>
    <div class="valid">
        <?php
        if (isset($_POST['submit']) && $showSuccess) {
            $_SESSION['name'] = $_POST['email'];
            echo "<p style='color:white;background-color:#00FF00;padding:4px;'>Sign-Up Successfully </p>";
            echo "<p style='color:#5D5855;padding:4px;'>Redirecting you to the Home page...</p>";
            $showSuccess = false;
        ?>
            <script>
                setTimeout(function() {
                    window.location.replace("/food2/homepage/home.php");
                }, 2000);
            </script>
        <?php
        }
        ?>
    </div>
    <div class="container">
        <div class="cont">
            <form class="form" method="POST">
                <h1>Sign Up</h1>
                <div>
                    <input type="email" id="email" name="email" placeholder="E-mail" required>
                </div>
                <div class="valid">
                    <?php
                    if ($exist && isset($_POST['submit'])) {
                        echo "<p style='color:red;text-size:3px'>User with this E-mail already exists!</p>";
                        $exist = false;
                    }
                    ?>
                </div>

                <br>
                <div>
                    <input type="password" id="password" name="password" placeholder="Password" required>
                </div>
                <br>
                <div>
                    <input type="password" id="cpassword" name="cpassword" placeholder="Confirm password" required>
                </div>
                <br>
                <div>
                <input type="text" id="captcha" placeholder="Enter captcha" name="captcha">
                </div>
                
                <br>
                
                <!-- Add an ID to the captcha image tag -->
                <img id="captcha_img" src="captcha.php" alt="captcha"><br>
                
               



               

                <div class="valid">
                    <?php
                    if ((isset($_POST['submit'])) && !$passSame) {
                        echo "<p style='color:red;text-size:3px'>Both passwords do not match!</p>";
                        $passSame = true;
                    }
                    ?>
                </div>

                <br>
                

                <div>
                    <button id="submit" name="submit" type="submit">Sign Up</button>
                </div>
            </form>
            <?php
                    if((isset($_POST['submit'])) ) {
                        
                            if (!isset($_POST['captcha']) || empty($_POST['captcha'])) {
                                echo "Plase enter the captcha code ";
                            } else if ($_SESSION['captcha'] !== $_POST['captcha']) {
                                echo "Please enter the valid captcha code";
                            }
                    }
                    ?>
        </div>
    </div>
</body>

</html>