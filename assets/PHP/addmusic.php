<?php
session_start();
include_once "../include/connect.php";
$filestatus = 0;
$profile = mysqli_real_escape_string($conn,$_SESSION['proRG']);
$mp3title = mysqli_real_escape_string($conn,$_POST['mp3titleRG']);
$mp3author = mysqli_real_escape_string($conn,$_POST['mp3authorRG']);
$mp3genders = $_POST['mp3genderRG'];
$mp3desc = mysqli_real_escape_string($conn,$_POST['mp3descRG']);
$randomnumber = rand(0,1000000);
// Bắt đầu lấy dữ liệu file ảnh
$pic_path = "../../Profile Storage/$profile/img/";
$pic_name = basename($_FILES['mp3pictureRG']['name']);
$pic_pathname = $pic_path . $pic_name;
$pic_info = strtolower(pathinfo($pic_pathname, PATHINFO_EXTENSION));
$pic_rename = $profile."_musicpicture_".date("Ymd").$randomnumber;
$pic_newname = $pic_rename.".".$pic_info; 
$pic_pathnewname = $pic_path.$pic_newname;
// Lấy dữ liệu file ảnh kết thúc
// Kiểm tra ảnh của music
$sql_check="SELECT picture FROM music WHERE picture = '$pic_name'";
$check = $conn -> query($sql_check) or die ($conn->error);
// Kiểm tra xem thể loại đã được chọn chưa ?
if ($mp3genders == "Chọn thể loại nhạc") {
    $_SESSION['error'] = "Bạn chưa chọn thể loại !";
    header ('location:../../uploadmusic.php');
}
else {
// Kiểm tra file dưới 4MB hay không ?
if ($_FILES['mp3pictureRG']['size']<4194304) {
    // Kiểm tra file có phải jpg/png không ?
    if ($pic_info = "jpg" || $pic_info = "png") {
    $filestatus++;
}
else {
    $_SESSION['error'] = "Không đúng định dạng ảnh được cho phép";
    header ('location:../../uploadmusic.php');
}
}
else {
    $_SESSION['error'] = "Ảnh quá dung lượng cho phép không thể thêm lên";
    header ('location:../../uploadmusic.php');
}

// Kết thúc kiểm tra ảnh của music
// Bắt đầu lấy dữ liệu các file
$file_path = "../../Profile Storage/$profile/music/";
$file_name = basename($_FILES['mp3fileRG']['name']);
$file_pathname = $file_path . $file_name;
$file_info = strtolower(pathinfo($file_pathname, PATHINFO_EXTENSION));
$file_rename = $profile."_music_".date("Ymd").$randomnumber;
$file_newname = $file_rename.".".$file_info; 
$file_pathnewname = $file_path.$file_newname;
// Lấy dữ liệu các file kết thúc
// Kiểm tra file của music
$sql_checkfile="SELECT soundfile FROM music WHERE soundfile = '$file_name'";
$checkfile = $conn -> query($sql_checkfile) or die ($conn->error);
// Kiểm tra file dưới 100MB hay không ?
if ($_FILES['mp3fileRG']['size']<104857600) {
    // Kiểm tra file có phải mp3 không ?
    if ($file_info = "mp3") {
        $filestatus++;
}
else {
    $_SESSION['error'] = "Không đúng định dạng file được cho phép";
    header ('location:../../uploadmusic.php');
}
}
else {
    $_SESSION['error'] = "File quá dung lượng cho phép không thể thêm lên";
    header ('location:../../uploadmusic.php');
}
// Kết thúc kiểm tra file của music
// Băt đầu quy trình thêm dữ liệu
if($filestatus==2) {
    move_uploaded_file($_FILES['mp3pictureRG']['tmp_name'],$pic_pathnewname);
    move_uploaded_file($_FILES['mp3fileRG']['tmp_name'],$file_pathnewname);
    $sql_addmusic = "INSERT INTO music(music_id,title,author,gender,create_at,create_by,soundfile,picture,description) VALUES (UUID(),'$mp3title','$mp3author','$mp3genders',NOW(),'$profile','$file_newname','$pic_newname','$mp3desc')";
    $addmusic = $conn->query($sql_addmusic) or die($conn->error);
    $_SESSION['success'] = "Nhạc đã được đăng lên thành công !";
    header ('location:../../uploadmain.php');
}
else {
    $_SESSION['error'] = "Có sự cố hệ thống ! Hãy thử lại sau";
    header ('location:../../uploadmain.php');
}
}
$conn -> close();
?>