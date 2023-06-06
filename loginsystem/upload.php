<?php    
// Database connection
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'rbh');

/* Attempt to connect to MySQL/MariaDB database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

if (isset($_POST["submit"])) {
    // Set image placement folder 
    $target_dir = "C:/xampp2/htdocs/food2/cart/img_dir/";
    
    // Get file path
    $target_file = $target_dir . basename($_FILES["fileUpload"]["name"]);
    // Get file extension
    $imageExt = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    // Allowed file types
    $allowd_file_ext = array("jpg", "jpeg", "png","webp");

    if (!file_exists($_FILES["fileUpload"]["tmp_name"])) {
        $resMessage = array(
            "message" => "Select image to upload.",
        );
    } else if (!in_array($imageExt, $allowd_file_ext)) {
        $resMessage = array(
            "message" => "Allowed file formats .jpg, .jpeg and .png.",
        );
    } else if ($_FILES["fileUpload"]["size"] > 209715234) {
        $resMessage = array(
            "message" => "File is too large. File size should be less than 2 megabytes.",
        );
    } else if (file_exists($target_file)) {
        $resMessage = array(
            "message" => "File already exists.",
        );
    } else {
        if (move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $target_file)) {
            $name = $_POST["name"];
            $price = $_POST["price"];
            $description = $_POST["description"];
            $aviability = $_POST["aviability"];
            $category = $_POST["category"];
            $param_path = $target_file;

            if ($category == 1) {
                $sql = "INSERT INTO `Gujarati_items` (`id`, `file_path`, `name`, `price`, `description`, `aviability`) 
                        VALUES (NULL, ?, ?, ?, ?, ?)";
            } else if ($category == 2) {
                $sql = "INSERT INTO `Punjabi_items` (`id`, `file_path`, `name`, `price`, `description`, `aviability`) 
                        VALUES (NULL, ?, ?, ?, ?, ?)";
            }
            else if ($category == 3) {
                $sql = "INSERT INTO `chinese_items` (`id`, `file_path`, `name`, `price`, `description`, `aviability`) 
                        VALUES (NULL, ?, ?, ?, ?, ?)";
            }
            else if ($category == 4) {
                $sql = "INSERT INTO `south_items` (`id`, `file_path`, `name`, `price`, `description`, `aviability`) 
                        VALUES (NULL, ?, ?, ?, ?, ?)";
            }else   {
                $sql = "INSERT INTO `snacks` (`id`, `file_path`, `name`, `price`, `description`, `aviability`) 
                        VALUES (NULL, ?, ?, ?, ?, ?)";
            }

            $stmt = mysqli_prepare($link, $sql);
            mysqli_stmt_bind_param($stmt, "sssss", $param_path, $name, $price, $description, $aviability);
            
            if (mysqli_stmt_execute($stmt)) {
                $resMessage = array(
                    "message" => "File uploaded successfully.",
                );
            } else {
                $resMessage = array(
                    "message" => "Error uploading file.",
                );
            }
        } else {
            $resMessage = array(
                "message" => "Error uploading file.",
            );
        }
    }
}
?>
