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
                        <h2 class="text-white pb-2 fw-bold">Akses Game</h2>
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
                            <th class="text-center" style="vertical-align: middle;">Full Name</th>
                            <th class="text-center" style="vertical-align: middle;">Status Game</th>
                            <th class="text-center" style="vertical-align: middle;">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            $sql_1 = mysqli_query($conn,"SELECT * FROM `tb_user`");
                            $no=0;
                            while($s1 = mysqli_fetch_array($sql_1)){
                              $no++;
                              $uplineID = $s1['uplineID'];
                              $getUpline = mysqli_query($conn,"SELECT * FROM `tb_user` WHERE cuid = '$uplineID'") or die(mysqli_error());
                              $gu = mysqli_fetch_array($getUpline);
                              if($s1['blokir'] == 0){
                                  $tanda = 1;
                              }
                              else {
                                  $tanda = 0;
                              }
                          ?>
                          <tr>
                            <td class="text-center" style="vertical-align: middle; font-size: 14px;"><?php echo $no; ?></td>
                            <td class="text-left" style="vertical-align: middle; white-space: normal; font-size: 14px;"><?php echo $s1['username']; ?></td>
                            <td class="text-center" style="vertical-align: middle; white-space: normal; font-size: 14px;"><?php echo $s1['full_name']; ?></td>
                            <td class="text-center" style="vertical-align: middle; white-space: normal; font-size: 14px;"><?php if($s1['blokir'] == 1) { echo 'Game Nonaktif'; } else { echo 'Game Aktif'; } ?></td>
                            <td class="text-center" style="vertical-align: middle; white-space: nowrap; font-size: 14px;">
                              <a href="tools/gameon.php?postID=<?php echo $s1['cuid']; ?>&blokir=<?php echo $tanda; ?>" class="btn btn-<?php if($s1['blokir'] == 0) { echo 'success'; } else { echo 'danger'; } ?> btn-sm" onclick="return confirm('Apakah anda yakin ingin <?php if($s1['blokir'] == 0) { echo 'menghapus'; } else { echo 'memberikan'; } ?> akses user ini?');">
                                <i class="fa fa-heart"></i>
                              </a>
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