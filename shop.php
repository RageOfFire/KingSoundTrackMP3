<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>
    <?php include './assets/include/framework.php'; ?>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>
<?php include './assets/include/header.php'; ?>
<?php
if (isset(mysqli_real_escape_string($conn,$_SESSION['proRG']))) {}
else {
  $_SESSION['error'] = "Phát hiện phiên đăng nhập không hợp lệ";
  header("location: ./");
}
?>
    <!-- Phần thân -->
    <main>
    <?php include './assets/include/check.php'; ?>
    <div id="background" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2000">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#background" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#background" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#background" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="./assets/img/musical-notes-frame-with-text-space_1017-32857.jpg" class="d-block" alt="music thumbnail" height="700px" width="100%">
    </div>
    <div class="carousel-item">
      <img src="./assets/img/avatars-000606604806-j6ghpm-t500x500.jpg" class="d-block" alt="music thumbnail" height="700px" width="100%">
    </div>
    <div class="carousel-item">
      <img src="./assets/img/1546787190_Music-music-1440-900.jpg" class="d-block" alt="music thumbnail" height="700px" width="100%">
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
            <h3 class="Music-choosen" id="Shop-list">Danh sách các vật phẩm</h3>
            <hr>
            <div class="musiclist text-center">
              <!-- Class here -->
              <?php
              if (isset($_GET['page'])) {
                $page = $_GET['page'];
              }
              else {
                $page = 1;
              }
              $number_of_item = 2;
              $start_at = ($page-1)*$number_of_item;
                  $sql_shop2 = "SELECT * FROM shop LIMIT $start_at,$number_of_item";
                  $shop2 = $conn->query($sql_shop2) or die($conn->error);
                  while ($row = $shop2->fetch_assoc()) {
                    echo 
                    '
                <form action="./assets/PHP/icon-buy.php" method="post" enctype="multipart/form">
                <div class="card music-item m-5">
                    <img class="card-img-top" src="./assets/img/shop/'.$row['picture'].'" alt="Shopping item">
                  <div class="card-body">
                    <h5 class="card-title text-good">'.$row['title'].'</h5>
                    <p class="card-text text-good">'.$row['description'].'</p>
                    </div>
                    <ul class="list-group list-group-flush">
                    <li class="list-group-item">Giá: '.$row['coin'].' coins</li>
                    </ul>
                    <input type="text" class="hidden" name="itemRG" value="'.$row['item'].'">
                    <input type="text" class="hidden" name="coinRG" value="'.$row['coin'].'">
                    <input type="text" class="hidden" name="itempicRG" value="'.$row['picture'].'">
                    <div class="card-body">
                    <button type="submit" class="btn btn-primary">Mua ngay</button>
                  </div>
                </div>
                </form>
                    ';
                  }
              ?>

            </div>
            <nav aria-label="Page navigation">
            <ul class="pagination justify-content-end">
            <?php
            $sql_shop = "SELECT * FROM shop";
            $shop = $conn->query($sql_shop) or die($conn->error);
            $total_shop = $shop->num_rows;
            $total_pages = ceil($total_shop/$number_of_item);
            if ($page>1) {
              echo '
              <li class="page-item">
              <a class="page-link" href="./shop.php?page='.($page-1).'#Shop-list" aria-label="Previous">
              <span aria-hidden="true"><i class="fas fa-arrow-circle-left"></i></span>
              </a>
              </li>
              ';
            }
            for ($i = 1; $i < $total_pages; $i++) {
              echo '<li class="page-item"><a class="page-link" href="./shop.php?page='.$i.'#Shop-list">'.$i.'</a></li>';
            }
            if($i>$page) {
              echo '
              <a class="page-link" href="./shop.php?page='.($page+1).'#Shop-list" aria-label="Next">
              <span aria-hidden="true"><i class="fas fa-arrow-circle-right"></i></span>
              </a>
              </li>
              ';
            }
            ?>
            </ul>
          </nav>
            </div>
            <?php include "./assets/include/music-kit.php"; ?>
    </main>
    <!-- Kết thúc phần thân -->
<?php include './assets/include/footer.php'; ?>
</body>
</html>