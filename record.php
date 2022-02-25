<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kỷ lục</title>
  <?php include './assets/include/framework.php'; ?>
  <link rel="stylesheet" href="./assets/css/uploadmain.css">
</head>

<body onload="Notification()">
<?php include './assets/include/header.php'; ?>
<?php include './assets/include/check.php'; ?>
  <main>
    <h1 class="text-center">Kỷ lục</h1>
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
        if (isset($_SESSION['proRG'])) {
        $profile = mysqli_real_escape_string($conn,$_SESSION['proRG']);
        $sql_searchprofileid = "SELECT profile_id FROM profile WHERE account = '$profile'";
        $searchprofileid = $conn->query($sql_searchprofileid) or die($conn->error);
        while ($row = $searchprofileid->fetch_assoc()) {
          $profile_id = $row['profile_id'];
        }
        // Data checked
        $sql_record = "SELECT * FROM record WHERE profile_id = '$profile_id'";
        $record = $conn -> query($sql_record) or die ($conn->error);
        while ($row = $record -> fetch_assoc()) {
          $recordtime = $row['playtime'];
        }
        $sql_best = "SELECT * FROM history WHERE profile_id = '$profile_id' ORDER BY playtime ASC LIMIT 1";
        $best = $conn->query($sql_best) or die ($conn->error);
        while ($row = $best -> fetch_assoc()) {
          $updateaccount = $row['account'];
          $updateid = $row['profile_id'];
          $updatetime = $row['playtime'];
          $updateday = $row['playday'];
        }
        if (isset($updatetime) < isset($recordtime)) {
          $sql_newrecord = "UPDATE record SET playtime = $updatetime, playday = $updateday WHERE profile_id = $profile_id";
          $newrecord = $conn -> query($sql_newrecord) or die ($conn -> error);
        }
        else {
          if ($record->num_rows>0) {}
          else {
            if (isset($updatetime)) {
            $sql_firstrecord = "INSERT INTO record VALUES (UUID(),'$profile_id','$profile','$updatetime','$updateday')";
            $firstrecord = $conn -> query($sql_firstrecord) or die ($conn->error);
            }
          }
        }
      }
      // Data checked
        if (isset($_GET['page'])) {
          $page = $_GET['page'];
        } else {
          $page = 1;
        }
        $number_of_item = 5;
        $start_at = ($page - 1) * $number_of_item;
        $sql_record_all = "SELECT * FROM record ORDER BY playtime ASC LIMIT $start_at,$number_of_item" ;
        $record_all = $conn->query($sql_record_all) or die($conn->error);
        $x = 0;
        while ($row = $record_all->fetch_assoc()) {
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
        $sql_record_all = "SELECT * FROM record";
        $record_all = $conn->query($sql_record_all) or die($conn->error);
        $total_record_all = $record_all->num_rows;
        $total_pages = ceil($total_record_all / $number_of_item);
        if ($page > 1) {
          echo '
              <li class="page-item">
              <a class="page-link" href="./record.php?page=' . ($page - 1) . '" aria-label="Previous">
              <span aria-hidden="true"><i class="fas fa-arrow-circle-left"></i></span>
              </a>
              </li>
              ';
        }
        for ($i = 1; $i < $total_pages; $i++) {
          echo '<li class="page-item"><a class="page-link" href="./record.php?page=' . $i . '">' . $i . '</a></li>';
        }
        if ($i > $page) {
          echo '
              <a class="page-link" href="./record.php?page=' . ($page + 1) . '" aria-label="Next">
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
  <?php include './assets/include/loginform.php' ?>
<!-- Thông báo khi vào trang -->
<div class="position-fixed end-0 p-3" style="z-index: 11; bottom: 5rem">
    <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-header">
        <strong class="me-auto">KingSoundTrackMP3</strong>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
      <div class="toast-body text-white bg-success">
        Đây là lưu trữ kỷ lục chơi của toàn bộ người dùng
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
<script src="./assets/javascript/LoginRequired.js"></script>
<!-- Thông báo khi vào trang -->
</body>
</html>