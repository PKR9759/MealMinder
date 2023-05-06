<?php
include 'C:\xampp\htdocs\food2\navbar.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
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
            width: 80%;
            background-color: white;
        }
        
        .head {
            padding: 0;
            margin: 0px 0px 40px 0px;
            text-align: center;
            font-family: 'Acme', sans-serif;
        }
        
        input,
        textarea {
            width: 100%;
            padding: 10px;
            /* margin-bottom: 20px; */
            font-size: 16px;
            border: none;
            border-radius: 20px;
            background-color: #f4f4f4;
        }
        
        textarea {
            resize: vertical;
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
        
        textarea {
            resize: vertical;
            height: 70px;
            min-height: 30px;
        }
        .zip{
            display:flex;
            justify-content: space-around;
            
        }
        .zip input{
            width:28%;
        }
        input[type='submit'],
        input[type='reset'] {
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
        
        input[type='submit']:hover,
        input[type='reset']:hover {
            background-color: #cf7c34;
        }
        
        .btn {
            display: flex;
            justify-content: center;
        }
        
        input:focus,
        textarea:focus {
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
</head>

<body>
    
    <div class="container">


        <div class="contform">
            <form method="get" width="60%" autocomplete="on">
                <div class="head">
                    <h2>Fill up your Shipping Location Details</h2>
                </div>
                <input type="text" id="fname" name="fname" placeholder="Full Name" required>
                <br><br>
                <input type="tel"  pattern="[0-9]{10}" id="m_no" name="m_no" placeholder="Mobile No." required>
                <br><br>
                <textarea name="ad1" placeholder="Address line 1" required></textarea>
                <br><br>

                <textarea name="ad2" placeholder="Address line 2"></textarea>
                <br><br>
                <div class="zip">
                <input type="text" id="city" name="city" placeholder="City"required>
                <br><br>
               
                <input type="text" id="state" name="state" placeholder="State" required>
                <br><br> 
                <input type="text" pattern="^\d{5}(?:[-\s]\d{4})?$" id="postcode" name="postcode" name="lname" placeholder="ZIP/Postel Code" required>
                <br><br>

                </div>
                <br>
                <div class="btn">
                    <input type="submit" value="Save Address" title="Save your Address">
                </div>
            </form>
        </div>
    </div>



</body>

</html>