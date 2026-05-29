<?php
require_once('session.php');
$user = strtolower($_POST['user']);
$user = str_replace(' ', '', $user);
$pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);
$level = $_POST['level'];
$query = mysqli_query($conn, "INSERT INTO `admin` (`username`, `password`, `level`) VALUES ('$user', '$pass', '$level')") or die(mysqli_error($conn));
$last_id = mysqli_insert_id($conn);       
header('location:../adminuser.php?notif=1');
exit();
?>
