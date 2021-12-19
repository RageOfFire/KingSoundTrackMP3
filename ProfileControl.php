<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý tài khoản</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./assets/font/fontawesome-free-5.15.4-web/css/all.css"/>
    <link rel="stylesheet" href="./assets/css/uploadmain.css">
</head>
<body>
<?php include './header.php'; ?>
<main>
<?php include './check.php' ?>
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
            include_once "./assets/PHP/connect.php";
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
    </main>
    <?php include './footer.php'; ?>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
      <script src="./assets/javascript/TriggerEnterKey.js"></script>
</body>
</html>