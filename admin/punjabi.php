<?php
include 'nav.php';
include '/Applications/XAMPP/xamppfiles/htdocs/food2/loginsystem/conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['save'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $path = $_POST['url'];
        $avail = $_POST['aviability'];

        $sql = "UPDATE `punjabi_items` SET `file_path` = '$path', `name` = '$name', `price` = '$price', `aviability` = '$avail' WHERE `id` = $id";
        $result = mysqli_query($conn, $sql);
    }

    if (isset($_POST['remove'])) {
        $id = $_POST['id'];
        $q1 = "DELETE FROM `punjabi_items` WHERE `id` = $id";
        mysqli_query($conn, $q1);
    }
}

$sql = "SELECT * FROM `punjabi_items`";
$result = mysqli_query($conn, $sql);

$num = mysqli_num_rows($result);
?>
<!DOCTYPE html>ˀ
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 font-sans">
    <div class="container mx-auto px-4 py-8">
        <h3 class="text-3xl font-semibold mb-4">Admin Panel - Item List</h3>

        <?php
        $tablename = "punjabi_items";
        //  echo $tablename;
        if ($num) {
            echo '<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">';

            while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="relative rounded-lg overflow-hidden shadow-md bg-white">';
                echo '<button onclick="openModal(' . $row['id'] . ')" class="absolute top-0 right-0 m-2 bg-blue-500 text-white text-sm font-bold py-1 px-2 rounded-lg">Edit</button>';
                echo '<img class="w-full h-48 object-cover object-center" src="' . $row['file_path'] . '" alt="' . $row['name'] . '">';
                echo '<div class="p-4">';
                echo '<h4 class="text-xl font-semibold mb-2">' . $row['name'] . '</h4>';
                echo '<p class="text-gray-700 mb-2">Availability: ' . $row['aviability'] . '</p>';
                echo '<div class="flex justify-between">';
                echo '<p class="text-gray-700">Price: $' . $row['price'] . '</p>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
            echo '</div>';
            echo '<form action="form.php" method="POST">';
    echo '<input type="hidden" id="tablename" name="tablename" value="' . $tablename . '" />';
   
    echo '<button type="submit" class="fixed bottom-10 right-10 bg-blue-500 text-white py-3 px-6 rounded-full shadow-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-opacity-50">Add Item</button>';
    echo '</form>';
        }
        
        ?>
         
        <!-- Modal -->
        <div id="editModal" class="hidden fixed top-0 left-0 z-50 w-full h-full bg-gray-800 bg-opacity-50">
            <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-white p-6 rounded shadow-md">
                <span onclick="closeModal()" class="absolute top-2 right-2 text-gray-600 cursor-pointer">&times;</span>
                <!-- Form for editing item details -->
                <div class="w-80 mx-auto">
                    <h2 class="text-2xl font-semibold mb-4">Edit Item</h2>
                    <input type="hidden" name="id" id="itemId">
                    <input type="text" name="name" id="itemName" placeholder="Item Name" class="block w-full border border-gray-300 rounded py-2 px-3 mb-3 focus:outline-none focus:border-blue-500">
                    <input type="text" name="url" id="itemURL" placeholder="Image URL" class="block w-full border border-gray-300 rounded py-2 px-3 mb-3 focus:outline-none focus:border-blue-500">
                    <input type="text" name="aviability" id="itemAviability" placeholder="Availability" class="block w-full border border-gray-300 rounded py-2 px-3 mb-3 focus:outline-none focus:border-blue-500">
                    <input type="text" name="price" id="itemPrice" placeholder="Price" class="block w-full border border-gray-300 rounded py-2 px-3 mb-3 focus:outline-none focus:border-blue-500">
                    <div class="flex justify-center">
                        <button onclick="saveChanges()" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mr-2" type="button" id="save">Save</button>
                        <button onclick="removeItem()" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">Delete</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Your JavaScript code -->
        <script>
            function openModal(itemId) {
                fetch(`/food2/admin/fetch_items.php?id=${itemId}&table=punjabi_items`)
                    .then(response => response.json())
                    .then(item => {
                      item=item[0];
                        // Accessing specific data (e.g., name and file_path)
                        const itemName = item.name;
                        const itemFilePath = item.file_path;

                        // Use the retrieved data as needed (for example, logging)
                        console.log('Item Name:', itemName);
                        console.log('File Path:', itemFilePath);

                        // Rest of your logic to populate the modal fields
                        document.getElementById('itemId').value = itemId;
                        document.getElementById('itemName').value = itemName;
                        document.getElementById('itemURL').value = itemFilePath;
                        document.getElementById('itemAviability').value = item.aviability;
                        document.getElementById('itemPrice').value = item.price;

                        // Show the modal
                        document.getElementById('editModal').classList.remove('hidden');
                    })
                    .catch(error => {
                        console.error('Error fetching item details:', error);
                    });
            }

            function closeModal() {
                document.getElementById('editModal').classList.add('hidden');
            }

function saveChanges() {
    const id = document.getElementById('itemId').value;
    const name = document.getElementById('itemName').value;
    const url = document.getElementById('itemURL').value;
    const aviability = document.getElementById('itemAviability').value;
    let price = document.getElementById('itemPrice').value;

    // Construct the form data
    const formData = new FormData();
    formData.append('id', id);
    formData.append('name', name);
    formData.append('url', url);
    formData.append('aviability', aviability);
    formData.append('price', price);
    formData.append('save', 'true'); // Set the 'save' key to true to indicate save action

    // Perform POST request to save changes
    fetch('punjabi.php', {
        method: 'POST',
        body: formData
    })
    .then(response => {
        // Handle the response or any additional logic after save
        console.log('Changes saved successfully');
        closeModal(); // Close the modal after saving
        location.reload();
    })
    .catch(error => {
        console.error('Error saving changes:', error);
    });
}

function removeItem() {
    const id = document.getElementById('itemId').value;

    // Construct the form data
    const formData = new FormData();
    formData.append('id', id);
    formData.append('remove', 'true'); // Set the 'remove' key to true to indicate delete action

    // Perform POST request to remove item
    fetch('punjabi.php', {
        method: 'POST',
        body: formData
    })
    .then(response => {
        // Handle the response or any additional logic after deletion
        console.log('Item deleted successfully');
        closeModal(); // Close the modal after deletion
        location.reload();

    })
    .catch(error => {
        console.error('Error deleting item:', error);
    });
}
        </script>
    </div>
</body>

</html>
