<?php
ob_start();
session_start();
date_default_timezone_set("Asia/Jakarta");
include('../config/koneksi.php');
$sid = session_id();
$sql_0 = mysqli_query($conn,"SELECT * FROM `tb_seo` WHERE cuid = 1") or die(mysqli_error());
$s0 = mysqli_fetch_array($sql_0);
$urlweb = $s0['urlweb'];
$urlwebs = $s0['urlweb'];

$sql_1 = mysqli_query($conn,"SELECT * FROM `tb_user` WHERE cuid = 1") or die(mysqli_error());
$s1b = mysqli_fetch_array($sql_1);

if (empty($_SESSION['user']) AND empty($_SESSION['pass'])){
  header('location:'.$urlwebs.'/index');
  exit;
}

$user =mysqli_query($conn,"SELECT * FROM `tb_user` WHERE user = '".$_SESSION['user']."'") or die (mysqli_error());
$u = mysqli_fetch_array($user);
$users = $u['user'];
$id_user = $u['cuid'];
$userID = $u['cuid'];
$externalPlayerId = $u['extplayer'];
$token_id = isset($u['token_id']) ? $u['token_id'] : false;
$level = isset($u['level']) ? $u['level'] : false;

$sql_3 = mysqli_query($conn,"SELECT * FROM `tb_balance` WHERE userID = '$userID'") or die(mysqli_error());
$s3 = mysqli_fetch_array($sql_3);

$sql_banks = mysqli_query($conn,"SELECT * FROM `tb_bank` WHERE userID = '$userID'") or die(mysqli_error());
$sbs = mysqli_fetch_array($sql_banks);
include "header.php";?>

<?php
error_reporting(0);
$trxID = $_GET['trxID'];
$sql_2 = mysqli_query($conn, "SELECT * FROM `tb_transaksi` WHERE kd_transaksi = '$trxID'") or die(mysqli_error());
$s2 = mysqli_fetch_array($sql_2);
$metode = $s2['metode'];
$getBank = mysqli_query($conn, "SELECT * FROM `tb_bank` WHERE cuid = '$metode'") or die(mysqli_error());
$gb = mysqli_fetch_array($getBank);
?>
<div class="mt-2 mb-3 text-white" style="background: #151819; color: #fff; font-size: 18px; padding: 20px 10px;">
    <div class="mt-2 mb-3 text-white" style="background: #fff; color: #fff; padding: 5px 10px;"></div>
    <div class="row">
        <div class="col-sm-6">
            <div class="pb-4">
                Waktu Transaksi
                <h5 class="mt-2"><?php echo $s2['date']; ?></h5>
            </div>
            <div class="pb-4">
                No. Transaksi
                <h5 class="mt-2">
                    <?php echo $s2['kd_transaksi']; ?>
                    <i class="fa fa-clone pl-2 clip" onclick="copy_trxaku()"
                        data-clipboard-text="<?php echo $s2['kd_transaksi']; ?>"></i>
                </h5>
            </div>
            <div class="pb-4">
                Jumlah Deposit
                <h5 class="mt-2">Rp. <?php echo number_format($s2['total']); ?></h5>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="pb-4">
                Metode Pembayaran
                <h5 class="mt-2"><?php echo $gb['akun']; ?></h5>
            </div>
            <div class="pb-4">
                No. Rekening Pembayaran<br>
                <h5 class="mt-2">
                    <?php echo $gb['no_rek']; ?>
                    <i class="fa fa-clone pl-2 clip" onclick="copy_virtualku()"
                        data-clipboard-text="<?php echo $gb['no_rek']; ?>"></i>
                </h5>
                <p>a/n <?php echo $gb['pemilik']; ?></p>
            </div>
        </div>
    </div>
    <div class="mt-2 mb-3 text-white" style="background: #fff; color: #fff; padding: 5px 10px;"></div>
    <div class="mt-2 mb-3 text-white"
        style="background: #151819; color: #fff; padding: 20px 10px; margin-bottom: 80px;">
        Catatan :<br>
        <ol>
            <form role="form" action="<?php echo $urlweb; ?>/function2/konfirmasi.php" method="POST"
                enctype="multipart/form-data">
                <li>Lakukan Pembayaran Sesuai dengan Nominal Transaksi, Kegagalan Transaksi akibat salah transfer bukan
                    tanggung jawab kami</li>
                <li>Setelah Melakukan Pembayaran, Konfirmasi Pembayaran Anda melalui tombol dibawah :</li>

    </div>
    <input type="hidden" name="nominal" class="form-control" value="<?php echo $s2['total']; ?>" readonly>
    <input type="hidden" name="trxID" class="form-control" value="<?php echo $s2['kd_transaksi']; ?>">
    <button type="submit" name="submit" value="submit" class="btn btn-warning text-dark">Konfirmasi</button>
    </form>
    <div class="mt-2 mb-3 text-white" style="background: #fff; color: #fff; padding: 5px 10px;"></div>
    </ol>
</div>

</div>
</div>
</div>
</div>
</div>

<?php include "footer.php"?>