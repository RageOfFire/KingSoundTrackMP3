<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kho nhạc</title>
    <?php include './assets/include/framework.php'; ?>
    <link rel="stylesheet" href="./assets/css/uploadmain.css">
</head>
<body onload="Notification()">
<?php include './assets/include/header.php'; ?>
<?php include './assets/include/check.php'; ?>
<?php include './assets/include/check-invalid-user.php'; ?>
<main>
<h1 class="text-center">Nhạc</h1>
<audio class="music-control" id="music">
    <source src="./Profile Storage/<?php echo $_SESSION['mprofile'];?>/music/<?php echo $_SESSION['mfile'];?>" type="audio/mpeg">
</audio>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <p class="align-middle text-warning mx-5"><?php if(isset($_SESSION['mtitle'])) {echo "Tên bài hát: ".$_SESSION['mtitle'];} ?></p>
  <p class="align-middle text-warning mx-5"><?php if(isset($_SESSION['mauthor'])) {echo "Tác giả: ".$_SESSION['mauthor'];} ?></p>
  <p class="align-middle text-warning mx-5"><?php if(isset($_SESSION['mgender'])) {echo "Thể loại: ".$_SESSION['mgender'];} ?></p>
  <p class="align-middle text-warning mx-5"><?php if(isset($_SESSION['mprofile'])) {echo "Người đăng: ".$_SESSION['mprofile'];} ?></p>
</nav>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <button class="d-inline-block btn btn-outline-warning mx-3 btn-sm" name="previous" type="submit" id="previousBtn"><i class="fas fa-backward"></i></button>
        <button class="d-inline-block btn btn-outline-warning mx-3" type="button" id="playBtn"><i class="far fa-play-circle"></i></button>
        <button class="d-inline-block btn btn-outline-warning mx-3 btn-sm" name="next" type="submit" id="nextBtn"><i class="fas fa-forward"></i></button>
        <p class="align-middle text-warning" id="currentTime">00:00:00</p><p class="text-warning">/</p"><p id="Duration" class="text-warning">00:00:00</p>
        <input type="range" class="d-inline-block form-range mx-3" id="time" max="100" value="0">
        <button class="d-inline-block btn btn-outline-warning mx-3 btn-sm" type="button" id="volumeBtn"><i class="fas fa-volume-up"></i></button>
        <input type="range" class="d-inline-block form-range mx-3" id="volume" max="100" value="100" style="width:20%;">
        
    </div>
</nav>
<form action="music.php" method="POST">
<div class="input-group mb-5 mt-5">
    <select class="form-select" name="mp3genderRG" onchange="if(this.value != 0) { this.form.submit(); }">
        <option selected hidden value="0">Chọn thể loại nhạc</option>
        <?php
        $sql_gender="SELECT gender FROM gender ORDER BY gender";
        $result=$conn->query($sql_gender) or die("$conn->error");
        while($row=$result->fetch_assoc())
        {
        $gender=$row["gender"];
        echo "<option value='".$gender."'>".$gender."</option>";
        }
        ?>
    </select>
</div>
</form>
    <?php
    if (isset($_POST['mp3genderRG'])) {
      echo '<h3 class="text-center">Thể loại: '.$_POST['mp3genderRG'].'</h3>';
    }
    ?>
    <table class="table table-hover table-bordered text-center">
        <thead>
          <tr class="table-primary">
            <th>STT</th>
            <th></th>
            <th>Tên</th>
            <th>Thể loại</th>
            <th>Tác giả</th>
            <th>Được thêm bởi</th>
            <th>Mô tả</th>
            <th>Hàng động</th>
          </tr>
        </thead>
        <tbody>
            <?php
            if (isset($_POST['mp3genderRG'])) {
              $gender = $_POST['mp3genderRG'];
              $sql_musicfromgender = "SELECT * FROM music WHERE gender = '$gender' AND is_deleted = 0";
              $getmusicfromgender = $conn->query($sql_musicfromgender) or die($conn->error);
              $i = 0;
              while ($row = $getmusicfromgender->fetch_assoc()) {
                $i++;
                if (!empty($row['description'])) {
                  $description = $row['description'];
                }
                else {
                  $description = "Không có mô tả !";
                }
                echo 
                '<tr>
                <td class="bg-success">'.$i.'</td>
                <td class="bg-success"><img class="img-thumnail" onError="this.onerror=null;this.src=`./assets/img/vector60-1116-01.jpg`;" src="./Profile Storage/'.$row['create_by'].'/img/'.$row['picture'].'" alt="Music Thumnail" width="40px" height="40px"></td>
                <td class="bg-success">'.$row['title'].'</td>
                <td class="bg-success">'.$row['gender'].'</td>
                <td class="bg-success">'.$row['author'].'</td>
                <td class="bg-success">'.$row['create_by'].'</td>
                <td class="bg-success">
                <button type="button" class="btn btn-info" data-bs-toggle="tooltip" data-bs-placement="top" title="'.$description.'">
                <i class="far fa-sticky-note"></i>
                </button>
                </td>
                <td class="bg-dark"><a href="./assets/PHP/music-pack.php?list='.$row['list'].'"><button class="btn btn-primary"><i class="far fa-play-circle"></i></button></a></td>
                </tr>
                ';
              }
            }
            else {
            $sql_getmusic = "SELECT * FROM music WHERE is_deleted = 0";
            $getmusic = $conn->query($sql_getmusic) or die($conn->error);
            $x = 0;
            while ($row = $getmusic->fetch_assoc()) {
              $x++;
              echo 
              '<tr>
              <td class="bg-success">'.$x.'</td>
              <td class="bg-success"><img class="img-thumnail" onError="this.onerror=null;this.src=`./assets/img/vector60-1116-01.jpg`;" src="./Profile Storage/'.$row['create_by'].'/img/'.$row['picture'].'" alt="Music Thumnail" width="40px" height="40px"></td>
              <td class="bg-success">'.$row['title'].'</td>
              <td class="bg-success">'.$row['gender'].'</td>
              <td class="bg-success">'.$row['author'].'</td>
              <td class="bg-success">'.$row['create_by'].'</td>
              <td class="bg-success">'.$row['description'].'</td>
              <td class="bg-dark"><a href="./assets/PHP/music-pack.php?list='.$row['list'].'"><button class="btn btn-primary"><i class="far fa-play-circle"></i></button></a></td>
              </tr>
              ';
            }
          }
            ?>
        </tbody>
      </table>
    </main>
    <?php include './assets/include/footer.php'; ?>
    <script src="./assets/javascript/musicplayers.js"></script>
<!-- Thông báo khi vào trang -->
<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
    <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-header">
        <strong class="me-auto">KingSoundTrackMP3</strong>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
      <div class="toast-body text-white bg-success">
        Đây là nơi bạn có thể nhạc và chọn tất cả các loại nhạc!
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