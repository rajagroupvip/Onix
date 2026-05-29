<?php
    require_once('session.php');

    // Validasi dan bersihkan input
    $id = mysqli_real_escape_string($conn, $_GET['postID']);
    $gameon = mysqli_real_escape_string($conn, $_GET['blokir']);

    // Pastikan nilai yang diizinkan (1 untuk blokir, 0 untuk membuka)
    if ($gameon == '1' || $gameon == '0') {
        // Lakukan UPDATE pada database
        $query = mysqli_query($conn, "UPDATE `tb_user` SET `blokir` = '$gameon' WHERE cuid = '$id'") or die(mysqli_error($conn));

        // Periksa hasil kueri
        if ($query) {
            // Kueri berhasil
            header('location:../gameakses');
        } else {
            // Kueri gagal
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        // Nilai tidak valid
        echo "Error: Nilai 'status' tidak valid.";
    }
?>
