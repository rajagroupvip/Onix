<?php
    require_once('session.php');
    $users = $u['user'];
    $content = $_POST['content'];

    $date = date('Y-m-d H:i:s');
    $kode = date('YdmHis');
    
    $query = mysqli_query($conn,"UPDATE `tb_seo` SET `news` = '$content' WHERE cuid = 1") or die(mysqli_error());
    header('location:../dashboard.php');
?>