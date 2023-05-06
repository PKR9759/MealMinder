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
            width: 500px;
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
            height: 150px;
            min-height: 50px;
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
    <iframe class="inc" style=" border:none;" src="navbar.html" width="100%" height="80px"></iframe>
    <div class="container">


        <div class="contform">
            <form method="POST" width="60%" autocomplete="on">
                <div class="head">
                    <h2>ADD ITEM</h2>
                </div>
                <input type="text" id="fname" name="fname" placeholder="First Name">
                <br><br>

                <input type="text" id="lname" name="lname" placeholder="Last Name">
                <br><br> <input type="text" id="lname" name="lname" name="lname" placeholder="E-Mail Address">
                <br><br>

                <textarea name="feedback" placeholder="FeedBack"></textarea>
                <br><br>

                <textarea name="suggestion" placeholder="Suggestion"></textarea>


                <br>
                <div class="btn">

                    <input type="reset" name="reset" id="reset">
                    <input type="submit" value="Submit" title="submit your feedback">
                </div>
            </form>
        </div>
    </div>



</body>

</html>