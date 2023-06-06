<?php
session_start();
if (!isset($_POST['captcha']) || empty($_POST['captcha'])) {
$_SESSION['message'] = 'Please enter the captcha code';
?>
<script>
    location.replace('registration.php');
</script>
<?php
}
// Check if captcha code is valid
if ($_SESSION['CAPTCHA_CODE'] !== $_POST['captcha']) {
$_SESSION['message'] = 'Please enter the Valid captcha code';
  
  die('Invalid captcha code');
}

unset($_SESSION['captcha']);
?>
