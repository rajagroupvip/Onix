<?php
    require_once('session.php');
    $id = $_GET['cuid'];
    $sql_1 = mysqli_query($conn,"SELECT * FROM `tb_transaksi` WHERE cuid = '$id'") or die(mysqli_error());
    $s1 = mysqli_fetch_array($sql_1);
    $usersID = $s1['userID'];
    $amounts = $s1['total'];
    
    if($s1['status'] == 0){
    	$update = mysqli_query($conn,"UPDATE `tb_transaksi` SET `status` = 2 WHERE `cuid` = '$id'") or die(mysqli_error($conn));
    }
    header('location:../request_depo.php');
?>