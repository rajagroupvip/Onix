<?php
	require_once('session.php');
	$id = $_GET['cuid'];
	$jenis = $_GET['jenis'];
    $query = mysqli_query($conn,"DELETE FROM `tb_post` WHERE cuid = '$id'") or die(mysqli_error());
    if($jenis == 0){
    	header('location:../promosi.php');
    }
    else {
    	header('location:../promosi.php');
    }
    
?>