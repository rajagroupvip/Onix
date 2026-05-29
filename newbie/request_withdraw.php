<?php
include "header.php";
include "sidebar.php";
?>
<?php
    if (isset($_GET['notif']) && $_GET['notif'] == 1) {
        // Menampilkan SweetAlert jika parameter alert=1 ada
        echo '<script type="text/javascript">
                document.addEventListener("DOMContentLoaded", function() {
                    Swal.fire({
                      title: "Sukses!",
                      text: "Berhasil",
                      icon: "success",
                      confirmButtonText: "OK"
                    });
                });
              </script>';
    }
?>

?>
<div class="main-panel">
    <div class="content">
        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-1">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">Permintaan Withdraw</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <!-- Invoice List Table -->
                <div class="card-body">
                    <div class="table-responsive">
                        <label for="searchInput">Search:</label>
                        <input type="text" id="searchInput" class="form-control" placeholder="Type to search">
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
                                    <th class="text-center" style="vertical-align: middle;">TrxID</th>
                                    <th class="text-center" style="vertical-align: middle;">Username</th>
                                    <th class="text-center" style="vertical-align: middle;">Amount</th>
                                    <th class="text-center" style="vertical-align: middle;">Payment Method</th>
                                    <th class="text-center" style="vertical-align: middle;">Note</th>
                                    <th class="text-center" style="vertical-align: middle;">Date</th>
                                    <th class="text-center" style="vertical-align: middle;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                        $sql_1 = mysqli_query($conn,"SELECT * FROM `tb_transaksi` WHERE jenis = 2 AND status = 0 ORDER BY  cuid DESC") or die(mysqli_error());
                        $no=0;
                        while($s1 = mysqli_fetch_array($sql_1)){
                          $no++;
                          $IDuser = $s1['userID'];
                          $sql_2 = mysqli_query($conn,"SELECT * FROM `tb_user` WHERE cuid = '$IDuser'") or die(mysqli_error());
                          $s2 = mysqli_fetch_array($sql_2);
                      ?>
                                <tr>
                                    <td class="text-center" style="vertical-align: middle; font-size: 14px;">
                                        <?php echo $no; ?></td>
                                    <td class="text-left"
                                        style="vertical-align: middle; white-space: normal; font-size: 14px;">
                                        <?php echo $s1['kd_transaksi']; ?></td>
                                    <td class="text-center"
                                        style="vertical-align: middle; white-space: normal; font-size: 14px;">
                                        <?php echo $s2['username']; ?></td>
                                    <td class="text-right"
                                        style="vertical-align: middle; white-space: normal; font-size: 14px;">
                                        <?php echo number_format($s1['total']); ?></td>
                                    <td class="text-center"
                                        style="vertical-align: middle; white-space: normal; font-size: 14px;">
                                        <?php echo $s1['metode']; ?></td>
                                    <td class="text-center"
                                        style="vertical-align: middle; white-space: normal; font-size: 14px;">
                                        <?php echo $s1['note']; ?></td>
                                    <td class="text-center"
                                        style="vertical-align: middle; white-space: normal; font-size: 14px;">
                                        <?php echo $s1['date']; ?></td>
                                    <td class="text-center"
                                        style="vertical-align: middle; white-space: normal; font-size: 14px;">
                                        <a href="tools/proses_withdraw.php?cuid=<?php echo $s1['cuid']; ?>"
                                            class="btn btn-primary btn-sm">Selesaikan</a>
                                        <a href="tools/reject_withdraw.php?cuid=<?php echo $s1['cuid']; ?>"
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('Are you sure want to Reject this Transaction?');">Reject</a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const searchInput = document.getElementById('search');
        const dataTable = document.getElementById('default-datatable');
        const tableBody = dataTable.getElementsByTagName('tbody')[0];
        const rows = tableBody.getElementsByTagName('tr');

        searchInput.addEventListener('input', function () {
            const searchText = searchInput.value.toLowerCase();

            for (let i = 0; i < rows.length; i++) {
                const rowData = rows[i].textContent.toLowerCase();

                if (rowData.includes(searchText)) {
                    rows[i].style.display = '';
                } else {
                    rows[i].style.display = 'none';
                }
            }
        });
    });
</script>

<?php include "footer.php";?>