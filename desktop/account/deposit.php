<?php
ob_start();
session_start();
date_default_timezone_set("Asia/Jakarta");
require_once('../../config/koneksi.php');
require_once('../../config/class_softgaming.php');

$sid = session_id();
$sql_0 = mysqli_query($conn,"SELECT * FROM `tb_seo` WHERE cuid = 1") or die(mysqli_error());
$s0 = mysqli_fetch_array($sql_0);
$urlweb = $s0['urlweb'];
$urlwebs = $s0['urlweb'];

$sql_1 = mysqli_query($conn,"SELECT * FROM `tb_user` WHERE cuid = 1") or die(mysqli_error());
$s1b = mysqli_fetch_array($sql_1);

if (empty($_SESSION['user']) AND empty($_SESSION['pass'])){
  header('location:'.$urlwebs.'/index');
  exit;
}

$user =mysqli_query($conn,"SELECT * FROM `tb_user` WHERE username = '".$_SESSION['user']."'") or die (mysqli_error());
$u = mysqli_fetch_array($user);
$users = $u['username'];
$id_user = $u['cuid'];
$userID = $u['cuid'];

$sql_3 = mysqli_query($conn,"SELECT * FROM `tb_balance` WHERE userID = '$userID'") or die(mysqli_error());
$s3 = mysqli_fetch_array($sql_3);

$sql_banks = mysqli_query($conn,"SELECT * FROM `tb_bank` WHERE userID = '$userID'") or die(mysqli_error());
$sbs = mysqli_fetch_array($sql_banks);
include "../header.php";?>

