<?php
// Sertakan file koneksi database
include "../config/koneksi.php";

// Ambil nilai dari formulir
$cuid = $_POST['cuid'];
$newStatus = $_POST['status'];
$blokir = $_POST['blokir'];

// Update nilai blokir di database
$query = "UPDATE tb_user SET status = ? WHERE cuid = ?";
$statement = $conn->prepare($query);

// Periksa apakah persiapan query berhasil
if ($statement) {
    // Ikat parameter
    $statement->bind_param('ii', $newStatus, $cuid);

    // Eksekusi query
    if ($statement->execute()) {
        // Redirect kembali ke halaman sebelumnya atau halaman lain jika diperlukan
        header("Location:../newbie/view.php?postID={$cuid}");
        exit();
    } else {
        echo "Terjadi kesalahan saat mengubah status blokir. Error: " . $conn->error;
    }
    // Tutup pernyataan
    $statement->close();
} else {
    echo "Terjadi kesalahan dalam persiapan query.";
}

// Tutup koneksi
$conn->close();
?>
