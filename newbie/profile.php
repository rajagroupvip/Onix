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
                        <h2 class="text-white pb-2 fw-bold">Profile</h2>
                    </div>
                </div>
            </div>
        </div>


<div class="row">
    <div class="col-sm-12">
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
                                <span><strong>Well Done!</strong> Profiles Saved!</span>
                              </div>
                            ';
                          }
                          if ($_GET['notif'] == 2) {
                            echo '
                              <div class="alert alert-warning d-flex align-items-center" role="alert">
                                <span class="alert-icon text-warning me-2">
                                  <i class="ti ti-bell ti-xs"></i>
                                </span>
                                <span><strong>Warning!</strong> Max Image Size 2MB!</span>
                              </div>
                            ';
                          }
                          if ($_GET['notif'] == 3) {
                            echo '
                              <div class="alert alert-warning d-flex align-items-center" role="alert">
                                <span class="alert-icon text-warning me-2">
                                  <i class="ti ti-bell ti-xs"></i>
                                </span>
                                <span><strong>Warning!</strong> Only JPG atau PNG!</span>
                              </div>
                            ';
                          }
                        }
                        $userID = $u['cuid'];
                        $sql_2 = mysqli_query($conn,"SELECT * FROM `tb_user` WHERE cuid = '$userID'") or die(mysqli_error());
                        $s2 = mysqli_fetch_array($sql_2);
                      ?>
                <form role="form" action="tools/edit-user.php" method="post"
                    enctype="multipart/form-data">                
                    <div class="form-group mb-2">
                        <label class="form-label">Username :</label>
                        <input class="form-control" type="text" name="user" value="<?php echo $s2['user']; ?>" readonly>
                        <input class="form-control" type="hidden" name="postID" value="<?php echo $s2['cuid']; ?>"
                            readonly>
                    </div>
                    <div class="form-group mb-2">
                        <label class="form-label">Password :</label>
                        <input class="form-control" type="password" name="pass" value="<?php echo $s2['re_pass']; ?>">
                    </div>
                    <div class="form-group mb-2">
                        <label class="form-label">Email Address :</label>
                        <input class="form-control" type="text" name="email" value="<?php echo $s2['email']; ?>"
                            placeholder="Alamat Email">
                    </div>
                    <div class="form-group mb-2">
                        <label class="form-label">Full Name :</label>
                        <input class="form-control" type="text" name="full_name" value="<?php echo $s2['full_name']; ?>"
                            placeholder="Nama Lengkap">
                    </div>
                    <div class="form-group mb-2">
                        <label class="form-label">Phone / Mobile Number :</label>
                        <input class="form-control" type="text" name="no_hp" value="<?php echo $s2['no_hp']; ?>"
                            placeholder="No. Handphone">
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php";?>