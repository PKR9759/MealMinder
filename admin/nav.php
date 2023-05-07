<?php
include 'C:\xampp\htdocs\food2\loginsystem\conn.php';
?>
<!doctype html>
<html lang="en">

<head>
  <style>
    
     .nav{
      float:left;
      height:100vh;
      width:20%;
      background-color: black;
     }
     .nav a{
      width:240px;
     }
     .content{
      width:74%;
      float:right;
      margin:0px 12px;
      font-family: 'Fjalla One', sans-serif;
     }
  </style>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap|Fjalla+One&display=swap" >
  
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <title>Admin navbar</title>
</head>

<body>
  
  <div class="nav">
  <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
  <a  href="/food2/admin/home.php"class="nav-link active" id="v-pills-home-tab" data-toggle="pill"  role="tab" aria-controls="v-pills-home" aria-selected="true">Home</a>
  <a href="/food2/admin/guj.php" class="nav-link"  data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Gujrati Items</a>
  <a href="/food2/admin/guj.php" class="nav-link" id="v-pills-messages-tab" data-toggle="pill"  role="tab" aria-controls="v-pills-messages" aria-selected="false">Punjabi Items</a>
  <a href="/food2/admin/guj.php" class="nav-link" id="v-pills-settings-tab" data-toggle="pill"  role="tab" aria-controls="v-pills-settings" aria-selected="false">Chinese Items</a>
  <a href="/food2/admin/guj.php" class="nav-link" id="v-pills-settings-tab" data-toggle="pill"  role="tab" aria-controls="v-pills-settings" aria-selected="false">Snacks</a>
  <a href="/food2/admin/guj.php" class="nav-link" id="v-pills-settings-tab" data-toggle="pill"  role="tab" aria-controls="v-pills-settings" aria-selected="false">Jain Items</a>
</div>
<div class="tab-content" id="v-pills-tabContent">
  <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">...</div>
  <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">...</div>
  <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">...</div>
  <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">...</div>
</div>
  </div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>