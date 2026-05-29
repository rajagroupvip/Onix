<?php
// Menangkap nilai parameter dari URL
$providerCode = $_GET['provider'] ?? 'pr';

?>

<?php
require_once('../session.php');
include "../../desktop/header.php";
// Tambahkan pengecekan blokir di sini

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
                            <?php
                    // Fetch data from the tb_wprovider table
                    $query = "SELECT * FROM provider where provider_type ='lc' and provider_status =1";
                    $result = mysqli_query($conn, $query);
                    // Check if the query was successful
                    if ($result) {
                        echo '<div class="row no-gutters text-center slider-content">';

                        // Loop through the rows of the result set
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<div class="col">';
                            echo '<a class="btn-box" href="/desktop/casino/game/?provider=' . $row['provider_code'] . '" rel="opener">';
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
            $where = "`game_provider` = ?";
            $pageLink = 'slot/?';
            
            // Persiapan statement SQL
            $sql_3 = mysqli_prepare($conn, "SELECT * FROM `game_list` WHERE $where AND game_type = 'lc'");
            // Binding parameter ke statement SQL
            mysqli_stmt_bind_param($sql_3, 's', $providerCode);
            // Eksekusi statement SQL
            mysqli_stmt_execute($sql_3);
            // Mendapatkan hasil dari eksekusi
            $result = mysqli_stmt_get_result($sql_3);
            while($s3 = mysqli_fetch_array($result)){
              if(isset($_SESSION['user'])){
                $externalPlayerId = $_SESSION['user'];
                $playUrl = $urlweb.'/gameplay/opengame/?gamecode=' . $s3['game_code'] . '&providercode=' . $s3['game_provider'];
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
                        <img src="" data-src="<?php echo $s3['game_image']; ?>" class="unveiled lazy" *ngIf="showEle">
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
                    </div>

                    <div id="<?php echo $progressBarId; ?>" class="progress-bar" role="progressbar"
                        aria-valuenow="<?php echo $random; ?>" aria-valuemin="0" aria-valuemax="100"
                        style="width: <?php echo $random; ?>%; background-color: <?php echo $warna; ?>;">
                        <?php echo $random; ?>%
                    </div>


                </div>
                <?php } ?>
                <?php include "../footer.php";?>
