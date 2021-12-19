<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KingSoundTrackMP3</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./assets/font/fontawesome-free-5.15.4-web/css/all.css"/>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>
  <?php include './header.php'; ?>
    <!-- Phần thân -->
    <?php include './check.php' ?>
    <main>
    <div id="background" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2000">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#background" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#background" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#background" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="./assets/img/musical-notes-frame-with-text-space_1017-32857.jpg" class="d-block" alt="music thumbnail" height="650px" width="100%">
      <div class="carousel-caption d-none d-md-block">
        <h5>KingSoundTrackMP3</h5>
        <p><i class="fas fa-coffee"></i> Nơi bạn nghe nhạc và thư giãn <i class="fas fa-coffee"></i></p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="./assets/img/avatars-000606604806-j6ghpm-t500x500.jpg" class="d-block" alt="music thumbnail" height="650px" width="100%">
      <div class="carousel-caption d-none d-md-block">
        <h5>KingSoundTrackMP3</h5>
        <p><i class="fas fa-headphones"></i> Nơi bạn chia sẻ nhạc cùng với mọi người <i class="fas fa-headphones"></i></p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="./assets/img/1546787190_Music-music-1440-900.jpg" class="d-block" alt="music thumbnail" height="650px" width="100%">
      <div class="carousel-caption d-none d-md-block">
        <h5>KingSoundTrackMP3</h5>
        <p><i class="far fa-laugh-beam"></i> Nghe đa chiều, sống đa sắc <i class="far fa-laugh-beam"></i></p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#background" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Trước</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#background" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Tiếp</span>
  </button>
</div>
            <h3 class="Music-choosen" id="Music_choosen">Danh sách Music</h3>
            <hr>
            <div class="musiclist">
              <?php
              include_once "./assets/PHP/connect.php";
              if (isset($_GET['page'])) {
                $page = $_GET['page'];
              }
              else {
                $page = 1;
              }
              $number_of_item = 6;
              $start_at = ($page-1)*$number_of_item;
              $sql_getmusic6 = "SELECT * FROM music LIMIT $start_at,$number_of_item";
              $getmusic6 = $conn->query($sql_getmusic6) or die($conn->error);
              while ($row = $getmusic6->fetch_assoc()) {

                echo 
                '<div class="music-item text-center">
                <ul class="list-group m-5">
                <li class="list-group-item list-group-item-warning"><a href="?list='.$row['list'].'#Music_choosen"><img src="./Profile Storage/'.$row['create_by'].'/img/'.$row['picture'].'" onError="this.onerror=null;this.src=`./assets/img/vector60-1116-01.jpg`;" alt="Music image" class="music-img"></a></li>
                <li class="list-group-item list-group-item-warning">Tên: '.$row['title'].'</li>
                <li class="list-group-item list-group-item-warning">Thể loại: '.$row['gender'].'</li>
                <li class="list-group-item list-group-item-warning">Được thêm bởi: '.$row['create_by'].'</li>
                <li class="list-group-item list-group-item-warning">Mô tả: '.$row['description'].'</li>
              </ul>
              </div>';
              }
              ?>
            </div>
            <!-- Số trang -->
          <nav aria-label="Page navigation">
            <ul class="pagination justify-content-end">
            <?php
            $sql_getallmusic = "SELECT * FROM music";
            $getallmusic = $conn->query($sql_getallmusic) or die($conn->error);
            $total_music = $getallmusic->num_rows;
            $total_pages = ceil($total_music/$number_of_item);
            if ($page>1) {
              echo '
              <li class="page-item">
              <a class="page-link" href="./?page='.($page-1).'#Music_choosen" aria-label="Previous">
              <span aria-hidden="true"><i class="fas fa-arrow-circle-left"></i></span>
              </a>
              </li>
              ';
            }
            for ($i = 1; $i < $total_pages; $i++) {
              echo '<li class="page-item"><a class="page-link" href="./?page='.$i.'#Music_choosen">'.$i.'</a></li>';
            }
            if($i>$page) {
              echo '
              <a class="page-link" href="./?page='.($page+1).'#Music_choosen" aria-label="Next">
              <span aria-hidden="true"><i class="fas fa-arrow-circle-right"></i></span>
              </a>
              </li>
              ';
            }
            ?>
            </ul>
          </nav>
          <!-- Số trang -->
          <?php
          if (isset($_REQUEST['list'])) {
          $list = $_REQUEST['list'];
          $sql_music = "SELECT soundfile,create_by FROM music WHERE list = '$list'";
          $music_query = $conn->query($sql_music) or die($conn->error);
          while ($row = $music_query->fetch_assoc()) {
            $profileMS = $row['create_by'];
            $mp3 = $row['soundfile'];
          }
          }
          else {}
          ?>
          <!-- Tab nghe nhạc -->
            <audio class="music-control" id="music">
              <source src="./Profile Storage/<?php echo $profileMS;?>/music/<?php echo $mp3;?>" type="audio/mpeg">
            </audio>
            <nav class="navbar navbar-expand-lg fixed-bottom navbar-dark bg-dark">
              <div class="container-fluid">
                <a href="./assets/PHP/previousBtn.php?list=<?php if(isset($_GET['list'])) {$list = $_GET['list']; echo $list;} else { $list = 1; echo $list;}?>"><button class="d-inline-block btn btn-outline-warning mx-3 btn-sm" type="button" id="previousBtn"><i class="fas fa-backward"></i></button></a>
                <button class="d-inline-block btn btn-outline-warning mx-3" type="button" id="playBtn"><i class="far fa-play-circle"></i></button>
                <a href="./assets/PHP/NextBtn.php?list=<?php if(isset($_GET['list'])) {$list = $_GET['list']; echo $list;} else { $list = 1; echo $list;}?>"><button class="d-inline-block btn btn-outline-warning mx-3 btn-sm" type="button" id="nextBtn"><i class="fas fa-forward"></i></button></a>
                <p class="align-middle text-warning" id="currentTime">00:00:00</p><p class="text-warning">/</p"><p id="Duration" class="text-warning">00:00:00</p>
                <input type="range" class="d-inline-block form-range mx-3" id="time" max="100" value="0">
                <button class="d-inline-block btn btn-outline-warning mx-3 btn-sm" type="button" id="volumeBtn"><i class="fas fa-volume-up"></i></button>
                <input type="range" class="d-inline-block form-range mx-3" id="volume" max="100" value="100" style="width:20%;">
              </div>
            </nav>
            <!-- Tab nghe nhạc -->
    </main>
    <!-- Kết thúc phần thân -->
