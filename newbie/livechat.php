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
            <h2 class="text-white pb-2 fw-bold">Live Chat</h2>
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
                  <script>
                    Swal.fire({
                      icon: "success",
                      title: "Selamat!",
                      text: "Live Chat Diubah!",
                      showConfirmButton: false,
                      timer: 2000
                    });
                  </script>
                ';
              }
            }
            $sql_2 = mysqli_query($conn, "SELECT * FROM `tb_livechat` WHERE cuid = 1") or die(mysqli_error());
            $s2 = mysqli_fetch_array($sql_2);
          ?>

            <form role="form" action="tools/livechat.php" method="post" enctype="multipart/form-data">
              <div class="form-group mb-2">
                <label class="form-label">ID LIVE CHAT :</label>
                <input type="text" class="form-control" name="lc_mobile" value="<?php echo $s2['lc_mobile']; ?>"
                  required>
              </div>
              <button type="submit" name="submit" class="btn btn-primary">Save</button>
            </form>
          </div>
        </div>
      </div>
    </div>
          </div>
    <?php include "footer.php";?>