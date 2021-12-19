<?php
/*
Đây là code để thực hiện mỗi khi người dùng xóa 1 nhạc khỏi cơ sở dữ liệu
sẽ cập nhật lại thứ tự cột 'list' trong bảng music dùng trong việc chuyển
tiếp/quay lại nhạc dễ dành hơn
*/
include_once "./connect.php";
$account=$_GET['profile'];
// Reset lại list 
$sql_reset = "SET @autolist :=0;";
$sql_reset .= "UPDATE music set list = @autolist := (@autolist+1);";
$sql_reset .= "ALTER TABLE music AUTO_INCREMENT = 1";
if (mysqli_multi_query($conn, $sql_reset)) {
    do {
    /* Lưu trữ câu lệnh SQL đầu tiên */
    if ($resultlist = mysqli_store_result($conn)) {
    /* Đưa dữ liệu đầu ra để tiếp tục */
    mysqli_free_result($resultlist);
    }   
    }
    /* Tiếp tục với các cậu lệnh SQL tiếp theo */
    while (mysqli_next_result($conn));
    }
    // Reset lại list 
    header('location:../../uploadmain.php');
    $conn -> close();
?>