<?php
ob_start();
session_start();
date_default_timezone_set("Asia/Jakarta");
include('../../config/koneksi.php');
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

include "../../m/header.php";
?>
<?php if(isset($_SESSION['user'])){
    if ($u['blokir'] == 1) {
    // Pengguna diblokir, arahkan ke slot.php dengan pesan notifikasi
    header('location:/m/slots/?notif=1');
    exit;
}
?>
<?php }else{}?>



<div class="container pt-1 sub-games">
    <div>

        <h3 class="title" i18n>slots PROVIDERS</h3>
        <div class="row">


        </div>

        <div class="scroll-wrapper row" style="height:72px;">

            <div class="left"><button class="prev-btn btn" id="left-button"><i
                        class="icon-keyboard_arrow_left"></i></button></div>

                        <?php include "navbar.php";?>
            <div class="right"><button class="next-btn btn" id="right-button"><i
                        class="icon-keyboard_arrow_right"></i></button></div>
        </div>
    </div>

    <div class="row no-gutters filter">
        <div class="col-xs-10 text-center">
            <div class="row">
                <div class="col-xs-3">
                    <button class="btn btn-clear f" data-filter="NEW"
                        [ngClass]="{ 'active': filterProperty==FilterType.New  }">BARU</button>
                </div>
                <div class="col-xs-3">
                    <button class="btn btn-clear f" data-filter="TOP"
                        [ngClass]="{ 'active': filterProperty==FilterType.Top  }">TOP</button>
                </div>
                <div class="col-xs-3">
                    <button class="btn btn-clear f" data-filter="ALL"
                        [ngClass]="{ 'active': filterProperty==FilterType.All  }">SEMUA </button>
                </div>
            </div>
        </div>
        <div class="col-xs-1 text-right">
            <button class="btn btn-clear" id="btnFilters_003" data-filter="" data-trigger='nifty'
                data-target='#searchModal'><i class="icon-magnifier"></i></button>
        </div>
        <div class="col-xs-1 text-right">
            <button class="btn btn-clear" id="btnFilters_003" data-filter="" data-trigger='nifty'
                data-target='#filterModal-2'><i class="icon-equalizer2"></i></button>
        </div>
    </div>
    <div class="mobile-border"></div>
    <div class="mobile-border"></div>
    <br />
    <input type="hidden" value="pp_slots" name="hiddenGameID-001" id="hiddenGameID-001">
    <div class="row games no-gutters">
    <?php
        if(isset($_GET['provider'])){
            $provider = $_GET['provider'];
            $sql_provider = mysqli_query($conn,"SELECT * FROM `tb_provider` WHERE slug = '$provider'") or die(mysqli_error());
            $sp = mysqli_fetch_array($sql_provider);
            $providerID = $sp['providerid'];
            $where = "`provider` = '".$providerID."' AND";
            $pageLink = 'slot/'.$provider.'/';
        }
        else {
            $where = "`provider` = 'playngo'";
            $pageLink = 'slot/?';
        }
        
        $where = "`game_provider` = 'playngo'";
        $pageLink = 'slot/?';
        
          $sql_3 = mysqli_query($conn,"SELECT * FROM `game_baru` WHERE $where ORDER BY id ASC") or die(mysqli_error($conn));
          while($s3 = mysqli_fetch_array($sql_3)){
            if(isset($_SESSION['user'])){
              $externalPlayerId = $_SESSION['user'];
              $playUrl = $urlweb.'/gameplay/'.$s3['game_provider'].'/?gamecode='.$s3['game_code'];
            }
                  else {
                      $playUrl = $urlweb.'/m/?notif=6';
                  }
                 $random = mt_rand(40, 100);
                $progressBarId = 'progress-bar-' . uniqid();
                
                if ($random < 50) {
                    $warna = 'red'; // Merah untuk nilai di bawah 50
                } else if ($random >= 50 && $random < 75) {
                    $warna = 'orange'; // Orange untuk nilai di antara 50 dan 75
                } else {
                    $warna = 'green'; // Hijau untuk nilai di atas 75
                }
                ?>
                <a class="col-xs-4 col-md-3 game-box text-center" href="<?php echo $playUrl; ?>"
                   data-title="<?php echo $s3['game_name']; ?>" data-filter="ALL,Video Slots,TOP,Buy Bonus Feature"
                   [ngClass]="{'flex-grow-2' : game.FlexGrow =='2'}"
                   onclick="showGameLinks(event, '<?php echo $s3['game_name']; ?>', '<?php echo $s3['game_image']; ?>')">
                    <div class="content-wrapper">
                        <div class="daily-wins-tag"></div>
                        <img width=120 height=120 class="lazy" data-src="<?php echo $s3['game_image']; ?>">
                    </div>
                    <h5 data-title="<?php echo $s3['game_name']; ?>"><?php echo $s3['game_name']; ?></h5>
                    <div id="<?php echo $progressBarId; ?>" class="progress-bar" role="progressbar"
                         aria-valuenow="<?php echo $random; ?>" aria-valuemin="0" aria-valuemax="100"
                         style="width: <?php echo $random; ?>%; background-color: <?php echo $warna; ?>;">
                        <?php echo $random; ?>%
                    </div>
                </a>
        <?php } ?>
    </div>

    <?php include "../footer.php";?>