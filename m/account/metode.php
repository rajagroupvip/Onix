<?php
// Halaman metode

if (isset($_GET['bank'])) {
    // Tangkap nilai parameter 'bank'
    $encoded_cuid = $_GET['bank'];

    // Dekode nilai parameter 'bank'
    $decoded_cuid = base64_decode($encoded_cuid);

    // Gunakan nilai yang telah didekode
    
} else {
    // Jika parameter 'bank' tidak ada dalam URL
    echo 'Parameter "bank" tidak ditemukan dalam URL.';
}
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
                                <form id="depositForm" action="<?php echo $urlweb; ?>/function2/deposit.php"
                                    method="post">
                                    <input type="hidden" name="postID" class="form-control"
                                        value="<?php echo $u['cuid']; ?>">
                                    <div class="box-wrapper plr-15">
                                        <div class="row d-flex">
                                            <div class="col-md-3 col-xs-4  ">
                                                <div class="font-weight-bold"> Metode Penyetoran<span
                                                        class="text-danger">*</span>
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
                                                    <div class="font-weight-bold">Rekening Pengirim<span
                                                            class="text-danger">*</span></div>
                                                </div>
                                                <div class="col-md-9 col-xs-8  d-flex flex-wrap">
                                                    <select class="form-control m-15" name="pay_from" required>

                                                        <option value="<?php echo $sbs['cuid']; ?>">
                                                            <?php echo $sbs['akun']; ?> - <?php
                                                                $no_rek = $sbs['no_rek'];

                                                                // Panjang total nomor rekening
                                                                $total_length = strlen($no_rek);

                                                                // Panjang digit yang akan ditampilkan (misalnya, 4 digit terakhir)
                                                                $length_to_display = 4;

                                                                // Bagian nomor rekening yang akan ditampilkan
                                                                $visible_part = substr($no_rek, -$length_to_display);

                                                                // Bagian nomor rekening yang akan disensor
                                                                $censored_part = str_repeat('X', $total_length - $length_to_display);

                                                                // Menampilkan nomor rekening yang telah disensor
                                                                echo $censored_part . $visible_part;
                                                                ?>
                                                            -
                                                            <?php echo $sbs['pemilik']; ?>
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row d-flex">
                                                <div class="col-md-3 col-xs-4  ">
                                                    <div class="font-weight-bold">
                                                        Bank Penerima<span class="text-danger">*</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-9 col-xs-8 d-flex flex-wrap">
                                                    <?php
                                                            $sql_qris = mysqli_query($conn, "SELECT * FROM `tb_bank` WHERE cuid = $decoded_cuid ");
                                                            // Perbaikan: Pastikan ada data yang dikembalikan sebelum masuk ke loop
                                                            if (mysqli_num_rows($sql_qris) > 0) {
                                                            while ($sq = mysqli_fetch_array($sql_qris)) {
                                                        ?>
                                                    <select class="form-control bank_list m-15 has-feedback has-success"
                                                        data-plugin="bank_list" id="metode" name="metode">
                                                        <option selected value="<?php echo $sq['cuid']; ?>">
                                                            <?php echo $sq['akun']; ?>
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row info-lst" id="bankInfo_de001" style="">
                                                <div class="col-xs-12 col-md-9">
                                                    <div class="bankInfo-box" id="bankList">
                                                        <div class="box-title">
                                                            <i class="icon-invoice i-invoice"></i>
                                                            Selalu pastikan rekening pengirim atau rekening tujuan sesuai dengan data yang terdaftar dan form deposit ini otomatis menggunakan kode unik 905
                                                            <div class="pull-right acc_status">STATUS : <span
                                                                    class="text-success">ONLINE</span>
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
                                                                        <input id="info-copy-1"
                                                                            value="<?php echo $sq['pemilik'];?>"
                                                                            class="copy-input" />
                                                                        <a href="javascript:void(0);"
                                                                            data-sel="info-copy-1"
                                                                            class="btn btn-link btn-copy lbl">
                                                                            <span
                                                                                class=" "><?php echo $sq['pemilik']; ?></span>
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
                                                                    <td class="col-xs-12 col-md-6" colspan="2"
                                                                        style="padding-bottom: 10px">
                                                                        <input id="info-copy-2"
                                                                            value="<?php echo $sq['no_rek'];?>"
                                                                            class="copy-input" />
                                                                        <a href="javascript:void(0);"
                                                                            data-sel="info-copy-2"
                                                                            class="btn btn-link btn-copy lbl">
                                                                            <span class=" "
                                                                                style="white-space: normal; word-break: break-word">
                                                                                <?php echo $sq['no_rek'];?>
                                                                            </span>
                                                                            <i class="icon-copy"></i>
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                                <?php } }?>
                                                                <tr class="text-left tr_type2">
                                                                    <td class="col-xs-6 col-md-6">
                                                                        <small>Min Deposit</small>
                                                                    </td>
                                                                    <td class="col-xs-6 col-md-6 text-right">
                                                                        <span class="lbl">IDR50,000.00</span>
                                                                        <input type="hidden" id="bank_min_deposit"
                                                                            class="min_deposit" value="10000" />
                                                                    </td>
                                                                </tr>
                                                                <tr class="text-left tr_type2">
                                                                    <td class="col-xs-6 col-md-6">
                                                                        <small i18n="">Max Deposit</small>
                                                                    </td>
                                                                    <td class="col-xs-6 col-md-6 text-right">
                                                                        <span class="lbl">IDR1,000,000,000.00</span>
                                                                        <input type="hidden" id="bank_max_deposit"
                                                                            class="max_deposit" value="1000000000" />
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
                                                                        <small i18n="">Kode Unik / Transaksi</small>
                                                                    </td>
                                                                    <td class="col-xs-6 col-md-6 text-right">
                                                                        <span class="lbl">IDR 707</span>
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
                                                <div class="col-md-9 col-xs-8 d-flex flex-wrap">
                                                    <div class="m-15" style="width: 100%;">
                                                        <div style="width: 100%;">
                                                            <select class="form-control promoList" id="gameid"
                                                                name="gameid">
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
                                                    <div class="d-flex flex-wrap">
                                                        <input type="text" id="nominal"
                                                            class="form-control m-15 price-tag"
                                                            placeholder="Masukan Nominal Deposit" name="nominal"
                                                            required>
                                                    </div>

                                                    <script>
                                                        // Function to format number to Indonesian Rupiah
                                                        function formatRupiah(angka) {
                                                            var reverse = angka.toString().split('').reverse().join('');
                                                            var ribuan = reverse.match(/\d{1,3}/g);
                                                            ribuan = ribuan.join('.').split('').reverse().join('');
                                                            return ribuan;
                                                        }

                                                        // Event listener to format input as Rupiah when typing
                                                        document.getElementById('nominal').addEventListener('input',
                                                            function (e) {
                                                                var nominal = e.target.value.replace(/[^\d]/g,
                                                                ''); // Hapus semua karakter non-digit
                                                                var formattedNominal = formatRupiah(nominal);
                                                                e.target.value = formattedNominal;
                                                            });
                                                    </script>
                                                    <p class="min-max-notes">
                                                        Min Claim Bonus<span class="min-deposit-amount"
                                                            style="padding-right: 5px;"><b id="min_bni">
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
                                                <div class="col-md-9 col-xs-8 d-flex flex-wrap">
                                                    <input type="text" class="form-control m-15" id="catatan"
                                                        maxlength="35" minlength="5" name="catatan"
                                                        placeholder="No. Referensi / Nama Pengirim">
                                                </div>
                                            </div>

                                            <div class="row d-flex">
                                                <div class="col-md-12 d-flex flex-wrap">
                                                    <label>
                                                        <input type="checkbox" class="form-check-input"
                                                            id="exampleCheck1" name="termcondition">
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
                <script>
                    function tutup_bank() {
                        window.location.href = '/m/account/deposit';
                    }
                </script>