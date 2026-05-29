<?php
include '../../config/koneksi.php';

session_start();

if (!isset($_SESSION['user'])) {
    echo "Error: Anda harus masuk terlebih dahulu!";
    exit();
}
$username = $_SESSION['user'];

$sql = "SELECT * FROM tb_user WHERE username = '$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    $cuid = $user['cuid'];
} else {
    echo "Error: Data pengguna tidak ditemukan.";
}
$current_password = $_POST['current_password'];
$new_password = $_POST['new_password'];
$confirm_password = $_POST['confirm_password'];

if ($new_password !== $confirm_password) {
    echo "Error: Kata sandi baru tidak cocok dengan konfirmasi.";
    exit();
}

$sql = "SELECT password FROM tb_user WHERE cuid='$cuid'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $current_password_db = $row["password"];

    if (!password_verify($current_password, $current_password_db)) {
        echo "Error: Kata sandi saat ini salah.";
        exit();
    }
} else {
    echo "Error: Data pengguna tidak ditemukan.";
    exit();
}

$hashed_new_password = password_hash($new_password, PASSWORD_DEFAULT);

$sql_update = "UPDATE tb_user SET password='$hashed_new_password' WHERE cuid='$cuid'";

if ($conn->query($sql_update) === TRUE) {
    echo "Kata sandi berhasil diperbarui.";

    // Destroy session
    session_destroy();

    // Redirect to home page
    echo "<script>window.location.href = '/';</script>";
    echo "<script>alert('Kata sandi berhasil diperbarui. Anda akan dialihkan ke halaman utama.');</script>";
} else {
    echo "Error: " . $sql_update . "<br>" . $conn->error;
}

$conn->close();
?>
