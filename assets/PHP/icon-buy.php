<?php
session_start();
include_once "./connect.php";
$item_shop = $_POST['itemRG'];
$coin_shop = $_POST['coinRG'];
$pic_shop = $_POST['itempicRG'];
$profile = $_SESSION['proRG'];
// Lấy profile_id
$sql_getprofile = "SELECT profile_id FROM profile WHERE account='$profile'";
$getprofile = $conn->query($sql_getprofile) or die($conn->error);
while ($row = $getprofile->fetch_assoc()) {
    $profile_id = $row['profile_id'];
}
// Kết thúc lấy profile_id
// Kiểm tra coins của người dùng có đủ không ?
$sql_coincheck = "SELECT coin FROM profile WHERE account = '$profile'";
$coincheck = $conn->query($sql_coincheck) or die($conn->error);
while ($row = $coincheck->fetch_assoc()) {
    $profilecoin = $row['coin'];
}
if ($profilecoin > $coin_shop) {
    //Thực hiện thêm lịch sử giao dịch
    $sql_history = "INSERT INTO history VALUES (UUID(),'$profile_id','$item_shop','$pic_shop','$coin_shop',NOW())";
    $history = $conn->query($sql_history) or die($conn->error);
    // Kiểm tra mua hàng thành công chưa ?
    if ($history) {
        $sql_actionbuy = "UPDATE profile SET coin = coin - '$coin_shop',item = '$item_shop' WHERE account='$profile'";
        $actionbuy = $conn->query($sql_actionbuy) or die($conn->error);
        if ($actionbuy) {
            $_SESSION['success'] = "Mua hàng thành công, kiểm tra xem !";
            header('location: ../../shop.php');
        }
        else {
            $_SESSION['error'] = "Có sự cố gì đó khi mua hàng !";
            header('location: ../../shop.php');
        }
        // Kết thúc kiểm tra mua hàng thành công chưa ?
    }
    else {
        $_SESSION['error'] = "Có sự cố gì đó ! Hãy thử lại sau";
        header('location: ../../shop.php');
    }
}
else {
    $_SESSION['error'] = "Không đủ coin !";
    header('location: ../../shop.php');
}
// Kết thúc kiểm tra tài khoản
$conn -> close();
?>