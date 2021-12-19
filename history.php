<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lịch sử</title>
  <?php include './assets/include/framework.php'; ?>
  <link rel="stylesheet" href="./assets/css/uploadmain.css">
</head>

<body>
<?php include './assets/include/header.php'; ?>
  <main>
  <?php include './assets/include/check.php'; ?>
    <h1 class="text-center">Lịch sử nạp coin</h1>
    <hr>
    <table class="table table-hover table-bordered text-center">
      <thead>
        <tr class="table-primary">
          <th>STT</th>
          <th>Mã đơn hàng</th>
          <th>Tên tài khoản</th>
          <th>Coin đã mua</th>
          <th>Hình thức thanh toán</th>
          <th>Giá tiền</th>
          <th>Ngày thanh toán</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $profile = $_SESSION['proRG'];
        $sql_searchprofileid = "SELECT profile_id FROM profile WHERE account = '$profile'";
        $searchprofileid = $conn->query($sql_searchprofileid) or die($conn->error);
        while ($row = $searchprofileid->fetch_assoc()) {
          $profile_id = $row['profile_id'];
        }
        if (isset($_GET['page'])) {
          $page = $_GET['page'];
        } else {
          $page = 1;
        }
        $number_of_item = 3;
        $start_at = ($page - 1) * $number_of_item;
        $sql_history_by_id3 = "SELECT * FROM coin_history WHERE profile_id = '$profile_id' ORDER BY history_id LIMIT $start_at,$number_of_item";
        $history_by_id3 = $conn->query($sql_history_by_id3) or die($conn->error);
        $x = 0;
        if (isset($_GET['item_page'])) {
          $item_page = $_GET['item_page'];
        } else {
          $item_page = 1;
        }
        $number_of_item_icon = 3;
        $start_at_icon = ($item_page - 1) * $number_of_item_icon;
        while ($row = $history_by_id3->fetch_assoc()) {
          $x++;
          echo
          '<tr>
              <td class="bg-info">' . $x . '</td>
              <td class="bg-info">' . $row['history_id'] . '</td>
              <td class="bg-info">' . $profile . '</td>
              <td class="bg-info">' . $row['coin'] . '</td>
              <td class="bg-info">' . $row['type'] . '</td>
              <td class="bg-info">' . $row['money'] . '</td>
              <td class="bg-info">' . $row['buy_date'] . '</td>
              </tr>
              ';
        }
        ?>
      </tbody>
    </table>
    <nav aria-label="Page navigation">
      <ul class="pagination justify-content-end">
        <?php
        $sql_history_by_id = "SELECT * FROM coin_history WHERE profile_id = '$profile_id'";
        $history_by_id = $conn->query($sql_history_by_id) or die($conn->error);
        $total_history_by_id = $history_by_id->num_rows;
        $total_pages = ceil($total_history_by_id / $number_of_item);
        if ($page > 1) {
          echo '
              <li class="page-item">
              <a class="page-link" href="./history.php?profile=' . $profile . '&page=' . ($page - 1) . '&item_page=' . $item_page . '" aria-label="Previous">
              <span aria-hidden="true"><i class="fas fa-arrow-circle-left"></i></span>
              </a>
              </li>
              ';
        }
        for ($i = 1; $i < $total_pages; $i++) {
          echo '<li class="page-item"><a class="page-link" href="./history.php?profile=' . $profile . '&page=' . $i . '&item_page=' . $item_page . '">' . $i . '</a></li>';
        }
        if ($i > $page) {
          echo '
              <a class="page-link" href="./history.php?profile=' . $profile . '&page=' . ($page + 1) . '&item_page=' . $item_page . '" aria-label="Next">
              <span aria-hidden="true"><i class="fas fa-arrow-circle-right"></i></span>
              </a>
              </li>
              ';
        }
        ?>
      </ul>
    </nav>
    <hr>
    <h1 class="text-center">Lịch sử mua vật phẩm</h1>
    <hr>
    <table class="table table-hover table-bordered text-center">
      <thead>
        <tr class="table-primary">
          <th>STT</th>
          <th>Mã đơn hàng</th>
          <th>Tên tài khoản</th>
          <th>Vật phẩm</th>
          <th>Coin sử dụng</th>
          <th>Ngày thanh toán</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql_history_by_id_item3 = "SELECT * FROM history WHERE profile_id = '$profile_id' ORDER BY history_item_id LIMIT $start_at_icon,$number_of_item_icon";
        $history_by_id_item3 = $conn->query($sql_history_by_id_item3) or die($conn->error);
        $y = 0;
        while ($row = $history_by_id_item3->fetch_assoc()) {
          $y++;
          echo
          '<tr>
              <td class="bg-primary">' . $y . '</td>
              <td class="bg-primary">' . $row['history_item_id'] . '</td>
              <td class="bg-primary">' . $profile . '</td>
              <td class="bg-primary"><img src="./assets/img/shop/' . $row['history_picture'] . '" alt="Item thumnail" width="40px" height="40px"></td>
              <td class="bg-primary">' . $row['coin'] . '</td>
              <td class="bg-primary">' . $row['buy_date'] . '</td>
              </tr>
              ';
        }
        ?>
      </tbody>
    </table>
    <nav aria-label="Page navigation">
      <ul class="pagination justify-content-end">
        <?php
        $sql_history_by_id_item = "SELECT * FROM history WHERE profile_id = '$profile_id'";
        $history_by_id_item = $conn->query($sql_history_by_id_item) or die($conn->error);
        $total_history_by_id_item = $history_by_id_item->num_rows;
        $total_pages_item = ceil($total_history_by_id_item / $number_of_item_icon);
        if ($item_page > 1) {
          echo '
              <li class="page-item">
              <a class="page-link" href="./history.php?profile=' . $profile . '&page=' . $page . '&item_page=' . ($item_page - 1) . '" aria-label="Previous">
              <span aria-hidden="true"><i class="fas fa-arrow-circle-left"></i></span>
              </a>
              </li>
              ';
        }
        for ($u = 1; $u < $total_pages_item; $u++) {
          echo '<li class="page-item"><a class="page-link" href="./history.php?profile=' . $profile . '&page=' . $page . '&item_page=' . $u . '">' . $u . '</a></li>';
        }
        if ($u > $item_page) {
          echo '
              <a class="page-link" href="./history.php?profile=' . $profile . '&page=' . $page . '&item_page=' . ($item_page + 1) . '" aria-label="Next">
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