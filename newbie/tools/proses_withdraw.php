<?php
require_once('session.php');

$id = mysqli_real_escape_string($conn, $_GET['cuid']);

// Get nominal value from transaction
$getNominal = mysqli_query($conn, "SELECT total, userID FROM `tb_transaksi` WHERE `cuid` = '$id'");
$transactionData = mysqli_fetch_assoc($getNominal);
$nominal = $transactionData['total'];
$usersID = $transactionData['userID'];

// Update transaction status
$update = mysqli_query($conn, "UPDATE `tb_transaksi` SET `status` = 1 WHERE `cuid` = '$id'") or die(mysqli_error($conn));

// Move balance from pending to payout
$updateBalance = mysqli_query($conn, "UPDATE `tb_balance` SET `pending` = pending - '$nominal', `payout` = payout + '$nominal' WHERE userID = '$usersID'") or die(mysqli_error($conn));

header('location:../request_withdraw.php?notif=1');
?>
