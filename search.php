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
    <h1 class="text-center">Nhạc tìm được</h1>
    <h3 class="text-center">Tìm kiếm theo: Tiêu đề, tác giả, người đăng, mô tả</h3>
    <hr>
    <table class="table table-hover table-bordered text-center">
        <thead>
          <tr class="table-primary">
            <th>STT</th>
            <th>Ảnh</th>
            <th>Tên</th>
            <th>Thể loại</th>
            <th>Tác giả</th>
            <th>Được thêm vào</th>
            <th>Được thêm bởi</th>
            <th>Mô tả</th>
            <th>Hành động</th>
          </tr>
        </thead>
        <tbody>
            <?php
            $keyword = mysqli_real_escape_string($conn,$_REQUEST['search']);
            if (isset($_GET['page'])) {
              $page = $_GET['page'];
            }
            else {
              $page = 1;
            }
            $number_of_item = 3;
            $start_at = ($page-1)*$number_of_item;
            $sql_searchmusic3 = "SELECT * FROM music WHERE (title LIKE '%$keyword%' OR author LIKE '%$keyword%' OR create_by LIKE '%$keyword%' OR description LIKE '%$keyword%') AND is_deleted = 0 ORDER BY list LIMIT $start_at,$number_of_item";
            $searchmusic3 = $conn->query($sql_searchmusic3) or die($conn->error);
            $x = 0;
            while ($row = $searchmusic3->fetch_assoc()) {
              if (!empty($row['description'])) {
                $description = $row['description'];
              }
              else {
                $description = "Không có mô tả !";
              }
              $x++;
              echo 
              '<tr>
              <td class="bg-success">'.$x.'</td>
              <td class="bg-success"><img class="img-thumnail" onError="this.onerror=null;this.src=`./assets/img/vector60-1116-01.jpg`;" src="./Profile Storage/'.$row['create_by'].'/img/'.$row['picture'].'" alt="Music Thumnail" width="40px" height="40px"></td>
              <td class="bg-success">'.$row['title'].'</td>
              <td class="bg-success">'.$row['gender'].'</td>
              <td class="bg-success">'.$row['author'].'</td>
              <td class="bg-success">'.$row['create_at'].'</td>
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
            ?>
        </tbody>
      </table>
      <nav aria-label="Page navigation">
            <ul class="pagination justify-content-end">
            <?php
            $sql_searchmusic = "SELECT * FROM music WHERE (title LIKE '%$keyword%' OR author LIKE '%$keyword%' OR create_by LIKE '%$keyword%' OR description LIKE '%$keyword%') AND is_deleted = 0";
            $searchmusic = $conn->query($sql_searchmusic) or die($conn->error);
            $total_searchmusic = $searchmusic->num_rows;
            $total_pages_music = ceil($total_searchmusic/$number_of_item);
            if ($page>1) {
              echo '
              <li class="page-item">
              <a class="page-link" href="./search.php?search='.$keyword.'&musicpage='.($page-1).'" aria-label="Previous">
              <span aria-hidden="true"><i class="fas fa-arrow-circle-left"></i></span>
              </a>
              </li>
              ';
            }
            for ($u = 1; $u < $total_pages_music; $u++) {
              echo '<li class="page-item"><a class="page-link" href="./search.php?search='.$keyword.'&musicpage='.$u.'">'.$u.'</a></li>';
            }
            if($u>$page) {
              echo '
              <a class="page-link" href="./search.php?search='.$keyword.'&musicpage='.($page+1).'" aria-label="Next">
              <span aria-hidden="true"><i class="fas fa-arrow-circle-right"></i></span>
              </a>
              </li>
              ';
            }
            ?>
            </ul>
          </nav>
      <hr>
      <?php include "./assets/include/music-kit.php"; ?>
    </main>
    <?php include './assets/include/footer.php'; ?>
</body>
</html>