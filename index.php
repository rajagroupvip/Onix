<?php
ob_start();
session_start();
date_default_timezone_set("Asia/Jakarta");
include('config/koneksi.php');
$sid = session_id();
$sql_0 = mysqli_query($conn,"SELECT * FROM `tb_seo` WHERE cuid = 1") or die(mysqli_error());
$s0 = mysqli_fetch_array($sql_0);
$urlweb = $s0['urlweb'];
$title = $s0['instansi'];
$favicon = $s0['image'];
$pengguna = $s0['user'];
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
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title;?></title>
    <meta name="description" content="<?php echo $title;?> memberikan pengalaman slot online terbaik dengan beragam permainan slot yang menarik. Bergabunglah sekarang dan nikmati bonus menarik setiap hari di Superhoki77.online!.">

    <meta name="keywords" content="judi online, slot online, judi bola, poker online, casino online, taruhan online">
    <meta name="author" content="<?php echo $title;?>">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="<?php echo $urlweb;?>">
    <meta property="og:type" content="website">
    <meta name="revisit-after" content="1 days">
    <meta name="google-site-verification" content="TXMelfP-fF1nbe9_KqVXHSHvzW03f_qfFy6CAdpPWPQ">
    <link rel="icon" type="image/png" href="<?php echo $favicon;?>">

    
    <style>
        /* Animasi loading */
        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        /* Gaya animasi */
        .loading-container {
            text-align: center;
            margin-top: 20%;
        }

        .loading {
            border: 8px solid #f3f3f3;
            border-top: 8px solid #3498db;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            animation: spin 1s linear infinite;
            margin: auto;
            margin-bottom: 10px;
        }

        .loading-text {
            font-size: 18px;
            color: #333;
        }
    </style>
</head>

<body>

    <div class="loading-container" id="loading-container">
        <div class="loading" id="loading"></div>
    </div>

    <script>
        // Mendeteksi jenis perangkat
        function detectDevice() {
            return /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)
                ? 'mobile'
                : 'desktop';
        }

        // Mengarahkan pengguna ke folder yang sesuai
        function redirectToFolder() {
            // Tampilkan animasi loading
            var loadingContainer = document.getElementById('loading-container');
            loadingContainer.style.display = 'block';

            var deviceType = detectDevice();
            var redirectUrl = deviceType === 'mobile' ? 'm/' : 'desktop/';

            // Tunda pengalihan untuk memberikan kesan loading
            setTimeout(function () {
                window.location.href = redirectUrl;
            }, 0); // Ubah angka ini sesuai kebutuhan
        }

        // Panggil fungsi ketika halaman dimuat
        window.onload = redirectToFolder;
    </script>

</body>

</html>