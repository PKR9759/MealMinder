
<?php
include '/Applications/XAMPP/xamppfiles/htdocs/food2/navbar.php';
?>
<!DOCTYPE html>
<html>
<head>
  <title>Food Token Website Feedback Form</title>
  <!-- Link to Bootstrap CSS stylesheet -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+JQLh1ZiPKGmU6YlZkkV95S6sN9uHp6" crossorigin="anonymous">
</head>
<style>
  body{
    background-color: #1f242d;
            color: whitesmoke;
  }
</style>
<body>
  <div class="container mt-5">
    <h2>Feedback Form</h2>
    <form action="action.php" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="fname">Name:</label>
        <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter your name" required>
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" name="email"  placeholder="Enter your email" required>
      </div>
      <div class="form-group">
        <label for="feedback">Feedback:</label>
        <textarea class="form-control" id="feedback" name="feedback" rows="5" placeholder="Enter your feedback" required></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>

  <!-- Link to jQuery and Bootstrap JS scripts -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmIw7WJj49Uz1yJLvRWg"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
    integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+JQLh1ZiPKGmU6YlZkkV95S6sN9uHp6"
    crossorigin="anonymous"></script>
</body>
</html>
