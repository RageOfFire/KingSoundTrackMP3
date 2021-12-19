<!-- Phần đầu -->
<header class="p-3 bg-dark text-white">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="./" class="nav-link px-2 text-white">Trang chủ</a></li>
                <li>
                <?php
                if(isset($_SESSION['proRG'])) {
                $profile = $_SESSION['proRG'];
                    echo '<a href="./uploadmain.php" class="nav-link px-2 text-white">Đăng</a>';
                }
                else {
                    echo '<a onClick="alert(`Bạn cần đăng nhập để vào trang này`)" href="" class="nav-link px-2 text-white">Đăng</a>';
                }
                ?>
                </li>
                <li>
                <?php
                if(isset($_SESSION['proRG'])) {
                    echo '<a href="./shop.php" class="nav-link px-2 text-white">Cửa hàng</a>';
                }
                else {
                    echo '<a onClick="alert(`Bạn cần đăng nhập để vào trang này`)" href="" class="nav-link px-2 text-white">Cửa hàng</a>';
                }
                ?>
                </li>
                <li><a href="./about.html" class="nav-link px-2 text-white">Về chúng tôi</a></li>
                <li>
                <?php
                include_once './assets/PHP/connect.php';
                if(isset($_SESSION['proRG'])) {
                $sql_checkadmin = "SELECT IsAdmin FROM profile WHERE account = '$profile'";
                $checkadmin = $conn->query($sql_checkadmin) or die($conn->error);
                while ($row = $checkadmin->fetch_assoc()) {
                    $admin = $row['IsAdmin'];
                }
                if ($admin == 1) {
                    echo '<a href="./Admin page.php" class="nav-link px-2 text-white">Admin</a>';
                }
                }
                ?>
                </li>
                </ul>
                <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" action="./search.php" method="get" enctype="multipart/form-data">
                  <input type="search" name="search" class="form-control form-control-dark" id="search-form" placeholder="Tìm kiếm..." aria-label="Search" required>
                  <button id="search-btn" type="submit" style="display: none;">Tìm kiếm</button>
                </form>
        
                <div class="text-end">
                  <?php
                  if (isset($_SESSION['proRG'])) {
                    $sql_profiledata = "SELECT * FROM profile WHERE account = '$profile'";
                    $profiledata = $conn->query($sql_profiledata) or die($conn->error);
                    while ($row = $profiledata->fetch_assoc()) {
                    $picture = $row['picture'];
                    $coin = $row['coin'];
                    $item = $row['item'];
                    }
                    echo '
                    <div class="dropdown">
                    <button class="btn btn-outline-light me-2 dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="'.$item.'"></i>
                    <img src="./Profile Storage/'.$profile.'/img/'.$picture.'" onError="this.onerror=null;this.src=`./assets/img/User-Profile-PNG-Clipart.png`;" height="26px" width="26px">
                    '.$_SESSION['proRG'].'
                    </button>
                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton2">
                      <li><a class="dropdown-item" href="./editprofilepage.php"><i class="fas fa-user-edit"></i>Chỉnh sửa</a></li>
                      <li><a class="dropdown-item" href="./coinpage.php"><i class="fas fa-coins"></i>Xu: '.$coin.'</a></li>
                      <li><a class="dropdown-item" href="./history.php"><i class="fas fa-history"></i>Lịch sử</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item logout" href="./assets/PHP/sign-off.php"><i class="fas fa-sign-out-alt"></i>Đăng xuất</a></li>
                    </ul>
                  </div>';
                  }
                  else {
                    echo'<button type="button" class="btn btn-outline-light me-2" data-bs-toggle="modal" data-bs-target="#sign-in">Đăng nhập</button>';
                    echo'<button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#sign-up">Đăng ký</button>';
                  }
                  ?>
                </div>
              </div>
            </div>
</header>
<!-- Kết thúc phần đầu -->