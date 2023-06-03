<?php include "upload.php";



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP Image Upload Example</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
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
        <label for="category">Category:</label>
        <select class="form-control" id="category" name="category">
            <option value="1" id="1">Gujarati</option>
            <option value="2" id="2">Punjabi</option>
            <option value="3" id="3">Chinese</option>
            <option value="4" id="4">Snacks</option>
        </select>
    </div>
  
    <label for="aviability">Availability:</label>
<div>
    <input type="radio" name="aviability" id="aviable" value="1">
    <label for="aviable" class="radio-label green-label">In Stock</label>
    <input type="radio" name="aviability" id="not-aviable" value="0">
    <label for="not-aviable" class="radio-label red-label">Out of Stock</label>
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

