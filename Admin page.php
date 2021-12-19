<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý</title>
    <?php include './assets/include/framework.php'; ?>
    <link rel="stylesheet" href="./assets/css/uploadmain.css">
</head>
<body>
<?php include './assets/include/header.php'; ?>
<main>
    <h1 class="text-center">Chào mừng Admin: <span class="text-warning"><?php echo $profile;?></span> Đã trở lại</h1>
</main>
<?php include './assets/include/footer.php'; ?>
<script src="./assets/javascript/TriggerEnterKey.js"></script>
</body>
</html>