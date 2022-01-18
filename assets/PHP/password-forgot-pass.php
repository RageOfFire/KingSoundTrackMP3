<?php
session_start();
include_once "../include/connect.php";
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
}
$message = "";
$password = mysqli_real_escape_string($conn,md5($_POST['passget']));
$repassword = mysqli_real_escape_string($conn,md5($_POST['repassget']));
if ($password == $repassword) {
    $sql_updatepass = "UPDATE profile SET password = '$password' WHERE email='$email'";
    $updatepass = $conn->query($sql_updatepass) or die($conn->error);
    if($updatepass) {
        $_SESSION['success'] = "Mật khẩu đã được khôi phục thành công !";
        header('location: ../../');
        unset($_SESSION['email']);
        session_destroy();
    }
    else {
        $_SESSION['error'] = "Có sự cố gì đó rồi !";
        header('location: ../../password-forgot-pass-page.php');
    }
}
else {
    $_SESSION['error'] = "Mật khẩu không trùng khớp nhau !";
    header('location: ../../password-forgot-pass-page.php');
}
$conn -> close();
?>