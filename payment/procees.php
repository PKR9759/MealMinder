<?php
    $server="localhost";
    $username="root";
    $pass="";
    $db="rbh2";

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
    mysqli_query($conn,"insert into payment1 (name,payment_id,amount,payment_status,added_on) values('$name','$payment_id','$amt','$payment_status',current_timestamp())");
}
// INSERT INTO `payment` (`id`, `name`, `payment_id`, `amount`, `payment_status`, `added_on`) VALUES (NULL, 'lakhman', 'shfdlhsalf@okdsf', '10', 'success', current_timestamp());
?>

