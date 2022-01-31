<?php
include_once '../include/connect.php';
$title = mysqli_real_escape_string($conn,$_REQUEST['title']);
$sql_soft = "UPDATE music SET is_deleted = 1, delete_at = NOW() WHERE title = '$title'";
$soft = $conn->query($sql_soft) or die ($conn->error);
if ($soft) {
    $_SESSION['success'] = "Đã chuyển nhạc vào thùng rác !";
    echo '<script>history.back()</script>';
}
else {
    $_SESSION['error'] = "Có sự cố xảy ra ! Vui lòng thử lại sau";
    echo '<script>history.back()</script>';
}
?>