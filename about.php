<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Về chúng tôi</title>
    <?php include './assets/include/framework.php';?>
</head>
<body onload="Notification()">
    <div class="px-4 py-5 my-5 text-center">
        <img class="d-block mx-auto mb-4" src="./assets/img/vector60-1116-01.jpg" alt="" width="72" height="57">
        <h1 class="display-5 fw-bold">Về chúng tôi</h1>
        <div class="col-lg-6 mx-auto">
          <p class="lead mb-4">Được làm bởi <strong>Bùi Hồng Sơn</strong></p>
          <p class="lead mb-4"></p>
          <a class="d-grid gap-2 d-sm-flex justify-content-sm-center">
            <a href="./" class="home-btn" style="text-decoration:none; color: whitesmoke;"><button type="button" class="btn btn-primary btn-lg px-4 gap-3">Trang chủ</button></a>
          </div>
        </div>
      </div>
      <!-- Thông báo khi vào trang -->
<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
  <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
      <strong class="me-auto">KingSoundTrackMP3</strong>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body text-white bg-success">
      Người làm trang web này!
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