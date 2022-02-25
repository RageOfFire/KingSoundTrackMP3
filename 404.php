<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 page not found</title>
    <?php include './assets/include/framework.php';?>
</head>
<body>
<script>
  window.onload = function() {
  Swal.fire({
      icon: 'question',
      title: '404 not found',
      html: 'Không tìm thấy trang ! Chuyển hướng về trang chủ hoặc ấn <a href="./">đây</a> để chuyển hướng luôn',
      showConfirmButton: false,
      backdrop: 'gray',
      timer: 2000,
      timerProgressBar: true
    }).then(function() {location.href= "./";})
  }
  </script>
  
</body>
</html>