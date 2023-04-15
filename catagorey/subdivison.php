<!DOCTYPE html>
<html>
  <head>
    <title>Table Example</title>
    <style>
      table {
        border-collapse: collapse;
        width: 100%;
      }
      th, td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
      }
      th {
        background-color: #4CAF50;
        color: white;
      }
      tr:nth-child(even) {
        background-color: #f2f2f2;
      }
      tr:hover {
  background-color: orange;
}

      
    </style>
  </head>
  <body>
   

    <?php
    //connecting to the database
    $servername = "localhost";
    $username="root";
    $password="";
    $database="rbh";
    //creating a connection
$conn = mysqli_connect($servername,$username,$password,$database);

if (!$conn) {
    die("sorry we failed to connect:" . mysqli_connect_error());
} 

$sql = "SELECT * FROM `items`";
$result = mysqli_query($conn,$sql);

//find the number of records if greater than zero we will do further process
$num = mysqli_num_rows($result);
if ($num) {
    // start of table
    echo "<table >";
    
    // table header row
    echo "<tr>";
    echo "<th>Sr No.</th>";
    echo "<th>Name</th>";
    echo "<th>photo</th>";
    
    echo "</tr>";
    
    // table data rows
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td><img src='" . $row['photo'] . "' alt='item photo'></td>";
        
        echo "</tr>";
    }
    
    // end of table
    echo "</table>";
}
?>
</body>
</html>