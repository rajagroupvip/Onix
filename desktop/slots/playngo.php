<?php
require_once('../session.php');
include "../../desktop/header.php";
// Tambahkan pengecekan blokir di sini

?>

<?php if(isset($_SESSION['user'])){
    if ($u['blokir'] == 1) {
    // Pengguna diblokir, arahkan ke slot.php dengan pesan notifikasi
    header('location:'.$urlwebs.'/desktop/slots/?notif=1');
    exit;
}
?>
<?php }else{}?>
<div class="content my01">

    <!-- <div class="content-loader" *ngIf="subs.state$.requests.getAllGamesViewByCategory.inProgress; else content"><app-spinner></app-spinner> </div> -->

    <script type="text/javascript">
        var windowNames = JSON.parse('{"lottery":"lottery","live":"king4d","togel":"king4d"}');
    </script>
    <div class="container pt-2 ">
        <div class="scroll-wrapper row games-slider-menu">
            <div class="slider" style="overflow:hidden;">
                <div class="left"><button class="prev-btn btn" id="left-button"><i
                            class="icon-keyboard_arrow_left"></i></button></div>

                            <?php include "navbar.php";?>

                <div class="right"><button class="next-btn btn" id="right-button"><i
                            class="icon-keyboard_arrow_right"></i></button></div>
            </div>

        </div>

    </div>
    <div class="container sub-games">
        <div class="">
            <!--game category dynamic-->

            <div class="g_category-nav fixed nav nav-pills nav-fill clearfix">
                <div class="nav-item search_filter">
                    <span class="srch_icon"><i class="icon-magnifier"></i></span>
                    <input type="text" matInput placeholder="Cari Pesan Disini" [(ngModel)]="filterInput"
                        maxlength="255" class="search" (change)="search($event)" i18n-placeholder="@Search">
                    <button matSuffix class="btn srch_button" (click)="clearSearch($event)"><i
                            class="icon-x-square"></i></button>
                </div>

                <div class="nav-item" data-filter="ALL">
                    <a class="navlink" href="javascript:void(0);"
                        [ngClass]="{'active': filterProperty== FilterType.All}" i18n="@ALL">
                        SEMUA </a>
                </div>
                <div class="nav-item" data-filter="TOP">
                    <a class="navlink" href="javascript:void(0);"
                        [ngClass]="{'active': filterProperty== FilterType.Top}" i18n="@TOP">
                        TOP </a>
                </div>
                <div class="nav-item" data-filter="NEW">
                    <a class="navlink" href="javascript:void(0);" [ngClass]="{'active': filterProperty==FilterType.New}"
                        i18n="@NEW">
                        BARU </a>
                </div>
                <div class="nav-item" _MORE>
                    <a class="navlink" href="javascript:void(0);"
                        [ngClass]="{'active': filterProperty== FilterType.More || (filterProperty && filterProperty!=FilterType.Top && filterProperty!=FilterType.New  && filterProperty!=FilterType.All) }">
                        LEBIH
                    </a>
                </div>


            </div>
            <div class="g_category-nav nav nav-pills nav-fill hide" _MORE>
            </div>
            <br />

            <!-- List Game -->

            <div class="flex-row flex-wrap games pragmatic-play pp_slots">
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
                        $playUrl = $urlweb.'/desktop/?notif=6';
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
    
                    <div class="game-box text-center" data-jpid="" data-title="<?php echo $s3['game_name']; ?>"
                        data-filter="ALL,Video Slots,TOP,Buy Bonus Feature"
                        [ngClass]="{'flex-grow-2' : game.FlexGrow =='2'}" [id]="'gb-'+ i">
                        <!--todo daily win tag here-->
                        <div class="daily-wins-tag"> </div>
    
                        <div class="image">
                            <!-- [delayMsec]="1500"-->
                            <img src="" data-src="<?php echo $s3['game_image']; ?>" class="unveiled lazy"
                                *ngIf="showEle">
                            <!--/*IMAGE MIN WIDTH MUST BE 146, MAX 6 game-box per row */-->
    
                        </div>
                        <div class="name">
                            <div class="opacity_content">
                                <div class="opacity_background">
    
                                </div>
                                <div class="title-wrap">
                                    <div class="game-title fs-lg"><?php echo $s3['game_name']; ?></div>
    
                                </div>
                            </div>
                        </div>
                        <div class="amount_box" style="display:none;">
                        </div>
                        <div class="game-overlay game-has-try">
                            <a class="btn game_button_play" href="<?php echo $playUrl; ?>">
                                MAIN SEKARANG
                            </a>
                            <input type="hidden" value="pp_slots" name="hiddenGameID-001" id="hiddenGameID-001">
                        </div>
                        <div id="<?php echo $progressBarId; ?>" class="progress-bar" role="progressbar"
                             aria-valuenow="<?php echo $random; ?>" aria-valuemin="0" aria-valuemax="100"
                             style="width: <?php echo $random; ?>%; background-color: <?php echo $warna; ?>;">
                            <?php echo $random; ?>%
                        </div>


                </div>
                <?php } ?>
                <?php include "../footer.php";?>