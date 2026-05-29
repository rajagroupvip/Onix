<?php
require_once('session.php'); // Sesuaikan dengan file koneksi Anda

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kd_transaksi = $_POST["kd_transaksi"];

    // Lakukan pengecekan atau validasi sesuai kebutuhan

    // Hapus transaksi
    $sql_delete = mysqli_query($conn, "DELETE FROM `tb_transaksi` WHERE kd_transaksi = '$kd_transaksi'") or die(mysqli_error());

    // Tambahkan log atau pesan sukses/hapus jika diperlukan

    // Redirect atau kembali ke halaman sebelumnya
    header("Location: ../deposit.php");
    exit();
}
?>
