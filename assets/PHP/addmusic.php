<?php
session_start();
$filestatus=0;
include_once '../include/connect.php';
$profile = mysqli_real_escape_string($conn,$_SESSION['proRG']);
$mp3title = mysqli_real_escape_string($conn,$_POST['mp3titleRG']);
$mp3author = mysqli_real_escape_string($conn,$_POST['mp3authorRG']);
$mp3genders = $_POST['mp3genderRG'];
$mp3desc = mysqli_real_escape_string($conn,$_POST['mp3descRG']);
// Bắt đầu lấy dữ liệu ảnh
if ($mp3genders != "Chọn thể loại nhạc") {
    $filestatus++;
}
else {
    $_SESSION['error'] = "Bạn chưa chọn thể loại !";
    header ('location: ../../uploadmusic.php');
}
if (isset($_FILES['mp3pictureRG']['name'])) {
$pic_path = "../../Profile Storage/$profile/img/";
$pic_name = mysqli_real_escape_string($conn,basename($_FILES['mp3pictureRG']['name']));
$pic_pathname = $pic_path . $pic_name;
$pic_info = strtolower(pathinfo($pic_pathname, PATHINFO_EXTENSION));
$sql_check="SELECT picture FROM music WHERE picture = '$pic_name' AND create_by = '$profile'";
$check = $conn -> query($sql_check) or die ($conn->error);
if ($check->num_rows=0) {
        if ($_FILES['mp3pictureRG']['size']<4194304) {
            if ($pic_info = "jpg" || $pic_info = "png") {
                $filestatus++;
            }
            else {
                $_SESSION['error'] = "Không đúng định dạng ảnh được cho phép";
                header ('location: ../../uploadmusic.php');
            }
        }
        else {
            $_SESSION['error'] = "Ảnh quá dung lượng cho phép không thể thêm lên";
            header ('location: ../../uploadmusic.php');
        }
    }
else {
    $_SESSION['error'] = "Ảnh đã tồn tại trên hệ thống";
    header ('location: ../../uploadmusic.php');
}
}
// Bắt đầu lấy dữ liệu file
$file_path = "../../Profile Storage/$profile/music/";
$file_name = mysqli_real_escape_string($conn,basename($_FILES['mp3fileRG']['name']));
$file_pathname = $file_path . $file_name;
$file_info = strtolower(pathinfo($file_pathname, PATHINFO_EXTENSION));
$sql_checkfile="SELECT soundfile FROM music WHERE soundfile = '$file_name' AND create_by ='$profile'";
$checkfile = $conn -> query($sql_checkfile) or die ($conn->error);
if ($checkfile->num_rows=0) {
    if ($_FILES['mp3fileRG']['size']>0) {
        if ($_FILES['mp3fileRG']['size']<104857600) {
            if ($file_info = "mp3") {
                $filestatus++;
            }
            else {
                $_SESSION['error'] = "Không đúng định dạng file được cho phép";
                header ('location: ../../uploadmusic.php');
                }
        }
        else {
            $_SESSION['error'] = "File quá dung lượng cho phép không thể thêm lên";
            header ('location: ../../uploadmusic.php');
            }
    }
    else {
    $_SESSION['error'] = "Chưa chọn file nhạc để đăng lên";
    header ('location: ../../uploadmusic.php');
    }
}
else {
    $_SESSION['error'] = "File đã tồn tại trên hệ thống";
    header ('location: ../../uploadmusic.php');
}
if ($filestatus==3) {
    move_uploaded_file($_FILES['mp3pictureRG']['tmp_name'],$pic_pathname);
    move_uploaded_file($_FILES['mp3fileRG']['tmp_name'],$file_pathname);
    $sql_addmusic = "INSERT INTO music(music_id,title,author,gender,create_at,create_by,soundfile,picture,description) VALUES (UUID(),'$mp3title','$mp3author','$mp3genders',NOW(),'$profile','$file_name','$pic_name','$mp3desc')";
    $addmusic = $conn->query($sql_addmusic) or die($conn->error);
    $_SESSION['success'] = "Nhạc đã được đăng lên thành công !";
    header ('location: ../../uploadmain.php');
}
else {
    $_SESSION['error'] = "Có sự cố hệ thống ! Hãy thử lại sau";
    header ('location: ../../uploadmain.php');
}
$conn -> close();
?>