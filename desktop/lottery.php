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

<div class="container pt-4 games-category">
    <div class="row">

        <div class="col-xs-12 col-sm-4 col-lg-3 box gamecategory-singleitem">


            <a href="/lottery/live-virtual-4d" >

                <div class="g-card">
                    <!-- <div class="loader-b" *ngIf="!showEle"></div> -->
                    <div class="card-img" *ngIf="showEle" _games_category>
                        <!--Game Content (repeated below)-->
                        <div class="g-overlay"></div>

                        <img src="https://files.sitestatic.net/GameImage/LotteryProviders/desktop/normal/hkgp_4d.jpg?v=1"
                            alt=" Togel" />
                        <div class="card-title" _games_category>
                            <div class="logo">
                                <span style=" width: 200px; height: 60px; ">
                                    <img
                                        src="https://files.sitestatic.net/assets/imgs/game_logos/200x60/hkgp_togel.png?v=0.31">
                                </span>
                            </div>
                        </div>


                        <div class="btn-wrapper" _games_category>
                            <button class="btn btn-hvrplay clearfix">
                                <div class="inner">
                                    <div class="p1">

                                        MAIN SEKARANG </div>
                                    <div class=p2><i class="icon-play-solid "></i>
                                        <div>
                                        </div>
                            </button>
                        </div>
                        <!--END Game Content (repeated below)-->
                    </div>
                    <div class="g-title">
                        Togel
                    </div>
                </div>


            </a>

        </div>

        <div class="col-xs-12 col-sm-4 col-lg-3 box gamecategory-singleitem">


            <a href="javascript:void(0);" onclick="registerPopup({content:'Maintenance.'})"" >

                <div class="g-card">
                    <!-- <div class="loader-b" *ngIf="!showEle"></div> -->
                    <div class="card-img" *ngIf="showEle" _games_category>
                        <!--Game Content (repeated below)-->
                        <div class="g-overlay"></div>

                        <img src="https://files.sitestatic.net/GameImage/LotteryProviders/desktop/normal/hkgp_number.jpg?v=1"
                            alt=" Number Games" />
                        <div class="card-title" _games_category>
                            <div class="logo">
                                <span style=" width: 200px; height: 60px; ">
                                    <img
                                        src="https://files.sitestatic.net/assets/imgs/game_logos/200x60/hkgp_number.png?v=0.31">
                                </span>
                            </div>
                        </div>


                        <div class="btn-wrapper" _games_category>
                            <button class="btn btn-hvrplay clearfix">
                                <div class="inner">
                                    <div class="p1">

                                        MAIN SEKARANG </div>
                                    <div class=p2><i class="icon-play-solid "></i>
                                        <div>
                                        </div>
                            </button>
                        </div>
                        <!--END Game Content (repeated below)-->
                    </div>
                    <div class="g-title">
                        Number Games
                    </div>
                </div>


            </a>

        </div>

        <div class="col-xs-12 col-sm-4 col-lg-3 box gamecategory-singleitem">


            <a href="javascript:void(0);" onclick="registerPopup({content:'Maintenance.'})"" >

                <div class="g-card">
                    <!-- <div class="loader-b" *ngIf="!showEle"></div> -->
                    <div class="card-img" *ngIf="showEle" _games_category>
                        <!--Game Content (repeated below)-->
                        <div class="g-overlay"></div>

                        <img src="https://files.sitestatic.net/GameImage/LotteryProviders/desktop/normal/hkgp_racing.jpg?v=1"
                            alt=" Racing Car" />
                        <div class="card-title" _games_category>
                            <div class="logo">
                                <span style=" width: 200px; height: 60px; ">
                                    <img
                                        src="https://files.sitestatic.net/assets/imgs/game_logos/200x60/hkgp_racing.png?v=0.31">
                                </span>
                            </div>
                        </div>


                        <div class="btn-wrapper" _games_category>
                            <button class="btn btn-hvrplay clearfix">
                                <div class="inner">
                                    <div class="p1">

                                        MAIN SEKARANG </div>
                                    <div class=p2><i class="icon-play-solid "></i>
                                        <div>
                                        </div>
                            </button>
                        </div>
                        <!--END Game Content (repeated below)-->
                    </div>
                    <div class="g-title">
                        Racing Car
                    </div>
                </div>
<?php include "footer.php";?>


            </a>

        </div>
    </div>
</div>

</div>