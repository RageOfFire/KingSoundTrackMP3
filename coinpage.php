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

<body>
<?php include './assets/include/header.php'; ?>
  <main>
<?php
if (isset($_SESSION['proRG'])) {}
else {
  $_SESSION['error'] = "Phát hiện phiên đăng nhập không hợp lệ";
  header("location: ./");
}
?>
  <?php include './assets/include/check.php'; ?>
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
  </main>
  <?php include './assets/include/footer.php'; ?>
</body>

</html>