<?php
	require_once('session.php');
    
    $facebook = $_POST['facebook'];
    $twitter = $_POST['twitter'];
    $instagram = $_POST['instagram'];
    $linkedin = $_POST['linkedin'];
    $youtube = $_POST['youtube'];
    $wa = $_POST['wa'];  // Perubahan disini: '$wa' menjadi '$_POST['wa']'
    $tele = $_POST['tele'];
    
    $query = mysqli_query($conn,"UPDATE `tb_social` SET 
                                `facebook` = '$facebook',
                                `twitter` = '$twitter',
                                `instagram` = '$instagram',
                                `linkedin` = '$linkedin',
                                `youtube` = '$youtube',
                                `wa` = '$wa',
                                `tele` = '$tele'
                                WHERE cuid = 1") or die(mysqli_error());
    header('location:../general.php?notif=1');
?>