<div class="content my01">
    <script type="text/javascript" src="https://cdn.sitestatic.net/assets/jquery/jquery.price_format.min.js?v=2">
    </script>
    <div class="container-wrapper acc">
        <div class="container container-box">
            <div class="row">
                <div class="col-md-8">
                    <div class="box-wrapper">
                        <div class="title" style="padding: 5px 0">
                            <div class="d-inline-block" style="padding-left:15px" i18n>Keamanan Akun: Normal</div>
                            <div class="d-inline-block text-right" style="float:right;padding-right:15px">Anda memiliki
                                <span class="txt_mail_cnt">0</span> pesan baru yang belum dibaca dari kami.</div>
                        </div>

                        <div class="mdc-wrapper">
                            <a href="<?php echo $urlweb; ?>/desktop/account/deposit"
                                class="mdc-items active">Deposit</a>
                            <a href="<?php echo $urlweb; ?>/desktop/account/withdrawal" class="mdc-items ">Withdraw</a>
                            <a href="<?php echo $urlweb; ?>/desktop/account/lastDirectTransfer" class="mdc-items ">5
                                Transaksi
                                Terakhir </a>
                            <a href="<?php echo $urlweb; ?>/desktop/account/history" class="mdc-items">Pernyataan</a>

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
                                    echo '<a class="payment-methods payment-methods-items online" href="/desktop/account/metode/?bank=' . base64_encode($bank['cuid']) . '">';

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


                                        <div id="modal_bca" style="display: none">
                                            <div class="box-wrapper plr-15">
                                                <div class="container-b3">
                                                    <div class="row">
                                                        <div class="col-xs-12 col-md-12 content-form">
                                                            <style>
                                                                * {
                                                                    -webkit-backface-visibility: visible;
                                                                }

                                                                select>option.disble {
                                                                    background-color: #d4d4d4;
                                                                }
                                                            </style>
                                                            <form id="depositForm" action="<?php echo $urlweb; ?>/function/deposit.php" method="post">
                                                                <input type="hidden" name="postID" class="form-control" value="<?php echo $u['cuid']; ?>">
                                                                <div class="box-wrapper plr-15">
                                                                    <div class="row d-flex">
                                                                        <div class="col-md-3 col-xs-4  ">
                                                                            <div class="font-weight-bold"> Metode Penyetoran<span class="text-danger">*</span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-9 col-xs-8 d-flex flex-wrap">
                                                                            <div class="radio_2 m-15 mt-2">
                                                                                <input id="radioBank5" checked="" type="radio" value="5">
                                                                                <label class=" " for="radioBank5">
                                                                                    <span class="radio-title"> Bank / E-Wallet </span>
                                                                                    <span class="marked">
                                                                                        <i class="icon-checkmark"></i>
                                                                                    </span>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="tab">
                                                                        <div class="row d-flex">
                                                                            <div class="col-md-3 col-xs-4  ">
                                                                                <div class="font-weight-bold">Rekening Pengirim<span class="text-danger">*</span></div>
                                                                            </div>
                                                                            <div
                                                                                class="col-md-9 col-xs-8  d-flex flex-wrap">
                                                                                <select class="form-control m-15"name="pay_from" required>
                                                                                     
                                                                                    <option value="<?php echo $sbs['cuid']; ?>">
                                                                                        <?php echo $sbs['akun']; ?> - <?php echo $sbs['no_rek']; ?> - <?php echo $sbs['pemilik']; ?>
                                                                                    </option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row d-flex">
                                                                            <div class="col-md-3 col-xs-4  ">
                                                                                <div class="font-weight-bold">Bank Penerima<span class="text-danger">*</span></div>
                                                                            </div>
                                                                            <div class="col-md-9 col-xs-8 d-flex flex-wrap">                                    
                                                                                <select class="form-control bank_list m-15 has-feedback has-success" data-plugin="bank_list" id="metode" name="metode">
                                                                                        <?php
                                                                                            $sql_bank = mysqli_query($conn,"SELECT * FROM `tb_bank` WHERE userID = 1 AND image = 'BCAVA.png' ORDER BY cuid ASC") or die(mysqli_error());
                                                                                            $no=0;
                                                                                            while($sb = mysqli_fetch_array($sql_bank)){
                                                                                            $no++;
                                                                                        ?>
                                                                                    <option value="<?php echo $sb['cuid']; ?>">
                                                                                        <?php echo $sb['akun']; ?> - <?php echo $sb['no_rek']; ?> a/n <?php echo $sb['pemilik']; ?>
                                                                                    </option>
                                                                                    
                                                                                </select>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row info-lst" id="bankInfo_de001" style="">
                                                                            <div class="col-xs-12 col-md-9">
                                                                                <div class="bankInfo-box" id="bankList">
                                                                                    <div class="box-title">
                                                                                        <i class="icon-invoice i-invoice"></i>
                                                                                        Rincian Deposit Akun
                                                                                        <div class="pull-right acc_status">STATUS : <span class="text-success">ONLINE</span>
                                                                                    </div>
                                                                                    <input type="hidden" id="depo_acc_status" value="ONLINE" />
                                                                                </div>

                                                                                <table class="table table-borderless text-right info-box--001">
                                                                                    <tbody>
                                                                                        <tr class="text-left first">
                                                                                            <td class="col-xs-12 col-md-6" colspan="2">
                                                                                                <small> Nama Akun bank</small>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr class="">
                                                                                            <td class="col-xs-12 col-md-6" colspan="2">
                                                                                                <input id="info-copy-1" value="<?php echo $sb['pemilik'];?>" class="copy-input" />
                                                                                                <a href="javascript:void(0);" data-sel="info-copy-1" class="btn btn-link btn-copy lbl">
                                                                                                    <span class=" "><?php echo $sb['pemilik']; ?></span>
                                                                                                    <i class="icon-copy"></i>
                                                                                                </a>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr class="text-left first">
                                                                                            <td class="col-xs-12 col-md-6" colspan="2">
                                                                                                <small> Rekening Bank No</small>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr class=" ">
                                                                                            <td class="col-xs-12 col-md-6" colspan="2" style="padding-bottom: 10px">
                                                                                                <input id="info-copy-2" value="<?php echo $sb['no_rek'];?>" class="copy-input" />
                                                                                                <a href="javascript:void(0);" data-sel="info-copy-2" class="btn btn-link btn-copy lbl">
                                                                                                    <span class=" " style="white-space: normal; word-break: break-word">
                                                                                                        <?php echo $sb['no_rek'];?>
                                                                                                    </span>
                                                                                                    <i class="icon-copy"></i>
                                                                                                </a>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <?php } ?>
                                                                                        <tr class="text-left tr_type2">
                                                                                            <td class="col-xs-6 col-md-6">
                                                                                                <small>Min Deposit</small>
                                                                                            </td>
                                                                                            <td class="col-xs-6 col-md-6 text-right">
                                                                                                <span class="lbl">IDR50,000.00</span>
                                                                                                <input type="hidden" id="bank_min_deposit" class="min_deposit" value="10000" />
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr class="text-left tr_type2">
                                                                                            <td class="col-xs-6 col-md-6">
                                                                                                <small i18n="">Max Deposit</small>
                                                                                            </td>
                                                                                            <td class="col-xs-6 col-md-6 text-right">
                                                                                                <span class="lbl">IDR1,000,000,000.00</span>
                                                                                                <input type="hidden" id="bank_max_deposit" class="max_deposit" value="1000000000" />
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr class="text-left tr_type2">
                                                                                            <td class="col-xs-6 col-md-6">
                                                                                                <small i18n="">Komisi Bank / Transaksi</small>
                                                                                            </td>
                                                                                            <td class="col-xs-6 col-md-6 text-right">
                                                                                                <span class="lbl">IDR 0.00 </span>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <input type="hidden" id="admin_fee" value="IDR 0.00" />
                                                                                        <input type="hidden" id="percent_check" value="" />
                                                                                        <tr class="text-left tr_type2">
                                                                                            <td class="col-xs-6 col-md-6">
                                                                                                <small i18n="">Subsidi Bank / Transaksi</small>
                                                                                            </td>
                                                                                            <td class="col-xs-6 col-md-6 text-right">
                                                                                                <span class="lbl">IDR 0</span>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <input type="hidden" id="subsidi" value="IDR 0" />
                                                                                    </tbody>
                                                                                </table>
                                                                                <script>
                                                                                    $(document).ready(function () {
                                                                                        $('[data-toggle="tooltip"]').tooltip();
                                                                                    });
                                                                                </script>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                
                                                                        <div class="row d-flex">
                                                                            <div class="col-md-3 col-xs-4">
                                                                                <div class="font-weight-bold"> Bonus
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="col-md-9 col-xs-8 d-flex flex-wrap">
                                                                                <div class="m-15" style="width: 100%;">
                                                                                    <div style="width: 100%;">
                                                                                        <select
                                                                                            class="form-control promoList"
                                                                                            id="gameid" name="gameid">
                                                                                            <option disabled selected
                                                                                                value="0">Pilih promo
                                                                                                tersedia</option>
                                                                                            <?php
                                                                                                $sql_transaksi = mysqli_query($conn, "SELECT * FROM `tb_post` WHERE kategori = 0 AND cuid NOT IN(SELECT gameid FROM `tb_transaksi` WHERE userID = '$userID' AND jenis = 1 AND status = 1) ORDER BY cuid ASC") or die(mysqli_error());
                                                                                                $no = 0;
                                                                                                while ($st = mysqli_fetch_array($sql_transaksi)) {
                                                                                                $no++;
                                                                                            ?>
                                                                                            <option
                                                                                                value="<?php echo $st['cuid']; ?>">
                                                                                                <?php echo ucwords(strtolower($st['title'])); ?>
                                                                                                <?php } ?>
                                                                                            </option>
                                                                                        </select>

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row d-flex">
                                                                            <div class="col-md-3 col-xs-4 ">
                                                                                <div class="font-weight-bold">
                                                                                    Jumlah Deposit<span
                                                                                        class="text-danger">*</span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-9 col-xs-8">
                                                                                <div class=" d-flex flex-wrap">
                                                                                    <input type="text" id="nominal"
                                                                                        class="form-control m-15 price-tag"
                                                                                        placeholder="Masukan Nominal Deposit"
                                                                                        name="nominal" min="50000"
                                                                                        required>
                                                                                </div>
                                                                                <p class="min-max-notes">
                                                                                    Min Claim Bonus<span
                                                                                        class="min-deposit-amount"
                                                                                        style="padding-right: 5px;"><b
                                                                                            id="min_bni">
                                                                                            100,000.00</b></span><br>
                                                                                    Max Claim Bonus<span
                                                                                        class="max-deposit-amount"><b>10,000,000.00</b></span>
                                                                                </p>

                                                                            </div>
                                                                        </div>

                                                                        <div class="row d-flex">
                                                                            <div class="col-md-3 col-xs-4  ">
                                                                                <div class="font-weight-bold">
                                                                                    Keterangan </div>
                                                                            </div>
                                                                            <div
                                                                                class="col-md-9 col-xs-8 d-flex flex-wrap">
                                                                                <input type="text"
                                                                                    class="form-control m-15"
                                                                                    id="catatan" maxlength="35"
                                                                                    minlength="5" name="catatan"
                                                                                    placeholder="No. Referensi / Nama Pengirim">
                                                                            </div>
                                                                        </div>

                                                                        <div class="row d-flex">
                                                                            <div class="col-md-12 d-flex flex-wrap">
                                                                                <label>
                                                                                    <input type="checkbox"
                                                                                        class="form-check-input"
                                                                                        id="exampleCheck1"
                                                                                        name="termcondition">
                                                                                    Saya telah membaca dan menyetujui
                                                                                    Syarat dan
                                                                                    Ketentuan Promosi. Kami tidak
                                                                                    menerima jenis
                                                                                    setoran dalam bentuk cek. Semua
                                                                                    jenis
                                                                                    pembayaran
                                                                                    dalam bentuk cek ke akun kami akan
                                                                                    diabaikan.
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!--- second Tab end----->
                                                                    <div class="row d-flex">
                                                                        <div class="col-md-3 col-xs-4  ">
                                                                        </div>
                                                                        <div class="col-md-9 col-xs-8 d-flex flex-wrap">
                                                                            <div class="m-15">
                                                                                <button type="button"
                                                                                    class="btn btn-primary" id="backBtn"
                                                                                    onclick="tutup_bank()">Back</button>

                                                                                <button type="submit"
                                                                                    class="btn btn-secondary"
                                                                                    id="submitBtn"
                                                                                    name="submit">Lanjut</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="modal_bni" style="display: none">
                                            <div class="box-wrapper plr-15">
                                                <div class="container-b3">
                                                    <div class="row">
                                                        <div class="col-xs-12 col-md-12 content-form">
                                                            <style>
                                                                * {
                                                                    -webkit-backface-visibility: visible;
                                                                }

                                                                select>option.disble {
                                                                    background-color: #d4d4d4;
                                                                }
                                                            </style>
                                                            <form id="depositForm" action="<?php echo $urlweb; ?>/function/deposit.php" method="post">
                                                                <input type="hidden" name="postID" class="form-control" value="<?php echo $u['cuid']; ?>">
                                                                <div class="box-wrapper plr-15">
                                                                    <div class="row d-flex">
                                                                        <div class="col-md-3 col-xs-4  ">
                                                                            <div class="font-weight-bold"> Metode Penyetoran<span class="text-danger">*</span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-9 col-xs-8 d-flex flex-wrap">
                                                                            <div class="radio_2 m-15 mt-2">
                                                                                <input id="radioBank5" checked="" type="radio" value="5">
                                                                                <label class=" " for="radioBank5">
                                                                                    <span class="radio-title"> Bank / E-Wallet </span>
                                                                                    <span class="marked">
                                                                                        <i class="icon-checkmark"></i>
                                                                                    </span>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="tab">
                                                                        <div class="row d-flex">
                                                                            <div class="col-md-3 col-xs-4  ">
                                                                                <div class="font-weight-bold">Rekening Pengirim<span class="text-danger">*</span></div>
                                                                            </div>
                                                                            <div
                                                                                class="col-md-9 col-xs-8  d-flex flex-wrap">
                                                                                <select class="form-control m-15"name="pay_from" required>
                                                                                     
                                                                                    <option value="<?php echo $sbs['cuid']; ?>">
                                                                                        <?php echo $sbs['akun']; ?> - <?php echo $sbs['no_rek']; ?> - <?php echo $sbs['pemilik']; ?>
                                                                                    </option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row d-flex">
                                                                            <div class="col-md-3 col-xs-4  ">
                                                                                <div class="font-weight-bold">Bank Penerima<span class="text-danger">*</span></div>
                                                                            </div>
                                                                            <div class="col-md-9 col-xs-8 d-flex flex-wrap">                                    
                                                                                <select class="form-control bank_list m-15 has-feedback has-success" data-plugin="bank_list" id="metode" name="metode">
                                                                                        <?php
                                                                                            $sql_bank = mysqli_query($conn,"SELECT * FROM `tb_bank` WHERE userID = 1 AND image = 'BNIVA.png' ORDER BY cuid ASC") or die(mysqli_error());
                                                                                            $no=0;
                                                                                            while($sb = mysqli_fetch_array($sql_bank)){
                                                                                            $no++;
                                                                                        ?>
                                                                                    <option value="<?php echo $sb['cuid']; ?>">
                                                                                        <?php echo $sb['akun']; ?> - <?php echo $sb['no_rek']; ?> a/n <?php echo $sb['pemilik']; ?>
                                                                                    </option>
                                                                                    
                                                                                </select>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row info-lst" id="bankInfo_de001" style="">
                                                                            <div class="col-xs-12 col-md-9">
                                                                                <div class="bankInfo-box" id="bankList">
                                                                                    <div class="box-title">
                                                                                        <i class="icon-invoice i-invoice"></i>
                                                                                        Rincian Deposit Akun
                                                                                        <div class="pull-right acc_status">STATUS : <span class="text-success">ONLINE</span>
                                                                                    </div>
                                                                                    <input type="hidden" id="depo_acc_status" value="ONLINE" />
                                                                                </div>

                                                                                <table class="table table-borderless text-right info-box--001">
                                                                                    <tbody>
                                                                                        <tr class="text-left first">
                                                                                            <td class="col-xs-12 col-md-6" colspan="2">
                                                                                                <small> Nama Akun bank</small>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr class="">
                                                                                            <td class="col-xs-12 col-md-6" colspan="2">
                                                                                                <input id="info-copy-1" value="<?php echo $sb['pemilik'];?>" class="copy-input" />
                                                                                                <a href="javascript:void(0);" data-sel="info-copy-1" class="btn btn-link btn-copy lbl">
                                                                                                    <span class=" "><?php echo $sb['pemilik']; ?></span>
                                                                                                    <i class="icon-copy"></i>
                                                                                                </a>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr class="text-left first">
                                                                                            <td class="col-xs-12 col-md-6" colspan="2">
                                                                                                <small> Rekening Bank No</small>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr class=" ">
                                                                                            <td class="col-xs-12 col-md-6" colspan="2" style="padding-bottom: 10px">
                                                                                                <input id="info-copy-2" value="<?php echo $sb['no_rek'];?>" class="copy-input" />
                                                                                                <a href="javascript:void(0);" data-sel="info-copy-2" class="btn btn-link btn-copy lbl">
                                                                                                    <span class=" " style="white-space: normal; word-break: break-word">
                                                                                                        <?php echo $sb['no_rek'];?>
                                                                                                    </span>
                                                                                                    <i class="icon-copy"></i>
                                                                                                </a>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <?php } ?>
                                                                                        <tr class="text-left tr_type2">
                                                                                            <td class="col-xs-6 col-md-6">
                                                                                                <small>Min Deposit</small>
                                                                                            </td>
                                                                                            <td class="col-xs-6 col-md-6 text-right">
                                                                                                <span class="lbl">IDR50,000.00</span>
                                                                                                <input type="hidden" id="bank_min_deposit" class="min_deposit" value="10000" />
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr class="text-left tr_type2">
                                                                                            <td class="col-xs-6 col-md-6">
                                                                                                <small i18n="">Max Deposit</small>
                                                                                            </td>
                                                                                            <td class="col-xs-6 col-md-6 text-right">
                                                                                                <span class="lbl">IDR1,000,000,000.00</span>
                                                                                                <input type="hidden" id="bank_max_deposit" class="max_deposit" value="1000000000" />
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr class="text-left tr_type2">
                                                                                            <td class="col-xs-6 col-md-6">
                                                                                                <small i18n="">Komisi Bank / Transaksi</small>
                                                                                            </td>
                                                                                            <td class="col-xs-6 col-md-6 text-right">
                                                                                                <span class="lbl">IDR 0.00 </span>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <input type="hidden" id="admin_fee" value="IDR 0.00" />
                                                                                        <input type="hidden" id="percent_check" value="" />
                                                                                        <tr class="text-left tr_type2">
                                                                                            <td class="col-xs-6 col-md-6">
                                                                                                <small i18n="">Subsidi Bank / Transaksi</small>
                                                                                            </td>
                                                                                            <td class="col-xs-6 col-md-6 text-right">
                                                                                                <span class="lbl">IDR 0</span>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <input type="hidden" id="subsidi" value="IDR 0" />
                                                                                    </tbody>
                                                                                </table>
                                                                                <script>
                                                                                    $(document).ready(function () {
                                                                                        $('[data-toggle="tooltip"]').tooltip();
                                                                                    });
                                                                                </script>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                
                                                                        <div class="row d-flex">
                                                                            <div class="col-md-3 col-xs-4">
                                                                                <div class="font-weight-bold"> Bonus
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="col-md-9 col-xs-8 d-flex flex-wrap">
                                                                                <div class="m-15" style="width: 100%;">
                                                                                    <div style="width: 100%;">
                                                                                        <select
                                                                                            class="form-control promoList"
                                                                                            id="gameid" name="gameid">
                                                                                            <option disabled selected
                                                                                                value="0">Pilih promo
                                                                                                tersedia</option>
                                                                                            <?php
                                                                                                $sql_transaksi = mysqli_query($conn, "SELECT * FROM `tb_post` WHERE kategori = 0 AND cuid NOT IN(SELECT gameid FROM `tb_transaksi` WHERE userID = '$userID' AND jenis = 1 AND status = 1) ORDER BY cuid ASC") or die(mysqli_error());
                                                                                                $no = 0;
                                                                                                while ($st = mysqli_fetch_array($sql_transaksi)) {
                                                                                                $no++;
                                                                                            ?>
                                                                                            <option
                                                                                                value="<?php echo $st['cuid']; ?>">
                                                                                                <?php echo ucwords(strtolower($st['title'])); ?>
                                                                                                <?php } ?>
                                                                                            </option>
                                                                                        </select>

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row d-flex">
                                                                            <div class="col-md-3 col-xs-4 ">
                                                                                <div class="font-weight-bold">
                                                                                    Jumlah Deposit<span
                                                                                        class="text-danger">*</span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-9 col-xs-8">
                                                                                <div class=" d-flex flex-wrap">
                                                                                    <input type="text" id="nominal"
                                                                                        class="form-control m-15 price-tag"
                                                                                        placeholder="Masukan Nominal Deposit"
                                                                                        name="nominal" min="50000"
                                                                                        required>
                                                                                </div>
                                                                                <p class="min-max-notes">
                                                                                    Min Claim Bonus<span
                                                                                        class="min-deposit-amount"
                                                                                        style="padding-right: 5px;"><b
                                                                                            id="min_bni">
                                                                                            100,000.00</b></span><br>
                                                                                    Max Claim Bonus<span
                                                                                        class="max-deposit-amount"><b>10,000,000.00</b></span>
                                                                                </p>

                                                                            </div>
                                                                        </div>

                                                                        <div class="row d-flex">
                                                                            <div class="col-md-3 col-xs-4  ">
                                                                                <div class="font-weight-bold">
                                                                                    Keterangan </div>
                                                                            </div>
                                                                            <div
                                                                                class="col-md-9 col-xs-8 d-flex flex-wrap">
                                                                                <input type="text"
                                                                                    class="form-control m-15"
                                                                                    id="catatan" maxlength="35"
                                                                                    minlength="5" name="catatan"
                                                                                    placeholder="No. Referensi / Nama Pengirim">
                                                                            </div>
                                                                        </div>

                                                                        <div class="row d-flex">
                                                                            <div class="col-md-12 d-flex flex-wrap">
                                                                                <label>
                                                                                    <input type="checkbox"
                                                                                        class="form-check-input"
                                                                                        id="exampleCheck1"
                                                                                        name="termcondition">
                                                                                    Saya telah membaca dan menyetujui
                                                                                    Syarat dan
                                                                                    Ketentuan Promosi. Kami tidak
                                                                                    menerima jenis
                                                                                    setoran dalam bentuk cek. Semua
                                                                                    jenis
                                                                                    pembayaran
                                                                                    dalam bentuk cek ke akun kami akan
                                                                                    diabaikan.
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!--- second Tab end----->
                                                                    <div class="row d-flex">
                                                                        <div class="col-md-3 col-xs-4  ">
                                                                        </div>
                                                                        <div class="col-md-9 col-xs-8 d-flex flex-wrap">
                                                                            <div class="m-15">
                                                                                <button type="button"
                                                                                    class="btn btn-primary" id="backBtn"
                                                                                    onclick="tutup_bank()">Back</button>

                                                                                <button type="submit"
                                                                                    class="btn btn-secondary"
                                                                                    id="submitBtn"
                                                                                    name="submit">Lanjut</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="modal_bri" style="display: none">
                                            <div class="box-wrapper plr-15">
                                                <div class="container-b3">
                                                    <div class="row">
                                                        <div class="col-xs-12 col-md-12 content-form">
                                                            <style>
                                                                * {
                                                                    -webkit-backface-visibility: visible;
                                                                }

                                                                select>option.disble {
                                                                    background-color: #d4d4d4;
                                                                }
                                                            </style>
                                                            <form id="depositForm" action="<?php echo $urlweb; ?>/function/deposit.php" method="post">
                                                                <input type="hidden" name="postID" class="form-control" value="<?php echo $u['cuid']; ?>">
                                                                <div class="box-wrapper plr-15">
                                                                    <div class="row d-flex">
                                                                        <div class="col-md-3 col-xs-4  ">
                                                                            <div class="font-weight-bold"> Metode Penyetoran<span class="text-danger">*</span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-9 col-xs-8 d-flex flex-wrap">
                                                                            <div class="radio_2 m-15 mt-2">
                                                                                <input id="radioBank5" checked="" type="radio" value="5">
                                                                                <label class=" " for="radioBank5">
                                                                                    <span class="radio-title"> Bank / E-Wallet </span>
                                                                                    <span class="marked">
                                                                                        <i class="icon-checkmark"></i>
                                                                                    </span>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="tab">
                                                                        <div class="row d-flex">
                                                                            <div class="col-md-3 col-xs-4  ">
                                                                                <div class="font-weight-bold">Rekening Pengirim<span class="text-danger">*</span></div>
                                                                            </div>
                                                                            <div
                                                                                class="col-md-9 col-xs-8  d-flex flex-wrap">
                                                                                <select class="form-control m-15"name="pay_from" required>
                                                                                     
                                                                                    <option value="<?php echo $sbs['cuid']; ?>">
                                                                                        <?php echo $sbs['akun']; ?> - <?php echo $sbs['no_rek']; ?> - <?php echo $sbs['pemilik']; ?>
                                                                                    </option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row d-flex">
                                                                            <div class="col-md-3 col-xs-4  ">
                                                                                <div class="font-weight-bold">Bank Penerima<span class="text-danger">*</span></div>
                                                                            </div>
                                                                            <div class="col-md-9 col-xs-8 d-flex flex-wrap">                                    
                                                                                <select class="form-control bank_list m-15 has-feedback has-success" data-plugin="bank_list" id="metode" name="metode">
                                                                                        <?php
                                                                                            $sql_bank = mysqli_query($conn,"SELECT * FROM `tb_bank` WHERE userID = 1 AND image = 'BRIVA.png' ORDER BY cuid ASC") or die(mysqli_error());
                                                                                            $no=0;
                                                                                            while($sb = mysqli_fetch_array($sql_bank)){
                                                                                            $no++;
                                                                                        ?>
                                                                                    <option value="<?php echo $sb['cuid']; ?>">
                                                                                        <?php echo $sb['akun']; ?> - <?php echo $sb['no_rek']; ?> a/n <?php echo $sb['pemilik']; ?>
                                                                                    </option>
                                                                                    
                                                                                </select>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row info-lst" id="bankInfo_de001" style="">
                                                                            <div class="col-xs-12 col-md-9">
                                                                                <div class="bankInfo-box" id="bankList">
                                                                                    <div class="box-title">
                                                                                        <i class="icon-invoice i-invoice"></i>
                                                                                        Rincian Deposit Akun
                                                                                        <div class="pull-right acc_status">STATUS : <span class="text-success">ONLINE</span>
                                                                                    </div>
                                                                                    <input type="hidden" id="depo_acc_status" value="ONLINE" />
                                                                                </div>

                                                                                <table class="table table-borderless text-right info-box--001">
                                                                                    <tbody>
                                                                                        <tr class="text-left first">
                                                                                            <td class="col-xs-12 col-md-6" colspan="2">
                                                                                                <small> Nama Akun bank</small>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr class="">
                                                                                            <td class="col-xs-12 col-md-6" colspan="2">
                                                                                                <input id="info-copy-1" value="<?php echo $sb['pemilik'];?>" class="copy-input" />
                                                                                                <a href="javascript:void(0);" data-sel="info-copy-1" class="btn btn-link btn-copy lbl">
                                                                                                    <span class=" "><?php echo $sb['pemilik']; ?></span>
                                                                                                    <i class="icon-copy"></i>
                                                                                                </a>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr class="text-left first">
                                                                                            <td class="col-xs-12 col-md-6" colspan="2">
                                                                                                <small> Rekening Bank No</small>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr class=" ">
                                                                                            <td class="col-xs-12 col-md-6" colspan="2" style="padding-bottom: 10px">
                                                                                                <input id="info-copy-2" value="<?php echo $sb['no_rek'];?>" class="copy-input" />
                                                                                                <a href="javascript:void(0);" data-sel="info-copy-2" class="btn btn-link btn-copy lbl">
                                                                                                    <span class=" " style="white-space: normal; word-break: break-word">
                                                                                                        <?php echo $sb['no_rek'];?>
                                                                                                    </span>
                                                                                                    <i class="icon-copy"></i>
                                                                                                </a>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <?php } ?>
                                                                                        <tr class="text-left tr_type2">
                                                                                            <td class="col-xs-6 col-md-6">
                                                                                                <small>Min Deposit</small>
                                                                                            </td>
                                                                                            <td class="col-xs-6 col-md-6 text-right">
                                                                                                <span class="lbl">IDR50,000.00</span>
                                                                                                <input type="hidden" id="bank_min_deposit" class="min_deposit" value="10000" />
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr class="text-left tr_type2">
                                                                                            <td class="col-xs-6 col-md-6">
                                                                                                <small i18n="">Max Deposit</small>
                                                                                            </td>
                                                                                            <td class="col-xs-6 col-md-6 text-right">
                                                                                                <span class="lbl">IDR1,000,000,000.00</span>
                                                                                                <input type="hidden" id="bank_max_deposit" class="max_deposit" value="1000000000" />
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr class="text-left tr_type2">
                                                                                            <td class="col-xs-6 col-md-6">
                                                                                                <small i18n="">Komisi Bank / Transaksi</small>
                                                                                            </td>
                                                                                            <td class="col-xs-6 col-md-6 text-right">
                                                                                                <span class="lbl">IDR 0.00 </span>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <input type="hidden" id="admin_fee" value="IDR 0.00" />
                                                                                        <input type="hidden" id="percent_check" value="" />
                                                                                        <tr class="text-left tr_type2">
                                                                                            <td class="col-xs-6 col-md-6">
                                                                                                <small i18n="">Subsidi Bank / Transaksi</small>
                                                                                            </td>
                                                                                            <td class="col-xs-6 col-md-6 text-right">
                                                                                                <span class="lbl">IDR 0</span>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <input type="hidden" id="subsidi" value="IDR 0" />
                                                                                    </tbody>
                                                                                </table>
                                                                                <script>
                                                                                    $(document).ready(function () {
                                                                                        $('[data-toggle="tooltip"]').tooltip();
                                                                                    });
                                                                                </script>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                
                                                                        <div class="row d-flex">
                                                                            <div class="col-md-3 col-xs-4">
                                                                                <div class="font-weight-bold"> Bonus
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="col-md-9 col-xs-8 d-flex flex-wrap">
                                                                                <div class="m-15" style="width: 100%;">
                                                                                    <div style="width: 100%;">
                                                                                        <select
                                                                                            class="form-control promoList"
                                                                                            id="gameid" name="gameid">
                                                                                            <option disabled selected
                                                                                                value="0">Pilih promo
                                                                                                tersedia</option>
                                                                                            <?php
                                                                                                $sql_transaksi = mysqli_query($conn, "SELECT * FROM `tb_post` WHERE kategori = 0 AND cuid NOT IN(SELECT gameid FROM `tb_transaksi` WHERE userID = '$userID' AND jenis = 1 AND status = 1) ORDER BY cuid ASC") or die(mysqli_error());
                                                                                                $no = 0;
                                                                                                while ($st = mysqli_fetch_array($sql_transaksi)) {
                                                                                                $no++;
                                                                                            ?>
                                                                                            <option
                                                                                                value="<?php echo $st['cuid']; ?>">
                                                                                                <?php echo ucwords(strtolower($st['title'])); ?>
                                                                                                <?php } ?>
                                                                                            </option>
                                                                                        </select>

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row d-flex">
                                                                            <div class="col-md-3 col-xs-4 ">
                                                                                <div class="font-weight-bold">
                                                                                    Jumlah Deposit<span
                                                                                        class="text-danger">*</span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-9 col-xs-8">
                                                                                <div class=" d-flex flex-wrap">
                                                                                    <input type="text" id="nominal"
                                                                                        class="form-control m-15 price-tag"
                                                                                        placeholder="Masukan Nominal Deposit"
                                                                                        name="nominal" min="50000"
                                                                                        required>
                                                                                </div>
                                                                                <p class="min-max-notes">
                                                                                    Min Claim Bonus<span
                                                                                        class="min-deposit-amount"
                                                                                        style="padding-right: 5px;"><b
                                                                                            id="min_bni">
                                                                                            100,000.00</b></span><br>
                                                                                    Max Claim Bonus<span
                                                                                        class="max-deposit-amount"><b>10,000,000.00</b></span>
                                                                                </p>

                                                                            </div>
                                                                        </div>

                                                                        <div class="row d-flex">
                                                                            <div class="col-md-3 col-xs-4  ">
                                                                                <div class="font-weight-bold">
                                                                                    Keterangan </div>
                                                                            </div>
                                                                            <div
                                                                                class="col-md-9 col-xs-8 d-flex flex-wrap">
                                                                                <input type="text"
                                                                                    class="form-control m-15"
                                                                                    id="catatan" maxlength="35"
                                                                                    minlength="5" name="catatan"
                                                                                    placeholder="No. Referensi / Nama Pengirim">
                                                                            </div>
                                                                        </div>

                                                                        <div class="row d-flex">
                                                                            <div class="col-md-12 d-flex flex-wrap">
                                                                                <label>
                                                                                    <input type="checkbox"
                                                                                        class="form-check-input"
                                                                                        id="exampleCheck1"
                                                                                        name="termcondition">
                                                                                    Saya telah membaca dan menyetujui
                                                                                    Syarat dan
                                                                                    Ketentuan Promosi. Kami tidak
                                                                                    menerima jenis
                                                                                    setoran dalam bentuk cek. Semua
                                                                                    jenis
                                                                                    pembayaran
                                                                                    dalam bentuk cek ke akun kami akan
                                                                                    diabaikan.
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!--- second Tab end----->
                                                                    <div class="row d-flex">
                                                                        <div class="col-md-3 col-xs-4  ">
                                                                        </div>
                                                                        <div class="col-md-9 col-xs-8 d-flex flex-wrap">
                                                                            <div class="m-15">
                                                                                <button type="button"
                                                                                    class="btn btn-primary" id="backBtn"
                                                                                    onclick="tutup_bank()">Back</button>

                                                                                <button type="submit"
                                                                                    class="btn btn-secondary"
                                                                                    id="submitBtn"
                                                                                    name="submit">Lanjut</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="modal_mandiri" style="display: none">
                                            <div class="box-wrapper plr-15">
                                                <div class="container-b3">
                                                    <div class="row">
                                                        <div class="col-xs-12 col-md-12 content-form">
                                                            <style>
                                                                * {
                                                                    -webkit-backface-visibility: visible;
                                                                }

                                                                select>option.disble {
                                                                    background-color: #d4d4d4;
                                                                }
                                                            </style>
                                                            <form id="depositForm" action="<?php echo $urlweb; ?>/function/deposit.php" method="post">
                                                                <input type="hidden" name="postID" class="form-control" value="<?php echo $u['cuid']; ?>">
                                                                <div class="box-wrapper plr-15">
                                                                    <div class="row d-flex">
                                                                        <div class="col-md-3 col-xs-4  ">
                                                                            <div class="font-weight-bold"> Metode Penyetoran<span class="text-danger">*</span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-9 col-xs-8 d-flex flex-wrap">
                                                                            <div class="radio_2 m-15 mt-2">
                                                                                <input id="radioBank5" checked="" type="radio" value="5">
                                                                                <label class=" " for="radioBank5">
                                                                                    <span class="radio-title"> Bank / E-Wallet </span>
                                                                                    <span class="marked">
                                                                                        <i class="icon-checkmark"></i>
                                                                                    </span>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="tab">
                                                                        <div class="row d-flex">
                                                                            <div class="col-md-3 col-xs-4  ">
                                                                                <div class="font-weight-bold">Rekening Pengirim<span class="text-danger">*</span></div>
                                                                            </div>
                                                                            <div
                                                                                class="col-md-9 col-xs-8  d-flex flex-wrap">
                                                                                <select class="form-control m-15"name="pay_from" required>
                                                                                     
                                                                                    <option value="<?php echo $sbs['cuid']; ?>">
                                                                                        <?php echo $sbs['akun']; ?> - <?php echo $sbs['no_rek']; ?> - <?php echo $sbs['pemilik']; ?>
                                                                                    </option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row d-flex">
                                                                            <div class="col-md-3 col-xs-4  ">
                                                                                <div class="font-weight-bold">Bank Penerima<span class="text-danger">*</span></div>
                                                                            </div>
                                                                            <div class="col-md-9 col-xs-8 d-flex flex-wrap">                                    
                                                                                <select class="form-control bank_list m-15 has-feedback has-success" data-plugin="bank_list" id="metode" name="metode">
                                                                                        <?php
                                                                                            $sql_bank = mysqli_query($conn,"SELECT * FROM `tb_bank` WHERE userID = 1 AND image = 'MANDIRIVA.png' ORDER BY cuid ASC") or die(mysqli_error());
                                                                                            $no=0;
                                                                                            while($sb = mysqli_fetch_array($sql_bank)){
                                                                                            $no++;
                                                                                        ?>
                                                                                    <option value="<?php echo $sb['cuid']; ?>">
                                                                                        <?php echo $sb['akun']; ?> - <?php echo $sb['no_rek']; ?> a/n <?php echo $sb['pemilik']; ?>
                                                                                    </option>
                                                                                    
                                                                                </select>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row info-lst" id="bankInfo_de001" style="">
                                                                            <div class="col-xs-12 col-md-9">
                                                                                <div class="bankInfo-box" id="bankList">
                                                                                    <div class="box-title">
                                                                                        <i class="icon-invoice i-invoice"></i>
                                                                                        Rincian Deposit Akun
                                                                                        <div class="pull-right acc_status">STATUS : <span class="text-success">ONLINE</span>
                                                                                    </div>
                                                                                    <input type="hidden" id="depo_acc_status" value="ONLINE" />
                                                                                </div>

                                                                                <table class="table table-borderless text-right info-box--001">
                                                                                    <tbody>
                                                                                        <tr class="text-left first">
                                                                                            <td class="col-xs-12 col-md-6" colspan="2">
                                                                                                <small> Nama Akun bank</small>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr class="">
                                                                                            <td class="col-xs-12 col-md-6" colspan="2">
                                                                                                <input id="info-copy-1" value="<?php echo $sb['pemilik'];?>" class="copy-input" />
                                                                                                <a href="javascript:void(0);" data-sel="info-copy-1" class="btn btn-link btn-copy lbl">
                                                                                                    <span class=" "><?php echo $sb['pemilik']; ?></span>
                                                                                                    <i class="icon-copy"></i>
                                                                                                </a>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr class="text-left first">
                                                                                            <td class="col-xs-12 col-md-6" colspan="2">
                                                                                                <small> Rekening Bank No</small>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr class=" ">
                                                                                            <td class="col-xs-12 col-md-6" colspan="2" style="padding-bottom: 10px">
                                                                                                <input id="info-copy-2" value="<?php echo $sb['no_rek'];?>" class="copy-input" />
                                                                                                <a href="javascript:void(0);" data-sel="info-copy-2" class="btn btn-link btn-copy lbl">
                                                                                                    <span class=" " style="white-space: normal; word-break: break-word">
                                                                                                        <?php echo $sb['no_rek'];?>
                                                                                                    </span>
                                                                                                    <i class="icon-copy"></i>
                                                                                                </a>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <?php } ?>
                                                                                        <tr class="text-left tr_type2">
                                                                                            <td class="col-xs-6 col-md-6">
                                                                                                <small>Min Deposit</small>
                                                                                            </td>
                                                                                            <td class="col-xs-6 col-md-6 text-right">
                                                                                                <span class="lbl">IDR50,000.00</span>
                                                                                                <input type="hidden" id="bank_min_deposit" class="min_deposit" value="10000" />
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr class="text-left tr_type2">
                                                                                            <td class="col-xs-6 col-md-6">
                                                                                                <small i18n="">Max Deposit</small>
                                                                                            </td>
                                                                                            <td class="col-xs-6 col-md-6 text-right">
                                                                                                <span class="lbl">IDR1,000,000,000.00</span>
                                                                                                <input type="hidden" id="bank_max_deposit" class="max_deposit" value="1000000000" />
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr class="text-left tr_type2">
                                                                                            <td class="col-xs-6 col-md-6">
                                                                                                <small i18n="">Komisi Bank / Transaksi</small>
                                                                                            </td>
                                                                                            <td class="col-xs-6 col-md-6 text-right">
                                                                                                <span class="lbl">IDR 0.00 </span>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <input type="hidden" id="admin_fee" value="IDR 0.00" />
                                                                                        <input type="hidden" id="percent_check" value="" />
                                                                                        <tr class="text-left tr_type2">
                                                                                            <td class="col-xs-6 col-md-6">
                                                                                                <small i18n="">Subsidi Bank / Transaksi</small>
                                                                                            </td>
                                                                                            <td class="col-xs-6 col-md-6 text-right">
                                                                                                <span class="lbl">IDR 0</span>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <input type="hidden" id="subsidi" value="IDR 0" />
                                                                                    </tbody>
                                                                                </table>
                                                                                <script>
                                                                                    $(document).ready(function () {
                                                                                        $('[data-toggle="tooltip"]').tooltip();
                                                                                    });
                                                                                </script>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                
                                                                        <div class="row d-flex">
                                                                            <div class="col-md-3 col-xs-4">
                                                                                <div class="font-weight-bold"> Bonus
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="col-md-9 col-xs-8 d-flex flex-wrap">
                                                                                <div class="m-15" style="width: 100%;">
                                                                                    <div style="width: 100%;">
                                                                                        <select
                                                                                            class="form-control promoList"
                                                                                            id="gameid" name="gameid">
                                                                                            <option disabled selected
                                                                                                value="0">Pilih promo
                                                                                                tersedia</option>
                                                                                            <?php
                                                                                                $sql_transaksi = mysqli_query($conn, "SELECT * FROM `tb_post` WHERE kategori = 0 AND cuid NOT IN(SELECT gameid FROM `tb_transaksi` WHERE userID = '$userID' AND jenis = 1 AND status = 1) ORDER BY cuid ASC") or die(mysqli_error());
                                                                                                $no = 0;
                                                                                                while ($st = mysqli_fetch_array($sql_transaksi)) {
                                                                                                $no++;
                                                                                            ?>
                                                                                            <option
                                                                                                value="<?php echo $st['cuid']; ?>">
                                                                                                <?php echo ucwords(strtolower($st['title'])); ?>
                                                                                                <?php } ?>
                                                                                            </option>
                                                                                        </select>

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row d-flex">
                                                                            <div class="col-md-3 col-xs-4 ">
                                                                                <div class="font-weight-bold">
                                                                                    Jumlah Deposit<span
                                                                                        class="text-danger">*</span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-9 col-xs-8">
                                                                                <div class=" d-flex flex-wrap">
                                                                                    <input type="text" id="nominal"
                                                                                        class="form-control m-15 price-tag"
                                                                                        placeholder="Masukan Nominal Deposit"
                                                                                        name="nominal" min="50000"
                                                                                        required>
                                                                                </div>
                                                                                <p class="min-max-notes">
                                                                                    Min Claim Bonus<span
                                                                                        class="min-deposit-amount"
                                                                                        style="padding-right: 5px;"><b
                                                                                            id="min_bni">
                                                                                            100,000.00</b></span><br>
                                                                                    Max Claim Bonus<span
                                                                                        class="max-deposit-amount"><b>10,000,000.00</b></span>
                                                                                </p>

                                                                            </div>
                                                                        </div>

                                                                        <div class="row d-flex">
                                                                            <div class="col-md-3 col-xs-4  ">
                                                                                <div class="font-weight-bold">
                                                                                    Keterangan </div>
                                                                            </div>
                                                                            <div
                                                                                class="col-md-9 col-xs-8 d-flex flex-wrap">
                                                                                <input type="text"
                                                                                    class="form-control m-15"
                                                                                    id="catatan" maxlength="35"
                                                                                    minlength="5" name="catatan"
                                                                                    placeholder="No. Referensi / Nama Pengirim">
                                                                            </div>
                                                                        </div>

                                                                        <div class="row d-flex">
                                                                            <div class="col-md-12 d-flex flex-wrap">
                                                                                <label>
                                                                                    <input type="checkbox"
                                                                                        class="form-check-input"
                                                                                        id="exampleCheck1"
                                                                                        name="termcondition">
                                                                                    Saya telah membaca dan menyetujui
                                                                                    Syarat dan
                                                                                    Ketentuan Promosi. Kami tidak
                                                                                    menerima jenis
                                                                                    setoran dalam bentuk cek. Semua
                                                                                    jenis
                                                                                    pembayaran
                                                                                    dalam bentuk cek ke akun kami akan
                                                                                    diabaikan.
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!--- second Tab end----->
                                                                    <div class="row d-flex">
                                                                        <div class="col-md-3 col-xs-4  ">
                                                                        </div>
                                                                        <div class="col-md-9 col-xs-8 d-flex flex-wrap">
                                                                            <div class="m-15">
                                                                                <button type="button"
                                                                                    class="btn btn-primary" id="backBtn"
                                                                                    onclick="tutup_bank()">Back</button>

                                                                                <button type="submit"
                                                                                    class="btn btn-secondary"
                                                                                    id="submitBtn"
                                                                                    name="submit">Lanjut</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="modal_dana" style="display: none">
                                            <div class="box-wrapper plr-15">
                                                <div class="container-b3">
                                                    <div class="row">
                                                        <div class="col-xs-12 col-md-12 content-form">
                                                            <style>
                                                                * {
                                                                    -webkit-backface-visibility: visible;
                                                                }

                                                                select>option.disble {
                                                                    background-color: #d4d4d4;
                                                                }
                                                            </style>
                                                            <form id="depositForm" action="<?php echo $urlweb; ?>/function/deposit.php" method="post">
                                                                <input type="hidden" name="postID" class="form-control" value="<?php echo $u['cuid']; ?>">
                                                                <div class="box-wrapper plr-15">
                                                                    <div class="row d-flex">
                                                                        <div class="col-md-3 col-xs-4  ">
                                                                            <div class="font-weight-bold"> Metode Penyetoran<span class="text-danger">*</span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-9 col-xs-8 d-flex flex-wrap">
                                                                            <div class="radio_2 m-15 mt-2">
                                                                                <input id="radioBank5" checked="" type="radio" value="5">
                                                                                <label class=" " for="radioBank5">
                                                                                    <span class="radio-title"> Bank / E-Wallet </span>
                                                                                    <span class="marked">
                                                                                        <i class="icon-checkmark"></i>
                                                                                    </span>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="tab">
                                                                        <div class="row d-flex">
                                                                            <div class="col-md-3 col-xs-4  ">
                                                                                <div class="font-weight-bold">Rekening Pengirim<span class="text-danger">*</span></div>
                                                                            </div>
                                                                            <div
                                                                                class="col-md-9 col-xs-8  d-flex flex-wrap">
                                                                                <select class="form-control m-15"name="pay_from" required>
                                                                                     
                                                                                    <option value="<?php echo $sbs['cuid']; ?>">
                                                                                        <?php echo $sbs['akun']; ?> - <?php echo $sbs['no_rek']; ?> - <?php echo $sbs['pemilik']; ?>
                                                                                    </option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row d-flex">
                                                                            <div class="col-md-3 col-xs-4  ">
                                                                                <div class="font-weight-bold">Bank Penerima<span class="text-danger">*</span></div>
                                                                            </div>
                                                                            <div class="col-md-9 col-xs-8 d-flex flex-wrap">                                    
                                                                                <select class="form-control bank_list m-15 has-feedback has-success" data-plugin="bank_list" id="metode" name="metode">
                                                                                        <?php
                                                                                            $sql_bank = mysqli_query($conn,"SELECT * FROM `tb_bank` WHERE userID = 1 AND image = 'DANA.png' ORDER BY cuid ASC") or die(mysqli_error());
                                                                                            $no=0;
                                                                                            while($sb = mysqli_fetch_array($sql_bank)){
                                                                                            $no++;
                                                                                        ?>
                                                                                    <option value="<?php echo $sb['cuid']; ?>">
                                                                                        <?php echo $sb['akun']; ?> - <?php echo $sb['no_rek']; ?> a/n <?php echo $sb['pemilik']; ?>
                                                                                    </option>
                                                                                    
                                                                                </select>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row info-lst" id="bankInfo_de001" style="">
                                                                            <div class="col-xs-12 col-md-9">
                                                                                <div class="bankInfo-box" id="bankList">
                                                                                    <div class="box-title">
                                                                                        <i class="icon-invoice i-invoice"></i>
                                                                                        Rincian Deposit Akun
                                                                                        <div class="pull-right acc_status">STATUS : <span class="text-success">ONLINE</span>
                                                                                    </div>
                                                                                    <input type="hidden" id="depo_acc_status" value="ONLINE" />
                                                                                </div>

                                                                                <table class="table table-borderless text-right info-box--001">
                                                                                    <tbody>
                                                                                        <tr class="text-left first">
                                                                                            <td class="col-xs-12 col-md-6" colspan="2">
                                                                                                <small> Nama Akun bank</small>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr class="">
                                                                                            <td class="col-xs-12 col-md-6" colspan="2">
                                                                                                <input id="info-copy-1" value="<?php echo $sb['pemilik'];?>" class="copy-input" />
                                                                                                <a href="javascript:void(0);" data-sel="info-copy-1" class="btn btn-link btn-copy lbl">
                                                                                                    <span class=" "><?php echo $sb['pemilik']; ?></span>
                                                                                                    <i class="icon-copy"></i>
                                                                                                </a>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr class="text-left first">
                                                                                            <td class="col-xs-12 col-md-6" colspan="2">
                                                                                                <small> Rekening Bank No</small>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr class=" ">
                                                                                            <td class="col-xs-12 col-md-6" colspan="2" style="padding-bottom: 10px">
                                                                                                <input id="info-copy-2" value="<?php echo $sb['no_rek'];?>" class="copy-input" />
                                                                                                <a href="javascript:void(0);" data-sel="info-copy-2" class="btn btn-link btn-copy lbl">
                                                                                                    <span class=" " style="white-space: normal; word-break: break-word">
                                                                                                        <?php echo $sb['no_rek'];?>
                                                                                                    </span>
                                                                                                    <i class="icon-copy"></i>
                                                                                                </a>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <?php } ?>
                                                                                        <tr class="text-left tr_type2">
                                                                                            <td class="col-xs-6 col-md-6">
                                                                                                <small>Min Deposit</small>
                                                                                            </td>
                                                                                            <td class="col-xs-6 col-md-6 text-right">
                                                                                                <span class="lbl">IDR50,000.00</span>
                                                                                                <input type="hidden" id="bank_min_deposit" class="min_deposit" value="10000" />
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr class="text-left tr_type2">
                                                                                            <td class="col-xs-6 col-md-6">
                                                                                                <small i18n="">Max Deposit</small>
                                                                                            </td>
                                                                                            <td class="col-xs-6 col-md-6 text-right">
                                                                                                <span class="lbl">IDR1,000,000,000.00</span>
                                                                                                <input type="hidden" id="bank_max_deposit" class="max_deposit" value="1000000000" />
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr class="text-left tr_type2">
                                                                                            <td class="col-xs-6 col-md-6">
                                                                                                <small i18n="">Komisi Bank / Transaksi</small>
                                                                                            </td>
                                                                                            <td class="col-xs-6 col-md-6 text-right">
                                                                                                <span class="lbl">IDR 0.00 </span>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <input type="hidden" id="admin_fee" value="IDR 0.00" />
                                                                                        <input type="hidden" id="percent_check" value="" />
                                                                                        <tr class="text-left tr_type2">
                                                                                            <td class="col-xs-6 col-md-6">
                                                                                                <small i18n="">Subsidi Bank / Transaksi</small>
                                                                                            </td>
                                                                                            <td class="col-xs-6 col-md-6 text-right">
                                                                                                <span class="lbl">IDR 0</span>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <input type="hidden" id="subsidi" value="IDR 0" />
                                                                                    </tbody>
                                                                                </table>
                                                                                <script>
                                                                                    $(document).ready(function () {
                                                                                        $('[data-toggle="tooltip"]').tooltip();
                                                                                    });
                                                                                </script>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                
                                                                        <div class="row d-flex">
                                                                            <div class="col-md-3 col-xs-4">
                                                                                <div class="font-weight-bold"> Bonus
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="col-md-9 col-xs-8 d-flex flex-wrap">
                                                                                <div class="m-15" style="width: 100%;">
                                                                                    <div style="width: 100%;">
                                                                                        <select
                                                                                            class="form-control promoList"
                                                                                            id="gameid" name="gameid">
                                                                                            <option disabled selected
                                                                                                value="0">Pilih promo
                                                                                                tersedia</option>
                                                                                            <?php
                                                                                                $sql_transaksi = mysqli_query($conn, "SELECT * FROM `tb_post` WHERE kategori = 0 AND cuid NOT IN(SELECT gameid FROM `tb_transaksi` WHERE userID = '$userID' AND jenis = 1 AND status = 1) ORDER BY cuid ASC") or die(mysqli_error());
                                                                                                $no = 0;
                                                                                                while ($st = mysqli_fetch_array($sql_transaksi)) {
                                                                                                $no++;
                                                                                            ?>
                                                                                            <option
                                                                                                value="<?php echo $st['cuid']; ?>">
                                                                                                <?php echo ucwords(strtolower($st['title'])); ?>
                                                                                                <?php } ?>
                                                                                            </option>
                                                                                        </select>

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row d-flex">
                                                                            <div class="col-md-3 col-xs-4 ">
                                                                                <div class="font-weight-bold">
                                                                                    Jumlah Deposit<span
                                                                                        class="text-danger">*</span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-9 col-xs-8">
                                                                                <div class=" d-flex flex-wrap">
                                                                                    <input type="text" id="nominal"
                                                                                        class="form-control m-15 price-tag"
                                                                                        placeholder="Masukan Nominal Deposit"
                                                                                        name="nominal" min="50000"
                                                                                        required>
                                                                                </div>
                                                                                <p class="min-max-notes">
                                                                                    Min Claim Bonus<span
                                                                                        class="min-deposit-amount"
                                                                                        style="padding-right: 5px;"><b
                                                                                            id="min_bni">
                                                                                            100,000.00</b></span><br>
                                                                                    Max Claim Bonus<span
                                                                                        class="max-deposit-amount"><b>10,000,000.00</b></span>
                                                                                </p>

                                                                            </div>
                                                                        </div>

                                                                        <div class="row d-flex">
                                                                            <div class="col-md-3 col-xs-4  ">
                                                                                <div class="font-weight-bold">
                                                                                    Keterangan </div>
                                                                            </div>
                                                                            <div
                                                                                class="col-md-9 col-xs-8 d-flex flex-wrap">
                                                                                <input type="text"
                                                                                    class="form-control m-15"
                                                                                    id="catatan" maxlength="35"
                                                                                    minlength="5" name="catatan"
                                                                                    placeholder="No. Referensi / Nama Pengirim">
                                                                            </div>
                                                                        </div>

                                                                        <div class="row d-flex">
                                                                            <div class="col-md-12 d-flex flex-wrap">
                                                                                <label>
                                                                                    <input type="checkbox"
                                                                                        class="form-check-input"
                                                                                        id="exampleCheck1"
                                                                                        name="termcondition">
                                                                                    Saya telah membaca dan menyetujui
                                                                                    Syarat dan
                                                                                    Ketentuan Promosi. Kami tidak
                                                                                    menerima jenis
                                                                                    setoran dalam bentuk cek. Semua
                                                                                    jenis
                                                                                    pembayaran
                                                                                    dalam bentuk cek ke akun kami akan
                                                                                    diabaikan.
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!--- second Tab end----->
                                                                    <div class="row d-flex">
                                                                        <div class="col-md-3 col-xs-4  ">
                                                                        </div>
                                                                        <div class="col-md-9 col-xs-8 d-flex flex-wrap">
                                                                            <div class="m-15">
                                                                                <button type="button"
                                                                                    class="btn btn-primary" id="backBtn"
                                                                                    onclick="tutup_bank()">Back</button>

                                                                                <button type="submit"
                                                                                    class="btn btn-secondary"
                                                                                    id="submitBtn"
                                                                                    name="submit">Lanjut</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="modal_linkaja" style="display: none">
                                            <div class="box-wrapper plr-15">
                                                <div class="container-b3">
                                                    <div class="row">
                                                        <div class="col-xs-12 col-md-12 content-form">
                                                            <style>
                                                                * {
                                                                    -webkit-backface-visibility: visible;
                                                                }

                                                                select>option.disble {
                                                                    background-color: #d4d4d4;
                                                                }
                                                            </style>
                                                            <form id="depositForm" action="<?php echo $urlweb; ?>/function/deposit.php" method="post">
                                                                <input type="hidden" name="postID" class="form-control" value="<?php echo $u['cuid']; ?>">
                                                                <div class="box-wrapper plr-15">
                                                                    <div class="row d-flex">
                                                                        <div class="col-md-3 col-xs-4  ">
                                                                            <div class="font-weight-bold"> Metode Penyetoran<span class="text-danger">*</span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-9 col-xs-8 d-flex flex-wrap">
                                                                            <div class="radio_2 m-15 mt-2">
                                                                                <input id="radioBank5" checked="" type="radio" value="5">
                                                                                <label class=" " for="radioBank5">
                                                                                    <span class="radio-title"> Bank / E-Wallet </span>
                                                                                    <span class="marked">
                                                                                        <i class="icon-checkmark"></i>
                                                                                    </span>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="tab">
                                                                        <div class="row d-flex">
                                                                            <div class="col-md-3 col-xs-4  ">
                                                                                <div class="font-weight-bold">Rekening Pengirim<span class="text-danger">*</span></div>
                                                                            </div>
                                                                            <div
                                                                                class="col-md-9 col-xs-8  d-flex flex-wrap">
                                                                                <select class="form-control m-15"name="pay_from" required>
                                                                                     
                                                                                    <option value="<?php echo $sbs['cuid']; ?>">
                                                                                        <?php echo $sbs['akun']; ?> - <?php echo $sbs['no_rek']; ?> - <?php echo $sbs['pemilik']; ?>
                                                                                    </option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row d-flex">
                                                                            <div class="col-md-3 col-xs-4  ">
                                                                                <div class="font-weight-bold">Bank Penerima<span class="text-danger">*</span></div>
                                                                            </div>
                                                                            <div class="col-md-9 col-xs-8 d-flex flex-wrap">                                    
                                                                                <select class="form-control bank_list m-15 has-feedback has-success" data-plugin="bank_list" id="metode" name="metode">
                                                                                        <?php
                                                                                            $sql_bank = mysqli_query($conn,"SELECT * FROM `tb_bank` WHERE userID = 1 AND image = 'LINKAJA.png' ORDER BY cuid ASC") or die(mysqli_error());
                                                                                            $no=0;
                                                                                            while($sb = mysqli_fetch_array($sql_bank)){
                                                                                            $no++;
                                                                                        ?>
                                                                                    <option value="<?php echo $sb['cuid']; ?>">
                                                                                        <?php echo $sb['akun']; ?> - <?php echo $sb['no_rek']; ?> a/n <?php echo $sb['pemilik']; ?>
                                                                                    </option>
                                                                                    
                                                                                </select>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row info-lst" id="bankInfo_de001" style="">
                                                                            <div class="col-xs-12 col-md-9">
                                                                                <div class="bankInfo-box" id="bankList">
                                                                                    <div class="box-title">
                                                                                        <i class="icon-invoice i-invoice"></i>
                                                                                        Rincian Deposit Akun
                                                                                        <div class="pull-right acc_status">STATUS : <span class="text-success">ONLINE</span>
                                                                                    </div>
                                                                                    <input type="hidden" id="depo_acc_status" value="ONLINE" />
                                                                                </div>

                                                                                <table class="table table-borderless text-right info-box--001">
                                                                                    <tbody>
                                                                                        <tr class="text-left first">
                                                                                            <td class="col-xs-12 col-md-6" colspan="2">
                                                                                                <small> Nama Akun bank</small>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr class="">
                                                                                            <td class="col-xs-12 col-md-6" colspan="2">
                                                                                                <input id="info-copy-1" value="<?php echo $sb['pemilik'];?>" class="copy-input" />
                                                                                                <a href="javascript:void(0);" data-sel="info-copy-1" class="btn btn-link btn-copy lbl">
                                                                                                    <span class=" "><?php echo $sb['pemilik']; ?></span>
                                                                                                    <i class="icon-copy"></i>
                                                                                                </a>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr class="text-left first">
                                                                                            <td class="col-xs-12 col-md-6" colspan="2">
                                                                                                <small> Rekening Bank No</small>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr class=" ">
                                                                                            <td class="col-xs-12 col-md-6" colspan="2" style="padding-bottom: 10px">
                                                                                                <input id="info-copy-2" value="<?php echo $sb['no_rek'];?>" class="copy-input" />
                                                                                                <a href="javascript:void(0);" data-sel="info-copy-2" class="btn btn-link btn-copy lbl">
                                                                                                    <span class=" " style="white-space: normal; word-break: break-word">
                                                                                                        <?php echo $sb['no_rek'];?>
                                                                                                    </span>
                                                                                                    <i class="icon-copy"></i>
                                                                                                </a>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <?php } ?>
                                                                                        <tr class="text-left tr_type2">
                                                                                            <td class="col-xs-6 col-md-6">
                                                                                                <small>Min Deposit</small>
                                                                                            </td>
                                                                                            <td class="col-xs-6 col-md-6 text-right">
                                                                                                <span class="lbl">IDR50,000.00</span>
                                                                                                <input type="hidden" id="bank_min_deposit" class="min_deposit" value="10000" />
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr class="text-left tr_type2">
                                                                                            <td class="col-xs-6 col-md-6">
                                                                                                <small i18n="">Max Deposit</small>
                                                                                            </td>
                                                                                            <td class="col-xs-6 col-md-6 text-right">
                                                                                                <span class="lbl">IDR1,000,000,000.00</span>
                                                                                                <input type="hidden" id="bank_max_deposit" class="max_deposit" value="1000000000" />
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr class="text-left tr_type2">
                                                                                            <td class="col-xs-6 col-md-6">
                                                                                                <small i18n="">Komisi Bank / Transaksi</small>
                                                                                            </td>
                                                                                            <td class="col-xs-6 col-md-6 text-right">
                                                                                                <span class="lbl">IDR 0.00 </span>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <input type="hidden" id="admin_fee" value="IDR 0.00" />
                                                                                        <input type="hidden" id="percent_check" value="" />
                                                                                        <tr class="text-left tr_type2">
                                                                                            <td class="col-xs-6 col-md-6">
                                                                                                <small i18n="">Subsidi Bank / Transaksi</small>
                                                                                            </td>
                                                                                            <td class="col-xs-6 col-md-6 text-right">
                                                                                                <span class="lbl">IDR 0</span>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <input type="hidden" id="subsidi" value="IDR 0" />
                                                                                    </tbody>
                                                                                </table>
                                                                                <script>
                                                                                    $(document).ready(function () {
                                                                                        $('[data-toggle="tooltip"]').tooltip();
                                                                                    });
                                                                                </script>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                
                                                                        <div class="row d-flex">
                                                                            <div class="col-md-3 col-xs-4">
                                                                                <div class="font-weight-bold"> Bonus
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="col-md-9 col-xs-8 d-flex flex-wrap">
                                                                                <div class="m-15" style="width: 100%;">
                                                                                    <div style="width: 100%;">
                                                                                        <select
                                                                                            class="form-control promoList"
                                                                                            id="gameid" name="gameid">
                                                                                            <option disabled selected
                                                                                                value="0">Pilih promo
                                                                                                tersedia</option>
                                                                                            <?php
                                                                                                $sql_transaksi = mysqli_query($conn, "SELECT * FROM `tb_post` WHERE kategori = 0 AND cuid NOT IN(SELECT gameid FROM `tb_transaksi` WHERE userID = '$userID' AND jenis = 1 AND status = 1) ORDER BY cuid ASC") or die(mysqli_error());
                                                                                                $no = 0;
                                                                                                while ($st = mysqli_fetch_array($sql_transaksi)) {
                                                                                                $no++;
                                                                                            ?>
                                                                                            <option
                                                                                                value="<?php echo $st['cuid']; ?>">
                                                                                                <?php echo ucwords(strtolower($st['title'])); ?>
                                                                                                <?php } ?>
                                                                                            </option>
                                                                                        </select>

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row d-flex">
                                                                            <div class="col-md-3 col-xs-4 ">
                                                                                <div class="font-weight-bold">
                                                                                    Jumlah Deposit<span
                                                                                        class="text-danger">*</span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-9 col-xs-8">
                                                                                <div class=" d-flex flex-wrap">
                                                                                    <input type="text" id="nominal"
                                                                                        class="form-control m-15 price-tag"
                                                                                        placeholder="Masukan Nominal Deposit"
                                                                                        name="nominal" min="50000"
                                                                                        required>
                                                                                </div>
                                                                                <p class="min-max-notes">
                                                                                    Min Claim Bonus<span
                                                                                        class="min-deposit-amount"
                                                                                        style="padding-right: 5px;"><b
                                                                                            id="min_bni">
                                                                                            100,000.00</b></span><br>
                                                                                    Max Claim Bonus<span
                                                                                        class="max-deposit-amount"><b>10,000,000.00</b></span>
                                                                                </p>

                                                                            </div>
                                                                        </div>

                                                                        <div class="row d-flex">
                                                                            <div class="col-md-3 col-xs-4  ">
                                                                                <div class="font-weight-bold">
                                                                                    Keterangan </div>
                                                                            </div>
                                                                            <div
                                                                                class="col-md-9 col-xs-8 d-flex flex-wrap">
                                                                                <input type="text"
                                                                                    class="form-control m-15"
                                                                                    id="catatan" maxlength="35"
                                                                                    minlength="5" name="catatan"
                                                                                    placeholder="No. Referensi / Nama Pengirim">
                                                                            </div>
                                                                        </div>

                                                                        <div class="row d-flex">
                                                                            <div class="col-md-12 d-flex flex-wrap">
                                                                                <label>
                                                                                    <input type="checkbox"
                                                                                        class="form-check-input"
                                                                                        id="exampleCheck1"
                                                                                        name="termcondition">
                                                                                    Saya telah membaca dan menyetujui
                                                                                    Syarat dan
                                                                                    Ketentuan Promosi. Kami tidak
                                                                                    menerima jenis
                                                                                    setoran dalam bentuk cek. Semua
                                                                                    jenis
                                                                                    pembayaran
                                                                                    dalam bentuk cek ke akun kami akan
                                                                                    diabaikan.
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!--- second Tab end----->
                                                                    <div class="row d-flex">
                                                                        <div class="col-md-3 col-xs-4  ">
                                                                        </div>
                                                                        <div class="col-md-9 col-xs-8 d-flex flex-wrap">
                                                                            <div class="m-15">
                                                                                <button type="button"
                                                                                    class="btn btn-primary" id="backBtn"
                                                                                    onclick="tutup_bank()">Back</button>

                                                                                <button type="submit"
                                                                                    class="btn btn-secondary"
                                                                                    id="submitBtn"
                                                                                    name="submit">Lanjut</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="modal_ovo" style="display: none">
                                            <div class="box-wrapper plr-15">
                                                <div class="container-b3">
                                                    <div class="row">
                                                        <div class="col-xs-12 col-md-12 content-form">
                                                            <style>
                                                                * {
                                                                    -webkit-backface-visibility: visible;
                                                                }

                                                                select>option.disble {
                                                                    background-color: #d4d4d4;
                                                                }
                                                            </style>
                                                            <form id="depositForm" action="<?php echo $urlweb; ?>/function/deposit.php" method="post">
                                                                <input type="hidden" name="postID" class="form-control" value="<?php echo $u['cuid']; ?>">
                                                                <div class="box-wrapper plr-15">
                                                                    <div class="row d-flex">
                                                                        <div class="col-md-3 col-xs-4  ">
                                                                            <div class="font-weight-bold"> Metode Penyetoran<span class="text-danger">*</span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-9 col-xs-8 d-flex flex-wrap">
                                                                            <div class="radio_2 m-15 mt-2">
                                                                                <input id="radioBank5" checked="" type="radio" value="5">
                                                                                <label class=" " for="radioBank5">
                                                                                    <span class="radio-title"> Bank / E-Wallet </span>
                                                                                    <span class="marked">
                                                                                        <i class="icon-checkmark"></i>
                                                                                    </span>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="tab">
                                                                        <div class="row d-flex">
                                                                            <div class="col-md-3 col-xs-4  ">
                                                                                <div class="font-weight-bold">Rekening Pengirim<span class="text-danger">*</span></div>
                                                                            </div>
                                                                            <div
                                                                                class="col-md-9 col-xs-8  d-flex flex-wrap">
                                                                                <select class="form-control m-15"name="pay_from" required>
                                                                                     
                                                                                    <option value="<?php echo $sbs['cuid']; ?>">
                                                                                        <?php echo $sbs['akun']; ?> - <?php echo $sbs['no_rek']; ?> - <?php echo $sbs['pemilik']; ?>
                                                                                    </option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row d-flex">
                                                                            <div class="col-md-3 col-xs-4  ">
                                                                                <div class="font-weight-bold">Bank Penerima<span class="text-danger">*</span></div>
                                                                            </div>
                                                                            <div class="col-md-9 col-xs-8 d-flex flex-wrap">                                    
                                                                                <select class="form-control bank_list m-15 has-feedback has-success" data-plugin="bank_list" id="metode" name="metode">
                                                                                        <?php
                                                                                            $sql_bank = mysqli_query($conn,"SELECT * FROM `tb_bank` WHERE userID = 1 AND image = 'OVO.png' ORDER BY cuid ASC") or die(mysqli_error());
                                                                                            $no=0;
                                                                                            while($sb = mysqli_fetch_array($sql_bank)){
                                                                                            $no++;
                                                                                        ?>
                                                                                    <option value="<?php echo $sb['cuid']; ?>">
                                                                                        <?php echo $sb['akun']; ?> - <?php echo $sb['no_rek']; ?> a/n <?php echo $sb['pemilik']; ?>
                                                                                    </option>
                                                                                    
                                                                                </select>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row info-lst" id="bankInfo_de001" style="">
                                                                            <div class="col-xs-12 col-md-9">
                                                                                <div class="bankInfo-box" id="bankList">
                                                                                    <div class="box-title">
                                                                                        <i class="icon-invoice i-invoice"></i>
                                                                                        Rincian Deposit Akun
                                                                                        <div class="pull-right acc_status">STATUS : <span class="text-success">ONLINE</span>
                                                                                    </div>
                                                                                    <input type="hidden" id="depo_acc_status" value="ONLINE" />
                                                                                </div>

                                                                                <table class="table table-borderless text-right info-box--001">
                                                                                    <tbody>
                                                                                        <tr class="text-left first">
                                                                                            <td class="col-xs-12 col-md-6" colspan="2">
                                                                                                <small> Nama Akun bank</small>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr class="">
                                                                                            <td class="col-xs-12 col-md-6" colspan="2">
                                                                                                <input id="info-copy-1" value="<?php echo $sb['pemilik'];?>" class="copy-input" />
                                                                                                <a href="javascript:void(0);" data-sel="info-copy-1" class="btn btn-link btn-copy lbl">
                                                                                                    <span class=" "><?php echo $sb['pemilik']; ?></span>
                                                                                                    <i class="icon-copy"></i>
                                                                                                </a>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr class="text-left first">
                                                                                            <td class="col-xs-12 col-md-6" colspan="2">
                                                                                                <small> Rekening Bank No</small>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr class=" ">
                                                                                            <td class="col-xs-12 col-md-6" colspan="2" style="padding-bottom: 10px">
                                                                                                <input id="info-copy-2" value="<?php echo $sb['no_rek'];?>" class="copy-input" />
                                                                                                <a href="javascript:void(0);" data-sel="info-copy-2" class="btn btn-link btn-copy lbl">
                                                                                                    <span class=" " style="white-space: normal; word-break: break-word">
                                                                                                        <?php echo $sb['no_rek'];?>
                                                                                                    </span>
                                                                                                    <i class="icon-copy"></i>
                                                                                                </a>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <?php } ?>
                                                                                        <tr class="text-left tr_type2">
                                                                                            <td class="col-xs-6 col-md-6">
                                                                                                <small>Min Deposit</small>
                                                                                            </td>
                                                                                            <td class="col-xs-6 col-md-6 text-right">
                                                                                                <span class="lbl">IDR50,000.00</span>
                                                                                                <input type="hidden" id="bank_min_deposit" class="min_deposit" value="10000" />
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr class="text-left tr_type2">
                                                                                            <td class="col-xs-6 col-md-6">
                                                                                                <small i18n="">Max Deposit</small>
                                                                                            </td>
                                                                                            <td class="col-xs-6 col-md-6 text-right">
                                                                                                <span class="lbl">IDR1,000,000,000.00</span>
                                                                                                <input type="hidden" id="bank_max_deposit" class="max_deposit" value="1000000000" />
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr class="text-left tr_type2">
                                                                                            <td class="col-xs-6 col-md-6">
                                                                                                <small i18n="">Komisi Bank / Transaksi</small>
                                                                                            </td>
                                                                                            <td class="col-xs-6 col-md-6 text-right">
                                                                                                <span class="lbl">IDR 0.00 </span>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <input type="hidden" id="admin_fee" value="IDR 0.00" />
                                                                                        <input type="hidden" id="percent_check" value="" />
                                                                                        <tr class="text-left tr_type2">
                                                                                            <td class="col-xs-6 col-md-6">
                                                                                                <small i18n="">Subsidi Bank / Transaksi</small>
                                                                                            </td>
                                                                                            <td class="col-xs-6 col-md-6 text-right">
                                                                                                <span class="lbl">IDR 0</span>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <input type="hidden" id="subsidi" value="IDR 0" />
                                                                                    </tbody>
                                                                                </table>
                                                                                <script>
                                                                                    $(document).ready(function () {
                                                                                        $('[data-toggle="tooltip"]').tooltip();
                                                                                    });
                                                                                </script>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                
                                                                        <div class="row d-flex">
                                                                            <div class="col-md-3 col-xs-4">
                                                                                <div class="font-weight-bold"> Bonus
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="col-md-9 col-xs-8 d-flex flex-wrap">
                                                                                <div class="m-15" style="width: 100%;">
                                                                                    <div style="width: 100%;">
                                                                                        <select
                                                                                            class="form-control promoList"
                                                                                            id="gameid" name="gameid">
                                                                                            <option disabled selected
                                                                                                value="0">Pilih promo
                                                                                                tersedia</option>
                                                                                            <?php
                                                                                                $sql_transaksi = mysqli_query($conn, "SELECT * FROM `tb_post` WHERE kategori = 0 AND cuid NOT IN(SELECT gameid FROM `tb_transaksi` WHERE userID = '$userID' AND jenis = 1 AND status = 1) ORDER BY cuid ASC") or die(mysqli_error());
                                                                                                $no = 0;
                                                                                                while ($st = mysqli_fetch_array($sql_transaksi)) {
                                                                                                $no++;
                                                                                            ?>
                                                                                            <option
                                                                                                value="<?php echo $st['cuid']; ?>">
                                                                                                <?php echo ucwords(strtolower($st['title'])); ?>
                                                                                                <?php } ?>
                                                                                            </option>
                                                                                        </select>

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row d-flex">
                                                                            <div class="col-md-3 col-xs-4 ">
                                                                                <div class="font-weight-bold">
                                                                                    Jumlah Deposit<span
                                                                                        class="text-danger">*</span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-9 col-xs-8">
                                                                                <div class=" d-flex flex-wrap">
                                                                                    <input type="text" id="nominal"
                                                                                        class="form-control m-15 price-tag"
                                                                                        placeholder="Masukan Nominal Deposit"
                                                                                        name="nominal" min="50000"
                                                                                        required>
                                                                                </div>
                                                                                <p class="min-max-notes">
                                                                                    Min Claim Bonus<span
                                                                                        class="min-deposit-amount"
                                                                                        style="padding-right: 5px;"><b
                                                                                            id="min_bni">
                                                                                            100,000.00</b></span><br>
                                                                                    Max Claim Bonus<span
                                                                                        class="max-deposit-amount"><b>10,000,000.00</b></span>
                                                                                </p>

                                                                            </div>
                                                                        </div>

                                                                        <div class="row d-flex">
                                                                            <div class="col-md-3 col-xs-4  ">
                                                                                <div class="font-weight-bold">
                                                                                    Keterangan </div>
                                                                            </div>
                                                                            <div
                                                                                class="col-md-9 col-xs-8 d-flex flex-wrap">
                                                                                <input type="text"
                                                                                    class="form-control m-15"
                                                                                    id="catatan" maxlength="35"
                                                                                    minlength="5" name="catatan"
                                                                                    placeholder="No. Referensi / Nama Pengirim">
                                                                            </div>
                                                                        </div>

                                                                        <div class="row d-flex">
                                                                            <div class="col-md-12 d-flex flex-wrap">
                                                                                <label>
                                                                                    <input type="checkbox"
                                                                                        class="form-check-input"
                                                                                        id="exampleCheck1"
                                                                                        name="termcondition">
                                                                                    Saya telah membaca dan menyetujui
                                                                                    Syarat dan
                                                                                    Ketentuan Promosi. Kami tidak
                                                                                    menerima jenis
                                                                                    setoran dalam bentuk cek. Semua
                                                                                    jenis
                                                                                    pembayaran
                                                                                    dalam bentuk cek ke akun kami akan
                                                                                    diabaikan.
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!--- second Tab end----->
                                                                    <div class="row d-flex">
                                                                        <div class="col-md-3 col-xs-4  ">
                                                                        </div>
                                                                        <div class="col-md-9 col-xs-8 d-flex flex-wrap">
                                                                            <div class="m-15">
                                                                                <button type="button"
                                                                                    class="btn btn-primary" id="backBtn"
                                                                                    onclick="tutup_bank()">Back</button>

                                                                                <button type="submit"
                                                                                    class="btn btn-secondary"
                                                                                    id="submitBtn"
                                                                                    name="submit">Lanjut</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="modal_gopay" style="display: none">
                                            <div class="box-wrapper plr-15">
                                                <div class="container-b3">
                                                    <div class="row">
                                                        <div class="col-xs-12 col-md-12 content-form">
                                                            <style>
                                                                * {
                                                                    -webkit-backface-visibility: visible;
                                                                }

                                                                select>option.disble {
                                                                    background-color: #d4d4d4;
                                                                }
                                                            </style>
                                                            <form id="depositForm" action="<?php echo $urlweb; ?>/function/deposit.php" method="post">
                                                                <input type="hidden" name="postID" class="form-control" value="<?php echo $u['cuid']; ?>">
                                                                <div class="box-wrapper plr-15">
                                                                    <div class="row d-flex">
                                                                        <div class="col-md-3 col-xs-4  ">
                                                                            <div class="font-weight-bold"> Metode Penyetoran<span class="text-danger">*</span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-9 col-xs-8 d-flex flex-wrap">
                                                                            <div class="radio_2 m-15 mt-2">
                                                                                <input id="radioBank5" checked="" type="radio" value="5">
                                                                                <label class=" " for="radioBank5">
                                                                                    <span class="radio-title"> Bank / E-Wallet </span>
                                                                                    <span class="marked">
                                                                                        <i class="icon-checkmark"></i>
                                                                                    </span>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="tab">
                                                                        <div class="row d-flex">
                                                                            <div class="col-md-3 col-xs-4  ">
                                                                                <div class="font-weight-bold">Rekening Pengirim<span class="text-danger">*</span></div>
                                                                            </div>
                                                                            <div
                                                                                class="col-md-9 col-xs-8  d-flex flex-wrap">
                                                                                <select class="form-control m-15"name="pay_from" required>
                                                                                     
                                                                                    <option value="<?php echo $sbs['cuid']; ?>">
                                                                                        <?php echo $sbs['akun']; ?> - <?php echo $sbs['no_rek']; ?> - <?php echo $sbs['pemilik']; ?>
                                                                                    </option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row d-flex">
                                                                            <div class="col-md-3 col-xs-4  ">
                                                                                <div class="font-weight-bold">Bank Penerima<span class="text-danger">*</span></div>
                                                                            </div>
                                                                            <div class="col-md-9 col-xs-8 d-flex flex-wrap">                                    
                                                                                <select class="form-control bank_list m-15 has-feedback has-success" data-plugin="bank_list" id="metode" name="metode">
                                                                                        <?php
                                                                                            $sql_bank = mysqli_query($conn,"SELECT * FROM `tb_bank` WHERE userID = 1 AND image = 'GOPAY.png' ORDER BY cuid ASC") or die(mysqli_error());
                                                                                            $no=0;
                                                                                            while($sb = mysqli_fetch_array($sql_bank)){
                                                                                            $no++;
                                                                                        ?>
                                                                                    <option value="<?php echo $sb['cuid']; ?>">
                                                                                        <?php echo $sb['akun']; ?> - <?php echo $sb['no_rek']; ?> a/n <?php echo $sb['pemilik']; ?>
                                                                                    </option>
                                                                                    
                                                                                </select>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row info-lst" id="bankInfo_de001" style="">
                                                                            <div class="col-xs-12 col-md-9">
                                                                                <div class="bankInfo-box" id="bankList">
                                                                                    <div class="box-title">
                                                                                        <i class="icon-invoice i-invoice"></i>
                                                                                        Rincian Deposit Akun
                                                                                        <div class="pull-right acc_status">STATUS : <span class="text-success">ONLINE</span>
                                                                                    </div>
                                                                                    <input type="hidden" id="depo_acc_status" value="ONLINE" />
                                                                                </div>

                                                                                <table class="table table-borderless text-right info-box--001">
                                                                                    <tbody>
                                                                                        <tr class="text-left first">
                                                                                            <td class="col-xs-12 col-md-6" colspan="2">
                                                                                                <small> Nama Akun bank</small>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr class="">
                                                                                            <td class="col-xs-12 col-md-6" colspan="2">
                                                                                                <input id="info-copy-1" value="<?php echo $sb['pemilik'];?>" class="copy-input" />
                                                                                                <a href="javascript:void(0);" data-sel="info-copy-1" class="btn btn-link btn-copy lbl">
                                                                                                    <span class=" "><?php echo $sb['pemilik']; ?></span>
                                                                                                    <i class="icon-copy"></i>
                                                                                                </a>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr class="text-left first">
                                                                                            <td class="col-xs-12 col-md-6" colspan="2">
                                                                                                <small> Rekening Bank No</small>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr class=" ">
                                                                                            <td class="col-xs-12 col-md-6" colspan="2" style="padding-bottom: 10px">
                                                                                                <input id="info-copy-2" value="<?php echo $sb['no_rek'];?>" class="copy-input" />
                                                                                                <a href="javascript:void(0);" data-sel="info-copy-2" class="btn btn-link btn-copy lbl">
                                                                                                    <span class=" " style="white-space: normal; word-break: break-word">
                                                                                                        <?php echo $sb['no_rek'];?>
                                                                                                    </span>
                                                                                                    <i class="icon-copy"></i>
                                                                                                </a>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <?php } ?>
                                                                                        <tr class="text-left tr_type2">
                                                                                            <td class="col-xs-6 col-md-6">
                                                                                                <small>Min Deposit</small>
                                                                                            </td>
                                                                                            <td class="col-xs-6 col-md-6 text-right">
                                                                                                <span class="lbl">IDR50,000.00</span>
                                                                                                <input type="hidden" id="bank_min_deposit" class="min_deposit" value="10000" />
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr class="text-left tr_type2">
                                                                                            <td class="col-xs-6 col-md-6">
                                                                                                <small i18n="">Max Deposit</small>
                                                                                            </td>
                                                                                            <td class="col-xs-6 col-md-6 text-right">
                                                                                                <span class="lbl">IDR1,000,000,000.00</span>
                                                                                                <input type="hidden" id="bank_max_deposit" class="max_deposit" value="1000000000" />
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr class="text-left tr_type2">
                                                                                            <td class="col-xs-6 col-md-6">
                                                                                                <small i18n="">Komisi Bank / Transaksi</small>
                                                                                            </td>
                                                                                            <td class="col-xs-6 col-md-6 text-right">
                                                                                                <span class="lbl">IDR 0.00 </span>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <input type="hidden" id="admin_fee" value="IDR 0.00" />
                                                                                        <input type="hidden" id="percent_check" value="" />
                                                                                        <tr class="text-left tr_type2">
                                                                                            <td class="col-xs-6 col-md-6">
                                                                                                <small i18n="">Subsidi Bank / Transaksi</small>
                                                                                            </td>
                                                                                            <td class="col-xs-6 col-md-6 text-right">
                                                                                                <span class="lbl">IDR 0</span>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <input type="hidden" id="subsidi" value="IDR 0" />
                                                                                    </tbody>
                                                                                </table>
                                                                                <script>
                                                                                    $(document).ready(function () {
                                                                                        $('[data-toggle="tooltip"]').tooltip();
                                                                                    });
                                                                                </script>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                
                                                                        <div class="row d-flex">
                                                                            <div class="col-md-3 col-xs-4">
                                                                                <div class="font-weight-bold"> Bonus
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="col-md-9 col-xs-8 d-flex flex-wrap">
                                                                                <div class="m-15" style="width: 100%;">
                                                                                    <div style="width: 100%;">
                                                                                        <select
                                                                                            class="form-control promoList"
                                                                                            id="gameid" name="gameid">
                                                                                            <option disabled selected
                                                                                                value="0">Pilih promo
                                                                                                tersedia</option>
                                                                                            <?php
                                                                                                $sql_transaksi = mysqli_query($conn, "SELECT * FROM `tb_post` WHERE kategori = 0 AND cuid NOT IN(SELECT gameid FROM `tb_transaksi` WHERE userID = '$userID' AND jenis = 1 AND status = 1) ORDER BY cuid ASC") or die(mysqli_error());
                                                                                                $no = 0;
                                                                                                while ($st = mysqli_fetch_array($sql_transaksi)) {
                                                                                                $no++;
                                                                                            ?>
                                                                                            <option
                                                                                                value="<?php echo $st['cuid']; ?>">
                                                                                                <?php echo ucwords(strtolower($st['title'])); ?>
                                                                                                <?php } ?>
                                                                                            </option>
                                                                                        </select>

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row d-flex">
                                                                            <div class="col-md-3 col-xs-4 ">
                                                                                <div class="font-weight-bold">
                                                                                    Jumlah Deposit<span
                                                                                        class="text-danger">*</span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-9 col-xs-8">
                                                                                <div class=" d-flex flex-wrap">
                                                                                    <input type="text" id="nominal"
                                                                                        class="form-control m-15 price-tag"
                                                                                        placeholder="Masukan Nominal Deposit"
                                                                                        name="nominal" min="50000"
                                                                                        required>
                                                                                </div>
                                                                                <p class="min-max-notes">
                                                                                    Min Claim Bonus<span
                                                                                        class="min-deposit-amount"
                                                                                        style="padding-right: 5px;"><b
                                                                                            id="min_bni">
                                                                                            100,000.00</b></span><br>
                                                                                    Max Claim Bonus<span
                                                                                        class="max-deposit-amount"><b>10,000,000.00</b></span>
                                                                                </p>

                                                                            </div>
                                                                        </div>

                                                                        <div class="row d-flex">
                                                                            <div class="col-md-3 col-xs-4  ">
                                                                                <div class="font-weight-bold">
                                                                                    Keterangan </div>
                                                                            </div>
                                                                            <div
                                                                                class="col-md-9 col-xs-8 d-flex flex-wrap">
                                                                                <input type="text"
                                                                                    class="form-control m-15"
                                                                                    id="catatan" maxlength="35"
                                                                                    minlength="5" name="catatan"
                                                                                    placeholder="No. Referensi / Nama Pengirim">
                                                                            </div>
                                                                        </div>

                                                                        <div class="row d-flex">
                                                                            <div class="col-md-12 d-flex flex-wrap">
                                                                                <label>
                                                                                    <input type="checkbox"
                                                                                        class="form-check-input"
                                                                                        id="exampleCheck1"
                                                                                        name="termcondition">
                                                                                    Saya telah membaca dan menyetujui
                                                                                    Syarat dan
                                                                                    Ketentuan Promosi. Kami tidak
                                                                                    menerima jenis
                                                                                    setoran dalam bentuk cek. Semua
                                                                                    jenis
                                                                                    pembayaran
                                                                                    dalam bentuk cek ke akun kami akan
                                                                                    diabaikan.
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!--- second Tab end----->
                                                                    <div class="row d-flex">
                                                                        <div class="col-md-3 col-xs-4  ">
                                                                        </div>
                                                                        <div class="col-md-9 col-xs-8 d-flex flex-wrap">
                                                                            <div class="m-15">
                                                                                <button type="button"
                                                                                    class="btn btn-primary" id="backBtn"
                                                                                    onclick="tutup_bank()">Back</button>

                                                                                <button type="submit"
                                                                                    class="btn btn-secondary"
                                                                                    id="submitBtn"
                                                                                    name="submit">Lanjut</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                                           
                                    </div>                                                                                                                                  
                                    </div>
                                    
                                </div>
                                    </div>
                                    <script>                                    
                                        function btn_bca() {
                                            document.getElementById('modal_bca').style.display = "block";
                                            document.getElementById('metode').style.display = "none";
                                        }
                                        $('#pilih_promo_bca').on('change', function () {
                                            const selected = $(this).find('option:selected');
                                            const min = selected.data('min');
                                            const minin = selected.data('minin');
                                            const persentase = selected.data('persentase');
                                            console.log(min)
                                            $("#bonus_persentase_bca").val(persentase);
                                            $("#min_bca").html(min);
                                            $("#min_modal_bca").html(min);
                                            $("#min_in_bca").prop('min', minin);;
                                        });

                                        function btn_bni() {
                                            document.getElementById('modal_bni').style.display = "block";
                                            document.getElementById('metode').style.display = "none";
                                        }
                                        $('#pilih_promo_bni').on('change', function () {
                                            const selected = $(this).find('option:selected');
                                            const min = selected.data('min');
                                            const minin = selected.data('minin');
                                            const persentase = selected.data('persentase');
                                            console.log(min)
                                            $("#bonus_persentase_bni").val(persentase);
                                            $("#min_bni").html(min);
                                            $("#min_modal_bni").html(min);
                                            $("#min_in_bni").prop('min', minin);;
                                        });

                                        function btn_mandiri() {
                                            document.getElementById('modal_mandiri').style.display = "block";
                                            document.getElementById('metode').style.display = "none";
                                        }
                                        $('#pilih_promo_mandiri').on('change', function () {
                                            const selected = $(this).find('option:selected');
                                            const min = selected.data('min');
                                            const minin = selected.data('minin');
                                            const persentase = selected.data('persentase');
                                            console.log(min)
                                            $("#bonus_persentase_mandiri").val(persentase);
                                            $("#min_mandiri").html(min);
                                            $("#min_modal_mandiri").html(min);
                                            $("#min_in_mandiri").prop('min', minin);;
                                        });

                                        function btn_bri() {
                                            document.getElementById('modal_bri').style.display = "block";
                                            document.getElementById('metode').style.display = "none";
                                        }
                                        $('#pilih_promo_bri').on('change', function () {
                                            const selected = $(this).find('option:selected');
                                            const min = selected.data('min');
                                            const minin = selected.data('minin');
                                            const persentase = selected.data('persentase');
                                            console.log(min)
                                            $("#bonus_persentase_bri").val(persentase);
                                            $("#min_bri").html(min);
                                            $("#min_modal_bri").html(min);
                                            $("#min_in_bri").prop('min', minin);;
                                        });

                                        function btn_dana() {
                                            document.getElementById('modal_dana').style.display = "block";
                                            document.getElementById('metode').style.display = "none";
                                        }
                                        $('#pilih_promo_dana').on('change', function () {
                                            const selected = $(this).find('option:selected');
                                            const min = selected.data('min');
                                            const minin = selected.data('minin');
                                            const persentase = selected.data('persentase');
                                            console.log(min)
                                            $("#bonus_persentase_dana").val(persentase);
                                            $("#min_dana").html(min);
                                            $("#min_modal_dana").html(min);
                                            $("#min_in_dana").prop('min', minin);;
                                        });

                                        function btn_linkaja() {
                                            document.getElementById('modal_linkaja').style.display = "block";
                                            document.getElementById('metode').style.display = "none";
                                        }
                                        $('#pilih_promo_linkaja').on('change', function () {
                                            const selected = $(this).find('option:selected');
                                            const min = selected.data('min');
                                            const minin = selected.data('minin');
                                            const persentase = selected.data('persentase');
                                            console.log(min)
                                            $("#bonus_persentase_linkaja").val(persentase);
                                            $("#min_linkaja").html(min);
                                            $("#min_modal_linkaja").html(min);
                                            $("#min_in_linkaja").prop('min', minin);;
                                        });

                                        function btn_ovo() {
                                            document.getElementById('modal_ovo').style.display = "block";
                                            document.getElementById('metode').style.display = "none";
                                        }
                                        $('#pilih_promo_ovo').on('change', function () {
                                            const selected = $(this).find('option:selected');
                                            const min = selected.data('min');
                                            const minin = selected.data('minin');
                                            const persentase = selected.data('persentase');
                                            console.log(min)
                                            $("#bonus_persentase_ovo").val(persentase);
                                            $("#min_ovo").html(min);
                                            $("#min_modal_ovo").html(min);
                                            $("#min_in_ovo").prop('min', minin);;
                                        });

                                        function btn_gopay() {
                                            document.getElementById('modal_gopay').style.display = "block";
                                            document.getElementById('metode').style.display = "none";
                                        }
                                        $('#pilih_promo_gopay').on('change', function () {
                                            const selected = $(this).find('option:selected');
                                            const min = selected.data('min');
                                            const minin = selected.data('minin');
                                            const persentase = selected.data('persentase');
                                            console.log(min)
                                            $("#bonus_persentase_gopay").val(persentase);
                                            $("#min_gopay").html(min);
                                            $("#min_modal_gopay").html(min);
                                            $("#min_in_gopay").prop('min', minin);;
                                        });

                                        function tutup_bank() {
                                            document.getElementById('metode').style.display = "block";
                                            document.getElementById('modal_bca').style.display = "none";
                                            document.getElementById('modal_bni').style.display = "none";
                                            document.getElementById('modal_mandiri').style.display = "none";
                                            document.getElementById('modal_bri').style.display = "none";
                                            document.getElementById('modal_dana').style.display = "none";
                                            document.getElementById('modal_linkaja').style.display = "none";
                                            document.getElementById('modal_ovo').style.display = "none";
                                            document.getElementById('modal_gopay').style.display = "none";
                                            document.getElementById('modal_qris').style.display = "none";

                                        }

                                        // function load_form($type, $method = 0, $provider = 0, $pID = "") {
                                        //     showLoadingImgFn();
                                        //     $.get('https://www.geo138.life/account/load_deposit_form?isgateway=' + $type + '&method=' + $method +
                                        //         '&provider=' + $provider + '&pID=' + $pID,
                                        //         function(d) {
                                        //             $('.content-form').html(d);
                                        //             removeLoadingImgFn();
                                        //         }).fail(
                                        //         function(xhr, status, error) {
                                        //             removeLoadingImgFn();
                                        //             sweetAlert(xhr.responseJSON ? xhr.responseJSON.message : xhr.responseText);
                                        //         }
                                        //     );
                                        // }

                                        // $(document).ready(function() {

                                        //     let def = 'BankTransfer';
                                        //     let preload = $('#preload').val();
                                        //     $('.deposit .tab-pane[data-toggle="' + def + '"]').toggleClass('show');
                                        //     if (preload == 0) {
                                        //         load_form(preload);
                                        //     }



                                        // });
                                    </script>

                                </div>
                                <div class="col-xs-12 col-md-4  fs-sm content-txt">
                                    <div>
                                        <div class="d-none d-md-block fs-sm" i18n>
                                            {{ $setting->nama_web }} are favourite for our speedy crediting of funds to
                                            your account
                                            and experience. Thus, please use Bank Transfer via your local bank account.
                                            We
                                            do not accept
                                            all
                                            kinds of deposit by "Cheque" or "Bank Draft" (Company OR Personal Cheque) as
                                            your deposit
                                            method.
                                            <br /> <br />
                                            Note: Once you have successfully submitted your deposit form and once your
                                            funds
                                            is cleared
                                            in
                                            our account, just leave it to our team to process your transactions as
                                            speedy as
                                            possible.
                                            If
                                            more than 10 minutes, let us know by clicking
                                            <a class="btn btn-link" href="#" target="_blank">here</a> and
                                            our
                                            Customer Service support will assist you 24/7 anytime.
                                            <br /> <br />
                                        </div>
                                        <!-- <span i18n>lang.Please make sure that you fill up accurate bank account details to avoid any inconveniences.</span> -->
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="modal-wrapper nifty-modal slide-in-bottom add_bank_modal" id="regbank_popup__depo">
                    </div>
                    <div class='md-overlay'></div>
                    <?php } ?>
                    <div class="col-xs-12">
                        <div class="acc_safety_info box-wrapper deposit-notice-wraper">
                            <div class="deposit-notice-content">
                                <h4 class="notice__title text-uppercase">PEMBERITAHUAN PENTING</h4>
                                <ol>
                                    <li><span style="font-weight: bolder;">Sebelum melakukan deposit harap periksa
                                            terlebih
                                            dahulu
                                            no.rekening tujuan deposit.</span></li>
                                    <li><span style="font-weight: bolder;">Dilarang menulis catatan apapun di setiap
                                            transaksi.</span></li>
                                    <!-- <li><span style="font-weight: bolder;">Tidak di anjurkan Via Mesin EDC, jika terlanjur
                                            transfer,
                                            akan di Proses 1x24jam.</span></li> -->
                                    <li><span style="font-weight: bolder;">Harap menggunakan rekening terdaftar untuk
                                            deposit dan
                                            penarikan.</span></li>
                                    <li><span style="font-weight: bolder;">Apabila nama pengirim tidak sesuai dengan
                                            nama
                                            yang
                                            terdaftar, maka deposit tidak akan kami proses.</span></li>
                                    <li><span style="font-weight: bolder;">Untuk deposit via Bank/ E-wallet harus
                                            menggunakan
                                            aplikasi yang sama.jika berbeda aplikasi tidak bisa di proses</span></li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <script>
            $(document).ready(function () {

                $(function () {
                    var path = window.location.pathname || '';
                    path = path.replace(new RegExp('/', 'g'), '').toLowerCase();
                    $('.mdc-tab[data-active="' + path + '"]').addClass('mdc-tab--active');
                    $('.mdc-tab[data-active="' + path + '"] .mdc-tab-indicator').addClass(
                        'mdc-tab-indicator--active');
                });

            });
        </script>
    </div>
    <script>
        window.removeOptions = function ($select, $options) {
            window.setOriginalSelect($select);
            $options.remove();
        }

        window.restoreOptions = function ($select) {
            var ogHTML = $select.data("originalHTML");
            if (ogHTML != undefined) {
                $select.html(ogHTML);
            }
        }
        window.setBankUserOptions = function (method) {

            var $s = $('select#bank_user_id');
            window.restoreOptions($s); // Make sure you're working with a full deck
            var $optsToRemove = $s.find('option').not('[data-method=' + method + ']').not('[value=""]');
            if (method == 5) {
                $optsToRemove = $optsToRemove.not('[data-method=' + 7 + ']');
            }
            window.removeOptions($s, $optsToRemove); // remove options not needed

        }

        //    var promoMin = '50000,50000';
        //     if (promoMin.includes(",")) {
        //         promoMin = promoMin.split(",");
        //     } else {
        //         promoMin = [promoMin];
        //     }
        //     var promoMax = '500000,100000';
        //     if (promoMax.includes(",")) {
        //         promoMax = promoMax.split(",");
        //     } else {
        //         promoMax = [promoMax];
        //     }

        var secret_key = 'aa';
        var bank_min_amount = _min_amount = "50000";
        var bank_max_amount = _max_amount = "9999999999";
        var min_string = "The minimum deposit amount is";
        var max_string = "The maximum deposit amount is";
        var method = 5;
        var providerSettingID = "62e38ed31eaaed54a07d6433";
        var pID = "62e38b32760c914ab90f14fd";
        var agent_code = 'UABAAAD';

        $(document).ready(function () {
                    window.setBankUserOptions(method);
                    $('#bankInfo_de001').show();
                    // $('#bankInfo_de001').hide();
                    $('#promoInfo_de001').hide();


                    var onFirstLoad = true;

                    function onChgDepositeMethod() {
                        $('.deposit-form').hide();
                        $('#deposit-form-' + $(this).val()).show();
                        $('select.bank_list').prop('disabled', true);
                        $('select.bank_list').val('');
                        $('#bank_name_' + $(this).val()).prop('disabled', false);
                        $('#bank_user_id').prop('disabled', false);

                        if (method == 6) {
                            $('#ref_no').attr('placeholder', 'No Ref /No Serial /No Pengirim');
                        } else {
                            $('#ref_no').attr('placeholder', 'No. Referensi / Nama Pengirim');
                        }
                        $('#bankList').html('');
                        $('#bankInfo_de001').show();
                        // $('#bankInfo_de001').hide();

                    }

                    $('input[name=deposite_method]').change(onChgDepositeMethod);

                    $('input[name=deposite_method][value="' + method + '"]').each(onChgDepositeMethod);



                    // $('#deposite_amount').on('keyup',function(e){
                    //     $(this).val(formatNumberInput(e.target,''));

                    // });

                    // $('#deposite_amount').on('blur',function(e){
                    //     $(this).val(formatNumberInput(e.target,'blur'));

                    // });

                    $('.bank_list').on('change', function () {

                        //var status = $(this).find("option:selected").data('status');
                        var select_name = $(this).val();
                        var position = $(this).find(":selected").index();
                        $('#bankList').html('');
                        $('#bankInfo_de001').hide();
                        var type = $(this).data('type');
                        var provider_Id = $(this).find(":selected").data('p_id');
                        $('input[id=bank_to_provider]').val(provider_Id);

                        bank_max_amount = _max_amount;
                        bank_min_amount = _min_amount;
                        $('.min_deposit').val(_min_amount);
                        $('.max_deposit').val(_max_amount);
                        var _self = this;

                        function onSelBankIsNotEmpty() {
                            $('#bankInfo_de001').fadeIn();
                            var _bank_min = $('#bank_min_deposit').val();
                            var _bank_max = $('#bank_max_deposit').val();
                            bank_min_amount = parseInt(_bank_min);
                            bank_max_amount = parseInt(_bank_max);
                            $('.min-deposit-amount').html('<b>' + window.commaSeparateNumber(bank_min_amount) +
                                '</b>');
                            $('.max-deposit-amount').html('<b>' + window.commaSeparateNumber(bank_max_amount) +
                                '</b>');
                            var o = {
                                msg: ''
                            };
                            var cal_min_amount = getMinDepoWithPromo(bank_min_amount, o);
                            var msgMin = o.msg;

                            adddepositAmtRules(cal_min_amount, bank_max_amount, msgMin);
                        }

                        function onSelBankIsEmpty() {
                            var o = {
                                msg: ''
                            };
                            var cal_min_amount = getMinDepoWithPromo(bank_min_amount, o);
                            var msgMin = o.msg;
                            adddepositAmtRules(cal_min_amount, bank_max_amount, msgMin);
                        }

                        function getBankDetails() {
                            var token = $("input[name='_token']").val();
                            var _onFirstLoad = onFirstLoad;

                            var __self = _self;
                            $.ajax({
                                url: "#",
                                type: "POST",
                                data: {
                                    select_name: select_name,
                                    _token: token,
                                    type: type,
                                    lang: window.lang,
                                    provider_id: provider_Id
                                },
                                beforeSend: function () {
                                    $("#bankList").html();
                                    2000
                                },
                                success: function (data) {
                                    if (data) {


                                        $("#bankList").html(data);

                                        if ($('#depo_acc_status').val() == 'OFFLINE') {
                                            if (!_onFirstLoad) {
                                                sweetAlert(transMsgs.offlineBank, 'warning',
                                                    'Warning',
                                                    true).then(
                                                    function (isConfirm) {
                                                        if (isConfirm) {

                                                            onSelBankIsNotEmpty();
                                                        } else {
                                                            $("#bankList").html('');
                                                            $(__self).val(null);
                                                            onSelBankIsEmpty();
                                                        }
                                                    }
                                                );

                                                return;
                                            }

                                        }

                                        onSelBankIsNotEmpty();
                                        return;


                                    } else {
                                        $("#bankList").html('');
                                        $(_self).val(null);
                                        onSelBankIsEmpty();
                                    }
                                }
                            });
                        }

                        if (!!select_name) {
                            // getBankDetails();
                        } else {
                            onSelBankIsEmpty();

                        }



                        return false;

                    });

                    // Add new banks for user form pokerace ------------------------------------------------------------------


                    $('#btn_add_ubank__depo').click(function (e) {

                        // $(this).prop('disabled',  true);
                        $('#regbank_popup__depo').html('');
                        $('#regbank_popup__depo').load('/regaccform?type=' + method, function () {
                            $('#regbank_popup__depo').nifty("show");
                            if (method == 5) {
                                window.bindBankRegFormVal('#bank_register_popup');
                            } else {
                                window.bindNewFundRegFormVal("#pulsa_register_form");
                            }

                        });
                    });
                    // document.getElementById("bank_user_id").onchange = function () {

                    //     status = this.options[this.selectedIndex].getAttribute("status");
                    //     switch(status ){
                    //         case "2" :
                    //             $(this).val("");
                    //           return sweetAlert( "This account is currently suspend");
                    //         break;
                    //         case "0" :
                    //             $(this).val("");
                    //             return sweetAlert( "This account  is currently inactive");
                    //         break;
                    //      }

                    // }

                    // end of add bank section ---------------------------------------------------------------------------------------------

                    function getMinDepoWithPromo(bank_min, msgMin) {
                        msgMin.msg = min_string;
                        bank_min = bank_min ? bank_min : _min_amount;
                        var selPromoInd = $('.promoList').find(":selected").index();
                        var hasSelPromo = !!selPromoInd || !!$('#promo_code').val();
                        if (!hasSelPromo) {
                            return bank_min;
                        } else {

                            promo_min_amount = parseInt($('#promo_min_amount').val()); //

                            if (!!promo_min_amount) {

                                if (promo_min_amount > bank_min) {
                                    msgMin.msg = "Persyaratan minimal deposit untuk promo adalah ";

                                    return promo_min_amount;
                                }
                            }

                        }

                        return bank_min;
                    }
                    // $('select[data-plugin="bank_list"][data-type="'+ method + '"]').prop('disabled',false).val(providerSettingID).trigger('change');
                    $('select[data-plugin="bank_list"][data-type="' + method + '"]').find('option').each(function (
                        index,
                        element) {
                        let provider_id = $(element).data('p_id');
                        let provider_setting_id = element.value;
                        if (provider_id == pID && provider_setting_id == providerSettingID) {
                            $(element).prop('selected', 'selected').trigger('change');
                        }

                    });
                    onFirstLoad = false;
                    $('.promoList').on('change', function () {
                        //var selected = $(this).find("option:selected").val();
                        var promo_id = $(this).val();

                        // var position = $(this).find(":selected").index();
                        $('#promoList').html('');
                        $('#promoInfo_de001').hide();

                        if (promo_id == 0) {
                            $('input[name="promo_code"]').prop('disabled', false);
                            var msgMin = min_string;
                            adddepositAmtRules(bank_min_amount, bank_max_amount, msgMin);
                            $('input[name="pcode_not_confirm"]').prop('disabled', false);
                            $('#btn_apply_pcode').prop('disabled', false);
                        } else {
                            $('input[name="promo_code"]').val('');
                            $('input[name="promo_code"]').prop('disabled', true);

                            function cbPromoList(r) {
                                if (r.status) {
                                    $('input[name="pcode_not_confirm"]').val('').prop('disabled', true);
                                    $('#btn_apply_pcode').prop('disabled', true);
                                }
                            }
                            // getPromoNAddDepoRules(promo_id, cbPromoList);
                            return false;

                        }
                        return false;
                    });

                    function adddepositAmtRules(intMin, intMax, msgMin) {
                        $("#deposite_amount").rules("remove", "min max");
                        $("#deposite_amount").rules("add", {
                            min: intMin,
                            max: intMax,

                            messages: {
                                min: msgMin + window.currencyCode + window.commaSeparateNumber(intMin),
                                max: "Jumlah deposit maksimum adalah" + window.currencyCode + window
                                    .commaSeparateNumber(intMax),
                            }
                        });
                    }

                    function getPromoNAddDepoRules(promo_id, cb, reqUrl = "#",
                        is_promo_code = false) {
                        $('#promoInfo_de001').hide();
                        $("#promoList").html('');
                        var result = {
                            status: true,
                            msg: ''
                        };
                        var token = $("input[name='_token']").val();

                        //clear promo code first
                        $('input[name="promo_code"]').prop('disabled', true).val('');
                        $.ajax({
                            url: reqUrl,
                            type: "POST",
                            async: true,
                            data: {
                                select_name: promo_id,
                                _token: token,
                                is_promo_code: is_promo_code
                            },
                            //dataType: 'json',
                            beforeSend: function () {
                                $("#bankList").html();
                                2000
                            },
                            success: function (data) {
                                if (data) {

                                    $("#promoList").html(data);
                                    $('#promoInfo_de001').fadeIn();


                                    depoValidator.showErrors({
                                        "promo_code": null
                                    });
                                }
                            },
                            error: function (xhr, status, error) {
                                result.status = false;


                                if (xhr.responseJSON) {
                                    result.msg = xhr.responseJSON.message;

                                } else {

                                    result.msg = JSON.parse(xhr.responseText).message;
                                }
                                sweetAlert(result.msg, 'warning', 'Warning');
                                $('#promo_event').val(0);

                            },
                            complete: function () {


                                cb(result);

                                var o = {
                                    msg: ''
                                };
                                var cal_min_amount = getMinDepoWithPromo(bank_min_amount, o);
                                var msgMin = o.msg;
                                adddepositAmtRules(cal_min_amount, bank_max_amount, msgMin);

                            },
                        });

                        return result;
                    }

                    $('#btn_add_promo').click(function () {
                        $('#f_grp_promo_code').fadeIn();
                        var v = $('#promo_event').val();
                        if (!!v && v != 0) {
                            $('#pcode_not_confirm').prop('disabled', true);
                        } else {
                            $('#pcode_not_confirm').prop('disabled', false);
                        }
                        $(this).parent().hide();
                        return false;
                    });
                    var btn_click = false;
                    $('#btn_apply_pcode').click(function (e) {
                        if (btn_click == true) {
                            return;
                        }
                        btn_click = true;
                        e.preventDefault();
                        $(this).prop('disabled', true);

                        function cbPromoCode(r) {
                            if (r.status) {

                                $('#promo_event').val(0).prop('disabled', true);
                                $('input[name="promo_code"]').prop('disabled', false).val($(
                                    'input[name="pcode_not_confirm"]').val());
                                $('input[name="pcode_not_confirm"]').prop('disabled',
                                    true); //when pcode correct , user shud click clear btn
                                $('#btn_apply_pcode').hide();
                                $('#btn_clear_pcode').show();
                                depoValidator.showErrors({
                                    "promo_code": null
                                });
                            } else {
                                depoValidator.showErrors({
                                    "promo_code": r.msg
                                });
                            }

                            setTimeout(function () {
                                $('#btn_apply_pcode').prop('disabled', false).blur().focusout();
                                btn_click = false;
                            }, 2000);
                        }

                        var v = $('#pcode_not_confirm').val();
                        var r = {
                            'status': true,
                            'msg': ''
                        };
                        if (!v || (v && v.length < 2)) {
                            r.status = false;
                            r.msg = "Kode promo tidak boleh lebih dari 8 karakter";
                        } else if (!v || (v && v.length > 15)) {
                            r.status = false;
                            r.msg = "Kode promo tidak boleh lebih dari 15 karakter";
                        } else {
                            // r = getPromoNAddDepoRules(v, cbPromoCode, "#",
                            //     true);
                            return false;
                        }

                        cbPromoCode(r);

                        return false;
                    });


                    $(document).on('click', '#btn_clear_pcode, #btn-clear-all-promo', function () {
                        $('input[name="promo_code"]').prop('disabled', false).val('');
                        $('input[name="pcode_not_confirm"]').prop('disabled', false).val('');
                        $('#promo_event').prop('disabled', false).val(0);
                        $('#btn_apply_pcode').prop('disabled', false);
                        $('#btn_clear_pcode').hide();
                        $('#btn_apply_pcode').show();
                        $("#promoList").html('');
                        $('#promoInfo_de001').hide();
                        var msgMin = min_string;
                        adddepositAmtRules(bank_min_amount, bank_max_amount, msgMin);
                        return false;
                    });

                    var droppedFiles = false;
                    $('.file-drop-area').on('drag dragstart dragend dragover dragenter dragleave drop', function (e) {
                            e.preventDefault();
                            e.stopPropagation();
                        })
                        .on('dragover dragenter', function () {
                            $(this).addClass('is-dragover');
                        })
                        .on('dragleave dragend drop', function () {
                            $(this).removeClass('is-dragover');
                        })
                        .on('drop', function (e) {
                            droppedFiles = e.originalEvent.dataTransfer.files;
                            $(this).find('input[type="file"]').prop('files', droppedFiles);

                            if (droppedFiles) {
                                $(this).find('.file-msg').html(droppedFiles[0].name);
                            } else {

                                $(this).find('.file-msg').html('   or drag and drop file here');
                            }
                        });

                    $('.file-drop-area input[type="file"]').on('change', function (e) {
                        var file = e.target.files;
                        if (file) {
                            var fileName = file[0] ? file[0].name : '   or drag and drop file here';

                            $('.file-drop-area .file-msg').html(fileName);
                        } else {
                            $('.file-drop-area .file-msg').html('   or drag and drop file here');
                        }
                    })




                    $('#btn_clear_pcode').click(function () {
                        $('#promoList').html('');
                    });


                    const rules = {
                        // The key name on the left side is the name attribute
                        // of an input field. Validation rules are defined
                        // on the right side
                        // deposite_amount: {
                        //     required: true,
                        //     normalizer: function(value) {
                        //         return value ? convertToNumber(value) : null;
                        //     },
                        //     number: true,
                        //     min: bank_min_amount,
                        //     max: bank_max_amount,

                        // },
                        nominal: {
                            required: true,
                            normalizer: function (value) {
                                // return '500000';
                                // console.log(convertToNumber(value));
                                return convertToNumber(value);
                            },
                            number: true,
                            min: 50000,
                            max: bank_max_amount,

                        },
                        bank_name: {
                            required: true
                        },
                        bank_user_id: {
                            required: true,
                        },
                        deposite_method: {
                            required: true
                        },
                        // promo_event: {
                        //     required:true
                        // },
                        promo_code: {
                            minlength: 2,
                            maxlength: 15,
                            // validatePromoCode:true
                        },
                        termcondition: {
                            required: true
                        },
                        receipt: {
                            extension: 'jpeg|jpg|png|bmp',
                        },
                        ref_no: {
                            pattern: /^[a-zA-Z0-9, .\/\\\-]+$/,
                            maxlength: 35,
                            minlength: 5,
                        }
                    };

                    const messages = {
                        deposite_amount: {
                            required: " tidak boleh kosong",
                            number: "Jumlahnya harus berupa angka",
                            min: "Jumlah deposit minimum adalah " + window.currencyCode + window
                                .commaSeparateNumber(bank_min_amount),
                            max: "Jumlah deposit maksimum adalah " + window.currencyCode + window
                                .commaSeparateNumber(bank_max_amount),
                        },
                        nominal: {
                            required: " tidak boleh kosong",
                            number: "Jumlahnya harus berupa angka",
                            min: "Jumlah deposit minimum adalah " + window.currencyCode + window
                                .commaSeparateNumber(bank_min_amount),
                            max: "Jumlah deposit maksimum adalah " + window.currencyCode + window
                                .commaSeparateNumber(bank_max_amount),
                        },
                        bank_name: {
                            required: " tidak boleh kosong",
                        },
                        bank_user_id: {
                            required: " tidak boleh kosong",
                            remote: "Please Select Valid Bank"
                            //remote : transMsgs.bankAccountNamesNotAvailable,
                        },
                        deposite_method: {
                            required: " tidak boleh kosong",
                        },
                        promo_event: {
                            required: "Metode Promosi diperlukan. Silakan pilih Metode Promosi.",
                        },
                        termcondition: {
                            required: "Syarat dan ketentuan diperlukan",
                        },
                        receipt: {
                            extension: "File yang dipilih tidak valid",
                        },
                        ref_no: {
                            pattern: "Hanya huruf, angka, koma, spasi, dan - / \ ",
                            maxlength: "Maksimal 20 karakter saja",
                            minlength: "Diperlukan minimal 5 karakter",
                            required: " tidak boleh kosong",
                        }


                    };

                    const deposit_all_config = {
                        ignore: ".ignore",
                        rules,
                        // Specify validation error messages
                        messages,
                        errorElement: "em",
                        errorPlacement: function (error, element) {
                            // Add the `help-block` class to the error element
                            error.addClass("help-block mlr-15");

                            // Add `has-feedback` class to the parent div.form-group
                            // in order to add icons to inputs
                            //element.parents(".col-sm-6").addClass("has-feedback");
                            element.addClass("has-feedback");
                            if (element.prop("type") === "checkbox") {
                                error.insertAfter(element.parent("label"));
                            } else {
                                error.insertAfter(element);
                            }

                            // Add the span element, if doesn't exists, and apply the icon classes to it.
                            if (!element.next("i")[0]) {
                                $("<i class='icon-cancel form-control-feedback absolute m-15'></i>")
                                    .insertAfter(element);
                            }
                        },
                        success: function (label, element) {
                            // Add the span element, if doesn't exists, and apply the icon classes to it.

                            if (!$(element).next("i")[0]) {
                                $("<i class='icon-checkmark  form-control-feedback absolute m-15'></i>")
                                    .insertAfter($(element));
                            }
                        },
                        highlight: function (element, errorClass, validClass) {

                            $(element).addClass("has-error").removeClass("has-success");
                            $(element).next("i").addClass("icon-cancel").removeClass("icon-checkmark");
                        },
                        unhighlight: function (element, errorClass, validClass) {

                            $(element).addClass("has-success").removeClass("has-error");
                            $(element).next("i").addClass("icon-checkmark").removeClass("icon-cancel");
                        }
                    };

                    // var depoValidator = $("#depositForm").validate({

                    $(function (e) {
                        $('.price-tag').inputmask({
                            'alias': 'decimal',
                            'groupSeparator': ',',
                            'autoGroup': true,
                            'digits': 0,
                            'digitsOptional': false,
                            'placeholder': '0.00',
                            'rightAlign': false,
                            'allowMinus': false,
                        });

                    });
    </script>
    <?php include "../../desktop/footer.php";