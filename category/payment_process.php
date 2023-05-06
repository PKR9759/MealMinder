<?php
session_start();
    $random_number = rand(1, 100000);
      $random_number=md5($random_number);
      
$_SESSION['token'] = $random_number;
    $server="localhost";
    $username="root";
    $pass="";
    $db="rbh";

    $conn=mysqli_connect($server,$username,$pass,$db);
    if(!$conn){
        die("connection failed".mysqli_connect_error());
    }
    else
    {
        echo "connection sucessfull";
    }
if(isset($_POST['payment_id'])&&isset($_POST['amt'])&&isset($_POST['name'])){
    $payment_id = $_POST['payment_id'];
    $amt = $_POST['amt'];
    $name = $_POST['name'];
    $payment_status="success";
    $added_on=date('Y-m-d h:i:s');
    $token=$random_number;
    mysqli_query($conn,"insert into payment(name,payment_id,amount,payment_status,token,added_on) values('$name','$payment_id','$amt','$payment_status','$token',current_timestamp())");
}
// INSERT INTO `payment` (`id`, `name`, `payment_id`, `amount`, `payment_status`, `added_on`) VALUES (NULL, 'lakhman', 'shfdlhsalf@okdsf', '10', 'success', current_timestamp());
?>


