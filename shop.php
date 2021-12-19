<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./assets/font/fontawesome-free-5.15.4-web/css/all.css"/>
    <link rel="stylesheet" href="./assets/css/style.css">
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
      <symbol id="facebook" viewBox="0 0 16 16">
        <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
      </symbol>
    </svg>
</head>
<body>
<?php include './header.php'; ?>
    <!-- Phần thân -->
    <main>
    <?php include './check.php' ?>
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
              include_once './assets/PHP/connect.php';
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
              <a class="page-link" href="./shop.php?profile='.$profile.'&page='.($page-1).'#Shop-list" aria-label="Previous">
              <span aria-hidden="true"><i class="fas fa-arrow-circle-left"></i></span>
              </a>
              </li>
              ';
            }
            for ($i = 1; $i < $total_pages; $i++) {
              echo '<li class="page-item"><a class="page-link" href="./shop.php?profile='.$profile.'&page='.$i.'#Shop-list">'.$i.'</a></li>';
            }
            if($i>$page) {
              echo '
              <a class="page-link" href="./shop.php?profile='.$profile.'&page='.($page+1).'#Shop-list" aria-label="Next">
              <span aria-hidden="true"><i class="fas fa-arrow-circle-right"></i></span>
              </a>
              </li>
              ';
            }
            ?>
            </ul>
          </nav>
            </div>
    </main>
    <!-- Kết thúc phần thân -->
<?php include './footer.php'; ?>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
      <script src="assets/javascript/TriggerEnterKey.js"></script>
</body>
</html>