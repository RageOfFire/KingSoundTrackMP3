<?php
include_once '../include/connect.php';
$title = mysqli_real_escape_string($conn,$_REQUEST['title']);
$sql_restore = "UPDATE music SET is_deleted = 0, delete_at = NULL WHERE title = '$title'";
$restore = $conn->query($sql_restore) or die ($conn->error);
if ($restore) {
    $_SESSION['success'] = "Đã khôi phục nhạc thành công !";
    echo '<script>history.back()</script>';
}
else {
    $_SESSION['error'] = "Có sự cố xảy ra ! Vui lòng thử lại sau";
    echo '<script>history.back()</script>';
}
?>