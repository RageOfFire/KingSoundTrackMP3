<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý</title>
    <?php include './assets/include/framework.php'; ?>
    <link rel="stylesheet" href="./assets/css/uploadmain.css">
</head>
<body onload="Notification()">
<?php include './assets/include/header.php'; ?>
<main>
    <?php
    if (isset($_SESSION['proRG'])) {
        $sql_admin = "SELECT IsAdmin FROM profile WHERE account = '$profile'";
        $admin = $conn->query($sql_admin) or die($conn->error);
        while ($row = $admin->fetch_assoc()) {
            $IsAdmin = $row['IsAdmin'];
        }
    if ($IsAdmin == 1) {
        echo '
        <h1 class="text-center">Chào mừng Admin: <span class="text-warning"><?php echo $profile;?></span> Đã trở lại</h1>
        <hr>
        <div class="container">
            <div class="row">
                <div class="col"><a href="./ProfileControl.php"><button type="button" class="btn btn-outline-warning btn-lg">Quản lý người dùng</button></a></div>
                <div class="col"><a href="./MusicControl.php"><button type="button" class="btn btn-outline-warning btn-lg">Quản lý nhạc</button></a></div>
            </div>
        </div>
        ';
    }
    else {
        echo '<h1 class="text-center">Phát hiện phiên đăng nhập không hợp lệ</h1>';
    }
    }
    else {
        echo '<h1 class="text-center">Phát hiện phiên đăng nhập không hợp lệ</h1>';
    }
    ?>
<?php include "./assets/include/music-kit.php"; ?>
</main>
<?php include './assets/include/footer.php'; ?>
<!-- Thông báo khi vào trang -->
<div class="position-fixed end-0 p-3" style="z-index: 11; bottom: 5rem">
    <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-header">
        <strong class="me-auto">KingSoundTrackMP3</strong>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
      <div class="toast-body text-white bg-success">
        Đây là nơi bạn quản lý người dùng và nhạc!
      </div>
      </div>
    </div>
  </div>
<script>
  var toastLive = document.getElementById('liveToast')
  function Notification() {
  var toast = new bootstrap.Toast(toastLive)
  toast.show()
  }
</script>
<!-- Thông báo khi vào trang -->
</body>
</html>