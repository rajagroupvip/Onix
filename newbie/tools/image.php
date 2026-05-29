<?php
include 'session.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cuid = $_POST["cuid"];
    $new_image_url = $_POST["new_image"];

    // Update entri di database dengan URL gambar baru
    $update_sql = "UPDATE tb_gamenew SET game_image = ? WHERE cuid = ?";
    $update_stmt = $conn->prepare($update_sql);
    $update_stmt->bind_param("ss", $new_image_url, $cuid);
    $update_stmt->execute();

    header("Location: /newbie/game_list.php"); // Ganti dengan halaman tampilan data yang sesuai
    exit();
} else {
    echo "Permintaan tidak valid.";
}