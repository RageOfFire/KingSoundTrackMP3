<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Coin</title>
  <?php include './assets/include/framework.php'; ?>
  <link rel="stylesheet" href="./assets/css/editprofile.css">
</head>

<body onload="Notification()">
<?php include './assets/include/header.php'; ?>
<?php include './assets/include/check.php'; ?>
<?php include './assets/include/check-invalid-user.php'; ?>
  <main>
      <div class="container rounded bg-white">
        <div class="row">
          <p class="text-center p-3 mb-2 mt-2 left-50 bg-secondary text-light rounded">
            Tên: <?php echo $profile;?>
            <br>
            Xu: <?php echo $coin;?>
            <br>
            Minigame câu hỏi
          </p>
          <p class="text-center p-3 mb-2 mt-2 left-50 bg-secondary text-light rounded">Chọn thể loại</p>
        </div>
          <div class="container">
            <div class="row justify-content-center">
          <div class="col-6 col-sm-3"><a href="./Minigame.php?url=https://opentdb.com/api.php?amount=5&type=boolean"><button type="button" class="btn btn-info text-center mb-2 mt-2 rounded">Ngẫu nhiên</button></a></div>
          <div class="col-6 col-sm-3"><a href="./Minigame.php?url=https://opentdb.com/api.php?amount=5&category=12&type=boolean"><button type="button" class="btn btn-info text-center mb-2 mt-2 rounded">Nhạc</button></a></div>
          <div class="col-6 col-sm-3"><a href="./Minigame.php?url=https://opentdb.com/api.php?amount=5&category=15&type=boolean"><button type="button" class="btn btn-info text-center mb-2 mt-2 rounded">Video game</button></a></div>
          <div class="col-6 col-sm-3"><a href="./Minigame.php?url=https://opentdb.com/api.php?amount=5&category=31&type=boolean"><button type="button" class="btn btn-info text-center mb-2 mt-2 rounded">Anime</button></a></div>
          <div class="col-6 col-sm-3"><a href="./Minigame.php?url=https://opentdb.com/api.php?amount=5&category=32&type=boolean"><button type="button" class="btn btn-info text-center mb-2 mt-2 rounded">Hoạt hình</button></a></div>
          <div class="col-6 col-sm-3"><a href="./Minigame.php?url=https://opentdb.com/api.php?amount=5&category=11&type=boolean"><button type="button" class="btn btn-info text-center mb-2 mt-2 rounded">Phim</button></a></div>
          <div class="col-6 col-sm-3"><a href="./Minigame.php?url=https://opentdb.com/api.php?amount=5&category=18&type=boolean"><button type="button" class="btn btn-info text-center mb-2 mt-2 rounded">Máy tính</button></a></div>
          <div class="col-6 col-sm-3"><a href="./Minigame.php?url=https://opentdb.com/api.php?amount=5&category=16&type=boolean"><button type="button" class="btn btn-info text-center mb-2 mt-2 rounded">Broad game</button></a></div>
          <div class="col-6 col-sm-3"><a href="./Minigame.php?url=https://opentdb.com/api.php?amount=5&category=21&type=boolean"><button type="button" class="btn btn-info text-center mb-2 mt-2 rounded">Thể thao</button></a></div>
          <div class="col-6 col-sm-3"><a href="./Minigame.php?url=https://opentdb.com/api.php?amount=5&category=29&type=boolean"><button type="button" class="btn btn-info text-center mb-2 mt-2 rounded">Truyện tranh</button></a></div>
            </div>
          </div>
          <div class="row">
          <p class="text-center p-3 mb-2 mt-2 bg-secondary text-light rounded">Thêm thông tin tại: <a href="https://opentdb.com" target="_blank" title="https://opentdb.com">https://opentdb.com</a></p>
          </div>
      </div>
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
        Đây là nơi bạn có thể chơi minigame và kiếm xu! Minigame này dưới dạng câu hỏi bao gồm 5 câu hỏi mỗi câu hỏi đúng sẽ nhận được 10 xu.
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