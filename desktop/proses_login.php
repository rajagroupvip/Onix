<?php
session_start();
include('../config/koneksi.php');

$user = mysqli_real_escape_string($conn, $_POST['user']);
$pass = mysqli_real_escape_string($conn, $_POST['pass']);

if (empty($user) || empty($pass)) {
    header('location:/desktop/?notif=1');
    exit;
}

$q = mysqli_query($conn, "SELECT * FROM `tb_user` WHERE username = '$user'");
if (mysqli_num_rows($q) > 0) {
    $user_data = mysqli_fetch_array($q, MYSQLI_ASSOC);
    $statusnya = $user_data['status'];

    if ($statusnya == 1) {
        $password = $user_data['password'];

        if (password_verify($pass, $password)) {
            $_SESSION['user'] = $user;
            header('location:../?notif=4');
            exit;
        } else {
            header('location:/desktop/?notif=3');
            exit;
        }
    } elseif ($statusnya == 0) {
        // Jika status adalah 0, akun sedang terkunci
        header('location:/desktop/?notif=10'); // Notifikasi untuk akun terkunci
        exit;
    } else {
        header('location:/desktop/?notif=3');
        exit;
    }
} else {
    header('location:/desktop/?notif=3');
    exit;
}
?>
