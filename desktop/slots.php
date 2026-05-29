<?php
ob_start();
session_start();
date_default_timezone_set("Asia/Jakarta");
include('../config/koneksi.php');
include('../config/class_softgaming.php');

$sid = session_id();
$sql_0 = mysqli_query($conn,"SELECT * FROM `tb_seo` WHERE cuid = 1") or die(mysqli_error());
$s0 = mysqli_fetch_array($sql_0);
$urlweb = $s0['urlweb'];
$urlwebs = $s0['urlweb'];

$sql_1 = mysqli_query($conn,"SELECT * FROM `tb_user` WHERE cuid = 1") or die(mysqli_error());
$s1b = mysqli_fetch_array($sql_1);
// Mengambil data dari tabel provider
$sql_providers = mysqli_query($conn, "SELECT * FROM provider where provider_type ='sl' and provider_status =1") or die(mysqli_error());
$providers = array();
while ($row = mysqli_fetch_assoc($sql_providers)) {
    $providers[] = $row;
}


include "../desktop/header.php";
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
<div class="content my01">
    <script type="text/javascript">
        var windowNames = JSON.parse('{"lottery":"lottery","live":"king4d","togel":"king4d"}');
    </script>
    <div class="container pt-4 games-category">
        <div class="row">
            <?php foreach ($providers as $provider): ?>
            <div class="col-xs-12 col-sm-4 col-lg-3 box gamecategory-singleitem">
                <a href="/desktop/slots/game/?provider=<?= $provider['provider_code']; ?>" rel="opener" class="game">
                    <div class="g-card">
                        <div class="card-img" *ngIf="showEle" _games_category>
                            <div class="g-overlay"></div>
                            <img src="<?= $provider['banner']; ?>" alt="<?= $provider['provider_name']; ?>" />
                            <div class="card-title" _games_category>
                                <div class="logo">
                                    <span style=" width: 100px; height: 100px; ">
                                        <img src="<?= $provider['image']; ?>">
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
                                        </div>
                                    </div>
                                </button>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<?php include "../desktop/footer.php";?>