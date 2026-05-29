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
                        <h2 class="text-white pb-2 fw-bold">Kelola User Website</h2>
                    </div>
                </div>
            </div>
        </div>
        <?php if($role == 'Superadmin'){ ?>
        <div class="row">
                <div class="col-sm-4">
                  <div class="card">
                    <div class="card-body">
                      <?php
                        error_reporting(0);
                        if (!empty($_GET['notif'])) {
                          if ($_GET['notif'] == 1) {
                            echo '
                              <div class="alert alert-success d-flex align-items-center" role="alert">
                                <span class="alert-icon text-success me-2">
                                  <i class="ti ti-check ti-xs"></i>
                                </span>
                                <span><strong>Well Done!</strong> User Account Saved!</span>
                              </div>
                            ';
                          }
                          if ($_GET['notif'] == 2) {
                            echo '
                              <div class="alert alert-warning d-flex align-items-center" role="alert">
                                <span class="alert-icon text-warning me-2">
                                  <i class="ti ti-check ti-xs"></i>
                                </span>
                                <span><strong>Warning!</strong> Username or Email Address Registered!</span>
                              </div>
                            ';
                          }
                        }
                      ?>
                      <form role="form" action="tools/add-user.php" method="post" enctype="multipart/form-data">
                        <div class="form-group mb-2">
                          <label>Username</label>
                          <input type="text" name="user" class="form-control" value="" required>
                          <input type="hidden" name="postID" class="form-control" value="">
                        </div>
                        <div class="form-group mb-2">
                          <label>Password</label>
                          <input type="password" name="pass" class="form-control" value="" required>
                        </div>                       
                        <div class="form-group mb-2">
                          <label>Level Access</label>
                          <select name="level" class="form-control" required>
                            <option> Level Access </option>
                            <option value="1"> Superadmin </option>
                            <option value="2"> Manager </option>                            
                          </select>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Publish</button>
                        <a href="adminuser.php" class="btn btn-light">Cancel</a>
                      </form>
                    </div>
                  </div>
                </div>
                <div class="col-sm-8">
                  <!-- Invoice List Table -->
                  <div class="card">
                    <div class="card-datatable table-responsive">
                      <table id="default-datatable" class="invoice-list-table table border-top">
                        <thead>
                          <tr class="bg-info">
                            <th class="text-center" style="vertical-align: middle;">#</th>
                            <th class="text-center" style="vertical-align: middle;">Username</th>
                            <th class="text-center" style="vertical-align: middle;">Level</th>
                            <th class="text-center" style="vertical-align: middle;">Terakhir Login</th>
                            <th class="text-center" style="vertical-align: middle;">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            $sql_1 = mysqli_query($conn, "SELECT * FROM `admin` WHERE level='1' OR level='2'") or die(mysqli_error($conn));
                            $no=0;
                            while($s1 = mysqli_fetch_array($sql_1)){
                              $no++;
                          ?>
                          <tr>
                            <td class="text-center" style="vertical-align: middle; font-size: 14px;"><?php echo $no; ?></td>
                            <td class="text-left" style="vertical-align: middle; white-space: normal; font-size: 14px;"><?php echo $s1['username']; ?></td>
                            <td class="text-center" style="vertical-align: middle; white-space: normal; font-size: 14px;">
                                <?php 
                                    if ($s1['level'] == '1') {
                                        echo 'Super Admin';
                                    } elseif ($s1['level'] == '2') {
                                        echo 'Manager';
                                    } else {
                                        echo 'Unknown'; // Jika level tidak dikenali, tampilkan pesan 'Unknown'
                                    }
                                ?>
                            </td>

                            <td class="text-center" style="vertical-align: middle; white-space: normal; font-size: 14px;"><?php echo $s1['lastlogin']; ?></td>
                            <td class="text-center" style="vertical-align: middle; white-space: normal; font-size: 14px;">
                              <?php
                                if($s1['level'] != 1){
                              ?>
                              <a href="tools/del-user.php?cuid=<?php echo $s1['cuid']; ?>&tipe=2" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure want remove this data?');">
                                <i class="fa fa-trash"></i>
                              </a>
                              <?php } ?>
                            </td>
                          </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                      <?php }?>
                    </div>
                  </div>
                </div>
              </div>


<?php include "footer.php"?>