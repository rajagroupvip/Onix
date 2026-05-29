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
            <?php
                  error_reporting(0);
                  $useridnya = $u['cuid'];
                  $cekTransaksi = mysqli_query($conn,"SELECT * FROM `tb_transaksi` WHERE userID = '$useridnya' AND jenis = 2 AND status = 0") or die(mysqli_error());
                  $ct = mysqli_num_rows($cekTransaksi);
                  if($ct > 0){
                    echo '
                      <div class="alert alert-danger alert-dismissible mb-2" role="alert">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <div class="alert-message">
                          <span>Anda masih memiliki Permintaan Penarikan yang Belum Diproses. Silahkan Tunggu Hingga Proses Penarikan Sebelumnya Selesai.</span>
                        </div>
                      </div>
                    ';
                  }
                  else {
                    if (!empty($_GET['notif'])) {
                      if ($_GET['notif'] == 1) {
                        echo '
                          <div class="alert alert-success alert-dismissible mb-2" role="alert">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <div class="alert-message">
                              <span>Permintaan Penarikan Dana Berhasil! Proses Penarikan membutuhkan waktu 5 - 10 Menit.</span>
                            </div>
                          </div>
                        ';
                      }
                      if ($_GET['notif'] == 2) {
                        echo '
                          <div class="alert alert-warning alert-dismissible mb-2" role="alert">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <div class="alert-message">
                              <span>Minimal Penarikan Rp. 20.000</span>
                            </div>
                          </div>
                        ';
                      }
                      if ($_GET['notif'] == 3) {
                        echo '
                          <div class="alert alert-warning alert-dismissible mb-2" role="alert">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <div class="alert-message">
                              <span>Password Yang Anda Masukan Salah</span>
                            </div>
                          </div>
                        ';
                      }
                      if ($_GET['notif'] == 4) {
                        echo '
                          <div class="alert alert-warning alert-dismissible mb-2" role="alert">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <div class="alert-message">
                              <span>Permintaan Penarikan Gagal! Nominal yang Anda Masukan Melebihi Saldo Anda.</span>
                            </div>
                          </div>
                        ';
                      }
                    }
                    $AmbilTO = mysqli_query($conn,"SELECT * FROM `tb_turnover` WHERE `userID` = '$userID' AND `status` = 1 AND `sisa_to` = 0 ORDER BY cuid DESC LIMIT 1") or die(mysqli_error());
                    $gto = mysqli_num_rows($AmbilTO);
                    $gtz = mysqli_fetch_array($AmbilTO);
                ?>
                <div class="col-md-8">
                    <div class="box-wrapper">
                        <div class="title" style="padding: 5px 0">
                            <div class="d-inline-block" style="padding-left:15px" i18n>Keamanan Akun: Normal</div>
                            <div class="d-inline-block text-right" style="float:right;padding-right:15px">Anda memiliki
                                <span class="txt_mail_cnt">0</span> pesan baru yang belum dibaca dari kami.</div>
                        </div>

                        <div class="mdc-wrapper">
                            <a href="<?php echo $urlweb; ?>/desktop/account/deposit" class="mdc-items ">Deposit</a>
                            <a href="<?php echo $urlweb; ?>/desktop/account/withdrawal" class="mdc-items active">Withdraw</a>
                            <a href="<?php echo $urlweb; ?>/desktop/account/lastDirectTransfer" class="mdc-items ">5 Transaksi
                                Terakhir </a>
                            <a href="<?php echo $urlweb; ?>/desktop/account/history" class="mdc-items ">Pernyataan</a>

                        </div>
                    </div>
                <?php
                    if($gto != 0){
                ?>
                <small class="text-white">Sisa Turn Over : IDR <?php echo number_format($gtz['sisa_to']); ?></small>
                <?php } ?>
                    <div style="padding-right: 15px;  padding-left: 15px;">
                        <div class="row">
                            <form id="withdrawForm" action="<?php echo $urlweb; ?>/function/withdraw.php" method="post">
                                <div class="box-wrapper">
                                    <div class="row d-flex align-items-center">
                                        <div class="col-md-3 col-xs-4 ">
                                            <div class="font-weight-bold">
                                                Dompet </div>
                                        </div>
                                        <div class="col-md-9 col-xs-8 d-flex flex-wrap">
                                            <div class="form-check d-flex">
                                                <label class="radio m-15">
                                                    <input class="with-gap" name="wallet_type" checked type="radio"
                                                        value="game">
                                                    <span class="filter-title">
                                                        <span class="wallet-type-title">Utama</span>
                                                        <span class="wallet-type-amount">Rp,
                                                            <?php echo number_format($sb['active']); ?></span>
                                                    </span>
                                                </label>
                                                <label class="radio m-15">
                                                    <input class="with-gap" name="wallet_type" type="radio"
                                                        value="referral">
                                                    <span class="filter-title">
                                                        <span class="wallet-type-title">Referral</span>
                                                        <span class="wallet-type-amount">IDR 0.00</span>
                                                    </span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row d-flex align-items-center">
                                        <div class="col-md-3 col-xs-4">
                                            <div class="font-weight-bold">
                                                Jumlah </div>
                                        </div>
                                        <div class="col-md-9 col-xs-8 d-flex flex-wrap">
                                            <input type="tel" class="form-control number m-15 " name="nominal"
                                                id="withdrawal_amount" autocomplete="off">
                                            <div class="alert alert-danger m-15" id="promotion_pending_alert"
                                                style="display:none">
                                                <strong>Saat ini, anda sedang dalam persyaratan promosi yang masih
                                                    berjalan, mohon mencoba tarik dana kembali setelah promosi
                                                    selesai</strong>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row d-flex align-items-center">
                                        <div class="col-md-3 col-xs-4 ">
                                            <div class="font-weight-bold">
                                                Akun </div>
                                        </div>
                                        <div class="col-md-9 col-xs-8 d-flex flex-wrap">
                                            <div class="form-check d-flex">
                                                <label class="radio m-15">
                                                    <input class="with-gap" name="withdrawType" checked type="radio"
                                                        value="existing">
                                                    <span class="filter-title">Terdaftar</span>
                                                </label>
                                                <label class="radio m-15" id="opt_wdTypeNew">
                                                    <input class="with-gap" name="withdrawType" type="radio"
                                                        value="new">
                                                    <span class="filter-title">Bank Baru</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row d-flex align-items-center" id="acc_type_btn_group"
                                        style="display:none;">

                                        <div class="col-md-3 col-xs-4 ">
                                            <div class="font-weight-bold">
                                                Jenis akun baru </div>
                                        </div>
                                        <div class="col-md-9 col-xs-8 m-15">
                                            <div class="row">
                                                <div class="col-xs-6 radio_2">

                                                    <input class=" " name="acc_type" id="radioBank5" checked
                                                        type="radio" value="5">
                                                    <label class=" " for="radioBank5">

                                                        <span class="radio-title">
                                                            Bank </span>
                                                        <span class="marked">
                                                            <i class="icon-checkmark"></i>
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row d-flex align-items-center" id="existingbank_show">
                                        <div class="col-md-3 col-xs-4 ">
                                            <div class="font-weight-bold">
                                                Sudah terdaftar<span class="text-danger">*</span>
                                            </div>
                                        </div>
                                        <div class="col-md-9 col-xs-8 d-flex flex-wrap">
                                            <select class="form-control m-15" name="user_acc_id" id="existing_bank">

                                                <option selected value="">- Silahkan pilih -</option>
                                                <option value="<?php echo $sbs['cuid']; ?>"> <?php echo $sbs['akun']; ?>
                                                    - <?php echo $sbs['no_rek']; ?> - <?php echo $sbs['pemilik']; ?>
                                                </option>
                                                <input class="form-control" type="hidden" name="userID"
                                                    value="<?php echo $u['cuid']; ?>" readonly>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row d-flex align-items-center">
                                        <div class="col-md-3 col-xs-4">
                                            <div class="font-weight-bold">
                                                Password </div>
                                        </div>
                                        <div class="col-md-9 col-xs-8 d-flex flex-wrap">
                                            <input type="password" class="form-control number m-15 " name="password"
                                                id="pass" autocomplete="off">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row d-flex align-items-center">
                                        <div class="col-md-3 col-xs-4  "></div>
                                        <div class="col-md-9 col-xs-8 d-flex flex-wrap">
                                            <button type="submit" class="btn btn-secondary m-15"
                                                id="btn-submit">Withdraw</button>
                                        </div>
                                    </div>
                                </div>
                    </form>
                                <?php } ?>
                                <?php include "../../desktop/footer.php";?>