<?php
session_start();
include_once "../include/connect.php";
$get_profile = "SELECT * FROM profile WHERE (account='".$_POST['proRG']."' OR email='".$_POST['proRG']."') AND password='".md5($_POST['passRG'])."'";
$get_singin = $conn->query($get_profile) or die($conn->error);
$row = $get_singin->fetch_array();
    if (is_array($row)) {
        $_SESSION['proRG'] = $row['account'];
        header('location:../../');
    }
    else {
        $_SESSION['error'] = "Tên tài khoản hoặc mật khẩu không hợp lệ";
        header('location:../../');
    }
$conn -> close();
?>