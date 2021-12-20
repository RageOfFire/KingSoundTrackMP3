<?php
session_start();
include_once "../include/connect.php";
$profile = $_SESSION['proRG'];
$coin = 0;
// Lấy profile_id
$sql_getprofile = "SELECT profile_id FROM profile WHERE account='$profile'";
$getprofile = $conn->query($sql_getprofile) or die($conn->error);
while ($row = $getprofile->fetch_assoc()) {
    $profile_id = $row['profile_id'];
}
// Kết thúc lấy profile_id
for ($i = 1; $i < 6; $i++) {
    if ($_POST['choose_'.$i] == $_POST[$i]) {
    $sql_coin = "UPDATE profile SET coin = coin + 10 WHERE account='$profile'";
    $addcoin = $conn->query($sql_coin) or die($conn->error);
    $coin = $coin + 10;
    }
    else {}
}
$sql_history = "INSERT INTO coin_history VALUES (UUID(),'$profile_id','$coin','Chơi game câu hỏi',NOW())";
$history = $conn->query($sql_history) or die($conn->error);
$_SESSION['success'] = "Bạn nhận được ".$coin." Xu";
header('location: ../../coinpage.php');
?>