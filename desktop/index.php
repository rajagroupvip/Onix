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

include "header.php";
?>
<div class="content my01">

    <style>
        .slider-size {
            max-height: 500px;
            min-height: 130px;
        }
    </style>

<div class="content my01">
<?php
error_reporting(0);

$validNotifications = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];

if (!empty($_GET['notif']) && in_array($_GET['notif'], $validNotifications)) {
    $popupContent = '';
    $popupIcon = 'info'; // Default icon

    switch ($_GET['notif']) {
        case 1:
            $popupContent = '<strong>Username atau Password Salah</strong>';
            $popupIcon = 'warning';
            break;
        case 2:
            $popupContent = 'Username atau Password Salah';
            $popupIcon = 'warning';
            break;
        case 3:
            $popupContent = 'Username Atau Password Salah!';
            $popupIcon = 'warning';
            break;
        case 4:
            $popupContent = 'Login Berhasil';
            $popupIcon = 'success';
            break;
        case 5:
            $popupContent = 'Logout Berhasil';
            $popupIcon = 'success';
            break;
        case 6:
            $popupContent = 'Silahkan Login Terlebih Dahulu';
            $popupIcon = 'warning';
            break;
        case 7:
            $popupContent = 'Mohon Maaf Halaman / Provider Sedang Maintenance';
            $popupIcon = 'error';
            break;
        case 8:
            $popupContent = 'Permintaan Deposit Berhasil Dikirimkan';
            $popupIcon = 'success';
            break;
        case 9:
            $popupContent = 'Permintaan Penarikan Berhasil Dikirimkan';
            $popupIcon = 'success';
            break;
        case 10:
            $popupContent = 'Mohon Maaf Akun Anda Sedang Terkunci Silahkan Menghubungi Admin / Livechat';
            $popupIcon = 'warning';
            break;
    }

    // Output JavaScript code to show SweetAlert
    echo "
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                Swal.fire({
                    icon: '$popupIcon',
                    title: 'Notification',
                    html: '$popupContent',
                });
            });
        </script>
    ";
}
?>

<section class="carousel-fixed-height">
    <div id="carousel-fixed-height" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <?php
            $sql_21 = mysqli_query($conn, "SELECT * FROM `tb_slide` ORDER BY sort ASC") or die(mysqli_error());
            $nos = 0;
            while ($s21 = mysqli_fetch_array($sql_21)) {
                $nos++;
                $a = $nos - 1;
            ?>
                <li data-target="#carousel-fixed-height" data-slide-to="<?php echo $a; ?>" <?php if ($nos == 1) {
                                                                                                echo ' class="active"';
                                                                                            } ?>></li>
            <?php } ?>
        </ol>
        <div class="carousel-inner" role="listbox">
            <?php
            $sql_2 = mysqli_query($conn, "SELECT * FROM `tb_slide` ORDER BY sort ASC") or die(mysqli_error());
            $nos = 0;
            while ($s2 = mysqli_fetch_array($sql_2)) {
                $nos++;
            ?>
                <div class="item <?php if ($nos == 1) { echo 'active'; } ?>">
                    <a href="#">
                        <img class="slider-size" src="<?php echo $s2['image']; ?>" style="display: block; width: 100%; max-height: 500px;  min-height: 130px;" alt="Slide">
                    </a>
                </div>
            <?php } ?>
        </div>
        <a class="left carousel-control" href="#carousel-fixed-height" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-fixed-height" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var swiper = new Swiper('#carousel-fixed-height', {
                loop: true, // Enable continuous loop
                autoplay: {
                    delay: 2000, // Time in milliseconds between slides
                },
                pagination: {
                    el: '.carousel-indicators',
                    clickable: true,
                },
                navigation: {
                    nextEl: '.carousel-control.right',
                    prevEl: '.carousel-control.left',
                },
            });
        });
    </script>
