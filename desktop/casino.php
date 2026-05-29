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
        echo "<script>alert('Provider sedang dalam pemeliharaan. Kembali ke halaman sebelumnya.');</script>";
        exit();
    } else {
    
    }
} else {
}
?>

    <div class="content my01">
    <script type="text/javascript">
        var windowNames = JSON.parse('{"lottery":"lottery","live":"king4d","togel":"king4d"}');
    </script>
    
    <div class="container pt-4 games-category">
        <div class="row">
            <?php
            // Query untuk mengambil data permainan dari database
            $query = mysqli_query($conn, "SELECT * FROM provider where provider_type= 'lc'and provider_status =1");
            while ($game = mysqli_fetch_assoc($query)) {
            ?>
            <div class="col-xs-12 col-sm-4 col-lg-3 box gamecategory-singleitem"> 
            <a href="/desktop/casino/game/?provider=<?php echo $game['provider_code'];?>" rel="opener" class="game">   
                <div class="g-card">
                    <div class="card-img" *ngIf="showEle" _games_category>
                        <div class="g-overlay"></div>
                        <img src="<?php echo $game['logo']; ?>" alt="<?php echo $game['provider_name']; ?>" />  
                        <div class="card-title" _games_category>
                            <div class="logo">
                                <span style="width: 200px; height: 60px;">
                                    <img src="<?php echo $game['image']; ?>">
                                </span>
                            </div>
                        </div>
                        <div class="btn-wrapper" _games_category>
                            <button class="btn btn-hvrplay clearfix">
                                <div class="inner">
                                    <div class="p1">MAIN SEKARANG</div>
                                    <div class="p2"><i class="icon-play-solid "></i></div>
                                </div>
                            </button>
                        </div>                                
                    </div>             
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>
<?php include 'footer.php';?>
