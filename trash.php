<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thùng rác của bạn</title>
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
    <h1 class="text-center">Thùng rác của bạn</h1>
    <h2><a href="./uploadmain.php"><button type="button" class="btn btn-primary"><i class="fas fa-arrow-circle-left"></i> Quay lại</button></a></h2>
    <table class="table table-hover table-bordered text-center">
        <thead>
          <tr class="table-primary">
            <th>STT</th>
            <th></th>
            <th>Tên</th>
            <th>Thể loại</th>
            <th>Tác giả</th>
            <th>Xóa vào ngày</th>
            <th colspan="2" class="text-center">Cài đặt</th>
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
            $sql_getmusic3 = "SELECT * FROM music WHERE create_by ='$profile' AND is_deleted = 1 ORDER BY list LIMIT $start_at,$number_of_item";
            $getmusic3 = $conn->query($sql_getmusic3) or die($conn->error);
            $x = 0;
            while ($row = $getmusic3->fetch_assoc()) {
              $x++;
              echo 
              '<tr>
              <td class="bg-success">'.$x.'</td>
              <td class="bg-success"><img class="img-thumnail" onError="this.onerror=null;this.src=`./assets/img/vector60-1116-01.jpg`;" src="./Profile Storage/'.$profile.'/img/'.$row['picture'].'" alt="Music Thumnail" width="40px" height="40px"></td>
              <td class="bg-success">'.$row['title'].'</td>
              <td class="bg-success">'.$row['gender'].'</td>
              <td class="bg-success">'.$row['author'].'</td>
              <td class="bg-success">'.$row['delete_at'].'</td>
              <td class="bg-dark"><a href="./assets/PHP/restore-music.php?title='.$row['title'].'"><button class="btn btn-success"><i class="fas fa-sync"></i></button></a></td>
              <td class="bg-dark"><a onClick="javascript: return confirm(`Xác nhận xóa bài hát '.$row['title'].' ?\nHành động này không thể hoàn tác.`);" href="./assets/PHP/deletemusic.php?account='.$profile.'&title='.$row['title'].'"><button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button></a></td>
              </tr>
              ';
            }
            ?>
        </tbody>
      </table>
      <nav aria-label="Page navigation">
            <ul class="pagination justify-content-end">
            <?php
            $sql_music = "SELECT * FROM music WHERE create_by ='$profile' AND is_deleted = 1";
            $music = $conn->query($sql_music) or die($conn->error);
            $total_music = $music->num_rows;
            $total_pages = ceil($total_music/$number_of_item);
            if ($page>1) {
              echo '
              <li class="page-item">
              <a class="page-link" href="./uploadmain.php?page='.($page-1).'" aria-label="Previous">
              <span aria-hidden="true"><i class="fas fa-arrow-circle-left"></i></span>
              </a>
              </li>
              ';
            }
            for ($i = 1; $i < $total_pages; $i++) {
              echo '<li class="page-item"><a class="page-link" href="./uploadmain.php?page='.$i.'">'.$i.'</a></li>';
            }
            if($i>$page) {
              echo '
              <a class="page-link" href="./uploadmain.php?page='.($page+1).'" aria-label="Next">
              <span aria-hidden="true"><i class="fas fa-arrow-circle-right"></i></span>
              </a>
              </li>
              ';
            }
            ?>
            </ul>
          </nav>
          <?php include "./assets/include/music-kit.php"; ?>
    </main>
    <?php include './assets/include/footer.php'; ?>
</body>
</html>