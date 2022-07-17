<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>youtube2mp3</title>
    <?php include './assets/include/framework.php'; ?>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body onload="Notification()">
    <?php include './assets/include/header.php'; ?>
    <?php include './assets/include/check.php'; ?>
    <div class="text-center my-5">
        <h1 class="fs-1 text-danger"><i class="fab fa-youtube"></i>Youtube2mp3<i class="fab fa-youtube"></i></h1>
    </div>
    <div class="container rounded bg-dark py-5">
        <form>
            <div class="form-floating my-5">
                <input type="url" class="form-control rounded-4" name="video" id="input" placeholder="Nhập địa chỉ youtube..." required>
                <label for="input" style="color: black;">Nhập địa chỉ youtube</label>
            </div>
            <div class="text-center my-5">
                <button type="submit" class="btn btn-danger" id="convert" data-ok="1">Chuyển đổi</button>
            </div>
        </form>
        <div class="text-center my-5">
            <h3 class="fs-2 text-danger">Chuyển đổi video youtube sang dạng mp3</h3>
            <p class="fs-3 text-danger">Là nơi cho phép bạn tải xuống video trên youtube dưới dạng mp3</p>
        </div>
        <div id="mp3-dl" class="fs-1 text-success text-center my-5"></div>
        <div class="container">
        <div class="row" id="yt-vidlist"></div>
        </div>
    </div>
    <?php include "./assets/include/music-kit.php"; ?>
    <?php include './assets/include/footer.php'; ?>
    <?php include './assets/include/loginform.php' ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        function ytVidId(url) {
            var p = /((http|https)\:\/\/)?(?:[0-9A-Z-]+\.)?(?:youtu\.be\/|youtube(?:-nocookie)?\.com\S*[^\w\s-])([\w-]{11})(?=[^\w-]|$)(?![?=&+%\w.-]*(?:['"][^<>]*>|<\/a>))[?=&+%\w.-]*/ig;
            return (url.match(p)) ? RegExp.$3 : false;
        }
        $(document).on('click', '#convert', function(e) {
            e.preventDefault();
            var ok = $(this).attr("data-ok");
            var url = document.getElementById("input").value;
            var ytid = ytVidId(url);
            if (ok == '1') {
                if (ytid) {
                    $('#mp3-dl').text('Khởi tạo link...');
                    $('#convert').attr("data-ok", "0");
                    mp3Conversion(ytid);
                    $('#convert').attr("data-ok", "1");
                } else {
                    searchiyt(url);
                }
            }
        });
        var searchYT = "";

        
        function searchiyt(query) {
            $.ajax({
                type: 'GET',
                url: './assets/PHP/youtubesearch.php',
                data: {
                    'q': query
                },
                success: function(data, textStatus, request) {
                    for (var i = 0; i < data.contents.length; i++) {
                        searchYT += `<div class="col-sm-4 text-break">
                                <ul class="list-group m-5">
                                <li class="list-group-item list-group-item-warning"><a href ="./assets/PHP/youtube2mp3backend.php?down=${data.contents[i].video.videoId}"><img src="${data.contents[i].video.thumbnails[0].url}" alt="${data.contents[i].video.title}" width="250" height="250" class="music-img img-fluid"></a></li>
                                <li class="list-group-item list-group-item-warning">Tiêu đề: ${data.contents[i].video.title}</li>
                                <li class="list-group-item list-group-item-warning">Thời lượng: ${data.contents[i].video.lengthText}</li>
                                <li class="list-group-item list-group-item-warning">Thời gian đăng lên: ${data.contents[i].video.publishedTimeText}</li>
                                <li class="list-group-item list-group-item-warning">Lượt xem: ${data.contents[i].video.viewCountText}</li>
                                <li class="list-group-item list-group-item-warning"> Mô tả: ${data.contents[i].video.description}</li>
                                </ul>
                                </div>`
                    }
                    $("#yt-vidlist").html(searchYT);
                }
            })
        }

        function mp3Conversion(id) {
            $.ajax({
                type: 'GET',
                url: './assets/PHP/youtube2mp3backend.php',
                data: {
                    'id': id
                },
                success: function(data, textStatus, request) {
                    if (data.status == "ok") {
                        var dlink = data.link + '&dom=Iframe';
                        $("body").append('<iframe src="' + dlink + '" style="display: none;" ></iframe>');
                        $("#mp3-dl").html('<a href="' + dlink + '"><button type="button" class="btn btn-success">Không tự động tải xuống ? Nhấn vào đây</button></a>');
                    } else if (data.status == "processing") {
                        if (data.progress) {
                            if (parseInt(data.progress) < 10) {
                                $("#mp3-dl").html('<div class="progress"><div class="progress-bar progress-bar-striped progress-bar-animated bg-warning" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div></div>');
                            } else {
                                $("#mp3-dl").html('<div class="progress"><div class="progress-bar progress-bar-striped progress-bar-animated bg-warning" role="progressbar" aria-valuenow="' + data.progress + '" aria-valuemin="0" aria-valuemax="100"></div></div>');
                            }
                        }
                        setTimeout(function() {
                            mp3Conversion(id);
                        }, 2000);
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Có sự cố trong quá trình tải xuống',
                            showConfirmButton: false,
                            timer: 2000,
                            timerProgressBar: true
                        })
                    }
                }
            });
        }
    </script>
    <!-- Thông báo khi vào trang -->
    <div class="position-fixed end-0 p-3" style="z-index: 11; bottom: 5rem">
        <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <strong class="me-auto">KingSoundTrackMP3</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body text-white bg-success">
                Là nơi cho phép bạn tải xuống video trên youtube dưới dạng mp3
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
    <script src="./assets/javascript/LoginRequired.js"></script>
</body>

</html>