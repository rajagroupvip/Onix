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
                        <h2 class="text-white pb-2 fw-bold">LIST SALDO MEMBER</h2>
                    </div>
                </div>
            </div>
        </div>


<div class="<?php if($u['cuid'] == 1){ echo 'col-sm-12'; } else { echo 'col-sm-12'; } ?>">
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
                                    </div>
<?php include 'footer.php';?>