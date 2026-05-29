<?php
ob_start();
session_start();
include('../config/koneksi.php');
include('../config/class_softgaming.php');

// Fungsi untuk menghasilkan kode referral secara acak
function generateReferralCode() {
    return substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz"), 0, 8); // Generate kode referral acak dengan 8 karakter huruf
}

// Ambil informasi dari form registrasi
$username = strtolower($_POST['user']);
$email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
$phone_number = htmlspecialchars($_POST['no_hp'], ENT_QUOTES, 'UTF-8');
$bank_name = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['akun']), ENT_QUOTES, 'UTF-8');
$bank_account_number = htmlspecialchars($_POST['no_rek'], ENT_QUOTES, 'UTF-8');
$full_name = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['full_name']), ENT_QUOTES, 'UTF-8');
$password = password_hash($_POST['pass'], PASSWORD_DEFAULT);
$level = 'user';
$join_date = date('Y-m-d H:i:s');
// Tentukan default upline ID
$default_uplineID = 0;
$sponsor = $_POST['sponsor'];

// Tentukan kode referral secara acak untuk pengguna baru
$otomatis = generateReferralCode();

// Cari pengguna yang mereferensikan jika kode referensi diberikan
$referral_query = mysqli_query($conn, "SELECT * FROM `tb_user` WHERE referral_code = '$sponsor'");
if (mysqli_num_rows($referral_query) > 0) {
    $referral_data = mysqli_fetch_assoc($referral_query);
    $referral_user_id = $referral_data['cuid']; // Ambil ID pengguna yang mereferensikan
} else {
    $referral_user_id = $default_uplineID; // Jika kode referensi tidak valid, gunakan upline ID default
}


// Validasi
if (empty($username) || empty($email) || empty($phone_number) || empty($bank_name) || empty($bank_account_number) || empty($full_name) || empty($password)) {
    // Jika ada input yang kosong, arahkan kembali ke halaman register dengan notifikasi
    header('location:../m/register/?notif=6');
    exit();
}

// Cek apakah username sudah terdaftar
$username_check = mysqli_query($conn, "SELECT * FROM `tb_user` WHERE username = '$username'");
if (mysqli_num_rows($username_check) > 0) {
    // Jika username sudah terdaftar, arahkan kembali ke halaman register dengan notifikasi
    header('location:../m/register/?notif=2');
    exit();
}

// Cek apakah email sudah terdaftar
$email_check = mysqli_query($conn, "SELECT * FROM `tb_user` WHERE email = '$email'");
if (mysqli_num_rows($email_check) > 0) {
    // Jika email sudah terdaftar, arahkan kembali ke halaman register dengan notifikasi
    header('location:../m/register/?notif=3');
    exit();
}

$query = mysqli_query($conn, "INSERT INTO `tb_user` (`username`, `password`, `email`, `full_name`, `phone_number`, `level`, `join_date`, `last_login`, `status`, `referral_code`, `referral_user_id`) VALUES ('$username', '$password', '$email', '$full_name', '$phone_number', '$level', '$join_date', '$join_date', 1, '$otomatis', '$referral_user_id')") or die(mysqli_error($conn));
$last_user_id = mysqli_insert_id($conn);
$query2 = mysqli_query($conn, "INSERT INTO `tb_bank` (`image`, `akun`, `pemilik`, `no_rek`, `status`, `userID`) VALUES ('', '$bank_name', '$full_name', '$bank_account_number', 1, '$last_user_id')") or die(mysqli_error($conn));
$query3 = mysqli_query($conn, "INSERT INTO `tb_balance` (`userID`, `active`, `pending`, `transfer`, `payout`, `created_date`) VALUES ('$last_user_id', 0, 0, 0, 0, '$join_date')") or die(mysqli_error($conn));
if ($referral_user_id != $default_uplineID) { // Jika referral_user_id tidak sama dengan default, berarti ada referral yang valid
    $update = mysqli_query($conn, "UPDATE `tb_user` SET referral_count = referral_count + 1 WHERE cuid = '$referral_user_id'") or die(mysqli_error($conn));
}
$createusertoapi = $WL->CreateMember($username);

header('location:../m/register/?notif=1');
exit();
?>
