<?php
if (isset($_SESSION['proRG'])) {}
else {
  echo '
  <script>
  window.onload = function() {
  Swal.fire({
      icon: `warning`,
      title: `Phát hiện phiên đăng nhập không hợp lệ!`,
      showConfirmButton: false,
      backdrop: `gray`,
      timer: 2000,
      timerProgressBar: true
    }).then(function() {location.href= "./";})
  }
  </script>
  ';
}
?>