<?php
session_start();
include_once './connect.php';
$email = $_POST['emailget'];
$sql_checkemail = "SELECT * FROM profile WHERE email='$email'";
$checkemail = $conn->query($sql_checkemail) or die($conn->error);
while ($row = $checkemail->fetch_assoc()) {
    $getemail = $row['email'];
}
if ($checkemail) {
    $code = rand(111111,999999);
    $sql_safe_code = "UPDATE profile SET code='$code' WHERE email='$email'";
    $safe_code = $conn->query($sql_safe_code) or die($conn->error);
    if($safe_code) {
        $to_email = $email;
        $subject_email = "Khôi phục mật khẩu";
        $message_email = "Mã khôi phục mật khẩu của bạn là: >>> ".$code." <<<";
        $headers = array("<From: kingsoundtrackmp3@gmail.com>",
        "<Reply-To: kingsoundtrackmp3@gmail.com>",
        "X-Mailer: PHP/" . PHP_VERSION
        );
        $headers = implode("\r\n", $headers);
        if (mail($to_email,$subject_email,$message_email,$headers)) {
            $_SESSION['email'] = $getemail;
            $_SESSION['success'] = "Chúng tôi đã gửi 1 mã lấy lại mật khẩu vào mail của bạn ! Nếu không thấy mail hãy thử kiểm tra thư mục spam";
            header('location: ../../code-forgot-pass-page.php');
        }
        else {
            $_SESSION['error'] = "Có sự cố trong việc gửi code ! Thử lại sau";
            header('location: ../../email-forgot-pass-page.php'); 
        }
}
else {
    $_SESSION['error'] = "Không tìm thấy email nào trùng với email trên !";
    header('location: ../../');
}
}
$conn -> close();
?>