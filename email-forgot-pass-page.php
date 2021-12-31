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
  <form method="post" action="./assets/PHP/email-forgot-pass.php" enctype="multipart/form-data">
    <i class="fas fa-unlock-alt icon-recovery"></i>
    <h1 class="h3 mb-3 fw-normal">Nhập email tài khoản cần lấy lại mật khẩu</h1>

    <div class="form-floating">
      <input type="email" class="form-control" id="floatingInput" name="emailget" placeholder="Email" required>
      <label for="floatingInput">Email</label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Lấy lại mật khẩu</button>
  </form>
</main>
</body>
</html>