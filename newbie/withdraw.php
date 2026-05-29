<?php
include "header.php";
include "sidebar.php";
?>
<div class="main-panel">
    <div class="content">
        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-1">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">Withdraw</h2>
                    </div>
                </div>
            </div>
        </div>
        <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kd_transaksi = $_POST["kd_transaksi"];
    $sql_delete = mysqli_query($conn, "DELETE FROM `tb_transaksi` WHERE kd_transaksi = '$kd_transaksi'") or die(mysqli_error());
    header("Location: ".$_SERVER['PHP_SELF']);
    exit();
}

$sql_1 = mysqli_query($conn, "SELECT * FROM `tb_transaksi` WHERE jenis = 2 AND status != 0 ORDER BY  cuid DESC") or die(mysqli_error());
$no = 0;
?>
        <div class="card">
            <div class="card-datatable table-responsive">
               <table id="transaksi-datatable" class="invoice-list-table table border-top">
    <thead>
        <tr class="bg-info">
            <th class="text-center" style="vertical-align: middle;">#</th>
            <th class="text-center" style="vertical-align: middle;">TrxID</th>
            <th class="text-center" style="vertical-align: middle;">Username</th>
            <th class="text-center" style="vertical-align: middle;">Jumlah</th>
            <th class="text-center" style="vertical-align: middle;">Metode Pembayaran</th>
            <th class="text-center" style="vertical-align: middle;">Catatan</th>
            <th class="text-center" style="vertical-align: middle;">Tanggal</th>
            <th class="text-center" style="vertical-align: middle;">Status</th>
            <th class="text-center" style="vertical-align: middle;">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        while ($s1 = mysqli_fetch_array($sql_1)) {
            $no++;
            $IDuser = $s1['userID'];
            $sql_2 = mysqli_query($conn, "SELECT * FROM `tb_user` WHERE cuid = '$IDuser'") or die(mysqli_error());
            $s2 = mysqli_fetch_array($sql_2);
        ?>
            <tr>
                <td class="text-center" style="vertical-align: middle; font-size: 14px;"><?php echo $no; ?></td>
                <td class="text-left" style="vertical-align: middle; white-space: normal; font-size: 14px;"><?php echo $s1['kd_transaksi']; ?></td>
                <td class="text-center" style="vertical-align: middle; white-space: normal; font-size: 14px;"><?php echo $s2['username']; ?></td>
                <td class="text-right" style="vertical-align: middle; white-space: normal; font-size: 14px;"><?php echo number_format($s1['total']); ?></td>
                <td class="text-center" style="vertical-align: middle; white-space: normal; font-size: 14px;"><?php echo $s1['metode']; ?></td>
                <td class="text-center" style="vertical-align: middle; white-space: normal; font-size: 14px;"><?php echo $s1['note']; ?></td>
                <td class="text-center" style="vertical-align: middle; white-space: normal; font-size: 14px;"><?php echo $s1['date']; ?></td>
                <td class="text-center" style="vertical-align: middle; white-space: normal; font-size: 14px;">
                    <?php
                    if ($s1['status'] == 1) {
                        echo '
                        <span class="badge-dot">
                            <i class="bg-success"></i> PAID
                        </span>
                        ';
                    } else {
                        echo '
                        <span class="badge-dot">
                            <i class="bg-danger"></i> REJECT
                        </span>
                        ';
                    }
                    ?>
                </td>
                <td class="text-center" style="vertical-align: middle;">
                    <!-- Tambahkan tombol hapus dengan menggunakan formulir POST -->
                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <input type="hidden" name="kd_transaksi" value="<?php echo $s1['kd_transaksi']; ?>">
                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
            </div>
        </div>
    </div>




    <?php include "footer.php";?>