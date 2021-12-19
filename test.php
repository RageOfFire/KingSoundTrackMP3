<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./assets/font/fontawesome-free-5.15.4-web/css/all.css"/>
</head>
<body>
<!-- Button trigger modal -->
<button type="button" class="btn btn-success btn-pass" data-bs-toggle="modal" data-bs-target="#change-pass">Đổi mật khẩu</button>
<!-- Form Đổi mật khẩu -->
<div class="modal fade" id="change-pass" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content rounded-5 shadow">
      <div class="modal-header p-5 pb-4 border-bottom-0">
        <h2 class="fw-bold mb-0" style="color: black;">Đổi mật khẩu</h2>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body p-5 pt-0">
        <form action="./assets/PHP/change-pass.php" method="post" enctype="multipart/form-data">
          <input type="hidden" name="account" readonly value="<?php echo $account; ?>">
          <div class="form-floating mb-3">
            <input type="password" class="form-control rounded-4" name="oldpassRG" id="floatingPasswordOld" placeholder="Mật khẩu..." required>
            <label for="floatingPasswordOld" style="color: black;">Mật khẩu</label>
          </div>
          <div class="form-floating mb-3">
            <input type="password" class="form-control rounded-4" name="newpassRG" id="floatingPasswordNew" placeholder="Mật khẩu mới..." required>
            <label for="floatingPasswordNew" style="color: black;">Mật khẩu mới</label>
          </div>
          <div class="form-floating mb-3">
            <input type="password" class="form-control rounded-4" name="renewpassRG" id="floatingRePassword" placeholder="Nhập lại Mật khẩu mới..." required>
            <label for="floatingRePassword" style="color: black;">Nhập lại Mật khẩu mới</label>
            <button class="w-100 mb-2 btn btn-lg rounded-4 btn-success" type="submit" style="margin-top: 15px;">Đổi mật khẩu</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Form Đổi mật khẩu -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>