</section>


    <div class="ann-wrapper">
        <div class="container">
            <div class="clearfix pt-2">
                <div class="pull-left pointer">
                    <div>
                        <i class="icon-megaphone"></i>
                    </div>
                </div>
                <div class="ann-content">
                    <marquee scrollamount="5">
                    <?php echo $s0['news']; ?>
                    </marquee>
                </div>
            </div>
        </div>
    </div>
    <div class="app-wrapper container">
        <div class="row" style="display: flex;
    align-items: center;">
            <div class="col-xs-6">
                <div class="jackpot">
                    <img class="img-fluid"
                        src="https://sentosa138.org/wp-content/themes/maxwin88/images/jackpot.gif"
                        alt="jackpot" />
                    <div class="txt-overlay">
                        <div class="text-content">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 hot-games-wrapper ">
                <h5> <span class="wrapper-title" i18n>GAME TERPOPULAR</span> <i class="i-hot icon-fire"></i></h5>
                <div>
                    <div class="wrapper hot-games">
                        <div class="img-container games-leave-active games-leave-to run">
                            <a href="/desktop/slots/pragmatic-play">

                                <div class="game-item">
                                    <div class="hot-game-tag"> </div>
                                    <img class="" alt="Gates of Olympus"
                                        src="https://files.sitestatic.net/hot_games_img/mobile/normal/Gates_Of_Olympus.png" />

                                    <div class=" game-title">
                                        <div>
                                            <div class="text-overflow-line-clamp" style="font-weight:800;">
                                                Gates of Olympus
                                            </div>
                                            <div class="fs-sm">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="/desktop/slots/pragmatic-plays">

                                <div class="game-item">
                                    <div class="hot-game-tag"> </div>
                                    <img class="" alt="Starlight Princess"
                                        src="https://files.sitestatic.net/hot_games_img/mobile/normal/Starlight_Princess.png" />

                                    <div class=" game-title">
                                        <div>
                                            <div class="text-overflow-line-clamp" style="font-weight:800;">
                                                Starlight Princess
                                            </div>
                                            <div class="fs-sm">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>



                            <a href="/desktop/slots/pragmatic-play">

                                <div class="game-item">
                                    <div class="hot-game-tag"> </div>
                                    <img class="" alt="Starlight Princess 1000"
                                        src="https://files.sitestatic.net/hot_games_img/mobile/normal/Starlight_Princess_1000.png" />

                                    <div class=" game-title">
                                        <div>
                                            <div class="text-overflow-line-clamp" style="font-weight:800;">
                                                Starlight Princess 1000
                                            </div>
                                            <div class="fs-sm">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>



                            <a href="/desktop/slots/pragmatic-play">

                                <div class="game-item">
                                    <div class="hot-game-tag"> </div>
                                    <img class="" alt="Sweet Bonanza"
                                        src="https://files.sitestatic.net/hot_games_img/mobile/normal/Sweet_Bonanza.png" />

                                    <div class=" game-title">
                                        <div>
                                            <div class="text-overflow-line-clamp" style="font-weight:800;">
                                                Sweet Bonanza
                                            </div>
                                            <div class="fs-sm">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>



                            <a href="/desktop/slots/pragmatic-play">

                                <div class="game-item">
                                    <div class="hot-game-tag"> </div>
                                    <img class="" alt="Twilight Princess"
                                        src="https://files.sitestatic.net/hot_games_img/mobile/normal/Twilight_Princess.png" />

                                    <div class=" game-title">
                                        <div>
                                            <div class="text-overflow-line-clamp" style="font-weight:800;">
                                                Twilight Princess
                                            </div>
                                            <div class="fs-sm">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="/desktop/slots/pgsoft">
                                <div class="game-item">
                                    <div class="hot-game-tag"> </div>
                                    <img class="" alt="Mahjong Ways 2"
                                        src="https://files.sitestatic.net/hot_games_img/mobile/normal/Mahjong_Ways_Two.png" />

                                    <div class=" game-title">
                                        <div>
                                            <div class="text-overflow-line-clamp" style="font-weight:800;">
                                                Mahjong Ways 2
                                            </div>
                                            <div class="fs-sm">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="/desktop/slots/pgsoft">
                                <div class="game-item">
                                    <div class="hot-game-tag"> </div>
                                    <img class="" alt="Mahjong Ways"
                                        src="https://files.sitestatic.net/hot_games_img/mobile/normal/Mahjong_Ways.png" />

                                    <div class=" game-title">
                                        <div>
                                            <div class="text-overflow-line-clamp" style="font-weight:800;">
                                                Mahjong Ways
                                            </div>
                                            <div class="fs-sm">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>



                            <a href="/desktop/slots/pgsoft">

                                <div class="game-item">
                                    <div class="hot-game-tag"> </div>
                                    <img class="" alt="Lucky Neko"
                                        src="https://files.sitestatic.net/hot_games_img/mobile/normal/Lucky_Neko.png" />

                                    <div class=" game-title">
                                        <div>
                                            <div class="text-overflow-line-clamp" style="font-weight:800;">
                                                Lucky Neko
                                            </div>
                                            <div class="fs-sm">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>



                            <a href="/desktop/slots/pgsoft">

                                <div class="game-item">
                                    <div class="hot-game-tag"> </div>
                                    <img class="" alt="Wild Bandito"
                                        src="https://files.sitestatic.net/hot_games_img/mobile/normal/Wild_Bandito.png" />

                                    <div class=" game-title">
                                        <div>
                                            <div class="text-overflow-line-clamp" style="font-weight:800;">
                                                Wild Bandito
                                            </div>
                                            <div class="fs-sm">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>



                            <a href="/desktop/slots/fastspin">

                                <div class="game-item">
                                    <div class="hot-game-tag"> </div>
                                    <img class="" alt="Neko Riches"
                                        src="https://files.sitestatic.net/hot_games_img/mobile/normal/Neko_Riches.png" />

                                    <div class=" game-title">
                                        <div>
                                            <div class="text-overflow-line-clamp" style="font-weight:800;">
                                                Neko Riches
                                            </div>
                                            <div class="fs-sm">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="img-container  games-enter-active  games-enter-to run">
                            <a href="/desktop/slots/pragmatic-play">

                                <div class="game-item">
                                    <div class="hot-game-tag"> </div>
                                    <img class="" alt="Gates of Olympus"
                                        src="https://files.sitestatic.net/hot_games_img/mobile/normal/Gates_Of_Olympus.png" />

                                    <div class=" game-title">
                                        <div>
                                            <div class="text-overflow-line-clamp" style="font-weight:800;">
                                                Gates of Olympus
                                            </div>
                                            <div class="fs-sm">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>



                            <a href="/desktop/slots/pragmatic-play">

                                <div class="game-item">
                                    <div class="hot-game-tag"> </div>
                                    <img class="" alt="Starlight Princess"
                                        src="https://files.sitestatic.net/hot_games_img/mobile/normal/Starlight_Princess.png" />

                                    <div class=" game-title">
                                        <div>
                                            <div class="text-overflow-line-clamp" style="font-weight:800;">
                                                Starlight Princess
                                            </div>
                                            <div class="fs-sm">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>



                            <a href="/desktop/slots/pragmatic-play">

                                <div class="game-item">
                                    <div class="hot-game-tag"> </div>
                                    <img class="" alt="Starlight Princess 1000"
                                        src="https://files.sitestatic.net/hot_games_img/mobile/normal/Starlight_Princess_1000.png" />

                                    <div class=" game-title">
                                        <div>
                                            <div class="text-overflow-line-clamp" style="font-weight:800;">
                                                Starlight Princess 1000
                                            </div>
                                            <div class="fs-sm">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>



                            <a href="/desktop/slots/pragmatic-play">

                                <div class="game-item">
                                    <div class="hot-game-tag"> </div>
                                    <img class="" alt="Sweet Bonanza"
                                        src="https://files.sitestatic.net/hot_games_img/mobile/normal/Sweet_Bonanza.png" />

                                    <div class=" game-title">
                                        <div>
                                            <div class="text-overflow-line-clamp" style="font-weight:800;">
                                                Sweet Bonanza
                                            </div>
                                            <div class="fs-sm">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>



                            <a href="/desktop/slots/pragmatic-play">

                                <div class="game-item">
                                    <div class="hot-game-tag"> </div>
                                    <img class="" alt="Twilight Princess"
                                        src="https://files.sitestatic.net/hot_games_img/mobile/normal/Twilight_Princess.png" />

                                    <div class=" game-title">
                                        <div>
                                            <div class="text-overflow-line-clamp" style="font-weight:800;">
                                                Twilight Princess
                                            </div>
                                            <div class="fs-sm">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>



                            <a href="/desktop/slots/pgsoft">

                                <div class="game-item">
                                    <div class="hot-game-tag"> </div>
                                    <img class="" alt="Mahjong Ways 2"
                                        src="https://files.sitestatic.net/hot_games_img/mobile/normal/Mahjong_Ways_Two.png" />

                                    <div class=" game-title">
                                        <div>
                                            <div class="text-overflow-line-clamp" style="font-weight:800;">
                                                Mahjong Ways 2
                                            </div>
                                            <div class="fs-sm">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>



                            <a href="/desktop/slots/pgsoft">

                                <div class="game-item">
                                    <div class="hot-game-tag"> </div>
                                    <img class="" alt="Mahjong Ways"
                                        src="https://files.sitestatic.net/hot_games_img/mobile/normal/Mahjong_Ways.png" />

                                    <div class=" game-title">
                                        <div>
                                            <div class="text-overflow-line-clamp" style="font-weight:800;">
                                                Mahjong Ways
                                            </div>
                                            <div class="fs-sm">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>



                            <a href="/desktop/slots/pgsoft">

                                <div class="game-item">
                                    <div class="hot-game-tag"> </div>
                                    <img class="" alt="Lucky Neko"
                                        src="https://files.sitestatic.net/hot_games_img/mobile/normal/Lucky_Neko.png" />

                                    <div class=" game-title">
                                        <div>
                                            <div class="text-overflow-line-clamp" style="font-weight:800;">
                                                Lucky Neko
                                            </div>
                                            <div class="fs-sm">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>



                            <a href="/desktop/slots/pgsoft">

                                <div class="game-item">
                                    <div class="hot-game-tag"> </div>
                                    <img class="" alt="Wild Bandito"
                                        src="https://files.sitestatic.net/hot_games_img/mobile/normal/Wild_Bandito.png" />

                                    <div class=" game-title">
                                        <div>
                                            <div class="text-overflow-line-clamp" style="font-weight:800;">
                                                Wild Bandito
                                            </div>
                                            <div class="fs-sm">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>



                            <a href="/desktop/slots/fastspin">

                                <div class="game-item">
                                    <div class="hot-game-tag"> </div>
                                    <img class="" alt="Neko Riches"
                                        src="https://files.sitestatic.net/hot_games_img/mobile/normal/Neko_Riches.png" />

                                    <div class=" game-title">
                                        <div>
                                            <div class="text-overflow-line-clamp" style="font-weight:800;">
                                                Neko Riches
                                            </div>
                                            <div class="fs-sm">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>



                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!--home last transaction-->
        <section class="common-section">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                </div>
            </div>
        </section>
        <!--end of home last transaction-->

        <!--home info-->
        <div class="app-info row">

            <div class="col-md-6 col-lg-4 col-xs-12 gradient-border mobile-border _hide">
                <h4 class="title">BONUS FREEBET 100K/500K/1Juta</h4>
                <div class="mt-2 text-center">
                    <div>
                        <img src="<?php echo $s0['image']; ?>" style="max-width: 270px;" />
                    </div>
                    <h4 class="mt-3 sub-title">TUNGGU APALAGI???</h4>
                    <div class="fs-lg"><span>KAMI YANG TERBAIK!!!</span></div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 col-xs-12 gradient-border mobile-border _hide">
                <h4 class="title">MOTTO KAMI</h4>
                <div class="mt-2 text-center">
                    <div>
                        <img src="<?php echo $s0['image']; ?>" style="max-width: 270px;"/>
                    </div>
                    <h4 class="mt-3 sub-title">SITUS TEPERCAYA</h4>
                    <div class="fs-lg"><span>ANTI BANNED/BLOKIR</span></div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 col-xs-12 gradient-border mobile-border">
                <h4 class="title">KELEBIHAN LAYANAN</h4>
                <div class="ml-md-2 mt-2 ">
                    <div class="row center no-gutters">
                        <div class="col-xs-8">
                            <div class="fs-md">DEPOSIT</div>
                            <div>Waktu rata-rata</div>
                        </div>
                        <div class="col-xs-4 text-right">
                            <div class="mb-0 progressNumber">1<span class="fs-sm">Mins</span></div>
                        </div>
                        <div class="col-xs-12">
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: 1%" aria-valuenow="1"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3 center no-gutters">
                        <div class="col-xs-8">
                            <div class="fs-md">WITHDRAW</div>
                            <div>Waktu rata-rata</div>
                        </div>
                        <div class="col-xs-4 text-right">
                            <div class="mb-0 progressNumber">3<span class="fs-sm">Mins</span></div>
                        </div>
                        <div class="col-xs-12">
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: 3%" aria-valuenow="3"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                    <p class="mt-3 fs-sm">
                        *Referensi Waktu Rata-rata tidak berlaku jika bank offline, gangguan koneksi, dan informasi
                        yang tidak lengkap disediakan </p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 col-xs-12 gradient-border mobile-border">
                <h4 class="title">JENIS PERMAINAN</h4>

                <section class="carousel-fixed-height">
                    <div id="pagination-info" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#pagination-info" data-slide-to="0" class="active">
                            </li>
                            <li data-target="#pagination-info" data-slide-to="1" class="">
                            </li>
                        </ol>

                        <div class="carousel-inner" role="listbox">
                            <div class="item active">

                                <div class="d-block mb-3 pointer text-left">
                                    <div class="mb-0 font-weight-bold">1G P2P</div>
                                    <div style="white-space: normal;">Tuan rumah hingga 10 game P2P luar biasa
                                        dengan pemain sungguhan dan tanpa bot. </div>
                                </div>

                                <div class="d-block mb-3 pointer text-left">
                                    <div class="mb-0 font-weight-bold">TEMBAK IKAN</div>
                                    <div style="white-space: normal;">Game memancing yang sangat sederhana namun
                                        mengasyikkan, petualangan dengan banyak fitur yang akan dinikmati banyak
                                        orang. </div>
                                </div>

                                <div class="d-block mb-3 pointer text-left">
                                    <div class="mb-0 font-weight-bold">SLOTS</div>
                                    <div style="white-space: normal;">Lebih dari 10 merek slot terkenal untuk
                                        dipilih dengan lebih dari 1000+ permainan slot dengan sistem suara dan
                                        grafik yang realistis. </div>
                                </div>

                            </div>
                            <div class="item">

                                <div class="d-block mb-3 pointer text-left">
                                    <div class="mb-0 font-weight-bold">SPORTSBOOK</div>
                                    <div style="white-space: normal;">Ribuan peluang setiap hari untuk semua jenis
                                        taruhan olahraga di seluruh dunia. </div>
                                </div>

                                <div class="d-block mb-3 pointer text-left">
                                    <div class="mb-0 font-weight-bold">RNG</div>
                                    <div style="white-space: normal;">Menangkan lebih banyak dengan bertaruh dengan
                                        lebih banyak pilihan nomor di keno klasik dan pamungkas kami! </div>
                                </div>

                                <div class="d-block mb-3 pointer text-left">
                                    <div class="mb-0 font-weight-bold">LIVE CASINO</div>
                                    <div style="white-space: normal;">Rasakan pengalaman dan adrenalin yang sama
                                        seperti di kasino sungguhan. </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="col-md-6 col-lg-4 col-xs-12 gradient-border mobile-border">
                <h4 class="title">PUSAT INFO</h4>
                <div class="ml-md-3 mt-md-4">
                    <div class="pointer mb-md-4 mb-3"><a href="/info/how-sportsbook"><i
                                class="i-stop icon-stop2"></i>&nbsp;&nbsp; Cara Bermain SportsBook &nbsp;</a></div>
                    <div class="pointer mb-md-4 mb-3"><i class="i-stop icon-stop2"></i><a
                            href="/info/faq-deposit">&nbsp;&nbsp; Cara Melakukan Deposit
                            &nbsp;</a></div>
                    <div class="pointer "><i class="i-stop icon-stop2"></i><a
                            href="/info/faq-faq_withdrawal">&nbsp;&nbsp; Cara Melakukan
                            Withdraw&nbsp;</a></div>
                </div>
            </div>

            <?php
                $sql = "SELECT * FROM tb_social";
                $result = $conn->query($sql);

                // Menampilkan hasil query
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        $wa = $row['wa'];   
                        $tele = $row['tele']; 
                        $fb = $row['facebook'];
                        $ig = $row['instagram'];
                    }
                } else {
                    echo "Tidak ada data WhatsApp ditemukan";
                }   
            ?>

            <div class="col-md-6 col-lg-4 col-xs-12 gradient-border mobile-border">
                <h4 class="title">KONTAK LAYANAN PELANGGAN</h4>
                <section class="carousel-fixed-height">
                    <div id="pagination-contacts" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#pagination-contacts" data-slide-to="0" class="active"
                                style="margin-right:5px"></li>
                            <li data-target="#pagination-contacts" data-slide-to="1" class="" style="margin-right:5px">
                            </li>
                        </ol>

                        <div class="carousel-inner member-service" role="listbox">

                            <div class="item active">
                                <div class="content-item"><a class="d-block clearfix  mb-3 "
                                        href="<?php echo $sc['lc_mobile']; ?>"
                                        target="_blank">
                                        <div class="row no-gutters text-center text-lg-left">
                                            <div class="col-xs-12 col-lg-3 ">
                                                <i class="icon-comment"></i>
                                            </div>
                                            <div class="col-xs-12 col-lg-6 mobile-text">
                                                <div class="mb-0 font-weight-bold">Obrolan Langsung</div>
                                                <div>Klik disini</div>
                                            </div>
                                        </div>
                                    </a></div>
                                <div class="content-item"> <a class="d-block clearfix  mb-3"
                                        href="https://api.whatsapp.com/send?phone=<?php echo $wa;?>" target="_blank">
                                        <div class="row no-gutters text-center text-lg-left">
                                            <div class="col-xs-12 col-lg-3">
                                                <i class="icon-whatsapp"></i>
                                            </div>
                                            <div class="col-xs-12 col-lg-6 mobile-text">
                                                <div class="mb-0 font-weight-bold">WHATSAPP</div>
                                                <div><?php echo $wa;?></div>
                                            </div>
                                        </div>
                                    </a></div>
                                <div class="content-item"> <a class="d-block clearfix  mb-3"
                                        href="<?php echo $fb;?>" target="_blank">
                                        <div class="row no-gutters text-center text-lg-left">
                                            <div class="col-xs-12 col-lg-3">
                                                <i class="icon-facebook"></i>
                                            </div>
                                            <div class="col-xs-12 col-lg-6 mobile-text">
                                                <div class="mb-0 font-weight-bold">FACEBOOK</div>
                                                <div>Klik disini</div>
                                            </div>
                                        </div>
                                    </a></div>
                            </div>
                            <div class='item'>
                                <div class="content-item"> <a class="d-block clearfix  mb-3"
                                        href="<?php echo $ig;?>" target="_blank">
                                        <div class="row no-gutters text-center text-lg-left">
                                            <div class="col-xs-12 col-lg-3">
                                                <i class="icon-instagram"></i>
                                            </div>
                                            <div class="col-xs-12 col-lg-6 mobile-text">
                                                <div class="mb-0 font-weight-bold">INSTAGRAM</div>
                                                <div>Klik disini</div>
                                            </div>
                                        </div>
                                    </a></div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

        </div>
        <!--home info END-->
    </div>
    <?php
    $sql = "SELECT image FROM tb_banner WHERE cuid = 1";
    $result = $conn->query($sql);
    
    // Periksa apakah ada hasil dari query
    if ($result->num_rows > 0) {
        // Loop melalui hasil query
        while($row = $result->fetch_assoc()) {
            // Tampilkan gambar
            $image = $row['image'];
        }
    } else {
        echo "Tidak ada gambar yang ditemukan dengan status aktif.";
    }
    ?>    

    <script>
        $(document).ready(function () {
            console.log((!document.referrer.includes('__cf')))
            if (document.referrer.indexOf(location.protocol + "//" + location.host) === 0 && (!document.referrer
                    .includes('__cf'))) {
                sessionStorage.setItem('isClosedPopUp', 'true');
            }
            var isClosedPopUp = sessionStorage.getItem('isClosedPopUp');
            if (isClosedPopUp !== "true") {
                var popUpInst = $.fancybox.open({
                    src: `<a href="<?php echo $urlweb; ?>"><img src="<?php echo $image; ?>" ></a>`,
                    type: 'html',
                    opts: {
                        afterShow: function (instance, current) {
                            console.log(document.referrer.indexOf(location.protocol + "//" +
                                location.host));
                            console.log(location.protocol + "//" + location.host);
                            console.log(document.referrer);
                            console.log((!document.referrer.includes('__cf')))
                            if (document.referrer.indexOf(location.protocol + "//" + location
                                .host) === 0 && (!document.referrer.includes('__cf'))) {
                                sessionStorage.setItem('isClosedPopUp', 'true');
                            }
                        }
                    }
                });
            }
            ajax_jackpot();

            setInterval(function () {
                prize += getRandomIntInclusive(80000000, 3470)
                prize = parseFloat(prize);
                prize = prize;
                $('#jackpot_amount').html(window.currencyCode + ' ' + commaSeparateNumber(prize, true));
                //$('.jackpot_numbers_home').html(`IDR ` + commaSeparateNumber(prize));
            }, 751);
            
        });
    </script>
    <script>
        $(document).ready(function () {
            if (!sessionStorage.getItem('isClosedKycPopUp')) {
                sessionStorage.setItem('isClosedKycPopUp', 'false');
            }
            var isClosedKycPopUp = sessionStorage.getItem('isClosedKycPopUp');
        });
    </script>

    
