<?php
include_once "../include/connect.php";
$message = "";
$list_button = $_GET['list'];
$sql_list = "SELECT list FROM music";
$list = $conn->query($sql_list) or die($conn->error);
$list_max = $list->num_rows;
if ($list_button != $list_max && $list_button <= $list_max) {
    $list_button = $list_button + 1;
}
else {
    $list_button = 1;
}
$sql_getpluslist = "SELECT soundfile,create_by FROM music WHERE list='$list_button'";
$getpluslist = $conn->query($sql_getpluslist) or die($conn->error);
while ($row = $getpluslist->fetch_assoc()) {
    $music = $row['soundfile'];
    $profile = $row['create_by'];
}
if ($getpluslist) {
header('location:../../?list='.$list_button.'#Music_choosen');
}
else {
    $_SESSION['error'] = "Có sự cố xảy ra khi cố lấy nhạc trong hệ thống !";
    header('location: ../../');
}
$conn -> close();
?>