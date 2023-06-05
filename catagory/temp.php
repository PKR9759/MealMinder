<?php
include '/Applications/XAMPP/xamppfiles/htdocs/food2/navbar.php';
?>
<h1>chalo openssl_free_key</h1>
<?php
$email = $_SESSION['name'] ;
$emailParts = explode("@", $email);
$done= $emailParts[0];

echo $done;
?>