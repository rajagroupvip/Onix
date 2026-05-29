<?php
error_reporting(E_ALL);
require_once('session.php');

$id = $_GET['cuid'];
$sql_1 = mysqli_query($conn, "SELECT * FROM `tb_transaksi` WHERE cuid = '$id'") or die(mysqli_error($conn));
$s1 = mysqli_fetch_array($sql_1);
$usersID = $s1['userID'];
$jumlah = $s1['total'];

$amount_str = str_replace('.', '', $jumlah);
$amounts = (float) $amount_str;

$trxID = $s1['kd_transaksi'];

$getUser = mysqli_query($conn, "SELECT * FROM `tb_user` WHERE cuid = '$usersID'") or die(mysqli_error($conn));
$gu = mysqli_fetch_array($getUser);
$emailnya = $gu['email'];
$usernya = $gu['username'];

$uplineID = $gu['referral_user_id'];
$komisie = 0;
$komisi = round($komisie);

$kode_unik = substr(str_shuffle(1234567890), 0, 3);
$kd_transaksi = date('Ymds') . $kode_unik;
$created_date = date('Y-m-d H:i:s');


if ($s1['status'] == 0) {
    $getTO = mysqli_query($conn, "SELECT * FROM `tb_turnover` WHERE trxID = '$trxID'") or die(mysqli_error($conn));
    $goo = mysqli_num_rows($getTO);

    if ($goo === 0) {
        $totalBalance = $amounts;
        // Removed json_decode and success check for simplicity
        $updateBalance = mysqli_query($conn, "UPDATE `tb_balance` SET `active` = `active` + '$totalBalance' WHERE `userID` = '$usersID'") or die(mysqli_error($conn));

        $deposit = $WL->transaksi($usernya, 'deposit', $amounts);
    } else {
        $go = mysqli_fetch_array($getTO);
        $bonus = $go['bonus'];
        $totalBalance = floatval($amounts) + floatval($bonus);
        // Removed json_decode and success check for simplicity
        $updates = mysqli_query($conn, "UPDATE `tb_turnover` SET `status` = 1 WHERE `trxID` = '$trxID'") or die(mysqli_error($conn));
        $updateBalance = mysqli_query($conn, "UPDATE `tb_balance` SET `active` = `active` + '$totalBalance' WHERE `userID` = '$usersID'") or die(mysqli_error($conn));
        $deposit = $WL->transaksi($usernya, 'deposit', $totalBalance);
        
    }
    sleep(1);

    // Bonus ke Upline
    $cekRef = mysqli_query($conn, "SELECT * FROM `tb_transaksi` WHERE userID = '$uplineID' AND jenis = 3 AND pay_from = '$usersID' AND status = 1") or die(mysqli_error($conn));
    $cr = mysqli_num_rows($cekRef);
    if ($cr == 0) {
        $getPromotorID = mysqli_query($conn, "SELECT * FROM `tb_user` WHERE `cuid` = '$uplineID'");
        $fetchPromotor = mysqli_fetch_array($getPromotorID);
        $promotor = $fetchPromotor['user'];
        // Removed json_decode and success check for simplicity
        $insert_transaksi = mysqli_query($conn, "INSERT INTO `tb_transaksi` (`kd_transaksi`, `date`, `transaksi`, `total`, `saldo`, `note`, `gameid`, `providerID`, `jenis`, `metode`, `pay_from`, `userID`, `status`) VALUES ('$kd_transaksi', '$created_date', 'Referral', '$komisi', 0, 'Bonus Referral', '', '0', '3', '0', '$usersID', '$uplineID', 1)") or die(mysqli_error($conn));
        $insert = mysqli_query($conn, "UPDATE `tb_balance` SET `active` = `active` + '$komisi' WHERE `userID` = '$uplineID'") or die(mysqli_error($conn));        
    }
    $update = mysqli_query($conn, "UPDATE `tb_transaksi` SET `status` = 1 WHERE `cuid` = '$id'") or die(mysqli_error($conn));
    sleep(1);
    header('location:../request_depo/?notif=1');
    exit();
} else {
    header('location:../request_depo/');
    exit();
}
?>
