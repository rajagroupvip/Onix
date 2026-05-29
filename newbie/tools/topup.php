<?php
error_reporting(E_ALL);
require_once('session.php');

$usersID = mysqli_real_escape_string($conn, $_POST['userID']);
$jumlah = mysqli_real_escape_string($conn, $_POST['nominal']);

$amount_str = str_replace('.', '', $jumlah);
$amounts = (float) $amount_str;
$jenis = $_POST['jenis'];

$getUser = mysqli_query($conn, "SELECT * FROM `tb_user` WHERE cuid = '$usersID'") or die(mysqli_error($conn));
$gu = mysqli_fetch_array($getUser);
$emailnya = $gu['email'];
$usernya = $gu['username'];

$today = date('Y-m-d');
$sql_3 = mysqli_query($conn, "SELECT * FROM `tb_transaksi` ORDER BY cuid DESC LIMIT 1") or die(mysqli_error($conn));
$s33 = mysqli_num_rows($sql_3);
if ($s33 == 0) {
    $unikID = 0;
} else {
    $s3 = mysqli_fetch_array($sql_3);
    $unikID = $s3['cuid'];
}
$no_invoice = 'INV/' . date('y') . '/' . date('m') . '/' . date('s') . $unikID;
$unik = date('Hs');
$kode_unik = substr(str_shuffle(1234567890), 0, 3);
$orderid = $kode_unik . date('dis');
$created_date = date('Y-m-d H:i:s');

$getBalance = mysqli_query($conn, "SELECT * FROM `tb_balance` WHERE userID = '$usersID'") or die(mysqli_error());
$gb = mysqli_fetch_array($getBalance);
$saldoAktif = $gb['active'];

if ($jenis == 0) {
    $newSaldo = $saldoAktif + $amounts;
    $update_balace = mysqli_query($conn, "UPDATE `tb_balance` SET active = $newSaldo WHERE userID = '$usersID'") or die(mysqli_error());
    $deposit = $WL->transaksi($usernya, 'deposit', $amounts);
    header('location:../saldomember.php?notif=1');
} else if ($jenis == 2) {
    $newSaldo = $saldoAktif + $amounts;
    $insert_transaksi = mysqli_query($conn, "INSERT INTO `tb_transaksi` (`kd_transaksi`, `date`, `transaksi`, `total`, `saldo`, `note`, `gameid`, `providerID`, `jenis`, `metode`, `pay_from`, `userID`, `status`) VALUES ('$no_invoice','$created_date','Bonus Saldo','$amounts',0,'Bonus','', '1', '1','1','0','$usersID',1)") or die(mysqli_error());
    $update_balace = mysqli_query($conn, "UPDATE `tb_balance` SET active = $newSaldo WHERE userID = '$usersID'") or die(mysqli_error());
    header('location:../saldomember.php?notif=1');
} else {
    $newSaldos = $saldoAktif - $amounts;
    if ($newSaldos < 0) {
        $newSaldo = 0;
    } else {
        $newSaldo = $newSaldos;
    }
    $update_balace = mysqli_query($conn, "UPDATE `tb_balance` SET active = $newSaldo WHERE userID = '$usersID'") or die(mysqli_error());
    $deposit = $WL->transaksi($usernya, 'withdraw', $amounts);
    header('location:../saldomember.php?notif=1');
}
?>
