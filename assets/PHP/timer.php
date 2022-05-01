<?php
session_start();
include_once '../include/connect.php';
if($_SESSION['proRG']) {
    $profile = $_SESSION['proRG'];
    $time = $_GET['time'];
    $sql_profile = "SELECT profile_id FROM profile WHERE account = '$profile'";
    $profile_data = $conn -> query($sql_profile) or die ($conn->error);
    while ($row=$profile_data->fetch_assoc()) {
        $profile_id = $row['profile_id'];
    }
    $sql_time = "INSERT INTO history VALUES (UUID(),'$profile_id','$profile','$time',NOW())";
    $time = $conn -> query($sql_time) or die ($conn->error);
    if ($time) {
        echo '
        <script>
        window.onload = function() {
        Swal.fire({
            icon: `success`,
            title: `Chúc mừng bạn đã chiến thắng!`,
            text: `Kỷ lục của bạn đã được ghi nhận`,
            showConfirmButton: true,
            timer: 5000,
          }).then(function() {location.href= "./";})
        }
        </script>
        ';
    }
}
else {
    echo '
    <script>
    window.onload = function() {
    Swal.fire({
        icon: `success`,
        title: `Chúc mừng bạn đã chiến thắng!`,
        text: `Nhưng kỷ lục không được lưu lại... Để lưu kỷ lục hãy đăng nhập nha!`,
        showConfirmButton: true,
        timer: 5000,
      }).then(function() {location.href= "./";})
    }
    </script>
    ';
  }
