<?php
include_once "../include/connect.php";
$account = mysqli_real_escape_string($conn,$_POST['proRG']);
$name = mysqli_real_escape_string($conn,$_POST['nameRG']);
$gender = mysqli_real_escape_string($conn,$_POST['genderRG']);
$address = mysqli_real_escape_string($conn,$_POST['addressRG']);
$phone = $_POST['phoneRG'];
$email = $_POST['emailRG'];
$randomnumber = rand(0,1000000);
$pic_path = "../../Profile Storage/$account/img/";
$pic_name = basename($_FILES['pictureRG']['name']);
$pic_pathname = $pic_path . $pic_name;
$pic_info = strtolower(pathinfo($pic_pathname, PATHINFO_EXTENSION));
$pic_rename = $profile."_profilepicture_".date("Ymd").$randomnumber;
$pic_newname = $pic_rename.".".$pic_info; 
$pic_pathnewname = $pic_path.$pic_newname;
// Xoá ảnh cũ
$sql_oldpic = "SELECT picture FROM profile WHERE account = '$account'";
$oldpic = $conn->query($sql_oldpic) or die($conn->error);
while ($row = $oldpic->fetch_assoc()) {
    $oldpicname = $row['picture'];
}
// Kết thúc xóa ảnh cũ
// Kiểm tra giới tính được chọn
if ($gender == "Chọn giới tính") {
    $_SESSION['error'] = "Bạn chưa chọn giới tính";
    header('location: ../../editprofilepage.php');
}
else {
// Kiểm tra số điện thoại
if(isset($_POST['phoneRG'])) {
    $sql_phone = "SELECT phone FROM profile WHERE phone = '$phone'";
    $check_phone = $conn->query($sql_phone) or die($conn->error);
    if ($check_phone->num_rows>0) {
        $_SESSION['error'] = "Số điện thoại đã tồn tại trên hệ thống";
        header('location: ../../editprofilepage.php');
    }
    // Kết thúc if chuyển sang else các điều kiện của ảnh
    else {
        // Kiểm tra file dưới 4MB hay không ?
        if ($_FILES['pictureRG']['size']<4194304) {
        // Kiểm tra file có phải jpg/png không ?
        if ($pic_info = "jpg" || $pic_info = "png") {
            // Thực hiện xóa ảnh cũ nếu hoàn thành tất cả điều kiện trên
            if (isset($pic_name) && !empty($pic_name)) {
            unlink($pic_path.$oldpicname);
            }
            else {}
            // Thực hiện xóa ảnh cũ nếu hoàn thành tất cả điều kiện trên
            move_uploaded_file($_FILES['pictureRG']['tmp_name'],$pic_pathnewname);
            $sql_edit = "UPDATE profile SET ";
            if (!empty($name)) {
                $sql_edit .= "name = '$name',";
            }
            if (!empty($gender)) {
                $sql_edit .= "gender = '$gender',";
            }
            if (!empty($address)) {
                $sql_edit .= "address = '$address',";
            }
            if (!empty($phone)) {
                $sql_edit .= "phone ='$phone',";
            }
            if (!empty($email)) {
                $sql_edit .= "email = '$email',";
            }
            if (!empty($pic_name)) {
                $sql_edit .= "picture = '$pic_newname',";
            }
            $sql_edit = rtrim($sql_edit, ',');
            $sql_edit .= " WHERE account = '$account'";
        $edit_result = $conn->query($sql_edit) or die($conn->error);
        if ($edit_result) {
            $_SESSION['success'] = "Cập nhật thông tin cá nhân thành công !";
            header('location: ../../');
        }
        else {
            $_SESSION['error'] = "Có sự cố ! Hãy thử lại sau";
            header('location: ../../editprofilepage.php');
        }
        }
        else {
            $_SESSION['error'] = "Không đúng định dạng ảnh được cho phép";
            header('location: ../../editprofilepage.php');
        }
        }
        else {
            $_SESSION['error'] = "Ảnh quá dung lượng cho phép không thể thêm lên";
            header('location: ../../editprofilepage.php');
        }
        }
    }
}
    $conn -> close();
?>