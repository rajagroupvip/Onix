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
                        <h2 class="text-white pb-2 fw-bold">Inject Saldo Member</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <?php
                        error_reporting(0);
                        if (!empty($_GET['notif'])) {
                            if ($_GET['notif'] == 1) {
                            echo '
                                <script>
                                Swal.fire({
                                    icon: "success",
                                    title: "Selamat!",
                                    text: "Transaction Success!",
                                    showConfirmButton: false,
                                    timer: 2000
                                });
                                </script>
                            ';
                            }
                        }
                        ?>

                        <form role="form" action="tools/topup.php" method="post">
                            <div class="form-group mb-2">
                                <label class="form-label">User :</label>
                                <select name="userID" class="form-control selectpicker" data-live-search="true"
                                    title="Pilih User" required>
                                    <?php
                                        $sql_11 = mysqli_query($conn, "SELECT * FROM `tb_user` ORDER BY username ASC") or die(mysqli_error());
                                        while ($s11 = mysqli_fetch_array($sql_11)) {
                                    ?>
                                    <option value="<?php echo $s11['cuid']; ?>"> <?php echo $s11['username']; ?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="form-group mb-2">
                                <label class="form-label">Nominal</label>
                                <input type="text" name="nominal" id="nominal" class="form-control" required>
                            </div>

                            <script>
                                // JavaScript function to format number to Rupiah
                                function formatRupiah(angka) {
                                    var number_string = angka.toString().replace(/[^,\d]/g, ''),
                                        split = number_string.split(','),
                                        sisa = split[0].length % 3,
                                        rupiah = split[0].substr(0, sisa),
                                        ribuan = split[0].substr(sisa).match(/\d{3}/gi);

                                    // tambahkan titik jika yang diinput memiliki ribuan
                                    if (ribuan) {
                                        separator = sisa ? '.' : '';
                                        rupiah += separator + ribuan.join('.');
                                    }

                                    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
                                    return rupiah;
                                }

                                // JavaScript function to update input value when changed
                                document.getElementById('nominal').addEventListener('keyup', function (e) {
                                    var nominal = this.value;
                                    var rupiah = formatRupiah(nominal);
                                    this.value = rupiah;
                                });
                            </script>
                            <div class="form-group mb-2">
                                <label class="form-label">Jenis :</label>
                                <select name="jenis" class="form-control select2" required>
                                    <option value="0"> Pilih </option>
                                    <option value="0"> Tambah Saldo </option>
                                    <option value="1"> Kurangi Saldo </option>
                                </select>
                            </div>
                            <div class="form-group mt-3">
                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                <a href="saldomember.php" class="btn btn-secondary">Batal</a>
                            </div>
                        </form>                    
                    </div>
                </div>
            </div>
            
            <!-- Tabel yang diinginkan di samping formulir -->
            <div class="col-md-8">
                <div class="card">
                    <div class="card-datatable table-responsive">
                        <script>
                            $(document).ready(function () {
                                var table = $('#basic-datatables').DataTable();

                                $('#searchInput').on('keyup', function () {
                                    table.search(this.value).draw();
                                });
                            });
                        </script>
                        <table id="basic-datatables" class="display table table-striped table-hover">
                            <thead>
                                <tr class="bg-info">
                                    <th class="text-center" style="vertical-align: middle;">#</th>
                                    <th class="text-center" style="vertical-align: middle;">Nama Pengguna</th>

                                    <th class="text-center" style="vertical-align: middle;">Saldo Aktif</th>
                                    <th class="text-center" style="vertical-align: middle;">Saldo Pending</th>
                                    <th class="text-center" style="vertical-align: middle;">Withdraw</th>
                                </tr>

                            </thead>
                            <tbody>
                                <?php                          
                                        $sql_1 = mysqli_query($conn,"SELECT * FROM `tb_user` ORDER BY join_date DESC") or die(mysqli_error());
                                        $no=0;
                                        while($s1 = mysqli_fetch_array($sql_1)){
                                        $no++;
                                        $userID = $s1['cuid'];
                                        $sql_balance = mysqli_query($conn,"SELECT * FROM `tb_balance` WHERE userID = '$userID'") or die(mysqli_error());
                                        $sbl = mysqli_fetch_array($sql_balance);
                                    ?>
                                <tr>
                                    <td class="text-center" style="vertical-align: middle; white-space: normal;">
                                        <?php echo $no; ?></td>
                                    <td style="vertical-align: middle; white-space: normal;"><?php echo $s1['username']; ?>
                                    </td>                       
                                    <td class="text-right" style="vertical-align: middle; white-space: normal;">Rp.
                                        <?php echo number_format($sbl['active']); ?></td>
                                    <td class="text-right" style="vertical-align: middle; white-space: normal;">Rp.
                                        <?php echo number_format($sbl['pending']); ?></td>
                                    <td class="text-right" style="vertical-align: middle; white-space: normal;">Rp.
                                        <?php echo number_format($sbl['payout']); ?></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Akhir Tabel -->
        </div>
    </div>
    <?php include "footer.php";?>
