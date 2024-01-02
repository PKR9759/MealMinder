<?php $tablename = $_POST['tablename']; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="bg-white p-8 rounded shadow-md w-full max-w-md">
        <h2 class="text-2xl font-bold mb-6 text-gray-900">Add Item</h2>
        <form action="" method="POST">
            <!-- Add input field for tablename -->
            <input type="hidden" name="tablename" value="<?php echo $tablename; ?>">

            <!-- Other form fields -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md" id="name" name="name">
            </div>
            <div class="mb-4">
                <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                <input type="text" class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md" id="price" name="price">
            </div>
            <div class="mb-4">
                <label for="url" class="block text-sm font-medium text-gray-700">URL</label>
                <input type="text" class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md" id="url" name="url">
            </div>
            <button type="submit" class="w-full py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" name="additem">Add Item</button>
        </form>
    </div>
</body>
</html>

<?php
// Include the connection file
include '/Applications/XAMPP/xamppfiles/htdocs/food2/loginsystem/conn.php';


// Check if the 'additem' form has been submitted
if (isset($_POST['additem'])) {
    // Get the form data
   $tablename = $_POST['tablename'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $path = $_POST['url'];

    // Prepare the SQL query
    $q = "INSERT INTO `$tablename` ( `file_path`, `name`, `price`, `description`, `aviability`) VALUES ('$path', '$name', '$price', '', '1')";
//var_dump($tablename,$q);
    // Execute the SQL query
    $result = mysqli_query($conn, $q);

    // Check if the query was successful
  if ($result) {
        // If successful, display a success message
        echo '<div class="alert alert-success">Item <b>' . htmlspecialchars($name) . '</b> inserted successfully.</div>';
    } else {
        // If not successful, display an error message
        echo '<div class="alert alert-danger">Failed to insert the item. Please try again later.</div>';
    }

}
?>
