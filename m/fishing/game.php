<?php
include('../../config/koneksi.php');
$providerCode = $_GET['provider'] ?? '';
?>
<?php
ob_start();
session_start();
date_default_timezone_set("Asia/Jakarta");
$sid = session_id();
$sql_0 = mysqli_query($conn,"SELECT * FROM `tb_seo` WHERE cuid = 1") or die(mysqli_error());
$s0 = mysqli_fetch_array($sql_0);
$urlweb = $s0['urlweb'];
$urlwebs = $s0['urlweb'];
$pengguna = $s0['user'];
$ip = $_SERVER['REMOTE_ADDR'];
$date = date('Y-m-d');

include "../header.php";
?>

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
                data-target='#searchModal' onclick="handleSearch()"><i class="icon-magnifier"></i></button>
        </div>
        <div class="col-xs-1 text-right">
            <button class="btn btn-clear" id="btnFilters_003" data-filter="" data-trigger='nifty'
                data-target='#filterModal-2'><i class="icon-equalizer2"></i></button>
        </div>
    </div>
    <div class="mobile-border"></div>
    <br/>

    <!-- Input pencarian -->
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <input type="text" id="searchInput" class="form-control" placeholder="Cari game..." onkeyup="handleSearch()">
        </div>
    </div>
    <br/>

    <!-- Daftar game -->
    <div class="row games no-gutters" id="gameList">
        <?php
            $sql_provider = mysqli_prepare($conn,"SELECT * FROM `tb_provider` WHERE slug = ?");
            mysqli_stmt_bind_param($sql_provider, "s", $provider);
            mysqli_stmt_execute($sql_provider);
            $result_provider = mysqli_stmt_get_result($sql_provider);
            $sp = mysqli_fetch_array($result_provider);
            $pageLink = 'slot/'.$provider.'/';
            if(isset($_GET['provider'])){
                $provider = $_GET['provider'];
            }
            else {
                $where = "`provider` = ?";
                $pageLink = 'slot/?';
            }
            
            $where = "`game_provider` = ?";
            $pageLink = 'slot/?';
            $sql_3 = $conn->prepare("SELECT * FROM `game_list` WHERE $where and game_type = 'FH'");
            mysqli_stmt_bind_param($sql_3, "s", $providerCode);
            mysqli_stmt_execute($sql_3);
            $result_3 = mysqli_stmt_get_result($sql_3);
            while($s3 = mysqli_fetch_array($result_3)){
                if(isset($_SESSION['user'])){
                    $externalPlayerId = $_SESSION['user'];
                    $playUrl = $urlweb.'/gameplay/opengame/?gamecode=' . $s3['game_code'] . '&providercode=' . $s3['game_provider'];
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    function handleSearch() {
        var searchKeyword = $('#searchInput').val().toLowerCase();
        $('#gameList a').hide();
        $('#gameList a').each(function() {
            var gameName = $(this).find('h5').text().toLowerCase();
            if (gameName.indexOf(searchKeyword) !== -1) {
                $(this).show();
            }
        });
    }
</script>
