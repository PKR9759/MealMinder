<?php
//connecting to the database
$servername = "localhost";
$username="root";
$password="";
$database="lucky";

//create a connection
$conn =  mysqli_connect($servername,$username,$password,$database);

if (!$conn) {
    die("Sorry we failed to connect: ". mysqli_connect_error());

}
else{
    echo "Connection was successful";
}
$sql = "SELECT * FROM `trip2`";
$result = mysqli_query($conn , $sql);
//find the records 
$num = mysqli_num_rows($result);
echo $num;

if ($num) {
    // $row = mysqli_fetch_assoc($result);
    // echo var_dump($row);
    // echo "<br>";
    // $row = mysqli_fetch_assoc($result);
    // echo var_dump($row);
    while ($row = mysqli_fetch_assoc($result)) {
        // echo var_dump($row);
        // echo "<br>";
        echo $row['sno']." hey ".$row['name']." say ".$row['destination'];
        echo "<br>";
    }

}
        ?>