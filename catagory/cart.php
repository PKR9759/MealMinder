<head>
    
    <!-- Add the Tailwind CSS CDN -->
  
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<?php
include '/Applications/XAMPP/xamppfiles/htdocs/food2/navbar.php';
?>
<?php
session_start();
if (isset($_POST['item_id'])) {
    $new_item = array(
        'id' => $_POST['item_id'],
        'name' => $_POST['item_name'],
        'price' => $_POST['item_price'],
        'path' => $_POST['path']

    );

    $item_names = array_column($_SESSION['cart'], 'name');
    $item_index = array_search($new_item['name'], $item_names);

    if ($item_index !== false) {
        $_SESSION['cart'][$item_index]['price'] += $new_item['price'];
    } else {
        $_SESSION['cart'][] = $new_item;
    }
}

if (isset($_SESSION['cart'])) {
    echo '<h4>Cart</h4>';
    echo '<div class="table-responsive">';
    echo '<table class="table table-bordered table-hover">';
    echo '<thead class="thead-light">';
    echo '<tr>';
    echo '<th scope="col">#</th>';
    echo '<th scope="col">Name</th>';
    echo '<th scope="col">Price</th>';
    echo '<th scope="col">Photo</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    $total_price = 0;
    $unique_items = array();
    foreach ($_SESSION['cart'] as $index => $item) {
        if (!in_array($item['name'], $unique_items)) {
            $unique_items[] = $item['name'];
            echo '<tr>';
            echo '<th scope="row">' . (count($unique_items)) . '</th>';
            echo '<td>' . $item['name'] . '</td>';
            echo '<td>$' . $item['price'] . '</td>';

            echo '<td><img src="' . $item['path'] . '" alt="' . $item['name'] . '" width="100px"></td>';
            echo '</tr>';
            $total_price += $item['price'];
        }
    }
    echo '<tr>';
    echo '<th scope="row"></th>';
    echo '<td>Total Price</td>';
    echo '<td>$' . $total_price . '</td>';
    echo '</tr>';
    echo '</tbody>';
    echo '</table>';
    echo '</div>';
}

?>
