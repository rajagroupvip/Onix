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
$ip = $_SERVER['REMOTE_ADDR'];
$date = date('Y-m-d');
$stat = mysqli_query($conn,"INSERT INTO `tb_stat` (`ip`, `date`, `hits`, `page`, `user`) VALUES ('$ip', '$date', 1, 'Beranda', '$pengguna')") or die (mysqli_error());

include "../header.php";?>

<div class="container-wrapper acc">
    <div class="container container-box noSidePadding">
        <div class="head-content">
            <div class="row no-gutters">
                <div class="col-12">
                    <ng-content select="app-game-bals"></ng-content>
                </div>
                <div class="col-12 account_menu">
                    <div class="mdc-tab-bar" role="tablist">
                        <div class="mdc-tab-scroller">
                            <div class="mdc-tab-scroller__scroll-area mdc-tab-scroller__scroll-area--scroll mdc-tab-scroller__scroll-x"
                                style="margin-bottom: 0px;">
                                <div class="mdc-tab-scroller__scroll-content">
                                    <ul class="list-inline">
                                        <li>
                                            <div class="deposit-notice-menu">
                                                <a role="tab" href="<?php echo $urlweb; ?>/m/account/deposit/"
                                                    data-active='accountdeposit' class="mdc-tab" aria-selected="false"
                                                    tabindex="-1" id="goog_2098347606-FIXED-0">
                                                    <span class="mdc-tab__content">
                                                        <span class="mdc-tab__text-label">
                                                            Deposit
                                                        </span>
                                                    </span>
                                                    <span class="mdc-tab-indicator">
                                                        <span
                                                            class="mdc-tab-indicator__content mdc-tab-indicator__content--underline"
                                                            style=""></span>
                                                    </span>
                                                    <span class="mdc-tab__ripple mdc-ripple-upgraded"
                                                        style="--mdc-ripple-fg-size:91px; --mdc-ripple-fg-scale:1.8648; --mdc-ripple-fg-translate-start:76px, -10.5px; --mdc-ripple-fg-translate-end:30.6563px, -21.5px;"></span>
                                                    &nbsp;
                                                </a>
                                            </div>

                                        </li>
                                        <li>
                                            <a role="tab" href="<?php echo $urlweb; ?>/m/account/withdrawal/"
                                                data-active='accountwithdrawal' class="mdc-tab" aria-selected="true"
                                                tabindex="0" id="goog_2098347606-FIXED-1">
                                                <span class="mdc-tab__content">

                                                    <span class="mdc-tab__text-label">
                                                        Withdraw
                                                    </span>
                                                </span>
                                                <span class="mdc-tab-indicator">
                                                    <span
                                                        class="mdc-tab-indicator__content mdc-tab-indicator__content--underline"
                                                        style=""></span>
                                                </span>
                                                <span class="mdc-tab__ripple mdc-ripple-upgraded"
                                                    style="--mdc-ripple-fg-size:93px; --mdc-ripple-fg-scale:1.85613; --mdc-ripple-fg-translate-start:48.6875px, -6.5px; --mdc-ripple-fg-translate-end:31.1875px, -22.5px;"></span>
                                            </a>
                                        </li>
                                        <li>
                                            <a role="tab" href="<?php echo $urlweb; ?>/m/account/history/"
                                                data-active='accountlastdirecttransfer' class="mdc-tab"
                                                aria-selected="false" tabindex="-1" id="goog_2098347606-FIXED-3">
                                                <span class="mdc-tab__content">
                                                    <span class="mdc-tab__text-label">
                                                        5 Transaksi Terakhir
                                                    </span>
                                                </span>
                                                <span class="mdc-tab-indicator">
                                                    <span
                                                        class="mdc-tab-indicator__content mdc-tab-indicator__content--underline"
                                                        style=""></span>
                                                </span>
                                                <span class="mdc-tab__ripple mdc-ripple-upgraded"
                                                    style="--mdc-ripple-fg-size:102px; --mdc-ripple-fg-scale:1.83267; --mdc-ripple-fg-translate-start:-44.1875px, -35px; --mdc-ripple-fg-translate-end:34.1484px, -27px;"></span>
                                            </a>
                                        </li>
                                        <li>
                                            <a role="tab" href="<?php echo $urlweb; ?>/m/account/history/"
                                                data-active='accounthistory' class="mdc-tab" aria-selected="false"
                                                tabindex="-1" id="goog_2098347606-FIXED-2">
                                                <span class="mdc-tab__content">
                                                    <span class="mdc-tab__text-label">
                                                        Pernyataan
                                                    </span>
                                                </span>
                                                <span class="mdc-tab-indicator">
                                                    <span
                                                        class="mdc-tab-indicator__content mdc-tab-indicator__content--underline"
                                                        style=""></span>
                                                </span>
                                                <span class="mdc-tab__ripple mdc-ripple-upgraded"
                                                    style="--mdc-ripple-fg-size:102px; --mdc-ripple-fg-scale:1.83267; --mdc-ripple-fg-translate-start:-44.1875px, -35px; --mdc-ripple-fg-translate-end:34.1484px, -27px;"></span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
                    error_reporting(0);
                    $useridnya = $u['cuid'];
                    $cekTransaksi = mysqli_query($conn,"SELECT * FROM `tb_transaksi` WHERE userID = '$useridnya' AND jenis = 1 AND status = 0") or die(mysqli_error());
                    $ct = mysqli_num_rows($cekTransaksi);
                    $jumlahdeposit = $row['total'];
                    if($ct > 0){
                    echo '
                    <div class="alert alert-danger alert-dismissible mb-2" role="alert">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <div class="alert-message text-justify">
                    <span>Anda masih memiliki Permintaan Deposit yang Belum Diproses. Silahkan Tunggu Hingga Proses Penarikan Sebelumnya Selesai.</span>
                    </div>
                    </div>
                    ';
                ?>
        <?php } else { ?>
            <div class="content">
    <div class="deposit">
        <div class="container container-box">
            <div class="row">
                <!-- Konfirmasi Transfer Bank -->
                <div class="col-xs-12 col-md-8 content-form">
                    <div class="methods_form" id="metode">
                        <div class="box-wrapper plr-15">
                            <div class="row align-items-center">
                                <div class="col-md-3 col-xs-12 text-center pay-title">
                                    <div>
                                        Konfirmasi Transfer Bank / E Wallet (Manual Cek)
                                    </div>
                                </div>
                                <div class="col-md-9 col-xs-12 d-flex flex-wrap">
                                <?php
                                $userID = 1; // Ganti dengan nilai userID yang sesuai
                                // Fetch bank data for a specific user from the database (assuming $conn is your database connection)
                                $stmt = mysqli_prepare($conn, "SELECT * FROM `tb_bank` WHERE userID = ?");
                                mysqli_stmt_bind_param($stmt, "i", $userID);
                                mysqli_stmt_execute($stmt);
                                $bankData = mysqli_stmt_get_result($stmt);
                                // Loop through the bank data and generate buttons
                                foreach ($bankData as $bank) {                             
                                    echo '<a class="payment-methods payment-methods-items online" href="/m/account/metode/?bank=' . base64_encode($bank['cuid']) . '">';

                                    echo '<div class="verti online">';
                                    
                                    // Tambahkan gaya CSS untuk menentukan lebar dan tinggi maksimum
                                    echo '<img class="img-fluid" style="max-width: 70px; max-height: 50px;" src="' . $bank['image'] . '">';
                                    
                                    echo '</div>';
                                    echo '</a>';
                                }
                                ?>
                                </div>
                            </div>
                        </div>                       
                        <!-- QRIS -->
                        <div class="box-wrapper plr-15">
                            <div class="row align-items-center">
                                <div class="col-md-3 col-xs-12 text-center pay-title">
                                    <div>
                                        QRIS (Manual Cek)
                                    </div>
                                </div>
                                <div class="col-md-9 col-xs-12 d-flex flex-wrap">
                                    <!-- QRIS Button -->
                                    <button id="btn_qris" class="payment-methods payment-methods-items online" onclick="window.location.href='qris.php';">
                                        <div class="verti online">
                                            <img class="img-fluid" src="https://seeklogo.com/images/Q/quick-response-code-indonesia-standard-qris-logo-F300D5EB32-seeklogo.com.png" width="78" height="31">
                                        </div>
                                    </button>

                                    <input type="hidden" id="preload" value="1">
                                </div>
                            </div>
                        </div>
                        <!-- Pulsa -->
                        <div class="box-wrapper plr-15">
                            <div class="row align-items-center">
                                <div class="col-md-3 col-xs-12 text-center pay-title">
                                    <div>
                                        Pulsa (Manual Cek)
                                    </div>
                                </div>
                                <div class="col-md-9 col-xs-12 d-flex flex-wrap">
                                    <!-- Pulsa Buttons -->
                                    <button class="payment-methods payment-methods-items online" disabled>
                                        <div class="verti offline">
                                            <img class="img-fluid" src="https://files.sitestatic.net/sprites/bank_logos/ewallet/xl_col.jpg?v=1">
                                        </div>
                                    </button>
                                    <button class="payment-methods payment-methods-items offline" disabled>
                                        <div class="verti offline">
                                            <img class="img-fluid" src="https://files.sitestatic.net/sprites/bank_logos/ewallet/telkomsel_col.jpg?v=1">
                                        </div>
                                    </button>
                                    <input type="hidden" id="preload" value="1">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
<?php include "../footer.php";?>