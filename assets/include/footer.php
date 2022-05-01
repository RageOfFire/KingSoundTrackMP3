<!-- Phần kết -->
<footer class="py-3 my-4 end-content mb-5">
<ul class="nav justify-content-center border-bottom pb-3 mb-3">
    <li class="nav-item"><a href="./" class="nav-link px-2 text-warning">Trang chủ</a></li>
    <li class="nav-item"> 
<?php
  if(isset($_SESSION['proRG'])) {
echo '<a href="./uploadmain.php" class="nav-link px-2 text-warning">Đăng</a>';
}
else {
  echo '<a onClick="LoginRequired()" href="javascript:void(0)" class="nav-link px-2 text-warning">Đăng</a>';
}
?>
</li>
<li class="nav-item"><a href="./game.php" class="nav-link px-2 text-warning">Trò chơi</a></li>
<li class="nav-item"><a href="./record.php" class="nav-link px-2 text-warning">Kỷ lục</a></li>
<li class="nav-item"><a href="./youtube2mp3.php" class="nav-link px-2 text-warning">Youtube2mp3</a></li>
<li class="nav-item"><a href="./about.php" class="nav-link px-2 text-warning">Về chúng tôi</a></li>
</ul>
</footer>
<script>
var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
return new bootstrap.Tooltip(tooltipTriggerEl)
})
</script>