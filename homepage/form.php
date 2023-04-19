<?php
include '/Applications/XAMPP/xamppfiles/htdocs/food2/navbar.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    
    <script>
        function validateForm() {
          var name = document.forms["myForm"]["fname"].value;
          var gender = document.forms["myForm"]["gender"].value;
          var number = document.forms["myForm"]["number"].value;
          var email = document.forms["myForm"]["email"].value;
          var feedback = document.forms["myForm"]["feedback"].value;
          var rating = document.forms["myForm"]["rating"].value;
        
          if (name == "" || gender == "" || number == "" || email == "" || feedback == "" || rating == "") {
            alert("Please fill out all fields");
            return false;
          }
        
          if (isNaN(number) || number.length != 10) {
            alert("Please enter a valid 10-digit mobile number");
            return false;
          }
        
          if (email.indexOf("@") == -1 || email.indexOf(".") == -1) {
            alert("Please enter a valid email address");
            return false;
          }
        
          return true;
        }
        </script>
        
    <style>
      
        body{
            background-color:  #1f242d;
            color: #0ef;
         
        }
        h1 {
  font-size: 64px;
}

p {
  font-size: 16px;
}

label {
  font-size: 30px;
}

        fieldset{
            border-radius: 25px;
            text-align: left;
            margin: auto;
            /* top: 20%; */
            width: 50%;
            height: auto;
            justify-content: left;
            font-family: Georgia, 'Times New Roman', Times, serif;
            box-shadow: 1px 1px 10px rgb(117, 117, 50);
        }
        .ok {
  font-size: 40px;
}

form label[for="1star"], 
form label[for="2star"], 
form label[for="3star"], 
form label[for="4star"], 
form label[for="5star"] {
  font-size: 40px;
}

        label {
            font-size: inherit;
            /* display: inline-block; */
  
        }
        input[type="radio"] {
            transform: scale(1.5);
           
        }
        input[type="text"], 
input[type="number"], 
input[type="email"], 
textarea {
    border-radius: 10px;
  width: 100%;
  max-width: 300px; /* Optional, set a maximum width */
  height: 30px; /* Optional, set the height of the input */
  font-size: 24px; /* Optional, set the font size */
}
input[type="radio"] {
  position: relative;
  left: -2px; /* Adjust this value to move the radio button left or right */
  top: -8px; /* Adjust this value to move the radio button up or down */
}

.button{
  display: inline-flex;
        justify-content: center;
        align-items: center;
    border-radius: 5px;
    width: 15%;
    height: 30px;
    font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    font-size: 24px; 
    padding: 12px 28px;
    background: #0ef;
    border-radius: 50px;
    box-shadow: 0 0 10px #0ef;
    color: #1f242d;
    letter-spacing: 1px;
    text-decoration: none;
    font-weight: 600; 
    opacity: 0;
    animation: slideTop 1s ease forwards;
    animation-delay: 1s ;
}
        form label {
  font-size: 30px;
  
}

form {
    text-align: center;
  font-size: 28px;
}
@keyframes slideTop{
    0%{
        opacity: 0;
        transform: translateY(100px);

    }
    100%{
        transform: translateY(0px);
        opacity: 1;
    }
}
    </style>
</head>
<body>


    <form  action="feedback.php"  method="post">
        <h1 class="h1"><b>Feedback Form</b></h1>
        <fieldset>
            <div>
                <label for="fname" >Name:</label>
                <input type="text" id="fname" name="fname" placeholder="fname_lastname" ><br>
            </div>
            <br>
            <div>
                <label for="gender">Gender:</label>
            </div>
            <div style="padding-left: 50px;">
                <input type="radio" id="male" name="gender" value="male">
                <label for="male">Male</label><br>
                <input type="radio" id="female" name="gender" value="female">
                <label for="female">Female</label><br>
                <input type="radio" id="ok" name="gender" value="ok">
                <label for="ok">Rather Not to Say</label><br>
            </div>
            <br>
            <div>
                <label for="number">Mobile No:</label>
                <input type="number" id="number" name="number" placeholder="Your Mobile Number" maxlength="10">
            </div>
            <div><br>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="....@email.com">
            </div><br>
            <div>
                <label for="feedback">Feedback:</label>
                <textarea id="feedback" name="feedback" placeholder="Give your valuable feedback here"></textarea>
            </div>
            
            <div >
                <h3 class="ok">RATE US</h3>
                <input type="radio" name="rating" id="1star"  value="1">
                <label for="1star" >🙅‍♂️</label>
                <input type="radio" name="rating" id="2star" value="2">
                <label for="2star">🙍</label>
                <input type="radio" name="rating" id="3star" value="3">
                <label for="3star">🙂</label>
                <input type="radio" name="rating" id="4star" value="4">
                <label for="4star">🤩</label>
                <input type="radio" name="rating" id="5star" value="5">
                <label for="5star">🤯</label>

            </div>
            

            <button type="submit" class="button">Submit</button>
            <button type="reset" style="margin-left: 20px;" class="button">Reset</button>
        </fieldset>
    </form>
</body>
</html>