</div>
<div class="site-footer">
    <div class="container">
        <div class="footer-content clearfix">
            <br />
            <div>
                <div class="pull-right footerlink">
                    <ul class="clearfix">
                        <li>
                            <div class="copyright">
                                @<?php echo $s0['instansi']; ?>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="footerlink">
                    <ul class="clearfix">
                        <li><a href="/info/faq-general">Tentang kami</a></li>
                        <li>|</li>
                        <li><a href="/info/faq-banking">Info Perbankan</a></li>
                        <li>|</li>
                        <li><a href="/info/faq-general">Pusat Info</a></li>
                        <li>|</li>
                        <li><a href="/contact-us">Hubungi kami</a></li>

                    </ul>
                </div>
            </div>
            <div style="height: 5px; margin-top: 5px;" class="dotted_line"></div>
            <br />
            <div class="footer-desc">
                <!--- check amp or not ------------------------>
                <div class="footer-title  text-center sdf" id="collapsible-footer">
                    <span id="more-txt" class=" ">More &nbsp;Info &nbsp;<i
                            class="i-collapse icon-chevron-thin-down"></i> </span>
                    <span id="less-txt" class=" hide  ">Less&nbsp;Info &nbsp;<i
                            class="i-collapse icon-chevron-thin-up"></i></span>
                </div>
                <div class="footer-body footertext text-justify  hide ">
                    <h1><?php echo $s0['instansi']; ?></h1>
                    <p><br></p>
                    <p>Apakah Anda penggemar permainan slot dan sedang mencari platform online yang terpercaya untuk
                        mencoba keberuntungan Anda? Tidak perlu mencari lebih jauh dari <?php echo $s0['instansi']; ?>, penyedia terkemuka
                        permainan slot online di Indonesia. Dengan win rate 99%, <a href="<?php echo $urlweb; ?>"
                            target="_blank"><?php echo $s0['instansi']; ?></a> menawarkan peluang terbesar untuk memenangkan hadiah besar
                        dalam dunia permainan slot online.</p>
                    <p><br></p>
                    <p>Koleksi permainan slot <a href="<?php echo $urlweb; ?>" target="_blank"><?php echo $s0['instansi']; ?></a> yang luas
                        menawarkan sesuatu untuk semua orang, dari mesin buah klasik hingga slot video terbaru
                        dengan alur cerita yang menarik dan grafis yang menakjubkan. Baik Anda seorang pemain
                        berpengalaman atau pemula, Anda akan menemukan game yang sesuai dengan selera dan tingkat
                        keahlian Anda.</p>
                    <p><br></p>
                    <h2>Pilihan Metode Pembayaran yang Aman dan Mudah di <?php echo $s0['instansi']; ?></h2>
                    <p><br></p>
                    <p><a href="<?php echo $urlweb; ?>" target="_blank"><?php echo $s0['instansi']; ?></a> menyediakan berbagai macam pilihan
                        metode pembayaran yang aman dan mudah bagi para pemainnya. Setiap metode pembayaran yang
                        tersedia di <?php echo $s0['instansi']; ?> telah melalui proses verifikasi dan sertifikasi ketat untuk memastikan
                        keamanan transaksi dan informasi pribadi para pemain.</p>
                    <p><br></p>
                    <p>Salah satu metode pembayaran yang paling populer di <a href="<?php echo $urlweb; ?>"
                            target="_blank"><?php echo $s0['instansi']; ?> slot</a> adalah e-wallet. E-wallet seperti OVO, Gopay, dan Dana
                        memungkinkan para pemain untuk melakukan deposit dan withdraw dengan cepat dan mudah. Metode
                        pembayaran lain yang tersedia di <?php echo $s0['instansi']; ?> termasuk transfer bank dan pulsa, yang memberikan
                        fleksibilitas dalam memilih cara terbaik untuk menambahkan dana ke akun.</p>
                    <p><br></p>
                    <p>Selain itu, <a href="<?php echo $urlweb; ?>" target="_blank"><?php echo $s0['instansi']; ?></a> juga menawarkan fitur
                        deposit otomatis yang memungkinkan para pemain untuk mengatur agar dana mereka secara
                        otomatis ditambahkan ke akun setiap kali saldo mencapai batas minimum yang ditentukan. Fitur
                        ini sangat membantu bagi para pemain yang ingin menghindari kelupaan atau kehabisan saldo
                        saat bermain.</p>
                    <p><br></p>
                    <p>Dengan pilihan metode pembayaran yang aman dan mudah ini, para pemain <?php echo $s0['instansi']; ?> dapat bermain
                        dengan tenang dan fokus pada permainan mereka.</p>
                    <p><br></p>
                    <h2>Bonus dan Promosi Menarik di <?php echo $s0['instansi']; ?></h2>
                    <p><br></p>
                    <p><a href="<?php echo $urlweb; ?>" target="_blank">daftar <?php echo $s0['instansi']; ?></a> tidak hanya menyediakan
                        permainan slot online yang menarik, tetapi juga menawarkan berbagai macam bonus dan promosi
                        yang sangat menguntungkan bagi para pemainnya. Bonus dan promosi ini tidak hanya
                        meningkatkan pengalaman bermain para pemain, tetapi juga dapat meningkatkan potensi
                        kemenangan mereka.</p>
                    <p><br></p>
                    <p>Salah satu bonus yang tersedia di <?php echo $s0['instansi']; ?> adalah bonus selamat datang. Para pemain yang baru
                        mendaftar di situs ini akan menerima bonus selamat datang yang besar, yang dapat digunakan
                        untuk mencoba berbagai permainan yang disediakan di <?php echo $s0['instansi']; ?>. Selain itu, <?php echo $s0['instansi']; ?> juga
                        menawarkan berbagai bonus deposit, seperti bonus cashback dan bonus referral.</p>
                    <p><br></p>
                    <p>Promosi lain yang tersedia di <?php echo $s0['instansi']; ?> adalah turnamen slot online yang menarik. Turnamen ini
                        memberikan kesempatan bagi para pemain untuk bersaing dengan pemain lain dan memenangkan
                        hadiah besar. Selain itu, <?php echo $s0['instansi']; ?> juga menawarkan program loyalitas yang memberikan hadiah
                        berupa poin setiap kali para pemain melakukan taruhan, yang dapat ditukarkan dengan bonus
                        dan promosi lainnya.</p>
                    <p><br></p>
                    <p><?php echo $s0['instansi']; ?> memastikan bahwa semua bonus dan promosi yang ditawarkan adalah adil dan transparan,
                        dan telah melewati proses verifikasi dan sertifikasi ketat untuk memastikan keamanan
                        transaksi dan informasi pribadi para pemain.</p>
                    <p><br></p>
                    <h2>Permainan Slot Online Terlengkap di <?php echo $s0['instansi']; ?></h2>
                    <p><br></p>
                    <p><?php echo $s0['instansi']; ?> adalah situs slot online terbaik dan terpercaya di Indonesia yang menawarkan berbagai
                        macam permainan slot online terlengkap. Dengan lebih dari 1.000 jenis permainan slot yang
                        tersedia, para pemain dapat memilih dari berbagai macam tema, fitur bonus, dan jenis
                        permainan yang berbeda untuk menemukan permainan yang paling cocok dengan kebutuhan dan
                        preferensi mereka.</p>
                    <p><br></p>
                    <p>Salah satu jenis permainan slot yang tersedia di <?php echo $s0['instansi']; ?> adalah classic slot. Permainan ini
                        biasanya memiliki tiga gulungan dan simbol-simbol klasik seperti buah-buahan, angka, dan
                        simbol-simbol lainnya. Classic slot sering kali menjadi favorit para pemain yang mencari
                        permainan yang sederhana dan mudah dimainkan.</p>
                    <p><br></p>
                    <p><a href="<?php echo $urlweb; ?>" target="_blank">Login <?php echo $s0['instansi']; ?></a> juga menawarkan jenis
                        permainan slot video yang lebih modern dan menarik. Permainan ini biasanya memiliki lima
                        gulungan atau lebih, serta fitur bonus dan animasi yang menarik. Jenis permainan ini sangat
                        populer di kalangan pemain slot online karena kemampuan mereka untuk menggabungkan tema yang
                        menarik dengan gameplay yang menghibur.</p>
                    <p><br></p>
                    <p>Untuk para pemain yang mencari kesempatan untuk memenangkan hadiah besar, <?php echo $s0['instansi']; ?> juga
                        menawarkan permainan slot jackpot progresif. Dalam permainan ini, sebagian dari taruhan yang
                        ditempatkan oleh para pemain akan ditambahkan ke jackpot yang terus meningkat hingga ada
                        pemain yang berhasil memenangkannya.</p>
                    <p><br></p>
                    <p><a href="<?php echo $urlweb; ?>" target="_blank"><?php echo $s0['instansi']; ?> rtp</a> memastikan bahwa semua
                        permainan slot yang disediakan adil dan acak, dengan persentase pembayaran yang tinggi untuk
                        memberikan peluang kemenangan yang lebih besar bagi para pemain. Selain itu, situs ini juga
                        menawarkan akses mudah dan cepat, serta layanan pelanggan 24/7 untuk menjamin pengalaman
                        bermain yang menyenangkan dan nyaman bagi para pemainnya.</p>
                    <p><br></p>
                    <p>Jadi, tunggu apa lagi? Bergabunglah dengan <?php echo $s0['instansi']; ?> sekarang dan temukan permainan slot online
                        terlengkap dan terbaik di Indonesia!</p>
                </div>

            </div>
            <br />
            <div class="footer-misc">
                <div class="row equal" style="justify-content:space-between;">
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="title">INFORMASI</div>
                        <div style="height: 5px; margin-top: 15px;" class="dotted_line"></div>
                        <div class="box-wrapper mt-4">
                            <div class="subtitle">Registrasi</div>
                            <div class="box-content mt-2">Bergabunglah <?php echo $s0['instansi']; ?> untuk mengalami permainan yang luar
                                biasa dan menarik. Nikmati kepuasan dengan bonus dan promosi di situs kami.</div>
                        </div>
                        <div class="box-wrapper mt-4">
                            <div class="subtitle ">Afiliasi</div>
                            <div class="box-content mt-2">Menjadi mitra kami dengan bergabung dengan afiliasi
                                <?php echo $s0['instansi']; ?>. Dapatkan penghasilan dan komisi Anda setiap bulan dengan mengundang
                                teman-teman Anda untuk bermain di <?php echo $s0['instansi']; ?>.</div>
                        </div>
                        <div class="box-wrapper mt-4">
                            <div class="subtitle ">Game yang bertanggung jawab</div>
                            <div class="box-content mt-2"><?php echo $s0['instansi']; ?> menawarkan game online terbaik dengan tanggung
                                jawab penuh dan game fairplay. Keamanan selalu menjadi prioritas kami. </div>
                        </div>
                        <div class="box-wrapper mt-4">
                            <div class="subtitle ">Keamanan</div>
                            <div class="box-content mt-2">
                                <div class="box-content mt-2"><?php echo $s0['instansi']; ?> menawarkan game online terbaik dengan tanggung
                                    jawab penuh dan game fairplay. Keamanan selalu menjadi prioritas kami.</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="title">PRODUK</div>
                        <div style="height: 5px; margin-top: 15px;" class="dotted_line"></div>
                        <div class="box-wrapper mt-4">
                            <div class="subtitle">Sportsbook & Permainan Langsung</div>
                            <div class="box-content mt-2">Dapatkan ribuan peluang olahraga setiap hari di <?php echo $s0['instansi']; ?>.
                                Kemungkinan untuk olahraga paling populer seperti sepak bola, bola basket, tenis,
                                hoki tersedia dengan Permainan Langsung setiap hari.</div>
                        </div>
                        <div class="box-wrapper mt-4">
                            <div class="subtitle ">Kasino online</div>
                            <div class="box-content mt-2"><?php echo $s0['instansi']; ?> menyediakan permainan kasino online terbaik
                                seperti Baccarat, Blackjack, Roulete, Sic Bo, Poker, dan permainan populer lainnya
                                di kasino online.</div>
                        </div>
                        <div class="box-wrapper mt-4">
                            <div class="subtitle ">Live Kasino</div>
                            <div class="box-content mt-2">Main di live casino <?php echo $s0['instansi']; ?> dan Anda akan merasakan
                                sensasi kasino yang sebenarnya. Pilih berbagai permainan kasino yang Anda inginkan.
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="title">PUSAT INFO</div>
                        <div style="height: 5px; margin-top: 15px;" class="dotted_line"></div>
                        <div class="box-wrapper mt-4">
                            <div class="subtitle">Promosi</div>
                            <div class="box-content mt-2">Dapatkan banyak promosi dari <?php echo $s0['instansi']; ?> seperti bonus
                                sambutan, bonus setoran, dan diskon tunai. Merasa puas dengan bergabung dalam
                                promosi <?php echo $s0['instansi']; ?>.</div>
                        </div>
                        <div class="box-wrapper mt-4">
                            <div class="subtitle ">Bantuan</div>
                            <div class="box-content mt-2">Jika Anda memiliki masalah saat bermain Permainan online
                                di <?php echo $s0['instansi']; ?>, Anda dapat segera menghubungi kami, dan kami selalu siap membantu Anda
                                24 jam.</div>
                        </div>
                        <div class="box-wrapper mt-4">
                            <div class="subtitle ">Metode Transaksi</div>
                            <div class="box-content mt-2"><?php echo $s0['instansi']; ?> menyediakan bank lokal dan internasional untuk
                                memudahkan setiap pelanggan untuk melakukan deposit dan penarikan. Metode transaksi
                                dijamin aman, cepat, dan andal.</div>
                        </div>
                        <div class="box-wrapper mt-4">
                            <div class="subtitle ">Hubungi kami</div>
                            <div class="box-content mt-2">
                                <div class="box-content mt-2">Anda dapat menghubungi <?php echo $s0['instansi']; ?> kapan saja jika Anda
                                    memiliki pertanyaan dan masalah. Anda dapat menghubungi kami melalui livechat,
                                    telepon, Skype, atau email. Staf kami selalu siap 24 jam untuk Anda.</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="title">INFO BETTING</div>
                        <div style="height: 5px; margin-top: 15px;" class="dotted_line"></div>
                        <div class="box-wrapper mt-4">
                            <div class="subtitle">Hasil Pertandingan Olahraga</div>
                            <div class="box-content mt-2">Hasil lengkap dari Permainan olahraga Anda tersedia di
                                <?php echo $s0['instansi']; ?>. Dapatkan hasil terbaru yang Anda mainkan dalam riwayat Anda.</div>
                        </div>
                        <div class="box-wrapper mt-4">
                            <div class="subtitle ">Statistik Permainan</div>
                            <div class="box-content mt-2">Akses semua detail Permainan olahraga yang Anda mainkan
                                dan periksa riwayat Permainan secara penuh di <?php echo $s0['instansi']; ?>.</div>
                        </div>
                        <div class="box-wrapper mt-4">
                            <div class="subtitle ">Permainan olahraga</div>
                            <div class="box-content mt-2">Permainan pada permainan olahraga, dapatkan rintangan
                                lengkap setiap hari dan rasakan kesenangan dengan sportsbook <?php echo $s0['instansi']; ?>.</div>
                        </div>
                        <div class="box-wrapper mt-4">
                            <div class="subtitle ">Permainan Kasino</div>
                            <div class="box-content mt-2">
                                <div class="box-content mt-2">Rasakan kemewahan Permainan kasino, selesaikan riwayat
                                    Permainan lengkap yang telah Anda mainkan. Per Permainan kasino di <?php echo $s0['instansi']; ?>,
                                    cepat, aman, dan menyenangkan.</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div style="height: 5px; margin-top: 15px;" class="dotted_line"></div>
            <div class="clearfix mt-3">

                <div class="pull-left text-left footerlink">
                    <div class="small small-theme-color">
                        Platform Penyedia Layanan </div>
                    <div class="mt-2 footer_btm_logo_img">
                        <img class="img-fluid" alt="<?php echo $s0['instansi']; ?>"
                            src="<?php echo $s0['image']; ?>" width="200px" />
                    </div>
                </div>
                <div class="pull-right social-icons">
                    <a href="https://www.facebook.com/<?php echo $s0['instansi']; ?>indonesia/" target="_blank"
                        class="button icon circle is-outline facebook"><i class="icon-facebook"></i></a>
                    <a href="#" target="_blank" class="button icon circle is-outline twitter"><i
                            class="icon-twitter"></i></a>
                    <a href="https://www.instagram.com/<?php echo $s0['instansi']; ?>_indonesia/" target="_blank"
                        class="button icon circle is-outline instagram"><i class="icon-instagram"></i></a>
                    <a href="#" target="_blank" class="button icon circle is-outline youtube"><i
                            class="icon-youtube-play"></i></a>
                </div>
            </div>
            <div style="height: 5px; margin-top: 15px;" class="dotted_line"></div>
            <div class="clearfix mt-3">
                <div class="row">
                    <div class="col-md-10 col-sm-8">
                        <div class="pull-left text-left footerlink">
                            <div class="small">
                                Cara Pembayaran </div>
                            <div class="payment_imgs mt-2">
                                <img class="img-fluid" style="width: 150px; border-radius:10px"
                                    src="https://files.sitestatic.net/sprites/bank_logos/bank_col.jpg?v=3">
                                <img class="img-fluid" style="width: 150px; border-radius:10px"
                                    src="https://files.sitestatic.net/sprites/bank_logos/ewallet_col.jpg?v=3">

                                <img class="img-fluid" style="width: 150px; border-radius:10px"
                                    src="https://files.sitestatic.net/sprites/bank_logos/pulsa_col.jpg?v=3">

                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-4">
                        <div class="pull-right text-right footerlink">
                            <div class="small">
                                Browser yang Disarankan </div>
                            <ul class="text-t600 mt-2">
                                <li>
                                    <h2><i class="icon-chrome"></i></h2>
                                </li>
                                <li>
                                    <h2><i class="icon-firefox"></i></h2>
                                </li>
                                <li class="pr-0">
                                    <h2><i class="icon-safari"></i></h2>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="clearfix mt-3">
                <div class="pull-left footerlink">
                    <div class="small">
                        Game Provider </div>
                    <div class="footer_pwrd_by_logo">
                        <img class="img-fluid" src="https://files.sitestatic.net/images/footer_provider_col.png?v=0.3">

                    </div>

                </div>
            </div>

            <br />
            <br />
        </div>
    </div>
</div>
<?php
include "footer.php";
?>