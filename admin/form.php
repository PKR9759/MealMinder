<?php 
    include 'C:\xampp2\htdocs\food2\admin\nav.php';
    include 'C:\xampp2\htdocs\food2\loginsystem\conn.php';

if(isset($_POST['additem'])){
    $name=$_POST['name'];
    $price=$_POST['price'];
    $path=$_POST['url'];

    $q="INSERT INTO `gujarati_items` ( `file_path`, `name`, `price`, `description`, `availability`) VALUES ('$path', '$name', '$price', '', '1')";
    $result = mysqli_query($conn, $q);

        //find the number of records if greater than zero we will do further process
        
        if ($result) {
            echo '<p style="color:green">Item <b> '.$name.'</b> inserted Succesfully</p>';
        }
        else{
            echo '<p style="color:red"> Something went Wrong try again later !!</p>';

        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css2?family=Tilt+Prism&display=swap
            |Audiowide&Righteous&display&Alfa+Slab+One&Titan+One&display?Acme&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
        }
        
        .container {
            width: 100%;
            display: flex;
            justify-content: center;
        }
        
        .contform {
            margin: 50px;
            padding: 50px;
            /* border: solid black; */
            box-shadow: 0px 0px 10px #f49644;
            border-radius: 30px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            margin-left: 20px;
            width: 500px;
            background-color: white;
        }
        
       
        input,
        select {
            width: 100%;
            padding: 10px;
            /* margin-bottom: 20px; */
            font-size: 16px;
            border: none;
            border-radius: 20px;
            background-color: #f4f4f4;
        }
        
       
        
        label {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 10px;
            font-family: Arial, sans-serif;
        }
        
        input[type="radio"] {
            margin-right: 10px;
        }
        
        
        input[type='submit']
        {
            color: #fff;
            background-color: #f49644;
            border: none;
            border-radius: 20px;
            padding: 10px 20px;
            cursor: pointer;
            transition: all 0.2s ease-in-out;
            width: 30%;
            margin: 7% 0px 0px 6%;
        }
        
        input[type='submit']:hover
        {
            background-color: #cf7c34;
        }
        
        .btn {
            display: flex;
            justify-content: center;
        }
        
        input:focus,
        select:focus {
            outline: none;
            border: 2px solid #f49644;
        }
        
        p {
            font-size: 20px;
            font-weight: bold;
            font-family: Arial, sans-serif;
            margin-bottom: 20px;
        }
    </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

<body>
    
    <div class="container">


        <div class="contform">
            <h2>Fill Item Details to Add item</h2>
            <form method="POST" width="60%" autocomplete="on">
                
                <input type="text" id="name" name="name" placeholder="Name Of Item" required>
                <br><br>
                <input type="number" id="price" name="price" placeholder="Price" required>
                <br><br> 
                <input type="text" id="url" name="url" name="url" placeholder="URL of Image of Food Item" required>
                <br><br>

                <!-- <div class="caterory"> -->
                <!-- <select id="category" name="category" class="category" required>
			        <option value="">-- Please select a category --</option>
			        <option value="Category 1">Gujrati Items</option>
			        <option value="Category 2">Punjabi Items</option>
			        <option value="Category 3">Chinese Items</option>
			        <option value="Category 4">Jain Items</option>
			        <option value="Category 5">Snacks</option>
		        </select> -->
                <!-- </div> -->

                <div class="btn">

                    
                    <input type="submit" name="additem" value="Add Item" title="Add Item">
                </div>
            </form>
        </div>
    </div>



</body>

</html>





    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>