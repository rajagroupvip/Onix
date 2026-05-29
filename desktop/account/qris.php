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
                    <?php } else {} ?>
                        <div class="content">
                        <div id="modal_bca" style="display: block">
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
                                                                                    <span class="radio-title"> QRIS </span>
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
                                                                                    $sql_qris = mysqli_query($conn, "SELECT * FROM `tb_qris` WHERE id = 1 ");
                                                                                    // Perbaikan: Pastikan ada data yang dikembalikan sebelum masuk ke loop
                                                                                    if (mysqli_num_rows($sql_qris) > 0) {
                                                                                        while ($sq = mysqli_fetch_array($sql_qris)) {                                                                    
                                                                                ?>
                                                                                    <option selected
                                                                                        value="<?php echo $sq['id']; ?>">
                                                                                        <?php echo $sq['nama']; ?>
                                                                                        <!-- next bank -->
                                                                                    </option>
                                                                                    
                                                                                </select>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row info-lst" id="bankInfo_de001" style="">
                                                                            <div class="col-xs-12 col-md-9">
                                                                                <div class="bankInfo-box" id="bankList">
                                                                                    <div class="box-title">
                                                                                        <i
                                                                                            class="icon-invoice i-invoice"></i>
                                                                                        Rincian Deposit Akun
                                                                                        <div
                                                                                            class="pull-right acc_status">
                                                                                            STATUS : <span
                                                                                                class="text-success">ONLINE</span>
                                                                                        </div>
                                                                                        <input type="hidden"
                                                                                            id="depo_acc_status"
                                                                                            value="ONLINE" />
                                                                                    </div>

                                                                                    <table
                                                                                        class="table table-borderless text-right info-box--001">
                                                                                        <tbody>
                                                                                            <td colspan="2"
                                                                                                style="padding-bottom:10px">
                                                                                                <img src="<?php echo $sq['gambar'];?>"
                                                                                                    alt=""
                                                                                                    style="display:block; margin:auto; height: 200px;">
                                                                                            </td>
                                                                                            
                                                                                            <input type="hidden"
                                                                                                id="subsidi"
                                                                                                value="IDR 0" />
                                                                                        </tbody>
                                                                                    </table>
                                                                                    <script>
                                                                                        $(document).ready(function () {
                                                                                            $('[data-toggle="tooltip"]')
                                                                                                .tooltip();
                                                                                        });
                                                                                    </script>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <?php }}?>
                                                
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