<!-- Tab nghe nhạc -->
<?php
 if(isset($_SESSION['mtitle'])) {
?>
<audio class="music-control" id="music">
    <source src="./Profile Storage/<?php echo $_SESSION['mprofile'];?>/music/<?php echo $_SESSION['mfile'];?>" type="audio/mpeg">
</audio>
<form action="./assets/PHP/music-pack.php" method="post">
<div class="fixed-bottom">
<nav class="navbar navbar-dark bg-dark">
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
        <a onclick="location.href = './music.php';"><button class="d-inline-block btn btn-outline-warning mx-3" type="button"><i class="fas fa-arrow-alt-circle-up"></i></button></a>
    </div>
</nav>
</div>
</form>
<?php
    }
    else {}
?>
<!-- Tab nghe nhạc -->
<script src="./assets/javascript/musicplayers.js"></script>