<?php
require_once('session.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate input
    $Nama = mysqli_real_escape_string($conn, $_POST['Nama']);
    $Gambar = mysqli_real_escape_string($conn, $_POST['Gambar']);
    $sql = "UPDATE tb_qris SET Nama='$Nama', Gambar='$Gambar' WHERE id=1";

    if (mysqli_query($conn, $sql)) {
        echo "Record updated successfully";
        header("Location: ../qris");
        exit(); 
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
