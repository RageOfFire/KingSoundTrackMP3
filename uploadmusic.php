<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm nhạc</title>
    <?php include './assets/include/framework.php'; ?>
    <link rel="stylesheet" href="./assets/css/uploadmusic.css">
</head>
<body>
<?php include './assets/include/header.php'; ?>
<main>
<?php
if (isset($_SESSION['proRG'])) {}
else {
  $_SESSION['error'] = "Phát hiện phiên đăng nhập không hợp lệ";
  header("location: ./");
}
?>
<?php include './assets/include/check.php'; ?>
    <form action="./assets/PHP/addmusic.php" method="post" enctype="multipart/form-data">
    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row main-edit">
            <div class="col-md-3 border-right">
                <div>
                <h4 class="p-3 mb-2 mt-2 bg-info text-light rounded text-center">Chọn file nhạc của bạn</h4>
                    <p id="filename"></p>
                    <input type="file" class="hidden" id="updateFile" accept=".mp3" name="mp3fileRG" onchange="getnamefile()" required>
                    <label class="input-group-text" for="updateFile">
                      <div class="beautiful-img" style="width: 300px; height: 100px;"><i class="fas fa-upload" style="font-size: 80px; margin: 10px;"></i></div>
                    </label>
                <h4 class="p-3 mb-2 mt-2 bg-info text-light rounded">Ảnh</h4>
                    <input type="file" class="hidden" id="updateIMG" accept="image/*" name="mp3pictureRG" onchange="getnameimg()">
                    <label class="input-group-text" for="updateIMG">
                      <img class="beautiful-img" id="IMGshow" src="<?php echo './Profile Storage/'.$mp3createby.'/img/'.$mp3pic;?>" onError="this.onerror=null;this.src=`./assets/img/vector60-1116-01.jpg`;" width="280px" height="250px">
                    </label>
                  </div>
            </div>
            <div class="col-md-5 border-right">
                <div class="ms-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right p-3 mb-2 mt-2 bg-info text-light rounded">Thông tin nhạc</h4>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">Tiêu đề</label><input type="text" class="form-control" name="mp3titleRG" placeholder="Tiêu đề" required></div>
                        <div class="col-md-12"><label class="labels">Tác giả</label><input type="text" class="form-control" name="mp3authorRG" placeholder="Tác giả"></div>
                        <label class="labels">Thể loại</label>
                        <div class="input-group mb-3">
                            <select class="form-select" name="mp3genderRG" required>
                            <option selected hidden>Chọn thể loại nhạc</option>
                            <?php
                            $sql_gender="SELECT gender FROM gender ORDER BY gender";
                            $result=$conn->query($sql_gender) or die("$conn->error");
                            while($row=$result->fetch_assoc())
                            {
                            $gender=$row["gender"];
                            echo "<option value='".$gender."'>".$gender."</option>";
                            }
                            ?>
                            </select>
                            </div>
                        <div class="col-md-12"><label class="labels">Mô tả</label><textarea class="form-control" name="mp3descRG" placeholder="Mô tả" rows="5" cols="10" maxlength="255"></textarea></div>
                    <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Thêm</button></div>
                </div>
            </div> 
        </div>
    </div>
    </form>
    <br>
    </main>
    <?php include './assets/include/footer.php'; ?>
<script src="./assets/javascript/seefilename.js"></script>
<script src="./assets/javascript/showimg.js"></script>
</body>
</html>