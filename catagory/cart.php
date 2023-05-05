<?php
include '/Applications/XAMPP/xamppfiles/htdocs/food2/navbar.php';
?>
<?php
session_start();

// get the item details from the form
$item_id = $_POST['item_id'];
$item_name = $_POST['item_name'];
$item_price = $_POST['item_price'];
$item_path = $_POST['path'];

// check if the cart exists in the session
if (!isset($_SESSION['cart'])) {
    // if not, create a new cart
    $_SESSION['cart'] = array();
}

// check if the item is already in the cart
$item_names = array_column($_SESSION['cart'], 'name');
$item_index = array_search($item_name, $item_names);

// add the item to the cart
if ($item_index !== false) {
    // if already in the cart, increase the quantity
    $_SESSION['cart'][$item_index]['quantity'] += 1;
} else {
    // if not, add the item to the cart
    $item = array(
        'id' => $item_id,
        'name' => $item_name,
        'price' => $item_price,
        'path' => $item_path,
        'quantity' => 1
    );
    array_push($_SESSION['cart'], $item);
}

// display the cart table
echo '<h4>Cart</h4>';
echo '<div class="table-responsive">';
echo '<table class="table table-bordered table-hover">';
echo '<thead class="thead-light">';
echo '<tr>';
echo '<th scope="col">#</th>';
echo '<th scope="col">Name</th>';
echo '<th scope="col">Price</th>';
echo '<th scope="col">Photo</th>';
echo '<th scope="col">Quantity</th>';
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
        echo '<td>' . $item['quantity'] . '</td>';
        echo '</tr>';
        $total_price += $item['price'] * $item['quantity'];
    }
}
echo '<tr>';
echo '<th scope="row"></th>';
echo '<td>Total Price</td>';
echo '<td>$' . $total_price . '</td>';
echo '<td></td>';
echo '<td></td>';
echo '</tr>';
echo '</tbody>';
echo '</table>';
echo '</div>';

?>
