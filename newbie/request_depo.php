<?php
include "header.php";
include "sidebar.php";
?>
<?php
            error_reporting(0);
            if (!empty($_GET['notif'])) {
              if ($_GET['notif'] == 1) {
                echo '
                  <script>
                    Swal.fire({
                      icon: "success",
                      title: "Sukses",
                      text: "",
                      showConfirmButton: false,
                      timer: 2000
                    });
                  </script>
                ';
              }
            }
			?>
<div class="main-panel">
    <div class="content">
        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-1">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">Permintaan Deposit</h2>
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
                            
                            <th class="text-center" style="vertical-align: middle;">Date</th>
                            <th class="text-center" style="vertical-align: middle;">Username</th>
                            <th class="text-center" style="vertical-align: middle;">Metode</th>
                            <th class="text-center" style="vertical-align: middle;">Pengirim</th>
                            <th class="text-center" style="vertical-align: middle;">Jumlah</th>
                            <th class="text-center" style="vertical-align: middle;">Bonus</th>
                            <th class="text-center" style="vertical-align: middle;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql_1 = mysqli_query($conn,"SELECT * FROM `tb_transaksi` WHERE jenis = 1 AND status = 0 ORDER BY  cuid DESC") or die(mysqli_error());
                            $no=0;
                            while($s1 = mysqli_fetch_array($sql_1)){
                                $no++;
                                $metode = $s1['metode'];
                                $pay_from = $s1['pay_from'];
                                $IDuser = $s1['userID'];
                                $sql_2 = mysqli_query($conn,"SELECT * FROM `tb_user` WHERE cuid = '$IDuser'") or die(mysqli_error());
                                $s2 = mysqli_fetch_array($sql_2);
                                $sql_3 = mysqli_query($conn,"SELECT * FROM `tb_bank` WHERE cuid = '$metode'") or die(mysqli_error());
                                $s3 = mysqli_fetch_array($sql_3);
                                $sql_4 = mysqli_query($conn,"SELECT * FROM `tb_bank` WHERE cuid = '$pay_from'") or die(mysqli_error());
                                $s4 = mysqli_fetch_array($sql_4);
                        ?>
                        <tr>
                            <td class="text-center" style="vertical-align: middle; font-size: 14px;"><?php echo $no; ?>
                            </td>
                            
                            <td class="text-center"
                                style="vertical-align: middle; white-space: normal; font-size: 14px;">
                                <?php echo date('Y-m-d', strtotime($s1['date'])); ?><br><?php echo date('H:i:s', strtotime($s1['date'])); ?>
                            </td>
                            <td class="text-center"
                                style="vertical-align: middle; white-space: normal; font-size: 14px;">
                                <?php echo $s2['username']; ?></td>
                                <td class="text-center"
                                    style="vertical-align: middle; white-space: normal; font-size: 14px;">
                                    <?php 
                                    if ($s1['metode'] == 0) { 
                                        echo 'By Sistem'; 
                                    } elseif ($s1['metode'] == $metode) { 
                                        echo $s3['akun']; 
                                    } elseif ($s1['metode'] == '1') {
                                        echo 'QRIS';
                                    } else {
                                        // Handle other cases or leave it empty based on your logic
                                        echo 'Metode Tidak Dikenal';
                                    }
                                    ?>
                                </td>

                            <td class="text-center"
                                style="vertical-align: middle; white-space: normal; font-size: 14px;">
                                <?php if($s1['pay_from'] == 0) { echo 'By Sistem'; } else { echo $s4['akun']; } ?></td>
                            <td class="text-right"
                                style="vertical-align: middle; white-space: normal; font-size: 14px; text-align: right;">
                                <?php echo number_format($s1['total']); ?></td>

                            <?php
                                // Fetch bonus information from tb_post
                                $gameID_value = $s1['gameid'];
                                $sql_bonus = mysqli_query($conn, "SELECT * FROM `tb_post` WHERE cuid = '$gameID_value'") or die(mysqli_error());
                                $bonus_info = mysqli_fetch_array($sql_bonus);

                                // Display the title or 'N/A' if it's NULL
                                $bonus_title = isset($bonus_info['title']) ? $bonus_info['title'] : 'Tanpa Bonus';
                            ?>
                            <td class="text-center" style="vertical-align: middle; white-space: normal; font-size: 14px;">
                                <?php echo $bonus_title; ?>
                            </td>
                            <td class="text-center"
                                style="vertical-align: middle; white-space: nowrap; font-size: 14px;">
                                <a href="/newbie/tools/proses_topup.php?cuid=<?php echo $s1['cuid']; ?>"
                                    class="btn btn-primary btn-sm">Proses</a>
                                <a href="/newbie/tools/reject_topup.php?cuid=<?php echo $s1['cuid']; ?>"
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
</div>

    <?php include "footer.php";?>