<!-- Form Đăng nhập -->
<div class="modal fade" id="sign-in" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content rounded-5 shadow">
      <div class="modal-header p-5 pb-4 border-bottom-0">
        <h2 class="fw-bold mb-0" style="color: black;">Đăng nhập</h2>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body p-5 pt-0">
        <form action="./assets/PHP/sign-in.php" method="post" enctype="multipart/form-data">
          <div class="form-floating mb-3">
            <input type="text" class="form-control rounded-4" name="proRG" id="floatingInput" placeholder="Tên tài khoản hoặc Email..." required>
            <label for="floatingInput" style="color: black;">Tên tài khoản hoặc Email</label>
          </div>
          <div class="form-floating mb-3">
            <input type="password" class="form-control rounded-4" name="passRG" id="floatingPassword" placeholder="Mật khẩu..." required>
            <label for="floatingPassword" style="color: black;">Mật khẩu</label>
          </div>
          <p class="forgotpass" style="color: black;"><i class="fas fa-key"></i> Quên mật khẩu ?<a href="./email-forgot-pass-page.php"> Lấy lại mật khẩu ngay</a><i class="fas fa-key"></i></p>
          <button class="w-100 mb-2 btn btn-lg rounded-4 btn-success" type="submit">Đăng nhập</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Form Đăng nhập -->
<!-- Form Đăng ký -->
<div class="modal fade" id="sign-up" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content rounded-5 shadow">
      <div class="modal-header p-5 pb-4 border-bottom-0">
        <h2 class="fw-bold mb-0" style="color: black;">Đăng ký</h2>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body p-5 pt-0">
        <form action="./assets/PHP/sign-up.php" method="post" enctype="multipart/form-data">
          <div class="form-floating mb-3">
            <input type="email" class="form-control rounded-4" name="emailRG" id="floatingInput2" placeholder="Email..." required>
            <label for="floatingInput2" style="color: black;">Email</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control rounded-4" name="proRG" id="floatingText" placeholder="Tên tài khoản..." required>
            <label for="floatingText" style="color: black;">Tên tài khoản</label>
          </div>
          <div class="form-floating mb-3">
            <input type="password" class="form-control rounded-4" name="passRG" id="floatingPassword2" placeholder="Mật khẩu..." required>
            <label for="floatingPassword2" style="color: black;">Mật khẩu</label>
          </div>
          <div class="form-floating mb-3">
            <input type="password" class="form-control rounded-4" name="repassRG" id="floatingRePassword" placeholder="Nhập lại Mật khẩu..." required>
            <label for="floatingRePassword" style="color: black;">Nhập lại Mật khẩu</label>
            <button class="w-100 mb-2 btn btn-lg rounded-4 btn-success" type="submit" style="margin-top: 15px;">Đăng ký</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Form Đăng ký -->