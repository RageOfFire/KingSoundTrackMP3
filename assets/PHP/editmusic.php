<?php
session_start();
include_once "./connect.php";
$profile = $_SESSION['proRG'];
$mp3file = $_POST['mp3fileRG'];
$mp3title = $_POST['mp3titleRG'];
$mp3author = $_POST['mp3authorRG'];
$mp3genders = $_POST['mp3genderRG'];
$mp3desc = $_POST['mp3descRG'];
// Bắt đầu lấy dữ liệu các file
$pic_path = "../../Profile Storage/$profile/img/";
$pic_name = basename($_FILES['mp3pictureRG']['name']);
$pic_pathname = $pic_path . $pic_name;
$pic_info = strtolower(pathinfo($pic_pathname, PATHINFO_EXTENSION));
// Lấy dữ liệu các file kết thúc
// Chuẩn bị ảnh cũ
$sql_oldpic = "SELECT picture FROM music WHERE soundfile = '$mp3file'";
$oldpic = $conn->query($sql_oldpic) or die($conn->error);
while ($row = $oldpic->fetch_assoc()) {
    $oldpicname = $row['picture'];
}
// Kết thúc ảnh cũ
// Kiểm tra xem thể loại có được chọn không ?
if ($mp3genders == "Chọn thể loại nhạc") {
    $_SESSION['error'] = "Bạn chưa chọn thể loại !";
    header ('location: ../../editmusicpage.php?title='.$mp3title);
}
else {
// Kiểm tra ảnh của music
// Kiểm tra file dưới 4MB hay không ?
if ($_FILES['mp3pictureRG']['size']<4194304) {
// Kiểm tra file có phải jpg/png không ?
if ($pic_info = "jpg" || $pic_info = "png") {
    // Thực hiện xóa ảnh cũ nếu hoàn thành tất cả điều kiện trên
    if (isset($pic_name) && !empty($pic_name)) {
        unlink($pic_path.$oldpicname);
    }
    else {
        $_SESSION['error'] = "Không tìm thấy ảnh nào ?";
        header ('location: ../../editmusicpage.php?title='.$mp3title);
    }
    // Thực hiện xóa ảnh cũ nếu hoàn thành tất cả điều kiện trên
    move_uploaded_file($_FILES['mp3pictureRG']['tmp_name'],$pic_pathname);
    $sql_editmusic = "UPDATE music SET ";
    if(!empty($mp3title)) {
        $sql_editmusic .= "title = '$mp3title',";
    }
    if(!empty($mp3author)) {
        $sql_editmusic .= "author = '$mp3author',";
    }
    if (!empty($pic_name)) {
        $sql_editmusic .= "picture = '$pic_name',";
    }
    if (!empty($mp3desc)) {
        $sql_editmusic .= "description = '$mp3desc',";
    }
    $sql_editmusic = rtrim($sql_editmusic, ',');
    $sql_editmusic .= " WHERE soundfile = '$mp3file'";
    $editmusic = $conn->query($sql_editmusic) or die($conn->error);
    $_SESSION['success'] = "Đã cập nhật nhạc thành công !";
    header ('location: ../../uploadmain.php');
}
else {
    $_SESSION['error'] = "Không đúng định dạng ảnh được cho phép";
    header('location: ../../editmusicpage.php?title='.$mp3title);
}
}
else {
    $_SESSION['error'] = "Ảnh quá dung lượng cho phép không thể thêm lên";
    header('location: ../../editmusicpage.php?title='.$mp3title);
}
}
// Kết thúc kiểm tra ảnh của music
$conn -> close();
?>