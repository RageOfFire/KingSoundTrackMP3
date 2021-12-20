<?php
session_start();
include_once "../include/connect.php";
if (isset($_SESSION['email'])) {
$email = $_SESSION['email'];
}
$code = $_POST['codeget'];
$sql_checkcode = "SELECT * FROM profile WHERE email='$email'";
$checkcode = $conn->query($sql_checkcode) or die($conn->error);
while ($row=$checkcode->fetch_array()) {
    $codedb = $row['code'];
}
if ($code = $codedb) {
    $sql_updatecode = "UPDATE profile SET code = NULL WHERE code = '$code'";
    $updatecode = $conn->query($sql_updatecode) or die($conn->error);
    header('location:../../password-forgot-pass-page.php');
}
else {
    $_SESSION['error'] = "Mã không đúng vui lòng thử lại !";
    header('location:../../password-forgot-pass-page.php');
}
$conn -> close();
?>