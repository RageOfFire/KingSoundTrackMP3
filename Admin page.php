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
    <?php
    if (isset($_SESSION['proRG'])) {
        $sql_admin = "SELECT IsAdmin FROM profile WHERE account = '$profile'";
        $admin = $conn->query($sql_admin) or die($conn->error);
        while ($row = $admin->fetch_assoc()) {
            $IsAdmin = $row['IsAdmin'];
        }
    if ($IsAdmin == 1) {
        echo '
        <h1 class="text-center">Chào mừng Admin: <span class="text-warning"><?php echo $profile;?></span> Đã trở lại</h1>
        <hr>
        <div class="container">
            <div class="row">
                <div class="col"><a href="./ProfileControl.php"><button type="button" class="btn btn-outline-warning btn-lg">Quản lý người dùng</button></a></div>
                <div class="col"><a href="./MusicControl.php"><button type="button" class="btn btn-outline-warning btn-lg">Quản lý nhạc</button></a></div>
            </div>
        </div>
        ';
    }
    else {
        echo '<h1 class="text-center">Phát hiện phiên đăng nhập không hợp lệ</h1>';
    }
    }
    else {
        echo '<h1 class="text-center">Phát hiện phiên đăng nhập không hợp lệ</h1>';
    }
    ?>
<?php include "./assets/include/music-kit.php"; ?>
</main>
<?php include './assets/include/footer.php'; ?>
</body>
</html>