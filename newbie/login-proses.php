<?php
ob_start();
session_start();
date_default_timezone_set("Asia/Jakarta");
include('../config/koneksi.php');
isLoggedIn();

$last_login = date('Y-m-d H:i:s');
$user = mysqli_real_escape_string($conn,$_POST['user']);
$pass = mysqli_real_escape_string($conn,$_POST['pass']);
if (empty($user) && empty($pass)) {
    header('location:../newbie/?error=1');
    exit;
} else if (empty($user)) {
    header('location:../newbie/?error=2');
    exit;
} else if (empty($pass)) {
    header('location:../newbie/?error=3');
    exit;
} else if(isLoggedIn()){
    header('location:../newbie/dashboard.php?notif=1');
    exit;
}


$q = mysqli_query($conn,"SELECT * FROM `tb_user` WHERE username = '$user'") or die(mysqli_error($conn));
if (mysqli_num_rows($q) > 0) {
	$user_data = mysqli_fetch_array($q,MYSQLI_ASSOC);
	$password = $user_data['pass'];
	if(password_verify($pass,$password)){
		$userID = $user_data['cuid'];
		$_SESSION['user'] = $user;
		$_SESSION['token'] = $token;
		if($user_data['level'] == 'reseller' || $user_data['level'] == 'user'){
		    $_SESSION['user'] == '';
	        unset($_SESSION['user']);
	        session_destroy();
	        header('location:../../index.php');
		}
		else {		    
		    header('location:dashboard.php?notif=1');
		}
	}
	else {
		$_SESSION['user'] == '';
		unset($_SESSION['user']);
		session_destroy();
		header('location:../newbie/?error=3');
    	exit;
	}
	
} else {
    header('location:../newbie/?error=4');
}

function isLoggedIn(){
	if(isset($_SESSION['user'])	&& $_SESSION['user'] != "" && isset($_SESSION['token']) && $_SESSION['token'] != ""){
		return true;
	}
	return false;
}
?>