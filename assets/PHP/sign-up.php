<?php
include_once "../include/connect.php";
    $account=$_POST['proRG'];
    $email=$_POST['emailRG'];
    $pass=$_POST['passRG'];
    $repass=$_POST['repassRG'];
    if ($_POST['passRG'] === $_POST['repassRG']) {
        if(isset($_POST['proRG']) && !empty($_POST['proRG']) && isset($_POST['emailRG']) && !empty($_POST['emailRG'])) 
        {
            $sql_dup="SELECT account FROM profile WHERE account = '$account'";
            $dup=$conn->query($sql_dup);
            $sql_dup2="SELECT account FROM profile WHERE email = '$email'";
            $dup2=$conn->query($sql_dup2);
            if($dup->num_rows>0) {
                $_SESSION['error'] = "Tài khoản đã tồn tại trên hệ thống";
                header('location:../../');
            }
            if($dup2->num_rows>0) {
                $_SESSION['error'] = "Email đã tồn tại trên hệ thống";
                header('location:../../');
            }
            else {
                mkdir("../../Profile Storage/".$account."/",0755);
                mkdir("../../Profile Storage/".$account."/music",0755);
                mkdir("../../Profile Storage/".$account."/img",0755);
                $sql_insert = "INSERT INTO profile (profile_id,account,IsAdmin,password,coin,create_date,email) VALUES (UUID(),'$account',0,'$pass',0,NOW(),'$email')";
                $results = $conn -> query($sql_insert) or die ($conn->error);
                if ($results) {
                    $_SESSION['success'] = "Bạn đã đăng ký thành công với tài khoản: ".$account." !";
                    header('location:../../');
                }
                else {
                    $_SESSION['error'] = "Có lỗi gì đó sai cực sai luôn !";
                    header('location:../../');
                }
            }
        }
    }
    else {
        $_SESSION['error'] = "Nhập lại mật khẩu không đúng !";
        header('location:../../');
        
    }
    $conn -> close()
    ?>