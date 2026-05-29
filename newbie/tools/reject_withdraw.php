<?php
require_once('session.php');

// Ensure cuid is set in the query parameters
if (!isset($_GET['cuid'])) {
    die("Invalid request. Missing cuid parameter.");
}

$id = $_GET['cuid'];

// Use prepared statements to prevent SQL injection
$sql_1 = mysqli_query($conn, "SELECT * FROM `tb_transaksi` WHERE cuid = '$id'") or die(mysqli_error());
$s1 = mysqli_fetch_array($sql_1);

$usersID = $s1['userID'];
$jumlah = $s1['total'];

$amount_str = str_replace('.', '', $jumlah);
$amounts = (float) $amount_str;

$trxID = $s1['kd_transaksi'];

// Use prepared statements to prevent SQL injection
$getUser = mysqli_query($conn, "SELECT * FROM `tb_user` WHERE cuid = '$usersID'") or die(mysqli_error());
$gu = mysqli_fetch_array($getUser);
$uplineID = $gu['referral_user_id'];
$usernya = $gu['username'];

$komisie = ($amounts * 20) / 100;
$komisi = round($komisie);

$kode_unik = substr(str_shuffle('1234567890'), 0, 3);
$kd_transaksi = date('Ymds') . $kode_unik;
$created_date = date('Y-m-d H:i:s');

if ($s1['status'] == 0) {
    $getTO = mysqli_query($conn, "SELECT * FROM `tb_turnover` WHERE trxID = '$trxID'") or die(mysqli_error());
    $goo = mysqli_num_rows($getTO);
    if ($goo == 0) {
        $totalBalance = $amounts;
        $update_balance = mysqli_query($conn, "UPDATE `tb_balance` SET `active` = active + '$totalBalance' WHERE `userID` = '$usersID'") or die(mysqli_error($conn));
    } else {
        $go = mysqli_fetch_array($getTO);
        $bonus = $go['bonus'];
        $totalBalance = $amounts + $bonus;
        $updates = mysqli_query($conn, "UPDATE `tb_turnover` SET `status` = 1 WHERE `trxID` = '$trxID'") or die(mysqli_error($conn));
        $update_balance = mysqli_query($conn, "UPDATE `tb_balance` SET `active` = active + '$totalBalance' WHERE `userID` = '$usersID'") or die(mysqli_error($conn));
    }

    $cekRef = mysqli_query($conn, "SELECT * FROM `tb_transaksi` WHERE userID = '$uplineID' AND jenis = 3 AND pay_from = '$usersID' AND status = 1") or die(mysqli_error());
    $cr = mysqli_num_rows($cekRef);

    if ($cr == 0) {
        $insert_transaksi = mysqli_query($conn, "INSERT INTO `tb_transaksi` (`kd_transaksi`, `date`, `transaksi`, `total`, `saldo`, `note`, `gameid`, `providerID`, `jenis`, `metode`, `pay_from`, `userID`, `status`) VALUES ('$kd_transaksi','$created_date','Refferal','$komisi',0, 'Bonus Refferal', '', '0','3','0','$usersID','$uplineID',1)") or die(mysqli_error($conn));
        $insert = mysqli_query($conn, "UPDATE `tb_balance` SET `active` = active - '$komisi' WHERE `userID` = '$uplineID'") or die(mysqli_error($conn));
    }

    $newNote = "Rejected"; // Replace this with your desired new note
    $update = mysqli_query($conn, "UPDATE `tb_transaksi` SET `status` = 2, `note` = '$newNote' WHERE `cuid` = '$id'") or die(mysqli_error($conn));
    $deposit = $WL->transaksi($usernya, 'deposit', $amounts);
    header('location:../request_withdraw.php?notif=2');
} else {
    die("Invalid request. Transaction already processed.");
}
?>
