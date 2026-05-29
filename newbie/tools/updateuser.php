<?php
require_once('session.php');

// Ambil data username dari database dan buat pengguna SoftGaming
$sql = "SELECT username FROM tb_user";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $username = $row['username'];

        try {
            // Generate a hash based on the username (you can customize this based on your requirements)
            $hash = md5($username);

            // Panggil metode create dari objek SoftGaming dengan menyertakan hash
            $action = $WL->userCreate('user_create', $username);

            // Metode lain yang mungkin Anda panggil...

            echo "User $username berhasil dibuat dengan action: $action<br>";

            // Tambahkan script JavaScript untuk pemberitahuan dan mengarahkan kembali
            echo '<script>';
            echo 'alert("User berhasil diperbaharui");';
            echo 'window.history.go(-1);';  // Mengarahkan kembali ke halaman sebelumnya
            echo '</script>';
        } catch (Exception $e) {
            echo 'Error membuat user ' . $username . ': ' . $e->getMessage() . '<br>';
        }
    }
} else {
    echo "Tidak ada pengguna ditemukan dalam database.";
}

// Tutup koneksi database
$conn->close();
?>
