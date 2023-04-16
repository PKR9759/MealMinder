<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   <style>
    *{
        background-color: #0ef;
    }
     .card-table {
        display: table;
        width: 100%;
    }

    .card-column {
        display: table-cell;
        vertical-align: middle;
    }

    .card {
        border: none;
        border-radius: 0;
        margin-bottom: 20px;
    }

    .card-img-top {
        width: 300px;
        height: 300px;
        object-fit: cover;
        border-radius: 50%;
    }

    .card-body {
        padding: 10px;
    }

    .card-text {
        margin-bottom: 10px;
    }

    .btn-primary {
      font-size: 80px;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
        background-color: #007bff;
        color: #fff;
        border: none;
        
        border-radius: 4px;
        padding: 12px 20px;
        font-size: 30px;
        cursor: pointer;
       
    }

    .btn-primary:hover {
        background-color: #0069d9;
    }

    .btn-primary:focus {
        outline: none;
        box-shadow: none;
    }
    td.availability {
        vertical-align: middle;
        font-size: 80px;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
        color: green;
    }
    
    td.out-of-stock {
        vertical-align: middle;
        font-size: 80px;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
        color: red;
    }

    .btn-primary:disabled {
      
        opacity: 0.5;
        cursor: not-allowed;
    }

    .h2{
        text-align: center;
        color: #1a1d5b;
        font-weight: 700;
        font-size: 100px;
    }

   </style>

</head>
<body>
    <h2 class="h2"> GUJARAT'S ITEMS</h2>
    <table class="card-table">
        <tr>
            <td class="card-column">
                <div class="card">
                    <img src="food1.jpg" class="card-img-top" alt="...">
                </div>
            </td>
            <td class="card-column availability">
                <p>In Stock</p>
            </td>
            <td class="card-column">
                <button class="btn btn-primary">Buy Now</button>
            </td>
        </tr>
        <tr>
            <td class="card-column">
                <div class="card">
                    <img src="food2.jpg" class="card-img-top" alt="...">
                </div>
            </td>
            <td class="card-column out-of-stock">
                <p>Out of Stock</p>
            </td>
            <td class="card-column">
                <button class="btn btn-primary" disabled>Buy Now</button>
            </td>
        </tr>
        <tr>
            <td class="card-column">
                <div class="card">
                    <img src="food1.jpg" class="card-img-top" alt="...">
                </div>
            </td>
            <td class="card-column availability">
                <p>In Stock</p>
            </td>
            <td class="card-column">
                <button class="btn btn-primary">Buy Now</button>
            </td>
        </tr>
    </table>
</body>
</html>
