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

<?php
error_reporting(0);

$validNotifications = [1];

if (!empty($_GET['notif']) && in_array($_GET['notif'], $validNotifications)) {
    $popupContent = '';
    $popupIcon = 'info'; // Default icon

    switch ($_GET['notif']) {
        case 1:
            $popupContent = '<strong>Akun Anda Sedang Dalam Masa Promosi Silahkan Melakukan Deposit Terlebih Dahulu</strong>';
            $popupIcon = '';
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

<div class="container pt-1 games-category">

    <h2 class="title">slots</h2>
    <div class="row">
        <script type="text/javascript">
            var windowNames = JSON.parse('{"lottery":"lottery","live":"king4d","togel":"king4d"}');
        </script>


        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 image-grid">




                <div class="col-xs-4 col-sm-3 col-md-2 box">

                    <div class="game-wrapper ">


                        <a href="<?php echo $urlweb; ?>/m/slots/game/?provider=pr" rel="opener" class="game">

                            <video autoplay loop muted inline width="100%" height="100%" class="pgsoft_video">
                                <source
                                    src="https://files.sitestatic.net/GameImage/SlotsProviders/mobile/normal/PPLogo.webp?v=0.12"
                                    type="video/webp">
                                <source
                                    src="https://files.sitestatic.net/GameImage/SlotsProviders/mobile/normal/PPLogo.mp4?v=0.12"
                                    type="video/mp4">
                                <img class="img-fluid lazy" alt="PRAGMATIC"
                                    data-src="https://files.sitestatic.net/GameImage/SlotsProviders/mobile/normal/slot_pp.jpg?v=9.5"
                                    src="" />
                            </video>
                            <div class="g-title">PRAGMATIC</div>
                        </a>
                    </div>
                </div>                

                <div class="col-xs-4 col-sm-3 col-md-2 box">

                    <div class="game-wrapper ">


                        <a href="<?php echo $urlweb; ?>/m/slots/game/?provider=pg" rel="opener" class="game">

                            <video autoplay loop muted inline width="100%" height="100%" class="pgsoft_video">
                                <source
                                    src="https://files.sitestatic.net/GameImage/SlotsProviders/mobile/normal/PGLogo.webp?v=0.12"
                                    type="video/webp">
                                <source
                                    src="https://files.sitestatic.net/GameImage/SlotsProviders/mobile/normal/PGLogo.mp4?v=0.12"
                                    type="video/mp4">
                                <img class="img-fluid lazy" alt="PGSOFT"
                                    data-src="https://files.sitestatic.net/GameImage/SlotsProviders/mobile/normal/slot_pgsoft.jpg?v=0.1"
                                    src="" />
                            </video>


                            <div class="g-title">PGSOFT</div>

                        </a>

                    </div>
                </div>

                <div class="col-xs-4 col-sm-3 col-md-2 box">

                    <div class="game-wrapper ">


                        <a href="<?php echo $urlweb; ?>/m/slots/game/?provider=jk" rel="opener" class="game">

                            <img class="img-fluid lazy" alt="JOKER"
                                data-src="https://files.sitestatic.net/GameImage/SlotsProviders/mobile/normal/slot_joker.jpg?v=9.1"
                                src="" />
                            <div class="loader-b" *ngIf="!showEle"></div>


                            <div class="g-title">JOKER</div>

                        </a>

                    </div>
                </div>

                <div class="col-xs-4 col-sm-3 col-md-2 box">

                    <div class="game-wrapper ">


                        <a href="<?php echo $urlweb; ?>/m/slots/game/?provider=hb" rel="opener" class="game">

                            <img class="img-fluid lazy" alt="HABANERO"
                                data-src="https://files.sitestatic.net/GameImage/SlotsProviders/mobile/normal/slot_haba.jpg?v=9"
                                src="" />
                            <div class="loader-b" *ngIf="!showEle"></div>


                            <div class="g-title">HABANERO</div>

                        </a>

                    </div>
                </div>

                <div class="col-xs-4 col-sm-3 col-md-2 box">

                    <div class="game-wrapper ">


                        <a href="<?php echo $urlweb; ?>/m/slots/game/?provider=playtech" rel="opener" class="game">

                            <img class="img-fluid lazy" alt="PLAYTECH"
                                data-src="https://files.sitestatic.net/GameImage/SlotsProviders/mobile/normal/slot_pt.jpg?v=9.1"
                                src="" />
                            <div class="loader-b" *ngIf="!showEle"></div>


                            <div class="g-title">PLAYTECH</div>

                        </a>

                    </div>
                </div>

                <div class="col-xs-4 col-sm-3 col-md-2 box">

                    <div class="game-wrapper ">


                        <a href="<?php echo $urlweb; ?>/m/slots/game/?provider=mg" rel="opener" class="game">

                            <img class="img-fluid lazy" alt="MICRO GAMING"
                                data-src="https://files.sitestatic.net/GameImage/SlotsProviders/mobile/normal/slot_mg.jpg?v=13"
                                src="" />
                            <div class="loader-b" *ngIf="!showEle"></div>


                            <div class="g-title">MICRO GAMING</div>

                        </a>

                    </div>
                </div>

                <div class="col-xs-4 col-sm-3 col-md-2 box">

                    <div class="game-wrapper ">


                        <a href="<?php echo $urlweb; ?>/m/slots/game/?provider=hacksaw" rel="opener" class="game">

                            <img class="img-fluid lazy" alt="HACKSAW"
                                data-src="https://files.sitestatic.net/GameImage/SlotsProviders/mobile/normal/Hacksaw_Game_Slot.png"
                                src="" />
                            <div class="loader-b" *ngIf="!showEle"></div>


                            <div class="g-title">HACKSAW</div>

                        </a>

                    </div>
                </div>

                <div class="col-xs-4 col-sm-3 col-md-2 box">

                    <div class="game-wrapper ">


                        <a href="<?php echo $urlweb; ?>/m/slots/game/?provider=relax" rel="opener" class="game">

                            <img class="img-fluid lazy" alt="RELAX GAMING"
                                data-src="https://files.sitestatic.net/GameImage/SlotsProviders/mobile/normal/relax.jpg"
                                src="" />
                            <div class="loader-b" *ngIf="!showEle"></div>


                            <div class="g-title">RELAX GAMING</div>

                        </a>

                    </div>
                </div>

                <div class="col-xs-4 col-sm-3 col-md-2 box">

                    <div class="game-wrapper ">


                        <a href="<?php echo $urlweb; ?>/m/slots/game/?provider=playngo" rel="opener" class="game">

                            <img class="img-fluid lazy" alt="PLAYNGO"
                                data-src="https://files.sitestatic.net/GameImage/SlotsProviders/mobile/normal/slot_png.jpg?v=9.1"
                                src="" />
                            <div class="loader-b" *ngIf="!showEle"></div>


                            <div class="g-title">PLAYNGO</div>

                        </a>

                    </div>
                </div>

                <div class="col-xs-4 col-sm-3 col-md-2 box">

                    <div class="game-wrapper ">


                        <a href="<?php echo $urlweb; ?>/m/slots/game/?provider=cq9" rel="opener" class="game">

                            <img class="img-fluid lazy" alt="CQ9"
                                data-src="https://files.sitestatic.net/GameImage/SlotsProviders/mobile/normal/slot_cq9.jpg?v=9"
                                src="" />
                            <div class="loader-b" *ngIf="!showEle"></div>


                            <div class="g-title">CQ9</div>

                        </a>

                    </div>
                </div>

                <div class="col-xs-4 col-sm-3 col-md-2 box">

                    <div class="game-wrapper ">


                        <a href="<?php echo $urlweb; ?>/m/slots/game/?provider=ygg" rel="opener" class="game">

                            <img class="img-fluid lazy" alt="YGG"
                                data-src="https://files.sitestatic.net/GameImage/SlotsProviders/mobile/normal/YGG.jpg?v=1.0"
                                src="" />
                            <div class="loader-b" *ngIf="!showEle"></div>


                            <div class="g-title">YGG</div>

                        </a>

                    </div>
                </div>

                <div class="col-xs-4 col-sm-3 col-md-2 box">

                    <div class="game-wrapper ">


                        <a href="<?php echo $urlweb; ?>/m/slots/game/?provider=playson" rel="opener" class="game">

                            <img class="img-fluid lazy" alt="PLAYSON"
                                data-src="https://files.sitestatic.net/GameImage/SlotsProviders/mobile/normal/slot_playson.jpg?v=10"
                                src="" />
                            <div class="loader-b" *ngIf="!showEle"></div>


                            <div class="g-title">PLAYSON</div>

                        </a>

                    </div>
                </div>

                <div class="col-xs-4 col-sm-3 col-md-2 box">

                    <div class="game-wrapper ">


                        <a href="<?php echo $urlweb; ?>/m/slots/game/?provider=spadegaming" rel="opener" class="game">

                            <img class="img-fluid lazy" alt="SPADE GAMING"
                                data-src="https://files.sitestatic.net/GameImage/SlotsProviders/mobile/normal/slot_sg.jpg?v=9"
                                src="" />
                            <div class="loader-b" *ngIf="!showEle"></div>


                            <div class="g-title">SPADE GAMING</div>

                        </a>

                    </div>
                </div>

                <div class="col-xs-4 col-sm-3 col-md-2 box">

                    <div class="game-wrapper ">


                        <a href="<?php echo $urlweb; ?>/m/slots/game/?provider=booongo" rel="opener" class="game">

                            <img class="img-fluid lazy" alt="BNG"
                                data-src="https://files.sitestatic.net/GameImage/SlotsProviders/mobile/normal/booongo.jpg"
                                src="" />
                            <div class="loader-b" *ngIf="!showEle"></div>


                            <div class="g-title">BNG</div>

                        </a>

                    </div>
                </div>

                <div class="col-xs-4 col-sm-3 col-md-2 box">

                    <div class="game-wrapper ">


                        <a href="<?php echo $urlweb; ?>/m/slots/game/?provider=fastspin" rel="opener" class="game">

                            <img class="img-fluid lazy" alt="FASTSPIN"
                                data-src="https://files.sitestatic.net/GameImage/SlotsProviders/mobile/normal/fastspin.jpg"
                                src="" />
                            <div class="loader-b" *ngIf="!showEle"></div>


                            <div class="g-title">FASTSPIN</div>

                        </a>

                    </div>
                </div>

                <div class="col-xs-4 col-sm-3 col-md-2 box">

                    <div class="game-wrapper ">


                        <a href="<?php echo $urlweb; ?>/m/slots/game/?provider=toptrend-gaming" rel="opener" class="game">

                            <img class="img-fluid lazy" alt="TOPTREND GAMING"
                                data-src="https://files.sitestatic.net/GameImage/SlotsProviders/mobile/normal/slot_ttg.jpg?v=9"
                                src="" />
                            <div class="loader-b" *ngIf="!showEle"></div>


                            <div class="g-title">TOPTREND GAMING</div>

                        </a>

                    </div>
                </div>

                <div class="col-xs-4 col-sm-3 col-md-2 box">

                    <div class="game-wrapper ">


                        <a href="<?php echo $urlweb; ?>/m/slots/game/?provider=booming" rel="opener" class="game">

                            <img class="img-fluid lazy" alt="BOOMING"
                                data-src="https://files.sitestatic.net/GameImage/SlotsProviders/mobile/normal/slot_booming.jpg?v=9"
                                src="" />
                            <div class="loader-b" *ngIf="!showEle"></div>


                            <div class="g-title">BOOMING</div>

                        </a>

                    </div>
                </div>

                <div class="col-xs-4 col-sm-3 col-md-2 box">

                    <div class="game-wrapper ">


                        <a href="<?php echo $urlweb; ?>/m/slots/game/?provider=skywind" rel="opener" class="game">

                            <img class="img-fluid lazy" alt="SKYWIND"
                                data-src="https://files.sitestatic.net/GameImage/SlotsProviders/mobile/normal/skywind.png?v=1"
                                src="" />
                            <div class="loader-b" *ngIf="!showEle"></div>


                            <div class="g-title">SKYWIND</div>

                        </a>

                    </div>
                </div>

                <div class="col-xs-4 col-sm-3 col-md-2 box">

                    <div class="game-wrapper ">


                        <a href="<?php echo $urlweb; ?>/m/slots/game/?provider=playstar" rel="opener" class="game">

                            <img class="img-fluid lazy" alt="PLAYSTAR"
                                data-src="https://files.sitestatic.net/GameImage/SlotsProviders/mobile/normal/playstar.jpg?v=0.1"
                                src="" />
                            <div class="loader-b" *ngIf="!showEle"></div>


                            <div class="g-title">PLAYSTAR</div>

                        </a>

                    </div>
                </div>

                <div class="col-xs-4 col-sm-3 col-md-2 box">

                    <div class="game-wrapper ">


                        <a href="<?php echo $urlweb; ?>/m/slots/game/?provider=redtiger" rel="opener" class="game">

                            <img class="img-fluid lazy" alt="REDTIGER"
                                data-src="https://files.sitestatic.net/GameImage/SlotsProviders/mobile/normal/redtiger.jpg"
                                src="" />
                            <div class="loader-b" *ngIf="!showEle"></div>


                            <div class="g-title">REDTIGER</div>

                        </a>

                    </div>
                </div>

                <div class="col-xs-4 col-sm-3 col-md-2 box">

                    <div class="game-wrapper ">


                        <a href="<?php echo $urlweb; ?>/m/slots/game/?provider=evoplay" rel="opener" class="game">

                            <img class="img-fluid lazy" alt="EVOPLAY"
                                data-src="https://files.sitestatic.net/GameImage/SlotsProviders/mobile/normal/evoplay.jpg"
                                src="" />
                            <div class="loader-b" *ngIf="!showEle"></div>


                            <div class="g-title">EVOPLAY</div>

                        </a>

                    </div>
                </div>

                <div class="col-xs-4 col-sm-3 col-md-2 box">

                    <div class="game-wrapper ">


                        <a href="<?php echo $urlweb; ?>/m/slots/game/?provider=netent" rel="opener" class="game">

                            <img class="img-fluid lazy" alt="NETENT"
                                data-src="https://files.sitestatic.net/GameImage/SlotsProviders/mobile/normal/netent.jpg"
                                src="" />
                            <div class="loader-b" *ngIf="!showEle"></div>


                            <div class="g-title">NETENT</div>

                        </a>

                    </div>
                </div>

                <div class="col-xs-4 col-sm-3 col-md-2 box">

                    <div class="game-wrapper ">


                        <a href="<?php echo $urlweb; ?>/m/slots/game/?provider=nolimitcity" rel="opener" class="game">

                            <img class="img-fluid lazy" alt="NOLIMITCITY"
                                data-src="https://files.sitestatic.net/GameImage/SlotsProviders/mobile/normal/NLC.jpg"
                                src="" />
                            <div class="loader-b" *ngIf="!showEle"></div>


                            <div class="g-title">NOLIMITCITY</div>

                        </a>

                    </div>
                </div>

                <div class="col-xs-4 col-sm-3 col-md-2 box">

                    <div class="game-wrapper ">


                        <a href="<?php echo $urlweb; ?>/m/slots/game/?provider=mancalagaming" rel="opener" class="game">

                            <img class="img-fluid lazy" alt="MANCALA GAMING"
                                data-src="https://files.sitestatic.net/GameImage/SlotsProviders/mobile/normal/mancalagaming.jpg?v=0.1"
                                src="" />
                            <div class="loader-b" *ngIf="!showEle"></div>


                            <div class="g-title">MANCALA GAMING</div>

                        </a>

                    </div>
                </div>

                <div class="col-xs-4 col-sm-3 col-md-2 box">

                    <div class="game-wrapper ">


                        <a href="<?php echo $urlweb; ?>/m/slots/game/?provider=eagaming" rel="opener" class="game">

                            <img class="img-fluid lazy" alt="EA GAMING"
                                data-src="https://files.sitestatic.net/GameImage/SlotsProviders/mobile/normal/eagaming.jpg?v=0.1"
                                src="" />
                            <div class="loader-b" *ngIf="!showEle"></div>


                            <div class="g-title">EA GAMING</div>

                        </a>

                    </div>
                </div>

                <div class="col-xs-4 col-sm-3 col-md-2 box">

                    <div class="game-wrapper ">


                        <a href="<?php echo $urlweb; ?>/m/slots/game/?provider=sbo" rel="opener" class="game">

                            <img class="img-fluid lazy" alt="SBO"
                                data-src="https://files.sitestatic.net/GameImage/SlotsProviders/mobile/normal/sbo_slot.jpg?v=0.1"
                                src="" />
                            <div class="loader-b" *ngIf="!showEle"></div>


                            <div class="g-title">SBO</div>

                        </a>

                    </div>
                </div>

                <div class="col-xs-4 col-sm-3 col-md-2 box">

                    <div class="game-wrapper ">


                        <a href="<?php echo $urlweb; ?>/m/slots/game/?provider=kagaming" rel="opener" class="game">

                            <img class="img-fluid lazy" alt="KA GAMING"
                                data-src="https://files.sitestatic.net/GameImage/SlotsProviders/mobile/normal/KA_Gaming_Slot.jpg?v=0.1"
                                src="" />
                            <div class="loader-b" *ngIf="!showEle"></div>


                            <div class="g-title">KA GAMING</div>

                        </a>

                    </div>
                </div>

                <div class="col-xs-4 col-sm-3 col-md-2 box">

                    <div class="game-wrapper ">


                        <a href="<?php echo $urlweb; ?>/m/slots/game/?provider=nagagames" rel="opener" class="game">

                            <img class="img-fluid lazy" alt="NAGA GAMES"
                                data-src="https://files.sitestatic.net/GameImage/SlotsProviders/mobile/normal/naga_gaming_slot.jpg?v=0.1"
                                src="" />
                            <div class="loader-b" *ngIf="!showEle"></div>


                            <div class="g-title">NAGA GAMES</div>

                        </a>

                    </div>
                </div>

                <div class="col-xs-4 col-sm-3 col-md-2 box">

                    <div class="game-wrapper ">


                        <div class="game maintenance-alert">
                            <img class="img-fluid lazy" alt="AIS GAMING"
                                data-src="https://files.sitestatic.net/GameImage/SlotsProviders/mobile/maintenance/ais.png?v=0.1"
                                src="" />
                            <div class="loader-b" *ngIf="!showEle"></div>


                            <div class="g-title">AIS GAMING</div>

                        </div>

                    </div>
                </div>

                <div class="col-xs-4 col-sm-3 col-md-2 box">

                    <div class="game-wrapper ">


                        <a href="<?php echo $urlweb; ?>/m/slots/game/?provider=dragoonsoft" rel="opener" class="game">

                            <img class="img-fluid lazy" alt="DRAGOON SOFT"
                                data-src="https://files.sitestatic.net/GameImage/SlotsProviders/mobile/normal/dragoon_soft.jpg"
                                src="" />
                            <div class="loader-b" *ngIf="!showEle"></div>


                            <div class="g-title">DRAGOON SOFT</div>

                        </a>

                    </div>
                </div>

                <div class="col-xs-4 col-sm-3 col-md-2 box">

                    <div class="game-wrapper ">


                        <a href="<?php echo $urlweb; ?>/m/slots/game/?provider=reevo" rel="opener" class="game">

                            <img class="img-fluid lazy" alt="REEVO"
                                data-src="https://files.sitestatic.net/GameImage/SlotsProviders/mobile/normal/reevo.jpg"
                                src="" />
                            <div class="loader-b" *ngIf="!showEle"></div>


                            <div class="g-title">REEVO</div>

                        </a>

                    </div>
                </div>

                <div class="col-xs-4 col-sm-3 col-md-2 box">

                    <div class="game-wrapper ">


                        <a href="<?php echo $urlweb; ?>/m/slots/game/?provider=live22" rel="opener" class="game">

                            <img class="img-fluid lazy" alt="LIVE22"
                                data-src="https://files.sitestatic.net/GameImage/SlotsProviders/mobile/normal/live22.jpg?v=0.3"
                                src="" />
                            <div class="loader-b" *ngIf="!showEle"></div>


                            <div class="g-title">LIVE22</div>

                        </a>

                    </div>
                </div>

                <div class="col-xs-4 col-sm-3 col-md-2 box">

                    <div class="game-wrapper ">


                        <a href="<?php echo $urlweb; ?>/m/slots/game/?provider=fachai" rel="opener" class="game">

                            <img class="img-fluid lazy" alt="FACHAI"
                                data-src="https://files.sitestatic.net/GameImage/SlotsProviders/mobile/normal/slot_fa_chai.jpg"
                                src="" />
                            <div class="loader-b" *ngIf="!showEle"></div>


                            <div class="g-title">FACHAI</div>

                        </a>

                    </div>
                </div>

                <div class="col-xs-4 col-sm-3 col-md-2 box">

                    <div class="game-wrapper ">


                        <a href="<?php echo $urlweb; ?>/m/slots/game/?provider=apollo777" rel="opener" class="game">

                            <img class="img-fluid lazy" alt="APOLLO777"
                                data-src="https://files.sitestatic.net/GameImage/SlotsProviders/mobile/normal/apollo777.jpg"
                                src="" />
                            <div class="loader-b" *ngIf="!showEle"></div>


                            <div class="g-title">APOLLO777</div>

                        </a>

                    </div>
                </div>

                <div class="col-xs-4 col-sm-3 col-md-2 box">

                    <div class="game-wrapper ">


                        <a href="<?php echo $urlweb; ?>/m/slots/game/?provider=bgaming" rel="opener" class="game">

                            <img class="img-fluid lazy" alt="BGAMING"
                                data-src="https://files.sitestatic.net/GameImage/SlotsProviders/mobile/normal/bgaming.jpg"
                                src="" />
                            <div class="loader-b" *ngIf="!showEle"></div>


                            <div class="g-title">BGAMING</div>

                        </a>

                    </div>
                </div>

                <div class="col-xs-4 col-sm-3 col-md-2 box">

                    <div class="game-wrapper ">


                        <a href="<?php echo $urlweb; ?>/m/slots/game/?provider=advantplay" rel="opener" class="game">

                            <img class="img-fluid lazy" alt="ADVANTPLAY"
                                data-src="https://files.sitestatic.net/GameImage/SlotsProviders/mobile/normal/advantplay_slot.jpg"
                                src="" />
                            <div class="loader-b" *ngIf="!showEle"></div>


                            <div class="g-title">ADVANTPLAY</div>

                        </a>

                    </div>
                </div>

                <div class="col-xs-4 col-sm-3 col-md-2 box">

                    <div class="game-wrapper ">


                        <a href="<?php echo $urlweb; ?>/m/slots/game/?provider=jdb" rel="opener" class="game">

                            <img class="img-fluid lazy" alt="JDB"
                                data-src="https://files.sitestatic.net/GameImage/SlotsProviders/mobile/normal/jdb_slot.png"
                                src="" />
                            <div class="loader-b" *ngIf="!showEle"></div>


                            <div class="g-title">JDB</div>

                        </a>

                    </div>
                </div>

                <div class="col-xs-4 col-sm-3 col-md-2 box">

                    <div class="game-wrapper ">


                        <a href="<?php echo $urlweb; ?>/m/slots/game/?provider=jili" rel="opener" class="game">

                            <img class="img-fluid lazy" alt="JILI"
                                data-src="https://files.sitestatic.net/GameImage/SlotsProviders/mobile/normal/jili.jpg"
                                src="" />
                            <div class="loader-b" *ngIf="!showEle"></div>
                            <div class="g-title">JILI</div>
                        </a>
                    </div>
                </div>

                <div class="col-xs-4 col-sm-3 col-md-2 box">

                    <div class="game-wrapper ">


                        <a href="<?php echo $urlweb; ?>/m/slots/game/?provider=gmw" rel="opener" class="game">

                            <img class="img-fluid lazy" alt="GMW"
                                data-src="https://files.sitestatic.net/GameImage/SlotsProviders/mobile/normal/gmw.jpg"
                                src="" />
                            <div class="loader-b" *ngIf="!showEle"></div>
                            <div class="g-title">GMW</div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php";?>