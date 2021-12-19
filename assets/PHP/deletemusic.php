<?php
    include_once('./connect.php');
    $account=$_REQUEST['account'];
    $title = $_REQUEST['title'];
    $pic_path = "../../Profile Storage/$account/img/";
    $file_path = "../../Profile Storage/$account/music/";
    $sql_getpic = "SELECT picture,soundfile FROM music WHERE create_by='$account'";
    $pic=$conn->query($sql_getpic) or die ($conn->error);
    while ($row=$pic->fetch_assoc()) {
        $picname = $row['picture'];
        $filename = $row['soundfile'];
    }
    $sql_del="DELETE FROM music WHERE create_by ='$account' AND title='$title'";
    $result=$conn->query($sql_del) or die ($conn->error);
    if(unlink($file_path.$filename) && $result)
    {
        unlink($pic_path.$picname);
        $_SESSION['success']  = "Xóa nhạc thành công !";
        header('location: ./list.php?profile='.$account);
    }
    else
    {
        $_SESSION['error'] = "Có sự cố trong việc xóa bài hát ! Hãy thử lại sau";
        header ('location: ../../uploadmain.php');
    }
    $conn -> close();
?>