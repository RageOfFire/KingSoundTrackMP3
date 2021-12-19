<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nhạc của bạn</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./assets/font/fontawesome-free-5.15.4-web/css/all.css"/>
    <link rel="stylesheet" href="./assets/css/uploadmain.css">
</head>
<body>
<?php include './header.php'; ?>
<main>
<?php include './check.php'; ?>
    <h1 class="text-center">Nhạc của bạn</h1>
    <h2 class="text-center"><a href="./uploadmusic.php"><button type="button" class="btn btn-secondary">Thêm nhạc</button></a></h2>
    <table class="table table-hover table-bordered text-center">
        <thead>
          <tr class="table-primary">
            <th>STT</th>
            <th></th>
            <th>Tên</th>
            <th>Thể loại</th>
            <th>Được thêm vào</th>
            <th colspan="2" class="text-center">Cài đặt</th>
          </tr>
        </thead>
        <tbody>
            <?php
            include_once "./assets/PHP/connect.php";
            if (isset($_GET['page'])) {
              $page = $_GET['page'];
            }
            else {
              $page = 1;
            }
            $number_of_item = 3;
            $start_at = ($page-1)*$number_of_item;
            $sql_getmusic3 = "SELECT * FROM music WHERE create_by ='$profile' ORDER BY list LIMIT $start_at,$number_of_item";
            $getmusic3 = $conn->query($sql_getmusic3) or die($conn->error);
            $x = 0;
            while ($row = $getmusic3->fetch_assoc()) {
              $x++;
              $title = $row['title'];
              echo 
              '<tr>
              <td class="bg-success">'.$x.'</td>
              <td class="bg-success"><img class="img-thumnail" onError="this.onerror=null;this.src=`./assets/img/vector60-1116-01.jpg`;" src="./Profile Storage/'.$profile.'/img/'.$row['picture'].'" alt="Music Thumnail" width="40px" height="40px"></td>
              <td class="bg-success">'.$row['title'].'</td>
              <td class="bg-success">'.$row['gender'].'</td>
              <td class="bg-success">'.$row['create_at'].'</td>
              <td class="bg-dark"><a href="./editmusicpage.php?title='.$title.'"><button class="btn btn-success"><i class="fas fa-edit"></i></button></a></td>
              <td class="bg-dark"><a onClick="javascript: return confirm(`Xác nhận xóa bài hát '.$title.' ?`);" href="./assets/PHP/deletemusic.php?account='.$profile.'&title='.$title.'"><button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button></a></td>
              </tr>
              ';
            }
            ?>
        </tbody>
      </table>
      <nav aria-label="Page navigation">
            <ul class="pagination justify-content-end">
            <?php
            $sql_music = "SELECT * FROM music WHERE create_by ='$profile'";
            $music = $conn->query($sql_music) or die($conn->error);
            $total_music = $music->num_rows;
            $total_pages = ceil($total_music/$number_of_item);
            if ($page>1) {
              echo '
              <li class="page-item">
              <a class="page-link" href="./uploadmain.php?profile='.$profile.'&page='.($page-1).'" aria-label="Previous">
              <span aria-hidden="true"><i class="fas fa-arrow-circle-left"></i></span>
              </a>
              </li>
              ';
            }
            for ($i = 1; $i < $total_pages; $i++) {
              echo '<li class="page-item"><a class="page-link" href="./uploadmain.php?profile='.$profile.'&page='.$i.'">'.$i.'</a></li>';
            }
            if($i>$page) {
              echo '
              <a class="page-link" href="./uploadmain.php?profile='.$profile.'&page='.($page+1).'" aria-label="Next">
              <span aria-hidden="true"><i class="fas fa-arrow-circle-right"></i></span>
              </a>
              </li>
              ';
            }
            ?>
            </ul>
          </nav>
    </main>
    <?php include './footer.php'; ?>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
      <script src="./assets/javascript/TriggerEnterKey.js"></script>
</body>
</html>