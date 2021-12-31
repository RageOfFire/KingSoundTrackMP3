<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Minigame</title>
  <?php include './assets/include/framework.php'; ?>
  <link rel="stylesheet" href="./assets/css/editprofile.css">
</head>
<body>
<?php include './assets/include/header.php'; ?>
  <main>
  <?php
if (isset($_SESSION['proRG'])) {}
else {
  $_SESSION['error'] = "Phát hiện phiên đăng nhập không hợp lệ";
  header("location: ./");
}
?>
    <hr class="mb-3">
    <form action="./assets/PHP/getcoin.php" method="POST">
    <?php
    if (isset($_REQUEST['category'])) {
      $url = $_REQUEST['url']."&category=".$_REQUEST['category']."&type=".$_REQUEST['type'];
    }
    else {
      $url = $_REQUEST['url']."&type=".$_REQUEST['type'];
    }
    function file_get_contents_ssl($url) {
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
      curl_setopt($ch, CURLOPT_HEADER, false);
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_REFERER, $url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
      curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 3000); // 3 sec.
      curl_setopt($ch, CURLOPT_TIMEOUT, 10000); // 10 sec.
      $result = curl_exec($ch);
      curl_close($ch);
      return $result;
  }
    $get = file_get_contents_ssl($url);
    $json = json_decode($get);
    $i = 0;
    foreach ($json->results as $question) {
      $i++;
      echo 
      '
      <div class="card mb-3 mt-3">
      <div class="card-body">
      <h4 class="text-success">Câu '.$i.': '.$question->question.'</h4>
      <h5 class="text-success">Độ khó: '.$question->difficulty.'</h5>
      <div class="form-check">
      <input class="form-check-input" type="radio" name="choose_'.$i.'" id="true_'.$i.'" value="True" required>
      <label class="form-check-label text-danger" for="true_'.$i.'">
      Đúng
      </label>
      </div>
      <div class="form-check">
      <input class="form-check-input" type="radio" name="choose_'.$i.'" id="false_'.$i.'" value="False" required>
      <label class="form-check-label text-danger" for="false_'.$i.'">
      Sai
      </label>
      </div>
      <input type="hidden" name="'.$i.'" value='.$question->correct_answer.'>
      </div>
      </div>
      <hr>
      ';
    }
    ?>
    <div class="d-flex justify-content-end m-2">
      <button type="submit" class="btn btn-success">Gửi kết quả</button>
    </div>
    </form>
  </main>
  <?php include './assets/include/footer.php'; ?>
</body>
</html>