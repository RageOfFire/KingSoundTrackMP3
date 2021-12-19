<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Minigame</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="./assets/font/fontawesome-free-5.15.4-web/css/all.css" />
  <link rel="stylesheet" href="./assets/css/editprofile.css">
</head>
<body>
<?php include './header.php'; ?>
  <main>
    <hr class="mb-3">
    <form action="./assets/PHP/getcoin.php" method="POST">
    <?php
    if (isset($_REQUEST['category'])) {
      $url = $_REQUEST['url']."&category=".$_REQUEST['category']."&type=".$_REQUEST['type'];
    }
    else {
      $url = $_REQUEST['url']."&type=".$_REQUEST['type'];
    }
    $get = file_get_contents($url);
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
  <?php include './footer.php'; ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>