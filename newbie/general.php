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
            title: "Berhasil!",
            text: "Pengaturan Tersimpan!",
            showConfirmButton: false,
            timer: 2000
          });
        </script>
      ';
    }
    if ($_GET['notif'] == 2) {
      echo '
        <script>
          Swal.fire({
            icon: "warning",
            title: "Peringatan!",
            text: "Ukuran Gambar Maksimal 2MB!",
            showConfirmButton: false,
            timer: 2000
          });
        </script>
      ';
    }
    if ($_GET['notif'] == 3) {
      echo '
        <script>
          Swal.fire({
            icon: "warning",
            title: "Peringatan!",
            text: "Hanya JPG atau PNG yang diperbolehkan!",
            showConfirmButton: false,
            timer: 2000
          });
        </script>
      ';
    }
  }
  $sql_2 = mysqli_query($conn, "SELECT * FROM `tb_seo` WHERE cuid = 1") or die(mysqli_error());
  $s2 = mysqli_fetch_array($sql_2);
?>

<div class="main-panel">
  <div class="content">
    <div class="panel-header bg-primary-gradient">
      <div class="page-inner py-1">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
          <div>
            <h2 class="text-white pb-2 fw-bold">Setting Website</h2>
          </div>
        </div>
      </div>
    </div>
    
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">General</h4>
          </div>
          <div class="card-body">
            <ul class="nav nav-pills nav-secondary" id="pills-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab"
                  aria-controls="pills-home" aria-selected="true">Website</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab"
                  aria-controls="pills-profile" aria-selected="false">Banner</a>
              </li>
              <li class="nav-item">
                
                <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab"
                  aria-controls="pills-contact" aria-selected="false">Kontak</a>
              </li>
            </ul>
            <div class="tab-content mt-2 mb-3" id="pills-tabContent">
              <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <form role="form" action="/newbie/tools/setting.php" method="post"
                  enctype="multipart/form-data">
                  <div class="form-group mb-2">
                    <label class="form-label">LINK Logo</label>
                    <input type="text" name="image" class="form-control">
                    <img src="<?php echo $s2['image']; ?>" class="img-fluid">
                  </div>                  
                  <div class="form-group mb-2">
                    <label class="form-label">Nama Website :</label>
                    <input class="form-control" type="text" name="instansi" value="<?php echo $s2['instansi']; ?>">
                  </div>
                  <div class="form-group mb-2">
                    <label class="form-label">Meta Keyword :</label>
                    <input class="form-control" type="text" name="keyword" value="<?php echo $s2['keyword']; ?>">
                  </div>
                  <div class="form-group mb-2">
                    <label class="form-label">Meta Description :</label>
                    <textarea class="form-control summernoteEditor" type="text"
                      name="deskripsi"><?php echo $s2['deskripsi']; ?></textarea>
                  </div>
                  <button type="submit" name="submit" class="btn btn-primary">SIMPAN</button>
                  <a href="setting/" class="btn btn-light">Cancel</a>
                </form>
              </div>
              <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
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
                                                            <span><strong>Well Done!</strong> Slide Show Saved!</span>
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
                                                    if(isset($_GET['catID'])){
                                                    $catID = $_GET['catID'];
                                                    $sql_2 = mysqli_query($conn,"SELECT * FROM `tb_slide` WHERE cuid = '$catID'") or die(mysqli_error());
                                                    $s2 = mysqli_fetch_array($sql_2);
                                                    }
                                                ?>
                        <form role="form" action="/newbie/tools/add-slide.php" method="post"
                          enctype="multipart/form-data">
                          <div class="form-group mb-2">
                            <label class="form-label">Link Banner :</label>
                            <input type="text" name="image" class="form-control">                        
                            <?php if(isset($_GET['catID'])) { ?>
                            <img src="<?php echo $s2['image']; ?>" class="img-fluid">
                            <?php } ?>
                          </div>
                          <div class="form-group mb-2">
                            <label class="form-label">Teks slide :</label>
                            <input class="form-control" type="text" name="deskripsi"
                              value="<?php if(isset($_GET['catID'])) { echo $s2['deskripsi']; } ?>">
                            <input class="form-control" type="hidden" name="postID"
                              value="<?php if(isset($_GET['catID'])) { echo $s2['cuid']; } ?>">
                          </div>
                          <div class="form-group mb-2">
                            <label class="form-label">Urutan muncul (contoh 1,2,3 dst) :</label>
                            <input class="form-control" type="text" name="sort"
                              value="<?php if(isset($_GET['catID'])) { echo $s2['sort']; } ?>">
                          </div>
                          <div class="form-group mb-2">
                            <label class="form-label">Status :</label>
                            <select name="status" class="form-control">
                              <option value="1"
                                <?php if(isset($_GET['catID'])) { if($s2['status'] == 1) { echo 'selected = selected'; }} ?>>
                                Active</option>
                              <option value="0"
                                <?php if(isset($_GET['catID'])) { if($s2['status'] == 0) { echo 'selected = selected'; }} ?>>
                                Not Active</option>
                            </select>
                          </div>
                          <button type="submit" name="submit" class="btn btn-primary">Publish</button>
                          <a href="slide/" class="btn btn-light">Cancel</a>
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
                              <th class="text-center">#</th>
                              <th class="text-center">Image</th>
                              <th class="text-center">Urutan</th>
                              <th class="text-center">Status</th>
                              <th class="text-center">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            $sql_1 = mysqli_query($conn,"SELECT * FROM `tb_slide` ORDER BY cuid ASC") or die(mysqli_error());
                            $no=0;
                            while($s1 = mysqli_fetch_array($sql_1)){
                              $no++;
                              $idkategori = $s1['cuid'];
                          ?>
                            <tr>
                              <td class="text-center" style="vertical-align: middle; font-size: 14px;">
                                <?php echo $no; ?></td>
                              <td class="text-center"
                                style="vertical-align: middle; white-space: normal; font-size: 14px;"><img
                                  src="<?php echo $s1['image']; ?>"
                                  style="display: block; margin: 0 auto; width: 250px; height: auto;"></td>
                              <td class="text-center"
                                style="vertical-align: middle; white-space: normal; font-size: 14px;">
                                <?php echo $s1['sort']; ?></td>
                              <td class="text-center"
                                style="vertical-align: middle; white-space: normal; font-size: 14px;">
                                <?php if($s1['status'] == 0){ echo 'Unpublished'; } else { echo 'Published'; } ?></td>
                              <td class="text-center" style="vertical-align: middle; font-size: 14px;">
                                <a href="general/?catID=<?php echo $s1['cuid']; ?>"
                                  class="btn btn-primary btn-sm"><i class="fa fa-pencil">EDIT</i></a>
                                <a href="tools/del-slide.php?cuid=<?php echo $s1['cuid']; ?>"
                                  class="btn btn-danger btn-sm"
                                  onclick="return confirm('Are you sure want remove this data?');"><i
                                    class="fa fa-trash"></i></a>
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
              <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
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
                                <span><strong>Well Done!</strong> Social Media Saved!</span>
                              </div>
                            ';
                          }
                        }
                        $sql_2 = mysqli_query($conn,"SELECT * FROM `tb_social` WHERE cuid = 1") or die(mysqli_error());
                        $s2 = mysqli_fetch_array($sql_2);
                      ?>
                  <form role="form" action="/newbie/tools/social.php" method="post"
                    enctype="multipart/form-data">
                    <div class="form-group mb-2">
                      <label class="form-label">Facebook :</label>
                      <input type="text" class="form-control" name="facebook" value="<?php echo $s2['facebook']; ?>"
                        required>
                    </div>
                    <div class="form-group mb-2">
                      <label class="form-label">Twitter :</label>
                      <input type="text" class="form-control" name="twitter" value="<?php echo $s2['twitter']; ?>"
                        required>
                    </div>
                    <div class="form-group mb-2">
                      <label class="form-label">Instagram :</label>
                      <input type="text" class="form-control" name="instagram" value="<?php echo $s2['instagram']; ?>"
                        required>
                    </div>
                    <div class="form-group mb-2">
                      <label class="form-label">TikTok :</label>
                      <input type="text" class="form-control" name="linkedin" value="<?php echo $s2['linkedin']; ?>"
                        required>
                    </div>
                    <div class="form-group mb-2">
                      <label class="form-label">Youtube :</label>
                      <input type="text" class="form-control" name="youtube" value="<?php echo $s2['youtube']; ?>"
                        required>
                    </div>
                    <div class="form-group mb-2">
                      <label class="form-label">WhatsApp : (tanpa tanda +)</label>
                      <input type="text" class="form-control" name="wa" value="<?php echo $s2['wa']; ?>" required>
                    </div>
                    <div class="form-group mb-2">
                      <label class="form-label">Telegram : (tanpa tanda +)</label>
                      <input type="text" class="form-control" name="tele" value="<?php echo $s2['tele']; ?>" required>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Save</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Pastikan jQuery sudah dimuat sebelum script ini -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
      $(document).ready(function () {
        // Ambil nilai parameter dari URL
        var urlParams = new URLSearchParams(window.location.search);
        var activeTab = urlParams.get('tab');

        // Periksa apakah parameter tab ada dan sesuai dengan id tab yang ada
        if (activeTab && $('#' + activeTab).length) {
          // Buka tab yang sesuai
          $('#' + activeTab).addClass('show active');
        }
      });
    </script>

    <?php include "footer.php";?>