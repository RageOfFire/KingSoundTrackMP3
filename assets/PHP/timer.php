<?php
session_start();
include_once '../include/connect.php';
$profile = $_SESSION['proRG'];
$time = $_GET['time'];
$sql_profile = "SELECT profile_id FROM profile WHERE account = '$profile'";
$profile_data = $conn -> query($sql_profile) or die ($conn->error);
while ($row=$profile_data->fetch_assoc()) {
    $profile_id = $row['profile_id'];
}
$sql_time = "INSERT INTO history VALUES (UUID(),'$profile_id','$profile','$time',NOW())";
$time = $conn -> query($sql_time) or die ($conn->error);
if ($time) {
    header('location:');
}
?>