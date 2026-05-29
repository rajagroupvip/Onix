<?php
ob_start();
session_start();
date_default_timezone_set("Asia/Jakarta");
include('../config/koneksi.php');
$sid = session_id();
$sql_0 = mysqli_query($conn,"SELECT * FROM `tb_seo` WHERE cuid = 1") or die(mysqli_error());
$s0 = mysqli_fetch_array($sql_0);
$urlweb = $s0['urlweb'];
$urlwebs = $s0['urlweb'];
$pengguna = $s0['user'];
$sql_1a = mysqli_query($conn,"SELECT * FROM `tb_social` WHERE user = '$pengguna'") or die(mysqli_error());
$s1a = mysqli_fetch_array($sql_1a);
$sql_1b = mysqli_query($conn,"SELECT * FROM `tb_user` WHERE user = '$pengguna'") or die(mysqli_error());
$s1b = mysqli_fetch_array($sql_1b);
$ip = $_SERVER['REMOTE_ADDR'];
$date = date('Y-m-d');
$stat = mysqli_query($conn,"INSERT INTO `tb_stat` (`ip`, `date`, `hits`, `page`, `user`) VALUES ('$ip', '$date', 1, 'Beranda', '$pengguna')") or die (mysqli_error());
$sql_banner = mysqli_query($conn,"SELECT * FROM `tb_banner` WHERE cuid = 1") or die(mysqli_error());
$ssb = mysqli_fetch_array($sql_banner);
$status = $ssb['status'];
if($status == true){
    $cekPopup = mysqli_query($conn,"SELECT * FROM `tb_popup` WHERE ip = '$ip'") or die(mysqli_error());
    $cpp = mysqli_num_rows($cekPopup);
    if($cpp == 0){
        $pop = mysqli_query($conn,"INSERT INTO `tb_popup` (`ip`, `date`, `status`) VALUES ('$ip', '$date', 0)") or die (mysqli_error());
        $lihat = $status;
    }
    else {
        $cp = mysqli_fetch_array($cekPopup);
        $statusnya = $cp['status'];
        if($statusnya == 0){
            $lihat = $status;
        }
        else {
            $lihat = 'false';
        }
    }
}
else {
    $lihat = $status;
}

include "../header.php";
?>

<div class="content my01">
    <div class="flex-row flex-wrap games pragmatic-play pp_slots">
        <?php
        while ($st = mysqli_fetch_array($sql_togel)) {
            $pid = $st['cuid'];
            $getResult = mysqli_query($conn, "SELECT * FROM `tb_periode` WHERE pid = '$pid' ORDER BY cuid DESC LIMIT 1") or die(mysqli_error());
            $grr = mysqli_num_rows($getResult);
            $grs = mysqli_fetch_array($getResult);
            $closeResult = date('F d, Y H:i:s', strtotime($st['close_result']));
            $aa = $st['close_result'];
            $bb = $st['time_result'];

            if ($grr != 0) {
                $getResults = mysqli_query($conn, "SELECT * FROM `tb_periode` WHERE pid = '$pid' ORDER BY cuid DESC LIMIT 1") or die(mysqli_error());
                $grrs = mysqli_num_rows($getResults);
                $gr = mysqli_fetch_array($getResults);
                $hasil = $gr['result'];
                $angka1 = substr($hasil, 0, 1);
                $angka2 = substr($hasil, 1, 1);
                $angka3 = substr($hasil, 2, 1);
                $angka4 = substr($hasil, 3, 1);
        ?>
                <div class="lottery__container">
                    <div class="game-box text-center" data-jpid="" data-title="">
                        <!-- Your existing HTML content here -->

                        <p>Tanggal: <?php echo $closeResult; ?></p>
                        <p>Hasil: <?php echo $hasil; ?></p>

                        <!-- End of your existing HTML content -->
                    </div>
                </div>
        <?php
            }
        }
        ?>
    </div>
</div>
