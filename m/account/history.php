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


    <div class="content">
        <div class="row history">
            <div class="pb-4 pb-md-0 col-md-8">
                <link rel="stylesheet" type="text/css"
                    href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
                <div class="history-table" *ngIf="history">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class=" mat-group">
                                <input type="text" class="mat-control st_search" required="required" />
                                <label>Saring</label>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <?php
                            $sql = "SELECT tb_transaksi.*, tb_bank.no_rek
                                    FROM tb_transaksi
                                    INNER JOIN tb_bank ON tb_transaksi.userID = tb_bank.userID
                                    WHERE tb_transaksi.userID = '$userID' AND tb_transaksi.jenis IN (1,2,7)
                                    ORDER BY tb_transaksi.cuid DESC";

                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $tanggal = $row['date'];
                                    $nominal = $row['total'];
                                    $status = $row['status'];
                                    $jenis = $row['jenis'];
                                    $note = $row['note'];
                                    $norek = $row['no_rek'];

                                    // Mengubah nominal menjadi format rupiah
                                    $nominal_rupiah = "Rp " . number_format($nominal, 0, ',', '.');

                                    // Menampilkan data dalam bentuk baris tabel HTML
                                    ?>
                                                <div class="row no-gutters h-result" (click)="openHistoryDetailsInModal($event, item);">
                                                    <div class="col-xs-6 row-head"><span class="js-date isutc"><?php echo $tanggal; ?></span>
                                                    </div>
                                                    <div class="col-xs-6 text-right">
                                                        <?php
                                $label_class = '';

                                switch ($status) {
                                    case 0:
                                        $label_class = 'label-warning'; // Diproses (contoh warna kuning)
                                        break;
                                    case 1:
                                        $label_class = 'label-success'; // Berhasil (contoh warna hijau)
                                        break;
                                    case 2:
                                        $label_class = 'label-danger'; // Gagal (contoh warna merah)
                                        break;
                                    default:
                                        $label_class = 'label-default'; // Status lainnya (warna default atau sesuai kebutuhan)
                                }
                            ?>
                                <span class="label <?php echo $label_class; ?>" style="border-radius: 10px;">
                                    <?php echo ($status == 0 ? 'Diproses' : ($status == 1 ? 'Berhasil' : ($status == 2 ? 'Rejected' : 'Rejected'))); ?>
                                </span>
                            </div>
                            <div class="col-xs-6">
                                <?php echo ($jenis == 1 ? 'Deposit' : ($jenis == 2 ? 'Withdraw' : ($jenis == 7 ? 'VOID' : 'VOID'))); ?>
                            </div>
                            <div class="col-xs-6 text-right">
                                <?php echo $nominal_rupiah; ?>
                            </div>
                            <div class="col-xs-4 row-footer"><small></small></div>
                            <div class="col-xs-8 row-footer text-right"><small>BANK / Ewallet</small></div>
                            <div class="col-xs-12 text-right"></div>
                        </div>
                        <?php
        }
    } else {
        echo "<div class='row'><div class='col-md-12 text-center'>Tidak ada data yang ditemukan.</div></div>";
    }
?>
</div>

<?php include "../footer.php";?>