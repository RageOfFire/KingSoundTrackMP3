<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quên mật khẩu</title>
    <?php include './assets/include/framework.php'; ?>
    <link rel="stylesheet" href="./assets/css/forgot-pass.css">
</head>
<body class="text-center">
<main class="form-signin">
<?php include './assets/include/check.php'; ?>
  <form method="post" action="./assets/PHP/password-forgot-pass.php" enctype="multipart/form-data">
    <i class="fas fa-unlock-alt icon-recovery"></i>
    <h1 class="h3 mb-3 fw-normal">Nhập mật khẩu mới</h1>

    <div class="form-floating">
      <input type="password" class="form-control" id="floatingInput" name="passget" placeholder="Mật khẩu mới" required>
      <label for="floatingInput">Mật khẩu mới</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="floatingInput" name="repassget" placeholder="Nhập lại mật khẩu mới" required>
      <label for="floatingInput">Nhập lại mật khẩu mới</label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Cập nhật</button>
  </form>
</main>
</body>
</html>