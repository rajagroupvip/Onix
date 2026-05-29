<?php
ob_start();
session_start();
date_default_timezone_set("Asia/Jakarta");
include('../../config/koneksi.php');
include('../../config/class_softgaming.php');

// Inisialisasi objek softgaming
$SG = new softgaming();

$sid = session_id();
$sql_0 = mysqli_query($conn, "SELECT * FROM `tb_seo` WHERE cuid = 1") or die(mysqli_error());
$s0 = mysqli_fetch_array($sql_0);
$urlweb = $s0['urlweb'];
$urlwebs = $s0['urlweb'];

$sql_1 = mysqli_query($conn, "SELECT * FROM `tb_user` WHERE cuid = 1") or die(mysqli_error());
$s1b = mysqli_fetch_array($sql_1);

// Mendapatkan semua user dari tabel tb_user
$allUsersQuery = mysqli_query($conn, "SELECT * FROM `tb_user`") or die(mysqli_error());

while ($u = mysqli_fetch_array($allUsersQuery)) {
    $users = $u['user'];
    $id_user = $u['cuid'];
    $userID = $u['cuid'];
    $externalPlayerId = $u['extplayer'];
    $token_id = isset($u['token_id']) ? $u['token_id'] : false;
    $level = isset($u['level']) ? $u['level'] : false;

    // Mendapatkan informasi saldo menggunakan fungsi getbalance
    $balances = json_decode($SG->getbalance($users), true);

    if ($balances === null) {
        // Penanganan kesalahan JSON
        die(json_encode(array('success' => false, 'message' => 'Gagal mendekode JSON atau format JSON tidak sesuai')));
    }

    // Memeriksa status respon dari API
    if (isset($balances['status']) && $balances['status'] === 'success') {
        // Respon berhasil, lanjutkan dengan menggunakan $balances
        $balanceValue = isset($balances['balance']) ? $balances['balance'] : 0;

        // Update saldo ke dalam tabel tb_balance
        $updateBalanceQuery = "UPDATE tb_balance SET active = $balanceValue WHERE userID = $userID";
        mysqli_query($conn, $updateBalanceQuery) or die(json_encode(array('success' => false, 'message' => mysqli_error($conn))));

        // Mengembalikan saldo tanpa json_encode
        echo "User ID: $userID - Saldo: " . number_format($balanceValue) . "<br>";
    } else {
        // Respon tidak berhasil, tangani kesalahan sesuai kebutuhan
        echo "Gagal mendapatkan saldo dari API untuk User ID: $userID<br>";
    }
}

$sql_3 = mysqli_query($conn, "SELECT * FROM `tb_balance` WHERE userID = '$userID'") or die(mysqli_error());
$s3 = mysqli_fetch_array($sql_3);

$sql_banks = mysqli_query($conn, "SELECT * FROM `tb_bank` WHERE userID = '$userID'") or die(mysqli_error());
$sbs = mysqli_fetch_array($sql_banks);

// error_reporting(0); // Hapus atau gantilah sesuai kebutuhan
$userID = $u['cuid'];

$getLastBalance = mysqli_query($conn, "SELECT * FROM `tb_balance` WHERE userID = '$userID'") or die(mysqli_error());
$glb = mysqli_fetch_array($getLastBalance);

// Menambahkan script JavaScript untuk mengarahkan kembali ke halaman sebelumnya
echo '<script>';
echo 'alert("Proses selesai, saldo berhasil diperbarui");';
echo 'window.history.go(-1);';  // Mengarahkan kembali ke halaman sebelumnya
echo '</script>';
?>
