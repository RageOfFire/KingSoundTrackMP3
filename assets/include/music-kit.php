<!-- Tab nghe nhạc -->
<audio class="music-control" id="music">
    <source src="./Profile Storage/<?php echo $_SESSION['mprofile'];?>/music/<?php echo $_SESSION['mfile'];?>" type="audio/mpeg">
</audio>
<form action="./assets/PHP/music-pack.php" method="post" enctype="multipart/form">
<nav class="navbar navbar-expand-lg fixed-bottom navbar-dark bg-dark">
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
</form>
<!-- Tab nghe nhạc -->
<script src="./assets/javascript/musicplayers.js"></script>