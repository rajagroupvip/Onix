<?php
ob_start();
session_start();
date_default_timezone_set("Asia/Jakarta");
include('../config/koneksi.php');

// Pastikan variabel session user telah di-set sebelum menggunakan
if(isset($_SESSION['user'])) {
    $user = mysqli_query($conn,"SELECT * FROM `tb_user` WHERE username = '".$_SESSION['user']."'") or die(mysqli_error());
    $u = mysqli_fetch_array($user);
    $userID = $u['cuid'];
} else {
    // Jika session user belum di-set, Anda dapat menangani kasus ini sesuai dengan kebutuhan aplikasi Anda.
    // Misalnya, Anda dapat mengarahkan pengguna ke halaman login.
    header('Location: /login.php'); // Ganti '/login.php' dengan alamat yang sesuai
    exit();
}

function getReferralDownline($conn, $cuid) {
    $downline = array();
    function recursiveDownline($conn, $cuid, &$downline) {
        $query = mysqli_query($conn, "SELECT * FROM `tb_user` WHERE referral_user_id = '$cuid'");
        if (mysqli_num_rows($query) > 0) {
            while ($row = mysqli_fetch_assoc($query)) {
                $downline[] = array(
                    'cuid' => $row['cuid'],
                    'username' => $row['username'],
                    'getReferralId' => $row['referral_user_id'] // Menambahkan getReferralId ke dalam array downline
                );
                recursiveDownline($conn, $row['cuid'], $downline); // Mengambil cuid downline untuk pencarian lebih lanjut
            }
        }
    }

    recursiveDownline($conn, $cuid, $downline);
    return $downline;
}

function getTransaksi($conn, $userId, $downline) {
    $transaksi = array();

    $downlineList = implode(',', array_column($downline, 'cuid')); // Mengambil hanya cuid dari setiap downline

    $query = mysqli_query($conn, "SELECT * FROM `tb_transaksi` WHERE userID IN ($downlineList)");
    if (mysqli_num_rows($query) > 0) {
        while ($row = mysqli_fetch_assoc($query)) {
            $transaksi[] = $row;
        }
    }
    return $transaksi;
}

$cuid = $userID;
$downline = getReferralDownline($conn, $cuid); // Mendapatkan daftar cuid downline
$transaksi = getTransaksi($conn, $userID, $downline); // Menggunakan daftar cuid downline sebagai parameter

// Menggabungkan data referral dan transaksi dalam satu array
$data = array(
    'downline' => $downline,
    'transaksi' => $transaksi
);

// Menghasilkan output JSON yang diformat dengan baik
$json_data = json_encode($data, JSON_PRETTY_PRINT);

// Menampilkan output JSON
echo $json_data;
?>
