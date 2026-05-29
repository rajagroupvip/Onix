<?php
ob_start();
session_start();
date_default_timezone_set("Asia/Jakarta");
include('../../config/koneksi.php');
include('../../config/class_softgaming.php');

$sql_0 = mysqli_query($conn,"SELECT * FROM `tb_seo` WHERE cuid = 1") or die(mysqli_error());
$s0 = mysqli_fetch_array($sql_0);
$urlweb = $s0['urlweb'].'/newbie/';
$urlwebs = $s0['urlweb'];

// Pemeriksaan apakah session admin_username sudah diatur
if (empty($_SESSION['admin_username'])) {
    header('location:'.$urlweb);
    exit;
}

$username = $_SESSION['admin_username']; // Mendapatkan nilai admin_username dari session
// Mengambil data admin dari tabel 'admin'
$admin_query = mysqli_query($conn,"SELECT * FROM `admin` WHERE username = '$username'") or die(mysqli_error($conn));
$admin_data = mysqli_fetch_array($admin_query);
// Memperbarui variabel-variabel sesi sesuai dengan data admin yang diambil
$id_admin = $admin_data['cuid'];
$level = isset($admin_data['level']) ? $admin_data['level'] : false;

// Mengonversi level menjadi peran/administrasi yang sesuai
if ($level == 1) {
    $role = "Superadmin";
} elseif ($level == 2) {
    $role = "Admin";
} elseif ($level == 3) {
    $role = "Marketing";
} else {
    // Jika level tidak sesuai dengan yang diharapkan, atur ke nilai default
    $role = "Unknown";
}


// Cek level pengguna, jika adalah reseller, vip, atau user, lakukan logout
if($level == 'reseller' || $level == 'vip' || $level == 'user'){
    $_SESSION['admin_username'] = ''; // Menghapus nilai dari session admin_username
    unset($_SESSION['admin_username']);
    session_destroy();
    header('location:'.$urlweb.'/login/');
    exit;
}

$bulan = array('Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
$bulane = array('Jan','Feb','Mar','Apr','Mei','Juni','Juli','Agus','Sept','Okt','Nov','Des');
?>
