<?php
session_start();
include_once '../include/connect.php';
// Nút lùi
if (isset($_POST['previous'])) {
    $list_button = $_SESSION['mlist'];
    $sql_list = "SELECT list FROM music";
    $list = $conn->query($sql_list) or die($conn->error);
    $list_max = $list->num_rows;
    if ($list_button != 1 && $list_button <= $list_max) {
        $list_button = $list_button - 1;
    }
    else {
        $list_button = $list_max;
    }
    $sql_getpluslist = "SELECT * FROM music WHERE list='$list_button'";
    $getpluslist = $conn->query($sql_getpluslist) or die($conn->error);
    while ($row = $getpluslist->fetch_assoc()) {
        $mfile = $row['soundfile'];
        $mprofile = $row['create_by'];
        $mlist = $row['list'];
        $mtitle = $row['title'];
        $mgender = $row['gender'];
        $mauthor = $row['author'];
    }
    if ($getpluslist) {
        unset($_SESSION['mfile']);
        unset($_SESSION['mprofile']);
        unset($_SESSION['mlist']);
        unset($_SESSION['mtitle']);
        unset($_SESSION['mgender']);
        unset($_SESSION['mauthor']);
        $_SESSION['mfile'] = $mfile;
        $_SESSION['mprofile'] = $mprofile;
        $_SESSION['mlist'] = $mlist;
        $_SESSION['mtitle'] = $mtitle;
        $_SESSION['mgender'] = $mgender;
        $_SESSION['mauthor'] = $mauthor;
        echo '<script>history.back()</script>';
    }
    else {
        $_SESSION['error'] = "Có sự cố trong việc lấy dữ liệu !";
        echo '<script>history.back()</script>';
    }
    }
    else {}
// Nút tiến
if (isset($_POST['next'])) {
    $list_button = $_SESSION['mlist'];
$sql_list = "SELECT list FROM music";
$list = $conn->query($sql_list) or die($conn->error);
$list_max = $list->num_rows;
if ($list_button != $list_max && $list_button <= $list_max) {
    $list_button = $list_button + 1;
}
else {
    $list_button = 1;
}
$sql_getpluslist = "SELECT * FROM music WHERE list='$list_button'";
$getpluslist = $conn->query($sql_getpluslist) or die($conn->error);
while ($row = $getpluslist->fetch_assoc()) {
    $mfile = $row['soundfile'];
    $mprofile = $row['create_by'];
    $mlist = $row['list'];
    $mtitle = $row['title'];
    $mgender = $row['gender'];
    $mauthor = $row['author'];
}
if ($getpluslist) {
    unset($_SESSION['mfile']);
    unset($_SESSION['mprofile']);
    unset($_SESSION['mlist']);
    unset($_SESSION['mtitle']);
    unset($_SESSION['mgender']);
    unset($_SESSION['mauthor']);
    $_SESSION['mfile'] = $mfile;
    $_SESSION['mprofile'] = $mprofile;
    $_SESSION['mlist'] = $mlist;
    $_SESSION['mtitle'] = $mtitle;
    $_SESSION['mgender'] = $mgender;
    $_SESSION['mauthor'] = $mauthor;
    echo '<script>history.back()</script>';
}
else {
    $_SESSION['error'] = "Có sự cố trong việc lấy dữ liệu !";
    echo '<script>history.back()</script>';
}
}
// Lấy dữ liệu từ list
$list = $_REQUEST['list'];
$sql_list = "SELECT * FROM music WHERE list = '$list'";
$list_query = $conn->query($sql_list) or die($conn->error);
while ($row = $list_query->fetch_assoc()) {
    $mfile = $row['soundfile'];
    $mprofile = $row['create_by'];
    $mlist = $row['list'];
    $mtitle = $row['title'];
    $mgender = $row['gender'];
    $mauthor = $row['author'];
}
if ($list_query) {
    unset($_SESSION['mfile']);
    unset($_SESSION['mprofile']);
    unset($_SESSION['mlist']);
    unset($_SESSION['mtitle']);
    unset($_SESSION['mgender']);
    unset($_SESSION['mauthor']);
    $_SESSION['mfile'] = $mfile;
    $_SESSION['mprofile'] = $mprofile;
    $_SESSION['mlist'] = $mlist;
    $_SESSION['mtitle'] = $mtitle;
    $_SESSION['mgender'] = $mgender;
    $_SESSION['mauthor'] = $mauthor;
    echo '<script>history.back()</script>';
}
else {
    $_SESSION['error'] = "Có sự cố trong việc lấy dữ liệu";
    echo '<script>history.back()</script>';
}
?>