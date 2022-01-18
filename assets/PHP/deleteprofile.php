<?php
include_once "../include/connect.php";
    $account=mysqli_real_escape_string($conn,$_REQUEST['account']);
    $path = "../../Profile Storage/$account";
// Xóa tất cả folder và folder phụ khi xóa tài khoản người dùng
function deleteAll($path) {
foreach(glob($path.'/*') as $file) {
    if(is_dir($file))
        deleteAll($file);
    else
    unlink($file);
}
rmdir($path);
}
    $sql_del="DELETE FROM music WHERE create_by ='$account'";
    $result=$conn->query($sql_del) or die ($conn->error);
    $sql_del2="DELETE FROM profile WHERE account='$account'";
    $result2=$conn->query($sql_del2) or die ($conn->error);
    if($result && $result2)
    {
        deleteAll($path);
        header('location: ../../ProfileControl.php');
    }
    else
    {
        $_SESSION['error'] = "Có sự cố trong việc xóa người dùng ! Hãy thử lại sau";
        header ('location: ../../ProfileControl.php');
    }
    $conn -> close();
?>