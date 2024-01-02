<?php
// Include the necessary files and database connection
include '/Applications/XAMPP/xamppfiles/htdocs/food2/loginsystem/conn.php';

$id = isset($_GET['id']) ? $_GET['id'] : null;
$table = isset($_GET['table']) ? $_GET['table'] : null;

// Validate input values to prevent SQL injection
if ($id !== null && $table !== null) {
    $id = mysqli_real_escape_string($conn, $id);
    $table = mysqli_real_escape_string($conn, $table);

    $sql = "SELECT * FROM $table WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    $data = [];
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
    }

    header('Content-Type: application/json');
    echo json_encode($data);
} else {
    // If id or table is not provided or invalid, return an error message or handle it accordingly
    $error = ['error' => 'Invalid parameters'];
    header('Content-Type: application/json');
    echo json_encode($error);
}
?>
