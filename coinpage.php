<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Coin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="./assets/font/fontawesome-free-5.15.4-web/css/all.css" />
  <link rel="stylesheet" href="./assets/css/editprofile.css">
</head>

<body>
<?php include './header.php'; ?>
  <main>
  <?php include './check.php'; ?>
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
          <table class="table">
            <tbody class="d-flex justify-content-center">
          <td><a href="./Minigame.php?url=https://opentdb.com/api.php?amount=5&type=boolean"><button type="button" class="btn btn-info text-center mb-2 mt-2 rounded">Ngẫu nhiên</button></a></td>
          <td><a href="./Minigame.php?url=https://opentdb.com/api.php?amount=5&category=12&type=boolean"><button type="button" class="btn btn-info text-center mb-2 mt-2 rounded">Nhạc</button></a></td>
          <td><a href="./Minigame.php?url=https://opentdb.com/api.php?amount=5&category=15&type=boolean"><button type="button" class="btn btn-info text-center mb-2 mt-2 rounded">Video game</button></a></td>
          <td><a href="./Minigame.php?url=https://opentdb.com/api.php?amount=5&category=31&type=boolean"><button type="button" class="btn btn-info text-center mb-2 mt-2 rounded">Anime</button></a></td>
          <td><a href="./Minigame.php?url=https://opentdb.com/api.php?amount=5&category=32&type=boolean"><button type="button" class="btn btn-info text-center mb-2 mt-2 rounded">Hoạt hình</button></a></td>
          <td><a href="./Minigame.php?url=https://opentdb.com/api.php?amount=5&category=11&type=boolean"><button type="button" class="btn btn-info text-center mb-2 mt-2 rounded">Phim</button></a></td>
          <td><a href="./Minigame.php?url=https://opentdb.com/api.php?amount=5&category=18&type=boolean"><button type="button" class="btn btn-info text-center mb-2 mt-2 rounded">Máy tính</button></a></td>
          <td><a href="./Minigame.php?url=https://opentdb.com/api.php?amount=5&category=16&type=boolean"><button type="button" class="btn btn-info text-center mb-2 mt-2 rounded">Broad game</button></a></td>
          <td><a href="./Minigame.php?url=https://opentdb.com/api.php?amount=5&category=21&type=boolean"><button type="button" class="btn btn-info text-center mb-2 mt-2 rounded">Thể thao</button></a></td>
          <td><a href="./Minigame.php?url=https://opentdb.com/api.php?amount=5&category=29&type=boolean"><button type="button" class="btn btn-info text-center mb-2 mt-2 rounded">Truyện tranh</button></a></td>
            </tbody>
          </table>
          <div class="row">
          <p class="text-center p-3 mb-2 mt-2 bg-secondary text-light rounded">Thêm thông tin tại: <a href="https://opentdb.com" target="_blank" title="https://opentdb.com">https://opentdb.com</a></p>
          </div>
      </div>
  </main>
  <?php include './footer.php'; ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>