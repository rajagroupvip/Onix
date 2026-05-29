<?php
$providerCode = isset($_GET['provider']) ? $_GET['provider'] : 'af';
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

include "../m/header.php";
?>
<?php
$sql = "SELECT status FROM maintenance WHERE id = 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $status = $row["status"];

    if ($status == 1) {
        // Mengarahkan pengguna kembali ke halaman sebelumnya
        echo "<script>window.history.back();</script>";
        // Menampilkan notifikasi dengan JavaScript
        echo "<script>alert('Halaman sedang dalam pemeliharaan. Kembali ke halaman sebelumnya.');</script>";
        exit();
    } else {
    
    }
} else {
}
?>
<div class="container pt-1 sub-games">
    <div>
        <h3 class="title" i18n>SPORT </h3>
        <div class="row">
        </div>

        <div class="scroll-wrapper row" style="height:72px;">

            <div class="left"><button class="prev-btn btn" id="left-button"><i
                        class="icon-keyboard_arrow_left"></i></button></div>
                        <div style="overflow:hidden;width:100%;" class="scroller">
                        <?php
                        // Fetch data from the tb_wprovider table
                        $query = "SELECT * FROM provider where provider_type ='sb' and provider_status =1";
                        $result = mysqli_query($conn, $query);
                        // Check if the query was successful
                        if ($result) {
                            echo '<div class="row no-gutters text-center slider-content">';

                            // Loop through the rows of the result set
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<div class="col">';
                                echo '<a class="btn-box" href="/m/sport/game=?provider=' . $row['provider_code'] . '" rel="opener">';
                                echo '<img alt="" src="' . $row['image'] . '" data-src="' . $row['image'] . '" height="70" />';
                                echo '<div class="text-center fs-md game-title">' . $row['provider_name'] . '</div>';
                                echo '</a>';
                                echo '</div>';
                            }

                            echo '</div>';
                        } else {
                            // Handle database query error
                            echo 'Error executing query: ' . mysqli_error($conn, $query);
                        }

                        ?>

                        </div>
            
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
            // $providerID = $sp['providerid'];
            // $where = "`provider` = '".$providerID."' AND";
            $pageLink = 'slot/'.$provider.'/';
        }
        else {
            $where = "`provider` = '$providerCode'";
            $pageLink = 'slot/?';
        }
        
        $where = "`game_provider` = '$providerCode'";
        $pageLink = 'slot/?';
        
        $sql_3 = mysqli_query($conn, "SELECT * FROM `game_list` WHERE $where and game_type ='sb' ") or die(mysqli_error($conn));
        while($s3 = mysqli_fetch_array($sql_3)){
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
                </a>
        <?php } ?>
    </div>

    <?php include "footer.php";?>