<?php include './footer.php'; ?>
<!-- Form Đăng nhập -->
<div class="modal fade" id="sign-in" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content rounded-5 shadow">
      <div class="modal-header p-5 pb-4 border-bottom-0">
        <h2 class="fw-bold mb-0" style="color: black;">Đăng nhập</h2>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body p-5 pt-0">
        <form action="./assets/PHP/sign-in.php" method="post" enctype="multipart/form-data">
          <div class="form-floating mb-3">
            <input type="text" class="form-control rounded-4" name="proRG" id="floatingInput" placeholder="Tên tài khoản hoặc Email..." required>
            <label for="floatingInput" style="color: black;">Tên tài khoản hoặc Email</label>
          </div>
          <div class="form-floating mb-3">
            <input type="password" class="form-control rounded-4" name="passRG" id="floatingPassword" placeholder="Mật khẩu..." required>
            <label for="floatingPassword" style="color: black;">Mật khẩu</label>
          </div>
          <p class="forgotpass" style="color: black;"><i class="fas fa-key"></i> Quên mật khẩu ?<a href="./email-forgot-pass-page.php"> Lấy lại mật khẩu ngay</a><i class="fas fa-key"></i></p>
          <button class="w-100 mb-2 btn btn-lg rounded-4 btn-success" type="submit">Đăng nhập</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Form Đăng nhập -->
<!-- Form Đăng ký -->
<div class="modal fade" id="sign-up" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content rounded-5 shadow">
      <div class="modal-header p-5 pb-4 border-bottom-0">
        <h2 class="fw-bold mb-0" style="color: black;">Đăng ký</h2>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body p-5 pt-0">
      <?php
          if (isset($_SESSION['error'])) {
          echo '
          <div class="alert alert-danger" role="alert">
          '.$_SESSION['error'].'
          </div>
          ';
          unset($_SESSION['error']);
          }
          else {}
          ?>
        <form action="./assets/PHP/sign-up.php" method="post" enctype="multipart/form-data">
          <div class="form-floating mb-3">
            <input type="email" class="form-control rounded-4" name="emailRG" id="floatingInput" placeholder="Email..." required>
            <label for="floatingInput" style="color: black;">Email</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control rounded-4" name="proRG" id="floatingText" placeholder="Tên tài khoản..." required>
            <label for="floatingText" style="color: black;">Tên tài khoản</label>
          </div>
          <div class="form-floating mb-3">
            <input type="password" class="form-control rounded-4" name="passRG" id="floatingPassword" placeholder="Mật khẩu..." required>
            <label for="floatingPassword" style="color: black;">Mật khẩu</label>
          </div>
          <div class="form-floating mb-3">
            <input type="password" class="form-control rounded-4" name="repassRG" id="floatingRePassword" placeholder="Nhập lại Mật khẩu..." required>
            <label for="floatingRePassword" style="color: black;">Nhập lại Mật khẩu</label>
            <button class="w-100 mb-2 btn btn-lg rounded-4 btn-success" type="submit" style="margin-top: 15px;">Đăng ký</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Form Đăng ký -->
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="./assets/javascript/musicplayers.js"></script>
<script src="./assets/javascript/TriggerEnterKey.js"></script>
</html>