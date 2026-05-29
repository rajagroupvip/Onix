<?php
	require_once('session.php');
	$id = $_GET['postID'];
	$status = $_GET['status'];
	if($status == 0){
		$statusnya = 1;
	}
	else if($status == 1){
		$statusnya = 0;
	}
    $query = mysqli_query($conn,"UPDATE `tb_bank` SET status = '$statusnya' WHERE cuid = '$id'") or die(mysqli_error());
    header('location:../rekening.php');
?>