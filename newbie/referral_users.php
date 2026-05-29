<?php 
include 'header.php';
include 'sidebar.php';
?>
<div class="main-panel">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">DAFTAR REFERRAL</h4>
                    </div>
                    <div class="card-body">
                        <?php
                            if(isset($_GET['cuid'])) {
                                $cuid = $_GET['cuid'];
                                // Mengatur aksi untuk tombol ubah status
                                if(isset($_POST['ubah_status'])) {
                                    $userID = $_POST['userID'];
                                    $newStatus = ($_POST['current_status'] == 0) ? 1 : 0;
                                    var_dump($userID);
                                    $updateSql = "UPDATE tb_user SET claim = $newStatus WHERE username = '$userID'";
                                    if ($conn->query($updateSql) === TRUE) {
                                        
                                    } else {
                                        echo "<script>alert('Error: " . $conn->error . "');</script>";
                                    }
                                }
                                $sql = "SELECT u.*, 
                                                IFNULL(SUM(t.total), '-') AS total_transaksi,
                                                IFNULL(MIN(t.date), '-') AS tanggal_transaksi_pertama,
                                                IFNULL(MAX(t.date), '-') AS tanggal_transaksi_terakhir,
                                                IFNULL(u.claim, 0) AS claim
                                        FROM tb_user u
                                        LEFT JOIN tb_transaksi t ON u.cuid = t.userID AND t.jenis = 1
                                        WHERE u.referral_user_id = '$cuid'
                                        GROUP BY u.cuid";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    // Membuat tabel HTML dengan kelas-kelas Bootstrap dan DataTables
                                    echo "<div class='table-responsive'>";
                                    echo "<table id='example' class='table table-bordered'>";
                                    echo "<thead class='thead-light'>";
                                    echo "<tr><th>Username</th><th>Klaim</th><th>Deposit</th><th>Total Transaksi</th><th>Tanggal Transaksi Pertama</th><th>Tanggal Transaksi Terakhir</th><th>Aksi</th></tr>";
                                    echo "</thead>";
                                    echo "<tbody>";
                                    // Output data dari setiap baris
                                    while($row = $result->fetch_assoc()) {
                                        echo "<tr><td>" . $row["username"]. "</td>";

                                        // Klaim
                                        $klaim = ($row["claim"] == 1) ? "Sudah Diklaim" : "Belum diklaim";
                                        $textColorClaim = ($row["claim"] == 1) ? "green" : "red";
                                        echo "<td style='color: $textColorClaim; font-weight: bold;'>$klaim</td>";

                                        // Deposit
                                        $deposit = ($row["total_transaksi"] !== '-') ? "Sudah" : "Belum";
                                        $textColorDeposit = ($deposit !== "Sudah") ? "red" : "green";
                                        echo "<td style='color: $textColorDeposit; font-weight: bold;'>$deposit</td>";

                                        // Total Transaksi
                                        $total_transaksi = ($row["total_transaksi"] !== '-') ? "Rp " . number_format($row["total_transaksi"], 0, ',', '.') : "-";
                                        echo "<td style='color: $textColorDeposit; font-weight: bold;'>$total_transaksi</td>";

                                        // Tanggal Transaksi Pertama
                                        $tanggal_transaksi_pertama = ($row["tanggal_transaksi_pertama"] !== '-') ? $row["tanggal_transaksi_pertama"] : "-";
                                        echo "<td style='color: $textColorDeposit; font-weight: bold;'>$tanggal_transaksi_pertama</td>";

                                        // Tanggal Transaksi Terakhir
                                        $tanggal_transaksi_terakhir = ($row["tanggal_transaksi_terakhir"] !== '-') ? $row["tanggal_transaksi_terakhir"] : "-";
                                        echo "<td style='color: $textColorDeposit; font-weight: bold;'>$tanggal_transaksi_terakhir</td>";

                                        // Tombol ubah status
                                        echo "<td>";
                                        echo "<form method='post'>";
                                        echo "<input type='hidden' name='userID' value='" . $row["username"] . "'>";
                                        echo "<input type='hidden' name='current_status' value='" . $row['claim'] . "'>";
                                        echo "<button type='submit' name='ubah_status' class='btn btn-sm btn-primary'>" . ($row['claim'] == 1 ? "Batalkan Klaim" : "Klaim") . "</button>";
                                        echo "</form>";
                                        echo "</td>";

                                        echo "</tr>";
                                    }
                                    echo "</tbody>";
                                    echo "</table>";
                                    echo "</div>";
                                } else {
                                    echo "<p class='alert alert-warning'>Tidak ada data pengguna dalam referral_user_id.</p>";
                                }
                            } else {
                                echo "<p class='alert alert-danger'>Session user belum di-set</p>";
                            }

                            // Menutup koneksi ke database
                            $conn->close();
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Menambahkan file CSS DataTables -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">

<!-- Menambahkan script DataTables -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
