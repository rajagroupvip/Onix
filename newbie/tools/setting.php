<?php
// setting.php

// Pastikan file session.php telah menyediakan koneksi database
require_once('session.php');

// Proses formulir ketika formulir disubmit
if (isset($_POST['submit'])) {
    // Ambil nilai dari formulir
    $image = $_POST['image'];
    $instansi = $_POST['instansi'];
    $keyword = $_POST['keyword'];
    $deskripsi = $_POST['deskripsi'];

    // Lakukan validasi input di sini sesuai kebutuhan Anda

    // Update logo di tabel tb_seo
    $update_logo_query = "UPDATE tb_seo SET image='$image' WHERE cuid=1";
    $result_logo = mysqli_query($conn, $update_logo_query);

    // Update data lainnya di tabel tb_seo
    $update_data_query = "UPDATE tb_seo SET instansi='$instansi', keyword='$keyword', deskripsi='$deskripsi' WHERE cuid=1";
    $result_data = mysqli_query($conn, $update_data_query);

    if ($result_logo && $result_data) {
        // Setelah operasi database selesai, Anda dapat mengarahkan pengguna ke halaman lain atau melakukan tindakan lainnya
        // Contoh mengarahkan pengguna kembali ke halaman pengaturan
        header("Location:../general.php");
        exit();
    } else {
        // Handle kesalahan kueri
        echo "Error updating data: " . mysqli_error($conn);
    }
}
?>
