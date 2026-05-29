<?php
ob_start();
session_start();
date_default_timezone_set("Asia/Jakarta");
include('../../config/koneksi.php');
include('../../config/class_softgaming.php');

$sid = session_id();
$sql_0 = mysqli_query($conn,"SELECT * FROM `tb_seo` WHERE cuid = 1") or die(mysqli_error());
$s0 = mysqli_fetch_array($sql_0);
$urlweb = $s0['urlweb'];
$urlwebs = $s0['urlweb'];
if(isset($_SESSION['user'])) {
$sql_1 = mysqli_query($conn,"SELECT * FROM `tb_user` WHERE cuid = 1") or die(mysqli_error());
$s1b = mysqli_fetch_array($sql_1);

$user =mysqli_query($conn,"SELECT * FROM `tb_user` WHERE username = '".$_SESSION['user']."'") or die (mysqli_error());
$u = mysqli_fetch_array($user);
$users = $u['username'];
$id_user = $u['cuid'];
$userID = $u['cuid'];
$sql_3 = mysqli_query($conn,"SELECT * FROM `tb_balance` WHERE userID = '$userID'") or die(mysqli_error());
$s3 = mysqli_fetch_array($sql_3);

$sql_banks = mysqli_query($conn,"SELECT * FROM `tb_bank` WHERE userID = '$userID'") or die(mysqli_error());
$sbs = mysqli_fetch_array($sql_banks);
} else {
}
?>