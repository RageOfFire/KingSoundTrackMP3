<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý nhạc</title>
    <?php include './assets/include/framework.php'; ?>
    <link rel="stylesheet" href="./assets/css/uploadmain.css">
</head>
<body>
<?php include './assets/include/header.php'; ?>
<main>
<?php include './assets/include/check.php'; ?>
<h1 class="text-center">Nhạc</h1>
    <table class="table table-hover table-bordered text-center">
        <thead>
          <tr class="table-primary">
            <th>STT</th>
            <th></th>
            <th>Tên</th>
            <th>Thể loại</th>
            <th>Được thêm bởi</th>
            <th>Tác giả</th>
            <th>Được thêm vào</th>
            <th>Tên file</th>
            <th>Mô tả</th>
            <th colspan="2" class="text-center">Cài đặt</th>
          </tr>
        </thead>
        <tbody>
            <?php
            include_once "./assets/include/connect.php";
            if (isset($_GET['page'])) {
              $page = $_GET['page'];
            }
            else {
              $page = 1;
            }
            $number_of_item = 5;
            $start_at = ($page-1)*$number_of_item;
            $sql_getmusic5 = "SELECT * FROM music LIMIT $start_at,$number_of_item";
            $getmusic5 = $conn->query($sql_getmusic5) or die($conn->error);
            $x = 0;
            while ($row = $getmusic5->fetch_assoc()) {
              $x++;
              echo 
              '<tr>
              <td class="bg-success">'.$x.'</td>
              <td class="bg-success"><img class="img-thumnail" onError="this.onerror=null;this.src=`./assets/img/vector60-1116-01.jpg`;" src="./Profile Storage/'.$row['create_by'].'/img/'.$row['picture'].'" alt="Music image" width="40px" height="40px"></td>
              <td class="bg-success">'.$row['title'].'</td>
              <td class="bg-success">'.$row['gender'].'</td>
              <td class="bg-success">'.$row['create_by'].'</td>
              <td class="bg-success">'.$row['author'].'</td>
              <td class="bg-success">'.$row['create_at'].'</td>
              <td class="bg-success">'.$row['soundfile'].'</td>
              <td class="bg-success">'.$row['description'].'</td>
              <td class="bg-dark"><a href="./editmusicpage.php?title='.$row['title'].'"><button class="btn btn-success"><i class="fas fa-edit"></i></button></a></td>
              <td class="bg-dark"><a onClick="javascript: return confirm(`Xác nhận xóa bài hát '.$row['title'].' ?`);" href="./assets/PHP/deletemusic.php?account='.$row['create_by'].'&title='.$row['title'].'"><button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button></a></td>
              </tr>
              ';
            }
            ?>
        </tbody>
      </table>
      <nav aria-label="Page navigation">
            <ul class="pagination justify-content-end">
            <?php
            $sql_musicdb = "SELECT * FROM music";
            $musicdb = $conn->query($sql_musicdb) or die($conn->error);
            $total_musicdb = $musicdb->num_rows;
            $total_pages = ceil($total_musicdb/$number_of_item);
            if ($page>1) {
              echo '
              <li class="page-item">
              <a class="page-link" href="./MusicControl.php?page='.($page-1).'" aria-label="Previous">
              <span aria-hidden="true"><i class="fas fa-arrow-circle-left"></i></span>
              </a>
              </li>
              ';
            }
            for ($i = 1; $i < $total_pages; $i++) {
              echo '<li class="page-item"><a class="page-link" href="./MusicControl.php?page='.$i.'">'.$i.'</a></li>';
            }
            if($i>$page) {
              echo '
              <a class="page-link" href="./MusicControl.php?page='.($page+1).'" aria-label="Next">
              <span aria-hidden="true"><i class="fas fa-arrow-circle-right"></i></span>
              </a>
              </li>
              ';
            }
            ?>
            </ul>
          </nav>
    </main>
    <?php include './assets/include/footer.php'; ?>
    <script src="./assets/javascript/TriggerEnterKey.js"></script>
</body>
</html>