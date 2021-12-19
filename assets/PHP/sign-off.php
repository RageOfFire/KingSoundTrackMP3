<?php
$message = "";
session_start();
unset($_SESSION['ProRG']);
session_destroy();
header('location:../../');
exit();
?>
