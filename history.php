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

<body onload="Notification()">
<?php include './assets/include/header.php'; ?>
<?php include './assets/include/check.php'; ?>
<?php include './assets/include/check-invalid-user.php'; ?>
  <main>
    <h1 class="text-center">Lịch sử chơi</h1>
    <hr>
    <table class="table table-hover table-bordered text-center">
      <thead>
        <tr class="table-primary">
          <th>STT</th>
          <th>Tên tài khoản</th>
          <th>Thời gian thắng</th>
          <th>Ngày thực hiện</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $profile = mysqli_real_escape_string($conn,$_SESSION['proRG']);
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
        $number_of_item = 5;
        $start_at = ($page - 1) * $number_of_item;
        $sql_history_by_id5 = "SELECT * FROM history WHERE profile_id = '$profile_id' ORDER BY history_id LIMIT $start_at,$number_of_item" ;
        $history_by_id5 = $conn->query($sql_history_by_id5) or die($conn->error);
        $x = 0;
        while ($row = $history_by_id5->fetch_assoc()) {
          $x++;
          echo
          '<tr>
              <td class="bg-info">' . $x . '</td>
              <td class="bg-info">' . $row['account'] . '</td>
              <td class="bg-info">' . $row['playtime'] . '</td>
              <td class="bg-info">' . $row['playday'] . '</td>
              </tr>
              ';
        }
        ?>
      </tbody>
    </table>
    <nav aria-label="Page navigation">
      <ul class="pagination justify-content-end">
        <?php
        $sql_history_by_id = "SELECT * FROM history WHERE profile_id = '$profile_id'";
        $history_by_id = $conn->query($sql_history_by_id) or die($conn->error);
        $total_history_by_id = $history_by_id->num_rows;
        $total_pages = ceil($total_history_by_id / $number_of_item);
        if ($page > 1) {
          echo '
              <li class="page-item">
              <a class="page-link" href="./history.php?page=' . ($page - 1) . '" aria-label="Previous">
              <span aria-hidden="true"><i class="fas fa-arrow-circle-left"></i></span>
              </a>
              </li>
              ';
        }
        for ($i = 1; $i < $total_pages; $i++) {
          echo '<li class="page-item"><a class="page-link" href="./history.php?page=' . $i . '">' . $i . '</a></li>';
        }
        if ($i > $page) {
          echo '
              <a class="page-link" href="./history.php?page=' . ($page + 1) . '" aria-label="Next">
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
<!-- Thông báo khi vào trang -->
<div class="position-fixed end-0 p-3" style="z-index: 11; bottom: 5rem">
    <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-header">
        <strong class="me-auto">KingSoundTrackMP3</strong>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
      <div class="toast-body text-white bg-success">
        Đây là nơi bạn kiểm tra lịch sử chơi game của bạn
      </div>
      </div>
    </div>
  </div>
<script>
  var toastLive = document.getElementById('liveToast')
  function Notification() {
  var toast = new bootstrap.Toast(toastLive)
  toast.show()
  }
</script>
<!-- Thông báo khi vào trang -->
</body>
</html>