<?php
    $server="localhost";
    $username="root";
    $pass="";
    $db="rbh2";
    try{
 $conn=mysqli_connect($server,$username,$pass,$db);
    }
    catch(Exception $e)
    {
        echo "An error lakhman  occur red: " . $e->getMessage();
    }
     
 
?>