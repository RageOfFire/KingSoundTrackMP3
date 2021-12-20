<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nhạc của bạn</title>
    <?php include './assets/include/framework.php'; ?>
    <link rel="stylesheet" href="./assets/css/uploadmain.css">
</head>
<body>
<?php include './assets/include/header.php'; ?>
<main>
<?php include './assets/include/check.php'; ?>
<?php
if (isset($_SESSION['proRG'])) {}
else {
  $_SESSION['error'] = "Phát hiện phiên đăng nhập không hợp lệ";
  header("location: ./");
}
?>
    <h1 class="text-center">Người dùng</h1>
    <hr>
    <table class="table table-hover table-bordered text-center">
        <thead>
          <tr class="table-primary">
            <th>STT</th>
            <th></th>
            <th>Tên tài khoản</th>
            <th>Tên</th>
            <th>Giới tính</th>
            <th>Địa chỉ</th>
            <th>Ngày tham gia</th>
          </tr>
        </thead>
        <tbody>
            <?php
            if (isset($_GET['page'])) {
              $page = $_GET['page'];
            }
            else {
              $page = 1;
            }
            $number_of_item = 3;
            $start_at = ($page-1)*$number_of_item;
            if (isset($_GET['musicpage'])) {
              $music_page = $_GET['musicpage'];
            }
            else {
              $music_page = 1;
            }
            $number_of_item_music = 3;
            $start_at_music = ($music_page-1)*$number_of_item_music;
            $keyword = $_GET['search'];
            $sql_searchprofile3 = "SELECT * FROM profile WHERE account LIKE '%$keyword%' OR name LIKE '%$keyword%' ORDER BY profile_id LIMIT $start_at,$number_of_item";
            $searchprofile3 = $conn->query($sql_searchprofile3) or die($conn->error);
            $x = 0;
            while ($row = $searchprofile3->fetch_assoc()) {
              $x++;
              echo 
              '<tr>
              <td class="bg-info">'.$x.'</td>
              <td class="bg-info"><img class="img-thumnail" onError="this.onerror=null;this.src=`./assets/img/User-Profile-PNG-Clipart.png`;" src="./Profile Storage/'.$row['account'].'/img/'.$row['picture'].'" alt="Profile image" width="40px" height="40px"></td>
              <td class="bg-info">'.$row['account'].'</td>
              <td class="bg-info">'.$row['name'].'</td>
              <td class="bg-info">'.$row['gender'].'</td>
              <td class="bg-info">'.$row['address'].'</td>
              <td class="bg-info">'.$row['create_date'].'</td>
              </tr>
              ';
            }
            ?>
        </tbody>
      </table>
      <nav aria-label="Page navigation">
            <ul class="pagination justify-content-end">
            <?php
            $sql_searchprofile = "SELECT * FROM profile WHERE account LIKE '%$keyword%' OR name LIKE '%$keyword%'";
            $searchprofile = $conn->query($sql_searchprofile) or die($conn->error);
            $total_searchprofile = $searchprofile->num_rows;
            $total_pages = ceil($total_searchprofile/$number_of_item);
            if ($page>1) {
              echo '
              <li class="page-item">
              <a class="page-link" href="./search.php?search='.$keyword.'&page='.($page-1).'&musicpage='.$music_page.'" aria-label="Previous">
              <span aria-hidden="true"><i class="fas fa-arrow-circle-left"></i></span>
              </a>
              </li>
              ';
            }
            for ($i = 1; $i < $total_pages; $i++) {
              echo '<li class="page-item"><a class="page-link" href="./search.php?search='.$keyword.'&page='.$i.'&musicpage='.$music_page.'">'.$i.'</a></li>';
            }
            if($i>$page) {
              echo '
              <a class="page-link" href="./search.php?search='.$keyword.'&page='.($page+1).'&musicpage='.$music_page.'" aria-label="Next">
              <span aria-hidden="true"><i class="fas fa-arrow-circle-right"></i></span>
              </a>
              </li>
              ';
            }
            ?>
            </ul>
          </nav>
      <hr>
      <h1 class="text-center">Nhạc</h1>
    <hr>
    <table class="table table-hover table-bordered text-center">
        <thead>
          <tr class="table-primary">
            <th>STT</th>
            <th></th>
            <th>Tên</th>
            <th>Thể loại</th>
            <th>Được thêm vào</th>
            <th>Được thêm bởi</th>
          </tr>
        </thead>
        <tbody>
            <?php
            $sql_searchmusic3 = "SELECT * FROM music WHERE title LIKE '%$keyword%' ORDER BY list LIMIT $start_at_music,$number_of_item_music";
            $searchmusic3 = $conn->query($sql_searchmusic3) or die($conn->error);
            $y = 0;
            while ($row = $searchmusic3->fetch_assoc()) {
              $y++;
              echo 
              '<tr>
              <td class="bg-success">'.$y.'</td>
              <td class="bg-success"><img class="img-thumnail" onError="this.onerror=null;this.src=`./assets/img/vector60-1116-01.jpg`;" src="./Profile Storage/'.$row['create_by'].'/img/'.$row['picture'].'" alt="Music Thumnail" width="40px" height="40px"></td>
              <td class="bg-success">'.$row['title'].'</td>
              <td class="bg-success">'.$row['gender'].'</td>
              <td class="bg-success">'.$row['create_at'].'</td>
              <td class="bg-success">'.$row['create_by'].'</td>
              </tr>
              ';
            }
            ?>
        </tbody>
      </table>
      <nav aria-label="Page navigation">
            <ul class="pagination justify-content-end">
            <?php
            $sql_searchmusic = "SELECT * FROM music WHERE title LIKE '%$keyword%'";
            $searchmusic = $conn->query($sql_searchmusic) or die($conn->error);
            $total_searchmusic = $searchmusic->num_rows;
            $total_pages_music = ceil($total_searchmusic/$number_of_item_music);
            if ($music_page>1) {
              echo '
              <li class="page-item">
              <a class="page-link" href="./search.php?search='.$keyword.'&page='.$page.'&musicpage='.($music_page-1).'" aria-label="Previous">
              <span aria-hidden="true"><i class="fas fa-arrow-circle-left"></i></span>
              </a>
              </li>
              ';
            }
            for ($u = 1; $u < $total_pages_music; $u++) {
              echo '<li class="page-item"><a class="page-link" href="./search.php?search='.$keyword.'&page='.$page.'&musicpage='.$u.'">'.$u.'</a></li>';
            }
            if($u>$music_page) {
              echo '
              <a class="page-link" href="./search.php?search='.$keyword.'&page='.$page.'&musicpage='.($music_page+1).'" aria-label="Next">
              <span aria-hidden="true"><i class="fas fa-arrow-circle-right"></i></span>
              </a>
              </li>
              ';
            }
            ?>
            </ul>
          </nav>
      <hr>
    </main>
    <?php include './assets/include/footer.php'; ?>
    <script src="./assets/javascript/TriggerEnterKey.js"></script>
</body>
</html>