<!-- Phần kết -->
<footer class="py-3 my-4 end-content">
<ul class="nav justify-content-center border-bottom pb-3 mb-3">
    <li class="nav-item"><a href="./" class="nav-link px-2 text-warning">Trang chủ</a></li>
    <li class="nav-item"> 
<?php
  if(isset($_SESSION['proRG'])) {
echo '<a href="./uploadmain.php" class="nav-link px-2 text-warning">Đăng</a>';
}
else {
  echo '<a onClick="alert(`Bạn cần đăng nhập để vào trang này`)" href="javascript:void(0)" class="nav-link px-2 text-warning">Đăng</a>';
}
?>
</li>
<li class="nav-item">
<?php
if(isset($_SESSION['proRG'])) {
  echo '<a href="./shop.php" class="nav-link px-2 text-warning">Cửa hàng</a>';
}
else {
  echo '<a onClick="alert(`Bạn cần đăng nhập để vào trang này`)" href="javascript:void(0)" class="nav-link px-2 text-warning">Cửa hàng</a>';
}
?>
</li>
<li class="nav-item"><a href="./about.html" class="nav-link px-2 text-warning">Về chúng tôi</a></li>
</ul>
</footer>