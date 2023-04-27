<?php include "upload.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP Image Upload Example</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <style>
        body {
            background-color:  #081828;
        }
        form {
            max-width: 500px;
            margin: 50px auto;
            padding: 30px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0px 0px 10px 2px rgba(0,0,0,0.1);
        }
        form label {
            font-weight: bold;
            color: #555;
            margin-bottom: 5px;
            display: block;
        }
        form input, form textarea {
            margin-bottom: 20px;
            border-radius: 5px;
            border: 1px solid #ddd;
            padding: 10px;
            width: 100%;
            font-size: 16px;
            font-family: Arial, sans-serif;
        }
        form input[type="file"] {
            margin-bottom: 0;
            padding: 0;
            border: none;
            font-size: 14px;
        }
        form button[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        form button[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter name">
        </div>
        <div class="form-group">
            <label for="price">Price:</label>
            <input type="number" class="form-control" id="price" name="price" placeholder="Enter price">
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter description"></textarea>
        </div>
       
        <div class="form-group">
            <label for="file">File:</label>
            <input type="file" class="form-control-file" id="chooseFile" name="fileUpload">
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
      
</body>
</html>

<!-- Display response messages -->


<?php if(!empty($resMessage)) {
    echo $resMessage['message'];
}
?>

