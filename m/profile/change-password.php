<?php
include('../../config/koneksi.php');
?>
<?php
ob_start();
session_start();
date_default_timezone_set("Asia/Jakarta");
$sid = session_id();
$sql_0 = mysqli_query($conn, "SELECT * FROM `tb_seo` WHERE cuid = 1") or die(mysqli_error());
$s0 = mysqli_fetch_array($sql_0);
$urlweb = $s0['urlweb'];
$urlwebs = $s0['urlweb'];

include "../header.php";
?>

<div class="container-wrapper acc">
    <div class="container container-box noSidePadding">
        <div class="head-content">
            <div class="row no-gutters">
                <div class="col-12">
                    <form action="password.php" method="POST">
                        <input type="hidden" name="user_id" value="<?php echo $_SESSION['user']; ?>">
                        <div class="form-group">
                            <label for="current_password">Kata Sandi Saat Ini:</label>
                            <input type="password" class="form-control" id="current_password" name="current_password" required>
                        </div>
                        <div class="form-group">
                            <label for="new_password">Kata Sandi Baru:</label>
                            <input type="password" class="form-control" id="new_password" name="new_password" required>
                        </div>
                        <div class="form-group">
                            <label for="confirm_password">Konfirmasi Kata Sandi Baru:</label>
                            <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Ubah Kata Sandi</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "../footer.php";?>
