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

<div class="col-12 account_menu">
    <div class="mdc-tab-bar" role="tablist">
        <div class="mdc-tab-scroller">
            <div class="mdc-tab-scroller__scroll-area mdc-tab-scroller__scroll-area--scroll mdc-tab-scroller__scroll-x"
                style="margin-bottom: 0px;">
                <div class="mdc-tab-scroller__scroll-content">
                    <ul class="list-inline">
                        <li>
                            <div class="deposit-notice-menu">
                                <!---->
                                <a role="tab" href="<?php echo $urlweb; ?>/m/account/deposit" data-active='accountdeposit'
                                    class="mdc-tab" aria-selected="false" tabindex="-1" id="goog_2098347606-FIXED-0">
                                    <span class="mdc-tab__content">
                                        <span class="mdc-tab__text-label">
                                            <!---->Deposit
                                            <!----></span>
                                    </span>
                                    <span class="mdc-tab-indicator">
                                        <span class="mdc-tab-indicator__content mdc-tab-indicator__content--underline"
                                            style=""></span>
                                    </span>
                                    <span class="mdc-tab__ripple mdc-ripple-upgraded"
                                        style="--mdc-ripple-fg-size:91px; --mdc-ripple-fg-scale:1.8648; --mdc-ripple-fg-translate-start:76px, -10.5px; --mdc-ripple-fg-translate-end:30.6563px, -21.5px;"></span>
                                    &nbsp;
                                </a>
                                <!---->
                            </div>
                        </li>
                        <li>
                            <a role="tab" href="<?php echo $urlweb; ?>/m/account/withdrawal" data-active='accountwithdrawal'
                                class="mdc-tab" aria-selected="true" tabindex="0" id="goog_2098347606-FIXED-1">
                                <span class="mdc-tab__content">
                                    <span class="mdc-tab__text-label">
                                        <!---->Withdraw
                                        <!----></span>
                                </span>
                                <span class="mdc-tab-indicator">
                                    <span class="mdc-tab-indicator__content mdc-tab-indicator__content--underline"
                                        style=""></span>
                                </span>
                                <span class="mdc-tab__ripple mdc-ripple-upgraded"
                                    style="--mdc-ripple-fg-size:93px; --mdc-ripple-fg-scale:1.85613; --mdc-ripple-fg-translate-start:48.6875px, -6.5px; --mdc-ripple-fg-translate-end:31.1875px, -22.5px;"></span>
                            </a>
                            <!---->
                        </li>
                        <li>
                            <a role="tab" href="<?php echo $urlweb; ?>/m/account/lastDirectTransfer"
                                data-active='accountlastdirecttransfer' class="mdc-tab" aria-selected="false"
                                tabindex="-1" id="goog_2098347606-FIXED-3">
                                <span class="mdc-tab__content">
                                    <span class="mdc-tab__text-label">
                                        <!---->5 Transaksi Terakhir
                                        <!----></span>
                                </span>
                                <span class="mdc-tab-indicator">
                                    <span class="mdc-tab-indicator__content
                                mdc-tab-indicator__content--underline" style=""></span>
                                </span>
                                <span class="mdc-tab__ripple mdc-ripple-upgraded"
                                    style="--mdc-ripple-fg-size:102px; --mdc-ripple-fg-scale:1.83267; --mdc-ripple-fg-translate-start:-44.1875px, -35px; --mdc-ripple-fg-translate-end:34.1484px, -27px;"></span>
                            </a>
                            <!---->
                        </li>
                        <li>
                            <!----><a role="tab" href="<?php echo $urlweb; ?>/m/account/history" data-active='accounthistory'
                                class="mdc-tab" aria-selected="false" tabindex="-1" id="goog_2098347606-FIXED-2">
                                <span class="mdc-tab__content">
                                    <span class="mdc-tab__text-label">
                                        <!---->Pernyataan
                                        <!----></span>
                                </span>
                                <span class="mdc-tab-indicator">
                                    <span class="mdc-tab-indicator__content mdc-tab-indicator__content--underline"
                                        style=""></span>
                                </span>
                                <span class="mdc-tab__ripple mdc-ripple-upgraded"
                                    style="--mdc-ripple-fg-size:102px; --mdc-ripple-fg-scale:1.83267; --mdc-ripple-fg-translate-start:-44.1875px, -35px; --mdc-ripple-fg-translate-end:34.1484px, -27px;"></span>
                            </a>
                            <!---->
                        </li>
                    </ul>
                    <!---->
                </div>
            </div>
        </div>
    </div>

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
                <?php
                    if($gto != 0){
                ?>               
                <?php } ?>


    <div class="content">
        <div class="row">
            <div class="pb-4 pb-md-0 col-md-8">
                <div class="title">
                    <h6 class="d-none d-md-block">&nbsp;</h6>
                </div>
                <form id="withdrawForm" action="<?php echo $urlweb; ?>/function2/withdraw.php" method="post">
                    <div class="box-wrapper">
                        <div class="row d-flex align-items-center">
                            <div class="col-md-3 col-xs-4 ">
                                <div class="font-weight-bold">
                                    Dompet </div>
                            </div>
                            <div class="col-md-9 col-xs-8 d-flex flex-wrap">
                                <div class="form-check d-flex">
                                    <label class="radio m-15">
                                        <input class="with-gap" name="wallet_type" checked type="radio" value="game">
                                        <span class="filter-title">
                                            <span class="wallet-type-title">Utama</span>
                                            <span class="wallet-type-amount">Rp,
                                                <?php echo number_format($sb['active']); ?></span>
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
                                <div class="alert alert-danger m-15" id="promotion_pending_alert" style="display:none">
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
                                        <input class="with-gap" name="withdrawType" type="radio" value="new">
                                        <span class="filter-title">Bank Baru</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row d-flex align-items-center" id="acc_type_btn_group" style="display:none;">

                            <div class="col-md-3 col-xs-4 ">
                                <div class="font-weight-bold">
                                    Jenis akun baru </div>
                            </div>
                            <div class="col-md-9 col-xs-8 m-15">
                                <div class="row">
                                    <div class="col-xs-6 radio_2">

                                        <input class=" " name="acc_type" id="radioBank5" checked type="radio" value="5">
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
                                <select class="form-control m-15" name="metode" id="existing_bank">                                   
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
                                <input type="password" class="form-control number m-15 " name="password" id="pass"
                                    autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="row d-flex align-items-center">
                        <div class="col-md-3 col-xs-4  "></div>
                        <div class="col-md-9 col-xs-8 d-flex flex-wrap">
                            <button type="submit" class="btn btn-secondary m-15" id="btn-submit">Withdraw</button>
                        </div>
                    </div>
            </div>
        </div>
</div>
<?php } ?>
<?php include "../footer.php";?>