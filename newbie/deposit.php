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
                        <h2 class="text-white pb-2 fw-bold">Deposit</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">           
            <div class="card-datatable table-responsive">
                <table id="basic-datatable" class="invoice-list-table table border-top">
                    <thead>
    <tr class="bg-warning">
        <th class="text-center" style="vertical-align: middle;">#</th>
        <th class="text-center" style="vertical-align: middle;">ID Transaksi</th>
        <th class="text-center" style="vertical-align: middle;">Tanggal</th>
        <th class="text-center" style="vertical-align: middle;">Nama Pengguna</th>
        <th class="text-center" style="vertical-align: middle;">Metode Pembayaran</th>
        <th class="text-center" style="vertical-align: middle;">Pembayaran Dari</th>
        <th class="text-center" style="vertical-align: middle;">Jumlah</th>
        
        <th class="text-center" style="vertical-align: middle;">Status</th>
        <th class="text-center" style="vertical-align: middle;">Aksi</th> <!-- Tambahkan kolom aksi di sini -->
    </tr>
</thead>
<tbody>
    <?php
    $sql_1 = mysqli_query($conn, "SELECT * FROM `tb_transaksi` WHERE jenis = 1 AND status != 0 ORDER BY cuid DESC") or die(mysqli_error());
    $no=0;
    while ($s1 = mysqli_fetch_array($sql_1)) {
        $no++;
        $metode = $s1['metode'];
        $pay_from = $s1['pay_from'];
        $IDuser = $s1['userID'];
        $sql_2 = mysqli_query($conn, "SELECT * FROM `tb_user` WHERE cuid = '$IDuser'") or die(mysqli_error());
        $s2 = mysqli_fetch_array($sql_2);
        $sql_3 = mysqli_query($conn, "SELECT * FROM `tb_bank` WHERE cuid = '$metode'") or die(mysqli_error());
        $s3 = mysqli_fetch_array($sql_3);
        $sql_4 = mysqli_query($conn, "SELECT * FROM `tb_bank` WHERE cuid = '$pay_from'") or die(mysqli_error());
        $s4 = mysqli_fetch_array($sql_4);
    ?>
        <tr>
            <td class="text-center" style="vertical-align: middle; font-size: 14px;"><?php echo $no; ?></td>
            <td class="text-left" style="vertical-align: middle; white-space: normal; font-size: 14px;"><?php echo $s1['kd_transaksi']; ?></td>
            <td class="text-center" style="vertical-align: middle; white-space: normal; font-size: 14px;"><?php echo date('Y-m-d', strtotime($s1['date'])); ?><br><?php echo date('H:i:s', strtotime($s1['date'])); ?></td>
            <td class="text-center" style="vertical-align: middle; white-space: normal; font-size: 14px;"><?php echo $s2['username']; ?></td>
            <td class="text-center" style="vertical-align: middle; white-space: normal; font-size: 14px;"><?php if ($s1['metode'] == 0) {
                                                                                                            echo 'By Sistem';
                                                                                                        } else {
                                                                                                            echo $s3['akun'];
                                                                                                        } ?></td>
            <td class="text-center" style="vertical-align: middle; white-space: normal; font-size: 14px;"><?php if ($s1['pay_from'] == 0) {
                                                                                                            echo 'By Sistem';
                                                                                                        } else {
                                                                                                            echo $s4['akun'];
                                                                                                        } ?></td>
            <td class="text-right" style="vertical-align: middle; white-space: normal; font-size: 14px; text-align: right;"><?php echo number_format($s1['total']); ?></td>
            
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
                <form method="post" action="/newbie/tools/hapus_transaksi.php">
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
       
<script>
    $(document).ready(function() {
        $('#basic-datatable').DataTable();
    });
</script>

<?php include "footer.php";?>