<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chỉnh sửa trang cá nhân</title>
  <?php include './assets/include/framework.php'; ?>
  <link rel="stylesheet" href="./assets/css/editprofile.css">
</head>

<body>
<?php include './assets/include/header.php'; ?>
  <?php
  include_once "./assets/PHP/connect.php";
  $get_profile = $_SESSION['ProRG'];
  $sql_edit = "SELECT * FROM profile WHERE account = '$get_profile'";
  $result_profile = $conn->query($sql_edit) or die($conn->error);
  while ($row = $result_profile->fetch_assoc()) {
    $account = $row['account'];
    $name = $row['name'];
    $gender = $row['gender'];
    $address = $row['address'];
    $phone = $row['phone'];
    $email = $row['email'];
    $getPIC = $row['picture'];
  }
  ?>
  <main>
  <?php include './assets/include/check.php'; ?>
    <form action="./assets/PHP/editprofile.php" method="post" enctype="multipart/form-data">
      <div class="container rounded bg-white mt-5 mb-5">
        <div class="row main-edit">
          <div class="col-md-3 border-right">
            <div>
              <h4 class="p-3 mb-2 mt-2 bg-info text-light rounded text-center">Ảnh đại diện</h4>
              <input type="file" class="hidden" id="updateIMG" accept="image/*" name="pictureRG" onchange="getnameimg()">
              <label class="input-group-text" for="updateIMG">
                <img class="beautiful-img" id="IMGshow" src="./Profile Storage/<?php echo $account; ?>/img/<?php echo $getPIC; ?>" onError="this.onerror=null;this.src='./assets/img/User-Profile-PNG-Clipart.png';" width="280px" height="250px">
              </label>
            </div>
            <hr>
            <button type="button" class="btn btn-success btn-pass" data-bs-toggle="modal" data-bs-target="#change-pass">Đổi mật khẩu</button>
          </div>
          <div class="col-md-5 border-right">
            <div class="ms-5">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="text-right p-3 mb-2 mt-2 bg-info text-light rounded">Cài đặt trang cá nhân</h4>
              </div>
              <div class="hidden"><label class="labels">Tên tài khoản</label><input type="text" class="form-control" name="proRG" placeholder="Tên tài khoản" value="<?php echo $account; ?>" readonly></div>
              <div class="row mt-3">
                <div class="col-md-12"><label class="labels">Họ tên</label><input type="text" class="form-control" name="nameRG" value="<?php echo $name; ?>" placeholder="Họ tên"></div>
                <div class="col-md-12"><label class="labels">Email</label><input type="email" class="form-control" name="emailRG" placeholder="Email" value="<?php echo $email; ?>"></div>
                <div class="col-md-12">
                <label class="labels">Số điện thoại</label>
                <?php
                if (isset($phone)) {
                  echo '
                  <input type="number" class="form-control" value="'.$phone.'" readonly>
                  <input type="number" class="form-control" name="phoneRG" placeholder="Số điện thoại">
                  ';
                }
                else {
                  echo '
                  <input type="number" class="form-control" name="phoneRG" placeholder="Số điện thoại">
                  ';
                }
                ?>
              </div>
                <div class="col-md-12"><label class="labels">Địa chỉ</label><input type="text" class="form-control" name="addressRG" placeholder="Địa chỉ" value="<?php echo $address; ?>"></div>
                <div class="col-md-12">
                <label class="labels">Giới tính</label>
                  <div class="input-group mb-3">
                    <select class="form-select" id="inputGroupSelect01" name="genderRG">
                      <option selected hidden>Chọn giới tính</option>
                      <option value="Nam">Nam</option>
                      <option value="Nữ">Nữ</option>
                      <option value="Khác">Khác</option>
                    </select>
                  </div>
                </div>
                <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Cập nhật</button></div>
              </div>
            </div>
          </div>
        </div>
    </form>
    <br>
  </main>
  <?php include './assets/include/footer.php'; ?>
<!-- Form Đổi mật khẩu -->
<div class="modal fade" id="change-pass" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
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
<script src="./assets/javascript/showimg.js"></script>
</body>
</html>