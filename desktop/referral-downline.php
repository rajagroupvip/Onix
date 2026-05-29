<?php
ob_start();
session_start();
date_default_timezone_set("Asia/Jakarta");
include('../config/koneksi.php');
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

include "header.php";
?>
<div class="content my01">
    <!--This Blade is just to cater for multiple extends -->



    <div class="container-wrapper profile-head">
        <div class="container container-box noSidePadding">
            <div class="title fs-lg clearfix">
                <span class="skew">
                    <span>Profil saya</span>
                </span>
            </div>
            <div class="head-content">
                <div class="row no-gutters">
                    <div class="col-xs-12 col-sm-6 col-md-7">
                        <div class="row no-gutters">
                            <div class="clearfix col-xs-12 col-md-7">
                                <div class="pull-left  ml-3" style="margin-right:1rem;">
                                    <!--mr-2-->
                                    <i class="icon-shield"></i>
                                </div>
                                <div class="acc_safety_info ">
                                    <div class="fs-md" i18n>Keamanan Akun: Normal</div>
                                    <div class="info-2">
                                        <a routerLink="/desktop/profile/"><i class="icon-user1"></i></a>
                                        <a href="#"><i class="icon-credit-card-alt"></i></a>
                                        <a href="#"><i class="icon-mobile1"></i></a>
                                        <a href="/desktop/memo" class="mail_link"><i class="icon-envelope"></i>
                                        </a>
                                    </div>

                                </div>
                            </div>
                            <div class="col-xs-12 col-md-5 mt-4  mt-md-2 text-center msg" i18n>
                                Anda memiliki <span class="txt_mail_cnt">0</span> pesan baru yang belum dibaca dari
                                kami. </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-5  mt-4  mt-md-2">

                    </div>
                    <div class="col-xs-12  mt-3  ">
                        <div class="mdc-tab-bar" role="tablist">
                            <div class="mdc-tab-scroller">
                                <div class="mdc-tab-scroller__scroll-area mdc-tab-scroller__scroll-area--scroll"
                                    style="margin-bottom: 0px;">
                                    <div class="mdc-tab-scroller__scroll-content">
                                        <!---->
                                        <a role="tab" href="/desktop/profile/" data-tabname="edit"
                                            data-active="profileedit" class="mdc-tab" aria-selected="false"
                                            tabindex="-1" id="goog_2098347606-FIXED-0">
                                            <span class="mdc-tab__content">

                                                <span class="mdc-tab__text-label">
                                                    <!---->Detail
                                                    <!----></span>

                                            </span>

                                            <span class="mdc-tab-indicator">
                                                <span class="mdc-tab-indicator__content
                  mdc-tab-indicator__content--underline" style=""></span>
                                            </span>

                                            <span class="mdc-tab__ripple mdc-ripple-upgraded"
                                                style="--mdc-ripple-fg-size:91px; --mdc-ripple-fg-scale:1.8648; --mdc-ripple-fg-translate-start:76px, -10.5px; --mdc-ripple-fg-translate-end:30.6563px, -21.5px;"></span>
                                        </a>
                                        <!---->
                                        <a role="tab" href="/desktop/change-password" data-tabname="change-password"
                                            data-active="profilechange-password" class="mdc-tab" aria-selected="true"
                                            tabindex="0" id="goog_2098347606-FIXED-1">
                                            <span class="mdc-tab__content">

                                                <span class="mdc-tab__text-label">
                                                    <!---->Tukar kata sandi
                                                    <!----></span>

                                            </span>

                                            <span class="mdc-tab-indicator">
                                                <span class="mdc-tab-indicator__content
                  mdc-tab-indicator__content--underline" style=""></span>
                                            </span>

                                            <span class="mdc-tab__ripple mdc-ripple-upgraded"
                                                style="--mdc-ripple-fg-size:93px; --mdc-ripple-fg-scale:1.85613; --mdc-ripple-fg-translate-start:48.6875px, -6.5px; --mdc-ripple-fg-translate-end:31.1875px, -22.5px;"></span>
                                        </a>
                                        <!---->

                                        <!---->

                                        <a role="tab" href="/desktop/referral-downline" data-tabname="referral-downline"
                                            data-active="profilereferral-downline" class="mdc-tab ref_down"
                                            aria-selected="false" tabindex="-1" id="goog_2098347606-FIXED-3">
                                            <span class="mdc-tab__content">

                                                <span class="mdc-tab__text-label">
                                                    <!---->Referral Downline
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
                                        <a role="tab" href="/desktop//profile/member-level" data-tabname="member-level"
                                            data-active="profilemember-level" class="mdc-tab ref_down"
                                            aria-selected="false" tabindex="-1" id="goog_2098347606-FIXED-4">
                                            <span class="mdc-tab__content">

                                                <span class="mdc-tab__text-label">
                                                    <!---->Tingkat Anggota
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

    <div class="outlet tab-content">
        <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <div class="container-b3">
                <div class="row history">
                    <div class="pb-4 pb-md-0 col-md-9">
                        <form id="searchhistory" class="needs-validation searchhistory">
                            <input type="hidden" name="_token" value="0h0Dzk9wOu3wG1UoJB7UalGgKSDrGn54muX74zHe">
                            <div class="box-wrapper plr-15">
                                <div class="row d-flex align-items-center">                                   
                                </div>
                                <div class="row d-flex align-items-center">
                                    <div class="col-md-3 col-xs-4  "></div>
                                    <div class="col-md-9 col-xs-8 d-flex flex-wrap">
                                        <button type="submit" class="btn btn-primary m-15">Cari</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div id="historySearchResult" class="m-tb-15">
    <div class="table-responsive">
        <table class="table table-bordered table-hover toggle-circle dataTable no-footer table-striped" role="grid" aria-describedby="historyDataTable_info" id="referral-table">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Deposit</th>
                    <!--<th>Total Transaksi</th>-->
                    <th>Tanggal Transaksi Pertama</th>
                    <th>Tanggal Transaksi Terakhir</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'config/koneksi.php';
                session_start();
                if(isset($_SESSION['user'])) {
                    $user = mysqli_query($conn, "SELECT * FROM `tb_user` WHERE username = '".$_SESSION['user']."'") or die(mysqli_error());
                    $u = mysqli_fetch_array($user);
                    $userID = $u['cuid'];

                    $sql = "SELECT u.*, 
                                   IFNULL(SUM(t.total), '-') AS total_transaksi,
                                   IFNULL(MIN(t.date), '-') AS tanggal_transaksi_pertama,
                                   IFNULL(MAX(t.date), '-') AS tanggal_transaksi_terakhir
                            FROM tb_user u
                            LEFT JOIN tb_transaksi t ON u.cuid = t.userID AND t.jenis = 1
                            WHERE u.referral_user_id = '$userID'
                            GROUP BY u.cuid";

                    // Menjalankan query
                    $result = $conn->query($sql);

                    // Memeriksa apakah hasil query menghasilkan baris data
                    if ($result->num_rows > 0) {
                        // Output data dari setiap baris
                        while($row = $result->fetch_assoc()) {
                            echo "<tr style='color: red; font-weight: bold;'>"; // Mengubah warna teks menjadi kuning
                            echo "<td>" . $row["username"]. "</td>";
                            // Deposit
                            $deposit = ($row["total_transaksi"] !== '-') ? "Sudah" : "Belum";
                            echo "<td>$deposit</td>";
                            // Total Transaksi
                            // $total_transaksi = ($row["total_transaksi"] !== '-') ? "Rp " . number_format($row["total_transaksi"], 0, ',', '.') : "-";
                            // echo "<td>$total_transaksi</td>";
                            // Tanggal Transaksi Pertama
                            $tanggal_transaksi_pertama = ($row["tanggal_transaksi_pertama"] !== '-') ? $row["tanggal_transaksi_pertama"] : "-";
                            echo "<td>$tanggal_transaksi_pertama</td>";
                            // Tanggal Transaksi Terakhir
                            $tanggal_transaksi_terakhir = ($row["tanggal_transaksi_terakhir"] !== '-') ? $row["tanggal_transaksi_terakhir"] : "-";
                            echo "<td>$tanggal_transaksi_terakhir</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>Tidak ada data pengguna dalam referral_user_id.</td></tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>Session user belum di-set</td></tr>";
                }
                // Menutup koneksi ke database
                ?>
            </tbody>
        </table>
    </div>
</div>
<?php include 'footer.php';?>