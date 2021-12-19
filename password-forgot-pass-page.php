<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quên mật khẩu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/font/fontawesome-free-5.15.4-web/css/all.css"/>
    <link rel="stylesheet" href="./assets/css/forgot-pass.css">
</head>
<body class="text-center">
<main class="form-signin">
<?php include './check.php' ?>
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