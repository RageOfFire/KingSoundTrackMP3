<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý tài khoản</title>
    <?php include './assets/include/framework.php'; ?>
    <link rel="stylesheet" href="./assets/css/uploadmain.css">
</head>
<body>
<?php include './assets/include/header.php'; ?>
<main>
<?php include './assets/include/check.php'; ?>
<?php
if (isset(mysqli_real_escape_string($conn,$_SESSION['proRG']))) {
  $sql_admin = "SELECT IsAdmin FROM profile WHERE account = '$profile'";
  $admin = $conn->query($sql_admin) or die($conn->error);
  while ($row = $admin->fetch_assoc()) {
      $IsAdmin = $row['IsAdmin'];
  }
  if ($IsAdmin !== 1) {
    $_SESSION['error'] = "Phát hiện phiên đăng nhập không hợp lệ";
    header("location: ./");
  }
  else {}
}
else {
  $_SESSION['error'] = "Phát hiện phiên đăng nhập không hợp lệ";
  header("location: ./");
}
?>
<h1 class="text-center">Người dùng</h1>
    <table class="table table-hover table-bordered text-center">
        <thead>
          <tr class="table-primary">
            <th>STT</th>
            <th></th>
            <th>Tên tài khoản</th>
            <th>Tên</th>
            <th>Số điện thoại</th>
            <th>Email</th>
            <th>Giới tính</th>
            <th>Địa chỉ</th>
            <th>Ngày tham gia</th>
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
            $number_of_item = 5;
            $start_at = ($page-1)*$number_of_item;
            $sql_getmusic5 = "SELECT * FROM profile LIMIT $start_at,$number_of_item";
            $getmusic5 = $conn->query($sql_getmusic5) or die($conn->error);
            $x = 0;
            while ($row = $getmusic5->fetch_assoc()) {
              $x++;
              echo 
              '<tr>
              <td class="bg-success">'.$x.'</td>
              <td class="bg-success"><img class="img-thumnail" onError="this.onerror=null;this.src=`./assets/img/User-Profile-PNG-Clipart.png`;" src="./Profile Storage/'.$row['account'].'/img/'.$row['picture'].'" alt="Profile image" width="40px" height="40px"></td>
              <td class="bg-success">'.$row['account'].'</td>
              <td class="bg-success">'.$row['name'].'</td>
              <td class="bg-success">'.$row['phone'].'</td>
              <td class="bg-success">'.$row['email'].'</td>
              <td class="bg-success">'.$row['gender'].'</td>
              <td class="bg-success">'.$row['address'].'</td>
              <td class="bg-success">'.$row['create_date'].'</td>
              <td class="bg-dark"><a href="./editprofilepage.php?profile='.$row['account'].'"><button class="btn btn-success"><i class="fas fa-edit"></i></button></a></td>
              <td class="bg-dark"><a onClick="javascript: return confirm(`Xác nhận xóa người dùng '.$row['account'].' ?`);" href="./assets/PHP/deleteprofile.php?account='.$row['account'].'"><button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button></a></td>
              </tr>
              ';
            }
            ?>
        </tbody>
      </table>
      <nav aria-label="Page navigation">
            <ul class="pagination justify-content-end">
            <?php
            $sql_profiledb = "SELECT * FROM profile";
            $profiledb = $conn->query($sql_profiledb) or die($conn->error);
            $total_profiledb = $profiledb->num_rows;
            $total_pages = ceil($total_profiledb/$number_of_item);
            if ($page>1) {
              echo '
              <li class="page-item">
              <a class="page-link" href="./ProfileControl.php?page='.($page-1).'" aria-label="Previous">
              <span aria-hidden="true"><i class="fas fa-arrow-circle-left"></i></span>
              </a>
              </li>
              ';
            }
            for ($i = 1; $i < $total_pages; $i++) {
              echo '<li class="page-item"><a class="page-link" href="./ProfileControl.php?page='.$i.'">'.$i.'</a></li>';
            }
            if($i>$page) {
              echo '
              <a class="page-link" href="./ProfileControl.php?page='.($page+1).'" aria-label="Next">
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