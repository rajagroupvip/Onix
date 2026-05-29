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
if(isset($_SESSION['user'])) {
    $sql_1 = mysqli_query($conn,"SELECT * FROM `tb_user` WHERE cuid = 1") or die(mysqli_error());
    $s1b = mysqli_fetch_array($sql_1);
    
    $user =mysqli_query($conn,"SELECT * FROM `tb_user` WHERE username = '".$_SESSION['user']."'") or die (mysqli_error());
    $u = mysqli_fetch_array($user);
    $users = $u['username'];
    $id_user = $u['cuid'];
    $userID = $u['cuid'];
    $sql_3 = mysqli_query($conn,"SELECT * FROM `tb_balance` WHERE userID = '$userID'") or die(mysqli_error());
    $s3 = mysqli_fetch_array($sql_3);
    
    $sql_banks = mysqli_query($conn,"SELECT * FROM `tb_bank` WHERE userID = '$userID'") or die(mysqli_error());
    $sbs = mysqli_fetch_array($sql_banks);
    } else {
    }
$sql_banner = mysqli_query($conn,"SELECT * FROM `tb_banner` WHERE cuid = 1") or die(mysqli_error());
$ssb = mysqli_fetch_array($sql_banner);
$status = $ssb['status'];
if($status == true){
    $cekPopup = mysqli_query($conn,"SELECT * FROM `tb_popup` WHERE ip = '$ip'") or die(mysqli_error());
    $cpp = mysqli_num_rows($cekPopup);
    if($cpp == 0){
        $pop = mysqli_query($conn,"INSERT INTO `tb_popup` (`ip`, `date`, `status`) VALUES ('$ip', '$date', 0)") or die (mysqli_error());
        $lihat = $status;
    }
    else {
        $cp = mysqli_fetch_array($cekPopup);
        $statusnya = $cp['status'];
        if($statusnya == 0){
            $lihat = $status;
        }
        else {
            $lihat = 'false';
        }
    }
}
else {
    $lihat = $status;
}

include "../header.php";?>
<div class="container-wrapper acc" style="background-color: black">
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
<div id="modal_qris" style="display: block">
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
                    <form id="depositForm" action="<?php echo $urlweb; ?>/function2/deposit.php" method="post">
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
                                        <div class="font-weight-bold">Rekening Pengirim<span
                                                class="text-danger">*</span></div>
                                    </div>
                                    <div class="col-md-9 col-xs-8  d-flex flex-wrap">
                                        <select class="form-control m-15" name="pay_from" required>

                                            <option value="<?php echo $sbs['cuid']; ?>">
                                                <?php echo $sbs['akun']; ?> - <?php echo $sbs['no_rek']; ?> -
                                                <?php echo $sbs['pemilik']; ?>
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row d-flex">
                                    <div class="col-md-3 col-xs-4  ">
                                        <div class="font-weight-bold">
                                            QRIS Penerima<span class="text-danger">*</span>
                                        </div>
                                    </div>
                                    <div class="col-md-9 col-xs-8 d-flex flex-wrap">
                                        <?php
                                            $sql_qris = mysqli_query($conn, "SELECT * FROM `tb_qris` WHERE id = 1 ");
                                            // Perbaikan: Pastikan ada data yang dikembalikan sebelum masuk ke loop
                                            if (mysqli_num_rows($sql_qris) > 0) {
                                            while ($sq = mysqli_fetch_array($sql_qris)) {
                                        ?>
                                        <select class="form-control bank_list m-15 has-feedback has-success"
                                            data-plugin="bank_list" id="metode" name="metode">
                                            <option selected value="1">
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
                                                <i class="icon-invoice i-invoice"></i>
                                                Rincian Deposit Akun
                                                <div class="pull-right acc_status">
                                                    STATUS : <span class="text-success">ONLINE</span>
                                                </div>
                                                <input type="hidden" id="depo_acc_status" value="ONLINE" />
                                            </div>

                                            <table class="table table-borderless text-right info-box--001">
                                                <tbody>
                                                    <td colspan="2" style="padding-bottom:10px">
                                                        <img src="<?php echo $sq['gambar'];?>" alt=""
                                                            style="display:block; margin:auto; height: 200px;">
                                                    </td>

                                                    <input type="hidden" id="subsidi" value="IDR 0" />
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
                                <?php }}?>


                                <div class="row d-flex">
                                    <div class="col-md-3 col-xs-4">
                                        <div class="font-weight-bold"> Bonus
                                        </div>
                                    </div>
                                    <div class="col-md-9 col-xs-8 d-flex flex-wrap">
                                        <div class="m-15" style="width: 100%;">
                                            <div style="width: 100%;">
                                                <select class="form-control promoList" id="gameid" name="gameid">
                                                    <option disabled selected value="0">Pilih promo
                                                        tersedia</option>
                                                    <?php
                                                                                                $sql_transaksi = mysqli_query($conn, "SELECT * FROM `tb_post` WHERE kategori = 0 AND cuid NOT IN(SELECT gameid FROM `tb_transaksi` WHERE userID = '$userID' AND jenis = 1 AND status = 1) ORDER BY cuid ASC") or die(mysqli_error());
                                                                                                $no = 0;
                                                                                                while ($st = mysqli_fetch_array($sql_transaksi)) {
                                                                                                $no++;
                                                                                            ?>
                                                    <option value="<?php echo $st['cuid']; ?>">
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
                                            Jumlah Deposit<span class="text-danger">*</span>
                                        </div>
                                    </div>
                                    <div class="col-md-9 col-xs-8">
                                        <div class=" d-flex flex-wrap">
                                            <input type="number" id="nominal" class="form-control m-15 price-tag"
                                                placeholder="Masukan Nominal Deposit" name="nominal" min="20000"
                                                required>
                                        </div>
                                        <p class="min-max-notes">
                                            Min Claim Bonus<span class="min-deposit-amount"
                                                style="padding-right: 5px;"><b id="min_bni">
                                                    100,000.00</b></span><br>
                                            Max Claim Bonus<span class="max-deposit-amount"><b>10,000,000.00</b></span>
                                        </p>

                                    </div>
                                </div>

                                <div class="row d-flex">
                                    <div class="col-md-3 col-xs-4  ">
                                        <div class="font-weight-bold">
                                            Keterangan </div>
                                    </div>
                                    <div class="col-md-9 col-xs-8 d-flex flex-wrap">
                                        <input type="text" class="form-control m-15" id="catatan" maxlength="35"
                                            minlength="5" name="catatan" placeholder="No. Referensi / Nama Pengirim">
                                    </div>
                                </div>

                                <div class="row d-flex">
                                    <div class="col-md-12 d-flex flex-wrap">
                                        <label>
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1"
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
                                        <button type="button" class="btn btn-primary" id="backBtn"
                                            onclick="tutup_bank()">Back</button>

                                        <button type="submit" class="btn btn-secondary" id="submitBtn"
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
    <?php }?>
    <?php include "../footer.php";?>