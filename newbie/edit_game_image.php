<?php
// edit_game_image.php

include "header.php";
include "sidebar.php";


// Pastikan ada parameter cuid yang diterima dari tautan Edit Image
if (isset($_GET['cuid'])) {
    $cuid = $_GET['cuid'];

    // Query untuk mendapatkan data game berdasarkan cuid
    $sql = "SELECT * FROM tb_gamenew WHERE cuid = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $cuid);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
?>
<div class="main-panel">
    <div class="content">
        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-1">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">LIST GAME</h2>
                    </div>
                </div>
            </div>
        </div>

        <!-- Formulir untuk mengunggah gambar baru -->
        <!-- Formulir untuk mengedit gambar game -->
        <div class="container mt-4">
            <h2>Edit Game Image</h2>
            <form method="post" action="/newbie/tools/image.php">
                <input type="hidden" name="cuid" value="<?php echo $row['cuid']; ?>">
                <label for="new_image">Masukkan URL Gambar Baru:</label>
                <input type="text" name="new_image" value="<?php echo $row['game_image']; ?>" required>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </form>
        </div>

        <?php
    } else {
        echo "Data game tidak ditemukan.";
    }

    // Tutup prepared statement
    $stmt->close();
} else {
    echo "Parameter cuid tidak valid.";
}

include "footer.php";
?>