<?php
include_once "../include/connect.php";
$account = mysqli_real_escape_string($conn,$_POST['account']);
$oldpass = mysqli_real_escape_string($conn,md5($_POST['oldpassRG']));
$newpass = mysqli_real_escape_string($conn,md5($_POST['newpassRG']));
$renewpass = mysqli_real_escape_string($conn,md5($_POST['renewpassRG']));
$sql_edit = "SELECT password FROM profile WHERE account='$account'";
$result = $conn->query($sql_edit) or die($conn->error);
while ($row=$result->fetch_assoc()) {
    $password_check = $row['password'];
}
if ($newpass === $renewpass) {
    if($oldpass === $password_check) {
        $sql_update = "UPDATE profile SET password='$newpass' WHERE account='$account'";
        $result_pass = $conn->query($sql_update) or die($conn->error);
        if ($result_pass) {
            $_SESSION['success'] = "Mật khẩu đã được đổi thành công";
            header('location: ../../');
        }
        else {
            $_SESSION['error'] = "Có gì đó sai cực sai luôn ";
            header('location: ../../editprofilepage.php');
        }
    }
    else {
        $_SESSION['error'] = "Mật khẩu cũ không đúng !";
        header('location: ../../editprofilepage.php');
    }
}
else {
    $_SESSION['error'] = "Mật khẩu không trùng khớp nhau !";
    header('location: ../../editprofilepage.php');
}
$conn -> close();
?>