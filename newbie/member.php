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
                        <h2 class="text-white pb-2 fw-bold">Member</h2>
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
                                            <th class="text-center" style="vertical-align: middle;">Username</th>
                                            <th class="text-center" style="vertical-align: middle;">Email</th>
                                            <th class="text-center" style="vertical-align: middle;">Nama</th>
                                            <th class="text-center" style="vertical-align: middle;">Status</th>
                                            <th class="text-center" style="vertical-align: middle;">Aksi</th>
                                            <!-- Add the new column for the delete action -->
                                            <th class="text-center" style="vertical-align: middle;">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql_1 = mysqli_query($conn, "SELECT * FROM `tb_user` WHERE level = 'user' ORDER BY username ASC") or die(mysqli_error());
                                        $no = 0;
                                        while ($s1 = mysqli_fetch_array($sql_1)) {
                                            $no++;
                                            $uplineID = $s1['referral_user_id'];
                                        ?>
                                            <tr>
                                                <td class="text-center" style="vertical-align: middle; font-size: 14px;">
                                                    <?php echo $no; ?>
                                                </td>
                                                <td class="text-left" style="vertical-align: middle; white-space: normal; font-size: 14px;">
                                                    <?php echo $s1['username']; ?></td>
                                                <td class="text-center" style="vertical-align: middle; white-space: normal; font-size: 14px;">
                                                    <?php echo $s1['email']; ?></td>
                                                <td class="text-center" style="vertical-align: middle; white-space: normal; font-size: 14px;">
                                                    <?php echo $s1['full_name']; ?></td>
                                                <td class="text-center" style="vertical-align: middle; white-space: normal; font-size: 14px;">
                                                    <?php echo ($s1['status'] == 2) ? 'Suspend' : 'Active'; ?></td>
                                                <td class="text-center" style="vertical-align: middle; white-space: normal; font-size: 14px;">
                                                    <a href="view.php?postID=<?php echo $s1['cuid']; ?>" class="btn btn-success btn-sm"><i class="fa fa-eye"></i> Lihat Profile</a>
                                                </td>
                                                <!-- Add the delete button -->
                                                <td class="text-center" style="vertical-align: middle; white-space: normal; font-size: 14px;">
                                                    <a href="/newbie/tools/delete_member.php?cuid=<?php echo $s1['cuid']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this member?');"><i class="fa fa-trash"></i> Delete</a>
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

<?php include "footer.php";?>