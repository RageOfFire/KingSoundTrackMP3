<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chỉnh sửa nhạc</title>
  <?php include './assets/include/framework.php'; ?>
  <link rel="stylesheet" href="./assets/css/uploadmusic.css">
</head>

<body>
<?php include './assets/include/header.php'; ?>
<?php include './assets/include/check.php'; ?>
<?php include './assets/include/check-invalid-user.php'; ?>
  <main>
    <?php
    $title = mysqli_real_escape_string($conn,$_REQUEST['title']);
    $sql_getmusicinfo = "SELECT * FROM music WHERE title = '$title'";
    $getmusicinfo = $conn->query($sql_getmusicinfo) or die($conn->error);
    while ($row = $getmusicinfo->fetch_assoc()) {
      $mp3file = $row['soundfile'];
      $mp3pic = $row['picture'];
      $mp3title = $row['title'];
      $mp3author = $row['author'];
      $mp3gender = $row['gender'];
      $mp3desc = $row['description'];
      $mp3createby = $row['create_by'];
    }
    ?>
    <form action="./assets/PHP/editmusic.php" method="post" enctype="multipart/form-data">
      <div class="container rounded bg-white mt-5 mb-5">
        <div class="row main-edit">
          <div class="col-md-3 border-right">
            <div>
              <h4 class="p-3 mb-2 mt-2 bg-info text-light rounded text-center">Ảnh</h4>
              <input type="file" class="hidden" id="updateIMG" accept="image/*" name="mp3pictureRG" onchange="getnameimg()">
              <label class="input-group-text" for="updateIMG">
                <img class="beautiful-img img-fluid" id="IMGshow" src="<?php echo './Profile Storage/' . $mp3createby . '/img/' . $mp3pic; ?>" onError="this.onerror=null;this.src=`./assets/img/vector60-1116-01.jpg`;" width="280px" height="250px">
              </label>
            </div>
          </div>
          <div class="col-md-5 border-right">
            <div class="ms-5">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="text-right p-3 mb-2 mt-2 bg-info text-light rounded">Chỉnh sửa thông tin nhạc</h4>
              </div>
              <div class="row mt-3">
                <div class="col-md-12">
                  <input type="text" class="hidden" name="mp3fileRG" placeholder="File nhạc" required value="<?php echo $mp3file; ?>" readonly>
                </div>
                <div class="col-md-12"><label class="labels">Tiêu đề</label><input type="text" class="form-control" name="mp3titleRG" placeholder="Tiêu đề" required value="<?php echo $mp3title; ?>"></div>
                <div class="col-md-12"><label class="labels">Tác giả</label><input type="text" class="form-control" name="mp3authorRG" placeholder="Tác giả" value="<?php echo $mp3author; ?>"></div>
                <label class="labels">Thể loại</label>
                <div class="input-group mb-3">
                  <select class="form-select" name="mp3genderRG" required>
                    <option selected hidden>Chọn thể loại nhạc</option>
                    <?php
                    $sql_gender = "SELECT gender FROM gender ORDER BY gender";
                    $result = $conn->query($sql_gender) or die("$conn->error");
                    while ($row = $result->fetch_assoc()) {
                      $gender = $row["gender"];
                      echo "<option value='" . $gender . "'>" . $gender . "</option>";
                    }
                    ?>
                  </select>
                </div>
                <div class="col-md-12"><label class="labels">Mô tả</label><textarea class="form-control" name="mp3descRG" placeholder="Mô tả" rows="5" cols="10" maxlength="255" value="<?php echo $mp3desc; ?>"></textarea></div>
                <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Cập nhật</button></div>
              </div>
            </div>
          </div>
        </div>
    </form>
    <hr>
    <?php include "./assets/include/music-kit.php"; ?>
  </main>
<?php include './assets/include/footer.php'; ?>
  <script src="./assets/javascript/showimg.js"></script>
</body>
</html>