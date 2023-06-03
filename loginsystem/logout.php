<?php 
 session_start();
if(!isset($_SESSION['logedin']) || !$_SESSION['logedin']){
    header("location:login.php");
    exit();
}
else{
    
}
session_unset();
session_destroy();                                                                
header("location:login.php");
exit;
?>