<?php 
include 'config/koneksi.php';
session_start();
if(isset($_SESSION['user'])) {
    $user = mysqli_query($conn, "SELECT * FROM `tb_user` WHERE username = '".$_SESSION['user']) or die(mysqli_error());
    $u = mysqli_fetch_array($user);
    $users = $u['username'];
    $id_user = $u['cuid'];
    $userID = $u['cuid'];
    
    var_dump($userID);

    // Query SQL untuk mengambil data pengguna yang menggunakan referral dari pengguna dengan cuid tertentu
    $sql = "SELECT u.*, 
                   SUM(t.total) AS total_transaksi,
                   MIN(t.date) AS tanggal_transaksi_pertama,
                   MAX(t.date) AS tanggal_transaksi_terakhir
            FROM tb_user u
            LEFT JOIN tb_transaksi t ON u.cuid = t.userID
            WHERE u.referral_user_id = '$userID'
              AND t.jenis = 1
            GROUP BY u.cuid";

    // Menjalankan query
    $result = $conn->query($sql);

    // Memeriksa apakah hasil query menghasilkan baris data
    if ($result->num_rows > 0) {
        // Membuat tabel HTML dengan kelas-kelas Bootstrap
        echo "<div class='table-responsive'>";
        echo "<table class='table table-bordered'>";
        echo "<thead class='thead-light'>";
        echo "<tr><th>Username</th><th>Deposit</th><th>Total Transaksi</th><th>Tanggal Transaksi Pertama</th><th>Tanggal Transaksi Terakhir</th></tr>";
        echo "</thead>";
        echo "<tbody>";
        // Output data dari setiap baris
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["username"]. "</td>";

            // Deposit
            $deposit = ($row["total_transaksi"] !== null) ? "Sudah" : "Belum";
            echo "<td>$deposit</td>";

            // Total Transaksi
            $total_transaksi = ($row["total_transaksi"] !== null) ? "Rp " . number_format($row["total_transaksi"], 0, ',', '.') : "-";
            echo "<td>$total_transaksi</td>";

            // Tanggal Transaksi Pertama
            $tanggal_transaksi_pertama = ($row["tanggal_transaksi_pertama"] !== null) ? $row["tanggal_transaksi_pertama"] : "-";
            echo "<td>$tanggal_transaksi_pertama</td>";

            // Tanggal Transaksi Terakhir
            $tanggal_transaksi_terakhir = ($row["tanggal_transaksi_terakhir"] !== null) ? $row["tanggal_transaksi_terakhir"] : "-";
            echo "<td>$tanggal_transaksi_terakhir</td>";

            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
        echo "</div>";
    } else {
        echo "<p class='alert alert-warning'>User Belum Melakukan Deposit</p>";
    }
} else {
    echo "<p class='alert alert-danger'>Session user belum di-set</p>";
}

// Menutup koneksi ke database
$conn->close();
?>
