<?php
require_once('session.php');
$useridnya = $u['username'];
$gameID = $_GET['gamecode'];
$gameProvider = $_GET['providercode'];


$response = $WL->opengame($useridnya, $gameID);

// Cek jika respons berisi gameUrl
if (isset($response['gameUrl'])) {
    // Arahkan pengguna ke gameUrl
    $gameUrl = $response['gameUrl'];
    header("Location: $gameUrl");
    exit(); // Pastikan tidak ada output lain setelah header redirect
} else {
    // Jika gameUrl tidak ditemukan, tangani sesuai kebutuhan aplikasi Anda
    echo "Maaf, terjadi kesalahan dalam mengarahkan Anda ke permainan.";
    // Atau lakukan tindakan lain, seperti menampilkan pesan kesalahan, mengarahkan kembali pengguna ke halaman sebelumnya, dll.
}