<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game</title>
    <?php include './assets/include/framework.php'; ?>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body onload="Notification()">
    <?php include './assets/include/header.php'; ?>
    <?php include './assets/include/check.php'; ?>
    <?php include './assets/include/check-invalid-user.php'; ?>
    <main style="background-color: purple;">
        <div class="container rounded bg-dark bg-gradient mt-3 mb-3">
            <div class="ratio ratio-16x9">
                <iframe id="gameFrame" allowfullscreen="true" scrolling="no" sandbox="allow-same-origin allow-scripts" src=""></iframe>
            </div>
        </div>
        <div class="d-flex container rounded bg-info bg-gradient justify-content-center">
            <button class="btn btn-success m-3" onclick="gameFrame.src='./MiniCrystal/www/'; gameFrame.focus();" type="button">Chơi game</button>
            <button class="btn btn-danger m-3" onclick="gameFrame.src='';" type="button">Dừng</button>
        </div>
        <?php include './assets/include/footer.php'; ?>
        <?php include './assets/include/music-kit.php'; ?>
    </main>
    <!-- Thông báo khi vào trang -->
<div class="position-fixed end-0 p-3" style="z-index: 11; bottom: 5rem">
    <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-header">
        <strong class="me-auto">KingSoundTrackMP3</strong>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
      <div class="toast-body text-white bg-success">
        Đây là bạn chơi 1 trò chơi nhanh và lưu trữ kỉ lục của bạn vào trang kỷ lục
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