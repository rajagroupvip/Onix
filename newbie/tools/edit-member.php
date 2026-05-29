<?php
    require_once('session.php');
    $postID = $_POST['postID'];
    $pass = password_hash($_POST['pass'],PASSWORD_DEFAULT);
    $re_pass = $_POST['pass'];
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $no_hp = $_POST['no_hp'];
    $akun = $_POST['akun'];
    $no_rek = $_POST['no_rek'];

    if($re_pass == ''){
        $query = mysqli_query($conn,"UPDATE `tb_user` SET `full_name` = '$full_name', `phone_number` = '$no_hp', `email` ='$email' WHERE cuid = '$postID'") or die(mysqli_error());
        $query1 = mysqli_query($conn,"UPDATE `tb_bank` SET `akun` = '$akun', `no_rek` = '$no_rek', `pemilik` ='$full_name' WHERE userID = '$postID'") or die(mysqli_error());
        header('location:../view.php?postID='.$postID.'&notif=1');
        exit();
    }
    else {
        $query = mysqli_query($conn,"UPDATE `tb_user` SET `password` = '$pass', `full_name` = '$full_name', `phone_number` = '$no_hp', `email` ='$email' WHERE cuid = '$postID'") or die(mysqli_error());
        $query1 = mysqli_query($conn,"UPDATE `tb_bank` SET `akun` = '$akun', `no_rek` = '$no_rek', `pemilik` ='$full_name' WHERE userID = '$postID'") or die(mysqli_error());
        header('location:../view.php?postID='.$postID.'&notif=1');
        exit();
    }
    
?>